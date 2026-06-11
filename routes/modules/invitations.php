<?php

use App\Modules\Invitation\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:10,1')->group(function () {
    Route::get('/register/invited/{token}', [InvitationController::class, 'showRegistrationForm'])->name('register.invited');
    Route::post('/register/invited', [InvitationController::class, 'register'])->name('register.invited.submit');
});
