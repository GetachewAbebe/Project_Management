<?php

namespace App\Services;

use App\Models\Evaluation;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class EvaluationService
{
    /**
     * Calculate the weighted score for a single evaluation.
     */
    public function calculateScore(array $data): float
    {
        $criteria = [
            'thematic_area_mark' => 20,
            'relevance_mark' => 25,
            'methodology_mark' => 25,
            'feasibility_mark' => 20,
            'overall_proposal_mark' => 10,
        ];

        $totalScore = 0;
        foreach ($criteria as $field => $weight) {
            $mark = $data[$field];
            $totalScore += ($mark / 5) * $weight;
        }

        return $totalScore;
    }

    /**
     * Submit an individual evaluation.
     */
    public function submitEvaluation(array $data): Evaluation
    {
        return DB::transaction(function () use ($data) {
            $data['total_score'] = $this->calculateScore($data);
            $data['decision'] = $data['total_score'] >= 70 ? 'SATISFACTORY' : 'UNSATISFACTORY';

            $evaluation = Evaluation::create($data);

            // After submission, check if we have multiple evaluators to determine project status
            $this->updateProjectStatusBasedOnEvaluations($data['project_id']);

            return $evaluation;
        });
    }

    /**
     * Update project status based on consensus of evaluations.
     */
    protected function updateProjectStatusBasedOnEvaluations(int $projectId): void
    {
        $project = Project::with('evaluations')->find($projectId);
        $evaluations = $project->evaluations;

        if ($evaluations->count() >= 2) {
            $averageScore = $evaluations->avg('total_score');
            $newStatus = $averageScore >= 70 ? 'ONGOING' : 'EVALUATED';
            $project->update(['status' => $newStatus]);
        } else {
            // Still in evaluation phase if only one evaluator has submitted
            $project->update(['status' => 'REGISTERED']);
        }
    }

    /**
     * Check for potential conflict of interest.
     */
    public function checkConflictOfInterest(Project $project, int $evaluatorId): ?string
    {
        if ($project->pi_id == $evaluatorId) {
            return 'Conflict of Interest: The Principal Investigator cannot evaluate their own project.';
        }

        // Also check if this evaluator already evaluated this project
        $existing = Evaluation::where('project_id', $project->id)
            ->where('evaluator_id', $evaluatorId)
            ->first();

        if ($existing) {
            return 'Duplicate Evaluation: You have already submitted an evaluation for this project.';
        }

        return null;
    }
}
