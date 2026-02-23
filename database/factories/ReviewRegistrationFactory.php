<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ReviewRegistration;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewRegistration>
 */
class ReviewRegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReviewRegistration::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference_code' => 'REG-' . strtoupper($this->faker->unique()->bothify('?????###')),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'organization' => $this->faker->company(),
            'job_title' => $this->faker->jobTitle(),
            'department' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'role' => $this->faker->randomElement(['Presenter', 'Attendee']),
            'status' => 'pending',
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'city' => $this->faker->city(),
            'qualification' => $this->faker->randomElement(['PhD', 'MSc', 'BSc', 'Other']),
            'expertise' => $this->faker->jobTitle(),
            'previous_attendance' => $this->faker->randomElement(['Yes', 'No']),
            'specialization' => $this->faker->word(),
            'presentation_title' => $this->faker->sentence(),
            'project_status' => $this->faker->randomElement(['New Research', 'Ongoing Research', 'Completed Research']),
            'abstract_text' => $this->faker->paragraph(),
            'thematic_area' => $this->faker->randomElement(['Digital Technologies', 'Agriculture', 'Health', 'Manufacturing']),
            'available_on_date' => $this->faker->date(),
            'travel_option' => $this->faker->randomElement(['Own Transport', 'Provided']),
            'needs_hotel' => $this->faker->randomElement(['Yes', 'No']),
            'discovery_source' => $this->faker->randomElement(['Social Media', 'Colleague', 'Website', 'Email']),
            'inviter_name' => $this->faker->name(),
            'abstract_file_path' => null,
            'support_letter_path' => null,
            'presentation_ppt_path' => null,
            'questions' => null,
            'extra_projects' => null,
        ];
    }
}
