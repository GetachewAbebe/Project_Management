<?php

namespace App\Modules\Evaluation\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EvaluationAssignment;
use App\Modules\Evaluation\Services\EvaluationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicEvaluationController extends Controller
{
    public function __construct(protected EvaluationService $evaluationService) {}

    public function show($token)
    {
        $assignment = EvaluationAssignment::with(['project.pi', 'project.directorate', 'evaluator'])
            ->where('token', $token)
            ->where('status', 'PENDING')
            ->firstOrFail();

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

        if ($assignment->expires_at && $assignment->expires_at->isPast()) {
            $assignment->update(['status' => 'EXPIRED']);
            abort(403, 'This evaluation link has expired.');
        }

        $validated = $request->validate([
            'thematic_area_mark' => 'required|integer|min:1|max:5',
            'relevance_mark' => 'required|integer|min:1|max:5',
            'methodology_mark' => 'required|integer|min:1|max:5',
            'feasibility_mark' => 'required|integer|min:1|max:5',
            'overall_proposal_mark' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string|max:5000',
            'critical_issues' => 'nullable|string|max:5000',
        ]);

        $evalData = array_merge($validated, [
            'project_id' => $assignment->project_id,
            'evaluator_id' => $assignment->evaluator_id,
        ]);

        DB::transaction(function () use ($assignment, $evalData) {
            $this->evaluationService->submitEvaluation($evalData);
            $assignment->update(['status' => 'COMPLETED']);
        });

        return view('evaluations.success');
    }
}
