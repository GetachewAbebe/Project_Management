<?php

namespace App\Http\Controllers;

use App\Models\EvaluationAssignment;
use App\Services\EvaluationService;
use Illuminate\Http\Request;

class PublicEvaluationController extends Controller
{
    protected $evaluationService;

    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function show($token)
    {
        $assignment = EvaluationAssignment::with(['project.pi', 'project.directorate', 'evaluator'])
            ->where('token', $token)
            ->where('status', 'PENDING')
            ->firstOrFail();

        // Check expiration
        if ($assignment->expires_at && $assignment->expires_at->isPast()) {
            $assignment->update(['status' => 'EXPIRED']);
            abort(403, 'This evaluation link has expired.');
        }

        $project = $assignment->project;
        $employee = $assignment->evaluator;

        return view('evaluations.public_form', compact('assignment', 'project', 'employee'));
    }

    public function store(Request $request, $token)
    {
        $assignment = EvaluationAssignment::where('token', $token)
            ->where('status', 'PENDING')
            ->firstOrFail();

        $validated = $request->validate([
            'thematic_area_mark' => 'required|integer|min:1|max:5',
            'relevance_mark' => 'required|integer|min:1|max:5',
            'methodology_mark' => 'required|integer|min:1|max:5',
            'feasibility_mark' => 'required|integer|min:1|max:5',
            'overall_proposal_mark' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
            'critical_issues' => 'nullable|string',
        ]);

        $evalData = $validated;
        $evalData['project_id'] = $assignment->project_id;
        $evalData['evaluator_id'] = $assignment->evaluator_id;

        $this->evaluationService->submitEvaluation($evalData);

        // Mark assignment as completed
        $assignment->update(['status' => 'COMPLETED']);

        return view('evaluations.success');
    }
}
