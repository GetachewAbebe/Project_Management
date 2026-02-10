<?php

namespace App\Http\Controllers;

use App\Models\EvaluationAssignment;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class EvaluationAssignmentController extends Controller
{
    public function index()
    {
        $this->authorize('create', \App\Models\Evaluation::class);
        $assignments = EvaluationAssignment::with(['project', 'evaluator'])->latest()->get();
        return view('evaluations.assignments.index', compact('assignments'));
    }

    public function create(Request $request)
    {
        $this->authorize('create', \App\Models\Evaluation::class);
        $projects = Project::where('status', 'REGISTERED')->get();
        $employees = Employee::orderBy('full_name')->get();
        $selected_project_id = $request->project_id;
        
        return view('evaluations.assignments.create', compact('projects', 'employees', 'selected_project_id'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', \App\Models\Evaluation::class);
        
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'evaluator_id' => 'required|exists:employees,id',
            'expires_at' => 'nullable|date|after:today'
        ]);

        $token = EvaluationAssignment::generateToken();
        
        $assignment = EvaluationAssignment::create([
            'project_id' => $validated['project_id'],
            'evaluator_id' => $validated['evaluator_id'],
            'token' => $token,
            'expires_at' => $validated['expires_at'],
            'status' => 'PENDING'
        ]);

        // Send Email
        \Illuminate\Support\Facades\Mail::to($assignment->evaluator->email)
            ->send(new \App\Mail\EvaluationLinkMail($assignment));

        return redirect()->route('evaluation-assignments.index')
            ->with('success', 'Evaluation link generated and sent to ' . $assignment->evaluator->email);
    }

    public function destroy(EvaluationAssignment $evaluationAssignment)
    {
        $this->authorize('delete', \App\Models\Evaluation::class);
        $evaluationAssignment->delete();
        return back()->with('success', 'Assignment revoked.');
    }
}
