<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EvaluationFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_evaluator_can_view_evaluation_index()
    {
        $evaluator = User::factory()->create(['role' => UserRole::EVALUATOR]);
        $employee = Employee::factory()->create(['email' => $evaluator->email]);

        $response = $this->actingAs($evaluator)->get(route('evaluations.index'));

        $response->assertStatus(200);
        $response->assertViewIs('evaluations.index');
    }

    public function test_evaluator_can_submit_evaluation()
    {
        $directorate = Directorate::factory()->create();
        $evaluator = User::factory()->create(['role' => UserRole::EVALUATOR]);
        $employee = Employee::factory()->create([
            'email' => $evaluator->email,
            'directorate_id' => $directorate->id,
        ]);

        $project = Project::factory()->create([
            'status' => 'REGISTERED',
            'directorate_id' => $directorate->id,
        ]);

        $evaluationData = [
            'project_id' => $project->id,
            'evaluator_id' => $employee->id,
            'thematic_area_mark' => 4,
            'relevance_mark' => 4,
            'methodology_mark' => 4,
            'feasibility_mark' => 4,
            'overall_proposal_mark' => 4,
            'comments' => 'Great project',
        ];

        $response = $this->actingAs($evaluator)->post(route('evaluations.store'), $evaluationData);

        if ($response->status() === 419) {
            $response = $this->withoutMiddleware()->actingAs($evaluator)->post(route('evaluations.store'), $evaluationData);
        }

        $response->assertRedirect(route('evaluations.index'));
        $this->assertDatabaseHas('evaluations', ['project_id' => $project->id]);
    }

    public function test_admin_cannot_submit_evaluation()
    {
        $admin = User::factory()->create(['role' => UserRole::ADMIN]);
        $project = Project::factory()->create(['status' => 'REGISTERED']);
        $employee = Employee::factory()->create(); // Just to have a valid evaluator_id for validation

        $evaluationData = [
            'project_id' => $project->id,
            'evaluator_id' => $employee->id,
            'thematic_area_mark' => 5,
            'relevance_mark' => 5,
            'methodology_mark' => 5,
            'feasibility_mark' => 5,
            'overall_proposal_mark' => 5,
            'comments' => 'Admin trying to evaluate',
        ];

        $response = $this->actingAs($admin)->post(route('evaluations.store'), $evaluationData);

        if ($response->status() === 419) {
            $response = $this->withoutMiddleware()->actingAs($admin)->post(route('evaluations.store'), $evaluationData);
        }

        $response->assertStatus(403);
    }
}
