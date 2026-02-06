<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Redirect root to Dashboard (protected by middleware inside group)
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Secure Invitation & Registration
Route::get('/register/invited/{token}', [App\Http\Controllers\InvitationController::class, 'showRegistrationForm'])->name('register.invited');
Route::post('/register/invited', [App\Http\Controllers\InvitationController::class, 'register'])->name('register.invited.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    // Official Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Institutional Modules
    Route::resource('directorates', DirectorateController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('projects', ProjectController::class);
    
    // Evaluation Module
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::get('/evaluations/{evaluation}', [EvaluationController::class, 'show'])->name('evaluations.show');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
