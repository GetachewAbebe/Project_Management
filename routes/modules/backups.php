<?php

use App\Modules\Backup\Controllers\BackupController;
use Illuminate\Support\Facades\Route;

Route::get('/backups', [BackupController::class, 'index'])->name('backups.index');
Route::post('/backups', [BackupController::class, 'create'])->name('backups.create');
Route::get('/backups/download/{filename}', [BackupController::class, 'download'])->name('backups.download');
Route::delete('/backups/{filename}', [BackupController::class, 'destroy'])->name('backups.destroy');
