<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function index()
    {
        if (! auth()->user()->isAdmin()) {
            abort(403);
        }

        $backupDir = storage_path('app/backups');
        $backups = [];

        if (file_exists($backupDir)) {
            $files = scandir($backupDir, SCANDIR_SORT_DESCENDING);
            foreach ($files as $file) {
                if (str_ends_with($file, '.sql')) {
                    $path = "{$backupDir}/{$file}";
                    $backups[] = [
                        'name' => $file,
                        'size' => number_format(filesize($path) / 1024 / 1024, 2).' MB',
                        'created_at' => date('Y-m-d H:i:s', filemtime($path)),
                    ];
                }
            }
        }

        return view('backups.index', compact('backups'));
    }

    public function create()
    {
        if (! auth()->user()->isAdmin()) {
            abort(403);
        }

        try {
            Artisan::call('db:backup');

            return redirect()->back()->with('success', 'Database backup created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Backup failed: '.$e->getMessage());
        }
    }

    public function download($filename)
    {
        if (! auth()->user()->isAdmin()) {
            abort(403);
        }

        $path = storage_path("app/backups/{$filename}");

        if (! file_exists($path)) {
            abort(404);
        }

        return response()->download($path);
    }

    public function destroy($filename)
    {
        if (! auth()->user()->isAdmin()) {
            abort(403);
        }

        $path = storage_path("app/backups/{$filename}");

        if (file_exists($path)) {
            unlink($path);

            return redirect()->back()->with('success', 'Backup deleted successfully!');
        }

        return redirect()->back()->with('error', 'File not found.');
    }
}
