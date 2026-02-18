<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Redirect root to Dashboard (protected by middleware inside group)
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Secure Invitation & Registration
Route::get('/register/invited/{token}', [App\Http\Controllers\InvitationController::class, 'showRegistrationForm'])->name('register.invited');
Route::post('/register/invited', [App\Http\Controllers\InvitationController::class, 'register'])->name('register.invited.submit');

// Public Evaluation Access
Route::get('/evaluate/{token}', [App\Http\Controllers\PublicEvaluationController::class, 'show'])->name('evaluate.public');
Route::post('/evaluate/{token}', [App\Http\Controllers\PublicEvaluationController::class, 'store'])->name('evaluate.public.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    // Official Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Institutional Modules
    Route::resource('directorates', DirectorateController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('projects', ProjectController::class);

    // Evaluation Module
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluations/summary', [EvaluationController::class, 'summary'])->name('evaluations.summary');
    Route::get('/evaluations/summary/export', [EvaluationController::class, 'exportSummary'])->name('evaluations.summary.export');
    Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::get('/evaluations/{evaluation}', [EvaluationController::class, 'show'])->name('evaluations.show');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');

    // NEW: Evaluation Assignments (Admin-only managed via Policy)
    Route::resource('evaluation-assignments', App\Http\Controllers\EvaluationAssignmentController::class);

    // Database Backups (Admin-only)
    Route::get('/backups', [App\Http\Controllers\BackupController::class, 'index'])->name('backups.index');
    Route::post('/backups', [App\Http\Controllers\BackupController::class, 'create'])->name('backups.create');
    Route::get('/backups/download/{filename}', [App\Http\Controllers\BackupController::class, 'download'])->name('backups.download');
    Route::delete('/backups/{filename}', [App\Http\Controllers\BackupController::class, 'destroy'])->name('backups.destroy');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\EventRegistrationController;

// National Review 2026 - Isolated Registration Module
Route::prefix('national-review-2026')->group(function () {
    // Public Routes
    Route::get('/register', [EventRegistrationController::class, 'create'])->name('event.register');
    Route::post('/register', [EventRegistrationController::class, 'store'])->name('event.register.store');
    Route::get('/confirmation/{reference}', [EventRegistrationController::class, 'confirmation'])->name('event.confirmation');
    
    // Protected Admin Routes (Results)
    Route::middleware(['auth'])->group(function () {
        Route::get('/results', [EventRegistrationController::class, 'results'])->name('event.results');
    });
});
