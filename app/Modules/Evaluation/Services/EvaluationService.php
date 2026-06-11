<?php

namespace App\Modules\Evaluation\Services;

use App\Models\Evaluation;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class EvaluationService
{
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
            $totalScore += ($data[$field] / 5) * $weight;
        }

        return $totalScore;
    }

    public function submitEvaluation(array $data): Evaluation
    {
        return DB::transaction(function () use ($data) {
            $data['total_score'] = $this->calculateScore($data);
            $data['decision'] = $data['total_score'] >= 70 ? 'SATISFACTORY' : 'UNSATISFACTORY';

            $evaluation = Evaluation::create($data);

            $this->updateProjectStatusBasedOnEvaluations($data['project_id']);

            return $evaluation;
        });
    }

    protected function updateProjectStatusBasedOnEvaluations(int $projectId): void
    {
        $project = Project::with('evaluations')->find($projectId);
        $evaluations = $project->evaluations;

        if ($evaluations->count() >= 2) {
            $averageScore = $evaluations->avg('total_score');
            $newStatus = $averageScore >= 70 ? 'ONGOING' : 'EVALUATED';
            $project->update(['status' => $newStatus]);
        } else {
            $project->update(['status' => 'REGISTERED']);
        }
    }

    public function checkConflictOfInterest(Project $project, int $evaluatorId): ?string
    {
        if ($project->pi_id == $evaluatorId) {
            return 'Conflict of Interest: The Principal Investigator cannot evaluate their own project.';
        }

        $evaluator = \App\Models\Employee::select('directorate_id')->find($evaluatorId);
        if ($evaluator && $evaluator->directorate_id && $evaluator->directorate_id === $project->directorate_id) {
            return 'Conflict of Interest: Evaluators cannot review projects from their own directorate.';
        }

        $existing = Evaluation::where('project_id', $project->id)
            ->where('evaluator_id', $evaluatorId)
            ->exists();

        if ($existing) {
            return 'Duplicate Evaluation: You have already submitted an evaluation for this project.';
        }

        return null;
    }
}
