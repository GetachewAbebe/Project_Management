<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Project;
use App\Models\Directorate;
use App\Models\Employee;
use App\Services\EvaluationService;
use App\Http\Requests\StoreEvaluationRequest;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    protected $evaluationService;

    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function index()
    {
        $this->authorize('viewAny', Evaluation::class);
        $user = auth()->user();
        $employee = $user->employee;
        
        $projectQuery = Project::whereHas('evaluations', function($q) use ($user, $employee) {
            if ($user->isEvaluator() && $employee) {
                // If I am an evaluator, I see projects I participated in
                $q->where('evaluator_id', $employee->id);
            }
        })->with(['pi', 'directorate', 'evaluations.evaluator']);

        if ($user->isDirector() && $user->directorate_id) {
            $projectQuery->where('directorate_id', $user->directorate_id);
        }

        $evaluatedProjects = $projectQuery->latest()->get();

        // Fetch projects awaiting evaluation by this specific user
        $pendingProjects = collect();
        if ($user->isAdmin() || $user->isEvaluator() || $user->isDirector()) {
            $projectQuery = Project::where('status', 'REGISTERED')->with(['pi', 'directorate']);
            
            if ($user->isDirector() && $user->directorate_id) {
                $projectQuery->where('directorate_id', $user->directorate_id);
            }
            
            if ($employee) {
                // Filter out projects already evaluated by 2 people OR by ME
                $projectQuery->withCount('evaluations');
                
                $pendingProjects = $projectQuery->get()->filter(function($p) use ($employee) {
                    $alreadyEvaluatedByMe = $p->evaluations()->where('evaluator_id', $employee->id)->exists();
                    return $p->evaluations_count < 2 && 
                           $p->pi_id != $employee->id && 
                           !$alreadyEvaluatedByMe;
                });
            } else {
                $pendingProjects = $projectQuery->get();
            }
        }
        
        return view('evaluations.index', compact('evaluatedProjects', 'pendingProjects'));
    }

    public function create(Request $request)
    {
        $user = auth()->user();
        $employee = $user->employee;

        $this->authorize('create', Evaluation::class);

        if (!$employee && !$user->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Your user account is not linked to an employee record.');
        }

        $selected_project_id = $request->project_id;
        
        $projectQuery = Project::where('status', 'REGISTERED')
            ->with(['pi', 'directorate'])
            ->withCount('evaluations');

        if ($user->isDirector()) {
            $projectQuery->where('directorate_id', $user->directorate_id);
        }
        
        // Rules:
        // 1. Project must have < 2 evaluations total
        // 2. Evaluator must NOT be the PI
        // 3. Evaluator must NOT have already evaluated this project
        $evaluatorId = $employee?->id;
        $evaluatedByMeIds = $evaluatorId ? Evaluation::where('evaluator_id', $evaluatorId)->pluck('project_id') : collect();
        
        $projects = $projectQuery->get()->filter(function($p) use ($evaluatorId, $evaluatedByMeIds) {
            return $p->evaluations_count < 2 && 
                   ($evaluatorId === null || $p->pi_id != $evaluatorId) && 
                   !$evaluatedByMeIds->contains($p->id);
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

        if (!$employee) {
            return back()->with('error', 'User identity not linked to staff record.');
        }

        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'thematic_area_mark' => 'required|integer|min:1|max:5',
            'relevance_mark' => 'required|integer|min:1|max:5',
            'methodology_mark' => 'required|integer|min:1|max:5',
            'feasibility_mark' => 'required|integer|min:1|max:5',
            'overall_proposal_mark' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string'
        ]);

        $project = Project::findOrFail($validated['project_id']);

        // Final safety check
        $conflict = $this->evaluationService->checkConflictOfInterest($project, $employee->id);
        if ($conflict) {
            return back()->withErrors(['project_id' => $conflict])->withInput();
        }

        $validated['evaluator_id'] = $employee->id;
        $this->evaluationService->submitEvaluation($validated);

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation submitted successfully for "' . $project->research_title . '".');
    }

}
