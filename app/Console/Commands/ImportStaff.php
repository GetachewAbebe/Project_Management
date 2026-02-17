<?php

namespace App\Console\Commands;

use App\Imports\StaffImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ImportStaff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import-staff {file : The path to the excel file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import staff records from an Excel or CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');

        if (! File::exists($filePath)) {
            $this->error("File not found at: {$filePath}");

            return 1;
        }

        $this->info("🚀 Starting staff import from: {$filePath}");

        try {
            Excel::import(new StaffImport, $filePath);
            $this->info('✅ Staff records imported successfully!');
        } catch (\Exception $e) {
            $this->error('❌ Import failed: '.$e->getMessage());

            return 1;
        }

        return 0;
    }
}
