<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\User;
use App\Models\ReviewRegistration;

class EventRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get(route('event.dashboard'));

        $response->assertRedirect('/login');
    }

    public function test_authenticated_admin_can_view_dashboard(): void
    {
        $admin = User::factory()->create();
        
        // Create some fake registrations
        ReviewRegistration::factory()->count(5)->create();

        $response = $this->actingAs($admin)->get(route('event.dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('events.national_review_2026.dashboard');
        $response->assertSee('National Research Review 2026');
        $response->assertSee('Total Registered');
    }

    public function test_destroy_requires_authentication(): void
    {
        $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class);

        $registration = ReviewRegistration::factory()->create();

        $response = $this->delete(route('event.registration.destroy', $registration->id));

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('review_registrations', ['id' => $registration->id]);
    }

    public function test_destroy_removes_registration_and_associated_files(): void
    {
        $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class);

        Storage::fake('public');

        $admin = User::factory()->create();
        
        // Mock files
        $abstract = UploadedFile::fake()->create('abstract.pdf', 100);
        $support = UploadedFile::fake()->create('support.pdf', 100);

        // Store them and get paths
        $abstractPath = $abstract->store('events/national_review_2026/abstracts', 'public');
        $supportPath = $support->store('events/national_review_2026/support_letters', 'public');

        $registration = ReviewRegistration::factory()->create([
            'abstract_file_path' => $abstractPath,
            'support_letter_path' => $supportPath,
        ]);

        // Assert files exist
        Storage::disk('public')->assertExists($abstractPath);
        Storage::disk('public')->assertExists($supportPath);

        // Perform DELETE request
        $response = $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class)
            ->actingAs($admin)
            ->delete(route('event.registration.destroy', $registration->id));

        // Assert redirection back to results
        $response->assertRedirect(route('event.results'));
        $response->assertSessionHas('success');

        // Assert DB record is deleted
        $this->assertDatabaseMissing('review_registrations', ['id' => $registration->id]);

        // Assert associated files are deleted
        Storage::disk('public')->assertMissing($abstractPath);
        Storage::disk('public')->assertMissing($supportPath);
    }
}
