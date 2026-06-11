<?php

use App\Modules\Project\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::resource('projects', ProjectController::class);
