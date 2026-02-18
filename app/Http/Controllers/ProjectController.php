<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Employee;
use App\Models\Project;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $query = Project::with(['pi', 'directorate', 'evaluations']);

        if (auth()->user()->isEvaluator()) {
            $query->where('status', 'REGISTERED');
        }

        $projects = $query->get();
        $directorates = \App\Models\Directorate::orderBy('name')->get();

        return view('projects.index', compact('projects', 'directorates'));
    }

    public function create()
    {
        $this->authorize('create', Project::class);
        $employees = Employee::with('directorate')->get();

        return view('projects.create', compact('employees'));
    }

    public function store(StoreProjectRequest $request)
    {
        $user = auth()->user();
        $pi = Employee::findOrFail($request->pi_id);

        $this->authorize('create', Project::class);

        if ($user->isDirector() && $pi->directorate_id != $user->directorate_id) {
            return back()->withErrors(['pi_id' => 'You can only register projects for employees within your own directorate.']);
        }

        $this->projectService->registerProject($request->validated());

        return redirect()->route('projects.index')->with('success', 'Project registered successfully.');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $employees = Employee::with('directorate')->get();

        return view('projects.edit', compact('project', 'employees'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $this->projectService->updateProject($project, $request->validated());

        return redirect()->route('projects.index')->with('success', 'Project updated.');
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return view('projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project removed.');
    }
}
