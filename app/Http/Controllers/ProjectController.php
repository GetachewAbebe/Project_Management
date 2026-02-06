<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Employee;
use App\Models\Directorate;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['pi', 'directorate'])->get();
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => $projects->count(),
            'evaluations' => Evaluation::count()
        ];
        return view('projects.index', compact('projects', 'stats'));
    }

    public function create()
    {
        $user = auth()->user();
        // Passing directorate info with employees to show in frontend via JS if needed, 
        // or just let the user pick the PI and we handle the rest.
        $employees = Employee::with('directorate')->get();
        
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('projects.create', compact('employees', 'stats'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'research_title' => 'required|string|max:255',
            'pi_id' => 'required|exists:employees,id',
            'objective' => 'required|string',
            'start_year' => 'required|integer|min:1900|max:2100',
            'end_year' => 'nullable|integer|min:1900|max:2100',
            'project_code' => 'nullable|string|unique:projects,project_code',
        ]);

        $pi = Employee::findOrFail($validated['pi_id']);
        $validated['directorate_id'] = $pi->directorate_id;

        if ($user->isDirector() && $validated['directorate_id'] != $user->directorate_id) {
            return back()->withErrors(['pi_id' => 'You can only register projects for employees within your own directorate.']);
        }

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project registered successfully.');
    }

    public function edit(Project $project)
    {
        $user = auth()->user();
        if ($user->isDirector() && $project->directorate_id != $user->directorate_id) {
            abort(403, 'Unauthorized access to other directorate projects.');
        }

        $employees = Employee::with('directorate')->get();
        
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('projects.edit', compact('project', 'employees', 'stats'));
    }

    public function update(Request $request, Project $project)
    {
        $user = auth()->user();
        if ($user->isDirector() && $project->directorate_id != $user->directorate_id) {
            abort(403, 'Unauthorized update attempt.');
        }

        $validated = $request->validate([
            'research_title' => 'required|string|max:255',
            'pi_id' => 'required|exists:employees,id',
            'objective' => 'required|string',
            'start_year' => 'required|integer|min:1900|max:2100',
            'end_year' => 'nullable|integer|min:1900|max:2100',
            'status' => 'required|string',
            'project_code' => 'nullable|string|unique:projects,project_code,' . $project->id,
        ]);

        $pi = Employee::findOrFail($validated['pi_id']);
        $validated['directorate_id'] = $pi->directorate_id;

        if ($user->isDirector() && $validated['directorate_id'] != $user->directorate_id) {
            return back()->withErrors(['pi_id' => 'You cannot move a project to another directorate or assign it to an employee outside yours.']);
        }

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Project updated.');
    }

    public function show(Project $project)
    {
        $user = auth()->user();
        if ($user->isDirector() && $project->directorate_id != $user->directorate_id) {
            abort(403, 'Unauthorized access to this project.');
        }

        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];

        return view('projects.show', compact('project', 'stats'));
    }

    public function destroy(Project $project)
    {
        $user = auth()->user();
        if ($user->isDirector() && $project->directorate_id != $user->directorate_id) {
            abort(403, 'Unauthorized deletion attempt.');
        }

        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project removed.');
    }
}
