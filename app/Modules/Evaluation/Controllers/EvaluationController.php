<?php

namespace App\Modules\Evaluation\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Project;
use App\Modules\Evaluation\Services\EvaluationService;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function __construct(protected EvaluationService $evaluationService) {}

    public function index()
    {
        $this->authorize('viewAny', Evaluation::class);
        $user = auth()->user();
        $employee = $user->employee;

        $evaluatedQuery = Project::whereHas('evaluations')
            ->with(['pi', 'directorate', 'evaluations.evaluator']);

        if ($user->isEvaluator() && $employee) {
            $evaluatedQuery->whereHas('evaluations', fn ($q) => $q->where('evaluator_id', $employee->id));
        }

        if ($user->isDirector() && $user->directorate_id) {
            $evaluatedQuery->where('directorate_id', $user->directorate_id);
        }

        $evaluatedProjects = $evaluatedQuery->latest()->paginate(20)->withQueryString();

        $pendingProjects = collect();
        if ($user->isAdmin() || $user->isEvaluator() || $user->isDirector()) {
            $pendingQuery = Project::where('status', 'REGISTERED')
                ->with(['pi', 'directorate'])
                ->withCount('evaluations');

            if ($user->isDirector() && $user->directorate_id) {
                $pendingQuery->where('directorate_id', $user->directorate_id);
            }

            $myEvaluatedProjectIds = $employee
                ? Evaluation::where('evaluator_id', $employee->id)->pluck('project_id')
                : collect();

            $pendingProjects = $pendingQuery->get()->filter(fn ($p) => $p->evaluations_count < 2
                && ($employee === null || $p->pi_id != $employee->id)
                && ! $myEvaluatedProjectIds->contains($p->id)
            );
        }

        $evalStatsQuery = Evaluation::query();
        if ($user->isDirector() && $user->directorate_id) {
            $evalStatsQuery->whereHas('project', fn ($q) => $q->where('directorate_id', $user->directorate_id));
        }
        if ($user->isEvaluator() && $employee) {
            $evalStatsQuery->where('evaluator_id', $employee->id);
        }

        $globalStats = [
            'awaiting_evaluation' => $pendingProjects->count(),
            'total_submissions' => $evalStatsQuery->count(),
            'distinct_projects' => $evalStatsQuery->distinct('project_id')->count('project_id'),
        ];

        return view('evaluations.index', compact('evaluatedProjects', 'pendingProjects', 'globalStats'));
    }

    public function create(Request $request)
    {
        $user = auth()->user();
        $employee = $user->employee;

        $this->authorize('create', Evaluation::class);

        if (! $employee && ! $user->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Your user account is not linked to an employee record.');
        }

        $selected_project_id = $request->project_id;

        $projectQuery = Project::where('status', 'REGISTERED')
            ->with(['pi', 'directorate'])
            ->withCount('evaluations');

        if ($user->isDirector()) {
            $projectQuery->where('directorate_id', $user->directorate_id);
        }

        $evaluatorId = $employee?->id;
        $evaluatedByMeIds = $evaluatorId ? Evaluation::where('evaluator_id', $evaluatorId)->pluck('project_id') : collect();

        $projects = $projectQuery->get()->filter(function ($p) use ($evaluatorId, $evaluatedByMeIds) {
            return $p->evaluations_count < 2 &&
                   ($evaluatorId === null || $p->pi_id != $evaluatorId) &&
                   ! $evaluatedByMeIds->contains($p->id);
        });

        $selected_project = $selected_project_id ? Project::with('evaluations')->find($selected_project_id) : null;

        return view('evaluations.create', compact('projects', 'employee', 'selected_project_id', 'selected_project'));
    }

    public function show(Evaluation $evaluation)
    {
        $user = auth()->user();
        $evaluation->load(['project.pi', 'project.directorate', 'evaluator']);

        $this->authorize('view', $evaluation);

        return view('evaluations.show', compact('evaluation'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Evaluation::class);
        $user = auth()->user();
        $employee = $user->employee;

        if (! $employee) {
            return back()->with('error', 'User identity not linked to staff record.');
        }

        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'thematic_area_mark' => 'required|integer|min:1|max:5',
            'relevance_mark' => 'required|integer|min:1|max:5',
            'methodology_mark' => 'required|integer|min:1|max:5',
            'feasibility_mark' => 'required|integer|min:1|max:5',
            'overall_proposal_mark' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
            'critical_issues' => 'nullable|string',
        ]);

        $project = Project::findOrFail($validated['project_id']);

        $conflict = $this->evaluationService->checkConflictOfInterest($project, $employee->id);
        if ($conflict) {
            return back()->withErrors(['project_id' => $conflict])->withInput();
        }

        $validated['evaluator_id'] = $employee->id;
        $this->evaluationService->submitEvaluation($validated);

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation submitted successfully for "'.$project->research_title.'".');
    }

    public function summary()
    {
        $this->authorize('viewAny', Evaluation::class);
        [$projects, $stats] = $this->buildSummaryData(auth()->user());

        return view('evaluations.summary', compact('projects', 'stats'));
    }

    public function exportSummary()
    {
        $this->authorize('viewAny', Evaluation::class);
        [$projects, $stats] = $this->buildSummaryData(auth()->user());

        $filename = 'Evaluation_Summary_Report_'.date('Y-m-d').'.doc';

        return response()->view('evaluations.export_summary', compact('projects', 'stats'))
            ->header('Content-Type', 'application/msword')
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
    }

    private function buildSummaryData($user): array
    {
        $query = Project::with(['pi', 'directorate', 'evaluations.evaluator']);

        if ($user->isDirector() && $user->directorate_id) {
            $query->where('directorate_id', $user->directorate_id);
        }

        $allProjects = $query->get();

        $projects = $allProjects->sort(function ($a, $b) {
            $dirA = $a->directorate->name ?? 'Z-None';
            $dirB = $b->directorate->name ?? 'Z-None';

            if ($dirA !== $dirB) {
                return strcmp($dirA, $dirB);
            }

            $hasEvalsA = $a->evaluations->count() > 0;
            $hasEvalsB = $b->evaluations->count() > 0;

            if ($hasEvalsA !== $hasEvalsB) {
                return $hasEvalsB <=> $hasEvalsA;
            }

            return strcmp($a->research_title, $b->research_title);
        })->values();

        $stats = [
            'total' => $allProjects->count(),
            'evaluated' => $allProjects->filter(fn ($p) => $p->evaluations->count() > 0)->count(),
            'unevaluated' => $allProjects->filter(fn ($p) => $p->evaluations->count() === 0)->count(),
            'accepted' => $allProjects->filter(fn ($p) => $p->evaluations->count() > 0 && $p->evaluations->avg('total_score') >= 70)->count(),
            'unaccepted' => $allProjects->filter(fn ($p) => $p->evaluations->count() > 0 && $p->evaluations->avg('total_score') < 70)->count(),
        ];

        return [$projects, $stats];
    }
}
