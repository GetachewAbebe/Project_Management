<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Directorate;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'directorate_id' => Directorate::factory(),
            'institutional_id' => $this->faker->unique()->bothify('EMP-####'),
            'position' => $this->faker->jobTitle,
            'system_role' => 'staff',
        ];
    }
}
