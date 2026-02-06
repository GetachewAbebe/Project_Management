<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Project;
use App\Models\Directorate;
use App\Models\Employee;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::with(['project', 'evaluator'])->latest()->get();
        
        // Stats for the current New Registration evaluation batch
        $stats = [
            'awaiting_evaluation' => Project::where('status', 'REGISTERED')->count(),
            'total_evaluated' => $evaluations->count(),
            'average_score' => $evaluations->avg('total_score') ?? 0,
            'passed_evaluations' => Evaluation::where('decision', 'SATISFACTORY')->count(),
            'failed_evaluations' => Evaluation::where('decision', 'UNSATISFACTORY')->count(),
        ];
        
        return view('evaluations.index', compact('evaluations', 'stats'));
    }

    public function create(Request $request)
    {
        $user = auth()->user();
        $selected_project_id = $request->project_id;
        
        $projectQuery = Project::where('status', 'REGISTERED');
        if ($user->isDirector()) {
            $projectQuery->where('directorate_id', $user->directorate_id);
        }
        
        $projects = $projectQuery->get();
        $employees = Employee::all();
        
        // Get selected project for PI exclusion
        $selected_project = $selected_project_id ? Project::find($selected_project_id) : null;
        
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('evaluations.create', compact('projects', 'employees', 'selected_project_id', 'selected_project', 'stats'));
    }

    public function show(Evaluation $evaluation)
    {
        $evaluation->load(['project.pi', 'project.directorate', 'evaluator']);
        $stats = [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count()
        ];
        return view('evaluations.show', compact('evaluation', 'stats'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'evaluator_id' => 'required|exists:employees,id',
            'thematic_area_mark' => 'required|integer|min:1|max:5',
            'relevance_mark' => 'required|integer|min:1|max:5',
            'methodology_mark' => 'required|integer|min:1|max:5',
            'feasibility_mark' => 'required|integer|min:1|max:5',
            'overall_proposal_mark' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
        ]);

        $project = Project::findOrFail($validated['project_id']);
        
        // Conflict of Interest: PI cannot be the evaluator/chairperson
        if ($project->pi_id == $validated['evaluator_id']) {
            return back()->withErrors(['evaluator_id' => 'Conflict of Interest: The Principal Investigator cannot serve as the evaluation chairperson for their own project.'])->withInput();
        }
        
        if ($user->isDirector() && $project->directorate_id != $user->directorate_id) {
            abort(403, 'Unauthorized evaluation of other directorate projects.');
        }

        // Calculate scores
        $weights = [
            'thematic_area_mark' => 20,
            'relevance_mark' => 25,
            'methodology_mark' => 25,
            'feasibility_mark' => 20,
            'overall_proposal_mark' => 10,
        ];

        $totalScore = 0;
        foreach ($weights as $field => $weight) {
            $totalScore += ($validated[$field] / 5) * $weight;
        }

        $validated['total_score'] = $totalScore;
        $validated['decision'] = $totalScore >= 70 ? 'SATISFACTORY' : 'UNSATISFACTORY';

        Evaluation::create($validated);
        
        // Update project status: Satisfactory = Green Light (ONGOING)
        $newStatus = $validated['decision'] === 'SATISFACTORY' ? 'ONGOING' : 'EVALUATED';
        Project::find($validated['project_id'])->update(['status' => $newStatus]);

        return redirect()->route('evaluations.index')->with('success', 'Evaluation submitted. Project is now ' . $newStatus . '.');
    }
}
