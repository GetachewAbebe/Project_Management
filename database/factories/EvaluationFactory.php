<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'evaluator_id' => Employee::factory(),
            'thematic_area_mark' => $this->faker->numberBetween(1, 10),
            'relevance_mark' => $this->faker->numberBetween(1, 10),
            'methodology_mark' => $this->faker->numberBetween(1, 10),
            'feasibility_mark' => $this->faker->numberBetween(1, 10),
            'overall_proposal_mark' => $this->faker->numberBetween(1, 10),
            'total_score' => $this->faker->numberBetween(5, 50),
            'decision' => 'SATISFACTORY',
            'comments' => $this->faker->sentence,
        ];
    }
}
