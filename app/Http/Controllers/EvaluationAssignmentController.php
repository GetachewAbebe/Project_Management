<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EvaluationAssignment;
use App\Models\Project;
use Illuminate\Http\Request;

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
            'expires_at' => 'nullable|date|after:today',
        ]);

        $project = Project::withCount('evaluations')->findOrFail($validated['project_id']);

        // 1. Check if project already has 2 total reviews (Assignments PENDING + Evaluations DONE)
        $pendingAssignmentsCount = EvaluationAssignment::where('project_id', $project->id)
            ->where('status', 'PENDING')
            ->count();

        if (($project->evaluations_count + $pendingAssignmentsCount) >= 2) {
            return back()->withErrors(['project_id' => 'Maximum review capacity reached. This project already has 2 registered or pending evaluations.'])->withInput();
        }

        // 2. Check if this specific evaluator is already involved
        $isDuplicate = EvaluationAssignment::where('project_id', $project->id)
            ->where('evaluator_id', $validated['evaluator_id'])
            ->where('status', 'PENDING')
            ->exists();

        $hasAlreadyReviewed = \App\Models\Evaluation::where('project_id', $project->id)
            ->where('evaluator_id', $validated['evaluator_id'])
            ->exists();

        if ($isDuplicate || $hasAlreadyReviewed) {
            return back()->withErrors(['evaluator_id' => 'Conflict or Duplicate: This expert is already assigned to this project or has already submitted a review.'])->withInput();
        }

        // 3. PI Check (External safeguard)
        if ($project->pi_id == $validated['evaluator_id']) {
            return back()->withErrors(['evaluator_id' => 'Conflict of Interest: The Principal Investigator cannot be assigned as an evaluator for their own project.'])->withInput();
        }

        $token = EvaluationAssignment::generateToken();

        $assignment = EvaluationAssignment::create([
            'project_id' => $validated['project_id'],
            'evaluator_id' => $validated['evaluator_id'],
            'token' => $token,
            'expires_at' => $validated['expires_at'],
            'status' => 'PENDING',
        ]);

        // Send Email with graceful failure handling
        try {
            \Illuminate\Support\Facades\Mail::to($assignment->evaluator->email)
                ->send(new \App\Mail\EvaluationLinkMail($assignment));

            return redirect()->route('evaluation-assignments.index')
                ->with('success', 'Evaluation link generated and successfully sent to '.$assignment->evaluator->email);
        } catch (\Exception $e) {
            // Log the error for technical review but don't crash the session
            \Illuminate\Support\Facades\Log::error('SMTP Dispatch Failure: '.$e->getMessage());

            return redirect()->route('evaluation-assignments.index')
                ->with('warning', 'Assignment created, but the invitation email could not be delivered to '.$assignment->evaluator->email.'. Please share the link manually.');
        }
    }

    public function destroy(EvaluationAssignment $evaluationAssignment)
    {
        $this->authorize('create', \App\Models\Evaluation::class);
        $evaluationAssignment->delete();

        return back()->with('success', 'Assignment revoked.');
    }
}
