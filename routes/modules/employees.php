<?php

use App\Modules\Employee\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::resource('employees', EmployeeController::class);
Route::post('employees/{employee}/resend-invitation', [EmployeeController::class, 'resendInvitation'])->name('employees.resend-invitation');
