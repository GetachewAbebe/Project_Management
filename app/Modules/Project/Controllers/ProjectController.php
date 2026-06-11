<?php

namespace App\Modules\Project\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Project;
use App\Modules\Project\Requests\StoreProjectRequest;
use App\Modules\Project\Requests\UpdateProjectRequest;
use App\Modules\Project\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(protected ProjectService $projectService) {}

    public function index(Request $request)
    {
        $user = auth()->user();

        $query = Project::with(['pi', 'directorate'])
            ->withCount('evaluations')
            ->withAvg('evaluations', 'total_score');

        if ($user->isEvaluator()) {
            $query->where('status', 'REGISTERED');
        }

        if ($user->isDirector()) {
            $query->where('directorate_id', $user->directorate_id);
        }

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('research_title', 'ilike', "%{$term}%")
                    ->orWhere('project_code', 'ilike', "%{$term}%")
                    ->orWhereHas('pi', fn ($q) => $q->where('full_name', 'ilike', "%{$term}%"));
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('directorate_id')) {
            $query->where('directorate_id', $request->directorate_id);
        }

        if ($request->filled('year')) {
            $query->where('start_year', $request->year);
        }

        $projects = $query->latest()->paginate(25)->withQueryString();
        $directorates = Directorate::orderBy('name')->get();

        $summaryQuery = Project::query();
        if ($user->isEvaluator()) {
            $summaryQuery->where('status', 'REGISTERED');
        }
        if ($user->isDirector()) {
            $summaryQuery->where('directorate_id', $user->directorate_id);
        }
        $portfolioSummary = $summaryQuery->selectRaw("
            COUNT(*) as total,
            COUNT(*) FILTER (WHERE status = 'ONGOING') as ongoing,
            COUNT(*) FILTER (WHERE status = 'COMPLETED') as completed,
            COUNT(*) FILTER (WHERE status = 'EVALUATED') as evaluated,
            COUNT(*) FILTER (WHERE status = 'REGISTERED') as registered
        ")->first();

        return view('projects.index', compact('projects', 'directorates', 'portfolioSummary'));
    }

    public function create()
    {
        $this->authorize('create', Project::class);
        $user = auth()->user();

        $employeeQuery = Employee::with('directorate')->orderBy('full_name');

        if ($user->isDirector()) {
            $employeeQuery->where('directorate_id', $user->directorate_id);
        }

        $employees = $employeeQuery->get();

        return view('projects.create', compact('employees'));
    }

    public function store(StoreProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $user = auth()->user();
        $pi = Employee::findOrFail($request->pi_id);

        if ($user->isDirector() && $pi->directorate_id !== $user->directorate_id) {
            return back()
                ->withErrors(['pi_id' => 'You can only register projects for employees within your own directorate.'])
                ->withInput();
        }

        $this->projectService->registerProject($request->validated());

        return redirect()->route('projects.index')->with('success', 'Project registered successfully.');
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);
        $project->load(['pi.directorate', 'directorate', 'evaluations.evaluator']);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $user = auth()->user();
        $employeeQuery = Employee::with('directorate')->orderBy('full_name');

        if ($user->isDirector()) {
            $employeeQuery->where('directorate_id', $user->directorate_id);
        }

        $employees = $employeeQuery->get();

        return view('projects.edit', compact('project', 'employees'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $this->projectService->updateProject($project, $request->validated());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project moved to archive.');
    }
}
