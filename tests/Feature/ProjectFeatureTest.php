<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Enums\UserRole;
use App\Models\Employee;
use App\Models\Directorate;
use App\Models\Project;

class ProjectFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_project_index()
    {
        $admin = User::factory()->create(['role' => UserRole::ADMIN]);

        $response = $this->actingAs($admin)->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertViewIs('projects.index');
    }

    public function test_director_can_create_project_for_their_directorate()
    {
        $directorate = Directorate::factory()->create();
        $director = User::factory()->create([
            'role' => UserRole::DIRECTOR,
            'directorate_id' => $directorate->id
        ]);
        $pi = Employee::factory()->create(['directorate_id' => $directorate->id]);

        $projectData = [
            'research_title' => 'New AI Initiative',
            'pi_id' => $pi->id,
            'objective' => 'To revolutionize AI',
            'start_year' => 2026,
            'end_year' => 2027,
            'status' => 'REGISTERED'
        ];

        // Using withoutMiddleware to avoid CSRF issues in tests if actingAs doesn't handle it
        $response = $this->actingAs($director)->post(route('projects.store'), $projectData);
        
        if ($response->status() === 419) {
            $response = $this->withoutMiddleware()->actingAs($director)->post(route('projects.store'), $projectData);
        }

        $response->assertRedirect(route('projects.index'));
        $this->assertDatabaseHas('projects', ['research_title' => 'New AI Initiative']);
    }

    public function test_director_cannot_create_project_for_another_directorate()
    {
        $myDirectorate = Directorate::factory()->create();
        $otherDirectorate = Directorate::factory()->create();
        
        $director = User::factory()->create([
            'role' => UserRole::DIRECTOR,
            'directorate_id' => $myDirectorate->id
        ]);
        
        // PI belongs to a different directorate
        $pi = Employee::factory()->create(['directorate_id' => $otherDirectorate->id]);

        $projectData = [
            'research_title' => 'Unauthorized Project',
            'pi_id' => $pi->id,
            'objective' => 'This should fail',
            'start_year' => 2026,
            'end_year' => 2027,
            'status' => 'REGISTERED'
        ];

        $response = $this->actingAs($director)->post(route('projects.store'), $projectData);
        
        if ($response->status() === 419) {
             $response = $this->withoutMiddleware()->actingAs($director)->post(route('projects.store'), $projectData);
        }
        
        $response->assertSessionHasErrors(['pi_id']);
        $this->assertDatabaseMissing('projects', ['research_title' => 'Unauthorized Project']);
    }

    public function test_evaluator_cannot_create_projects()
    {
        $evaluator = User::factory()->create(['role' => UserRole::EVALUATOR]);
        $pi = Employee::factory()->create();

        $projectData = [
            'research_title' => 'Evaluator Project',
            'pi_id' => $pi->id,
            'objective' => 'Should be forbidden',
            'start_year' => 2026
        ];

        $response = $this->actingAs($evaluator)->post(route('projects.store'), $projectData);
        
        if ($response->status() === 419) {
             $response = $this->withoutMiddleware()->actingAs($evaluator)->post(route('projects.store'), $projectData);
        }
        
        $response->assertStatus(403);
    }
}
