<?php

namespace Database\Factories;

use App\Models\Directorate;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'research_title' => $this->faker->sentence(4),
            'pi_id' => Employee::factory(),
            'directorate_id' => Directorate::factory(),
            'description' => $this->faker->paragraph,
            'objective' => $this->faker->paragraph,
            'start_year' => $this->faker->year,
            'end_year' => $this->faker->year + 1,
            'status' => 'REGISTERED',
            'project_code' => $this->faker->unique()->bothify('PRJ-####'),
        ];
    }
}
