<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Public module routes (manage their own middleware internally)
require __DIR__.'/modules/invitations.php';
require __DIR__.'/modules/evaluations.php';

// Authenticated module routes
Route::middleware(['auth', 'verified'])->group(function () {
    require __DIR__.'/modules/dashboard.php';
    require __DIR__.'/modules/directorates.php';
    require __DIR__.'/modules/employees.php';
    require __DIR__.'/modules/projects.php';
    require __DIR__.'/modules/backups.php';
    require __DIR__.'/modules/profile.php';
});

require __DIR__.'/auth.php';
