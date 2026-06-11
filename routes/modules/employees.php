<?php

use App\Modules\Employee\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::resource('employees', EmployeeController::class);
