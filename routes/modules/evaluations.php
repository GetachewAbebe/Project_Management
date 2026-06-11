<?php

use App\Modules\Evaluation\Controllers\EvaluationAssignmentController;
use App\Modules\Evaluation\Controllers\EvaluationController;
use App\Modules\Evaluation\Controllers\PublicEvaluationController;
use Illuminate\Support\Facades\Route;

// Public evaluation routes (outside auth middleware — defined in web.php wrapper)
Route::middleware('throttle:10,1')->group(function () {
    Route::get('/evaluate/{token}', [PublicEvaluationController::class, 'show'])->name('evaluate.public');
    Route::post('/evaluate/{token}', [PublicEvaluationController::class, 'store'])->name('evaluate.public.submit');
});

// Authenticated evaluation routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluations/summary', [EvaluationController::class, 'summary'])->name('evaluations.summary');
    Route::get('/evaluations/summary/export', [EvaluationController::class, 'exportSummary'])->name('evaluations.summary.export');
    Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::get('/evaluations/{evaluation}', [EvaluationController::class, 'show'])->name('evaluations.show');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');

    Route::resource('evaluation-assignments', EvaluationAssignmentController::class);
});
