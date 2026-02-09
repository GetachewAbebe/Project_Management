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
        $query = Evaluation::with(['project', 'evaluator']);

        if ($user->isEvaluator()) {
            $employee = $user->employee;
            $query->where('evaluator_id', $employee->id);
        }

        $evaluations = $query->latest()->get();
        
        return view('evaluations.index', compact('evaluations'));
    }

    public function create(Request $request)
    {
        $user = auth()->user();
        $employee = $user->employee;

        $this->authorize('create', Evaluation::class);

        if (!$employee) {
            return redirect()->route('dashboard')->with('error', 'Your user account is not linked to an employee record.');
        }

        $selected_project_id = $request->project_id;
        
        $projectQuery = Project::where('status', 'REGISTERED');
        if ($user->isDirector()) {
            $projectQuery->where('directorate_id', $user->directorate_id);
        }
        
        // Remove projects already evaluated by this specific person
        $evaluatedProjects = Evaluation::where('evaluator_id', $employee->id)->pluck('project_id');
        $projects = $projectQuery->whereNotIn('id', $evaluatedProjects)->get();

        $selected_project = $selected_project_id ? Project::find($selected_project_id) : null;
        
        return view('evaluations.create', compact('projects', 'employee', 'selected_project_id', 'selected_project'));
    }

    public function show(Evaluation $evaluation)
    {
        $user = auth()->user();
        $evaluation->load(['project.pi', 'project.directorate', 'evaluator']);

        $this->authorize('view', $evaluation);

        return view('evaluations.show', compact('evaluation'));
    }

    public function store(StoreEvaluationRequest $request)
    {
        $user = auth()->user();
        $employee = $user->employee;

        $this->authorize('create', Evaluation::class);

        if (!$employee) {
             abort(403, 'User identity not linked to staff record.');
        }

        $project = Project::findOrFail($request->project_id);

        // Security check for Directors

        // Conflict of Interest check via Service
        $conflict = $this->evaluationService->checkConflictOfInterest($project, $employee->id);

        if ($conflict) {
            return back()->withErrors(['project_id' => $conflict])->withInput();
        }

        // Ensure evaluator_id in data is the logged in person
        $data = $request->validated();
        $data['evaluator_id'] = $employee->id;

        $this->evaluationService->submitEvaluation($data);

        return redirect()->route('evaluations.index')
            ->with('success', 'Your evaluation for "' . $project->research_title . '" has been submitted.');
    }
}
