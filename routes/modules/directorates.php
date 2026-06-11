<?php

use App\Modules\Directorate\Controllers\DirectorateController;
use Illuminate\Support\Facades\Route;

Route::resource('directorates', DirectorateController::class);
