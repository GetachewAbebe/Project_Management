<?php

namespace Tests\Feature;

use App\Models\ReviewRegistration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

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

    /** ───────────────────────────────────────────
     *  Excel Export Tests
     * ─────────────────────────────────────────── */
    public function test_export_requires_authentication(): void
    {
        $response = $this->get(route('event.results.export'));

        $response->assertRedirect('/login');
    }

    public function test_admin_can_export_all_registrations_as_excel(): void
    {
        $admin = User::factory()->create();
        ReviewRegistration::factory()->count(5)->create();

        $response = $this->actingAs($admin)
            ->get(route('event.results.export'));

        $response->assertStatus(200);

        // Laravel-Excel returns a BinaryFileResponse; check Content-Type header
        $contentType = $response->headers->get('Content-Type');
        $this->assertStringContainsString('spreadsheetml', $contentType);
    }

    public function test_export_respects_status_filter(): void
    {
        $admin = User::factory()->create();

        ReviewRegistration::factory()->count(3)->create(['status' => 'pending']);
        ReviewRegistration::factory()->count(2)->create(['status' => 'confirmed']);

        // Export only confirmed ones
        $response = $this->actingAs($admin)
            ->get(route('event.results.export', ['status' => 'confirmed']));

        $response->assertStatus(200);
        $contentType = $response->headers->get('Content-Type');
        $this->assertStringContainsString('spreadsheetml', $contentType);
    }

    public function test_export_respects_gender_filter(): void
    {
        $admin = User::factory()->create();

        ReviewRegistration::factory()->count(3)->create(['gender' => 'Male']);
        ReviewRegistration::factory()->count(2)->create(['gender' => 'Female']);

        $response = $this->actingAs($admin)
            ->get(route('event.results.export', ['gender' => 'Female']));

        $response->assertStatus(200);
        $contentType = $response->headers->get('Content-Type');
        $this->assertStringContainsString('spreadsheetml', $contentType);
    }

    public function test_results_page_supports_server_side_search(): void
    {
        $admin = User::factory()->create();

        ReviewRegistration::factory()->create(['full_name' => 'Unique Test Person', 'email' => 'unique@test.et']);
        ReviewRegistration::factory()->count(4)->create();

        $response = $this->actingAs($admin)
            ->get(route('event.results', ['search' => 'Unique Test Person']));

        $response->assertStatus(200);
        $response->assertSee('Unique Test Person');
    }
}
