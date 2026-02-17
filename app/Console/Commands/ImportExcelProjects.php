<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportExcelProjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-projects {file}';

    protected $description = 'Import projects from an Excel file';

    public function handle()
    {
        $file = $this->argument('file');
        if (! file_exists($file)) {
            $this->error("File not found: $file");

            return 1;
        }

        $this->info("Importing from: $file");

        try {
            // Cleanup existing projects that have formula strings in them
            \App\Models\Project::where('project_code', 'LIKE', '=%')->delete();

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
            $worksheet = $spreadsheet->getActiveSheet();

            $highestRow = $worksheet->getHighestRow();
            $count = 0;
            $currentDirectorate = null;

            for ($row = 1; $row <= $highestRow; $row++) {
                $valA = trim($worksheet->getCell('A'.$row)->getValue() ?? '');
                $valB = trim($worksheet->getCell('B'.$row)->getValue() ?? '');

                // 1. Check for Directorate Section Header
                if ($valA !== '' && $valB === '') {
                    if (strtoupper($valA) !== 'S/NO.' && ! is_numeric($valA)) {
                        $directorateName = trim($valA);

                        $map = [
                            'Computional Sciences and Intelligence Systems' => 'Computational Science and Intelligent Systems',
                            'Nano Technology' => 'Nanotechnology',
                        ];

                        if (isset($map[$directorateName])) {
                            $directorateName = $map[$directorateName];
                        }

                        $currentDirectorate = \App\Models\Directorate::firstOrCreate(['name' => $directorateName]);
                        $this->info("Switching to Directorate: $directorateName");

                        continue;
                    }
                }

                if (strtoupper($valA) === 'S/NO.' || strtoupper($valB) === 'PI') {
                    continue;
                }

                if (! empty($valB) && $currentDirectorate) {
                    $piName = $valB;

                    // Normalize PI Name
                    $piMap = [
                        'Dr. Zekarias Gebreeyesus' => 'Dr. Zekarias Gebreyes',
                    ];
                    if (isset($piMap[$piName])) {
                        $piName = $piMap[$piName];
                    }

                    // Directorate Override Map (in case they are in the wrong section of the Excel)
                    $dirOverrideMap = [
                        'Dr. Kebede Gamo' => 'Nanotechnology',
                    ];

                    $targetDirectorate = $currentDirectorate;
                    if (isset($dirOverrideMap[$piName])) {
                        $targetDirectorate = \App\Models\Directorate::firstOrCreate(['name' => $dirOverrideMap[$piName]]);
                    }

                    $title = trim($worksheet->getCell('C'.$row)->getValue() ?? '');

                    if (empty($title)) {
                        continue;
                    }

                    // Fetch calculated values to resolve formulas
                    $cellObj = $worksheet->getCell('D'.$row);
                    $objective = $cellObj->getOldCalculatedValue() ?: $cellObj->getCalculatedValue();

                    $startDate = $worksheet->getCell('E'.$row)->getCalculatedValue();
                    $endDate = $worksheet->getCell('F'.$row)->getCalculatedValue();
                    $status = strtoupper(trim($worksheet->getCell('G'.$row)->getCalculatedValue() ?? 'REGISTERED'));
                    $code = trim($worksheet->getCell('H'.$row)->getCalculatedValue() ?? '');

                    // Update or create PI
                    $employee = \App\Models\Employee::updateOrCreate(
                        ['full_name' => $piName],
                        ['directorate_id' => $targetDirectorate->id]
                    );

                    // MATCH BY TITLE ONLY to ensure we update the faulty 'code' field on existing records
                    \App\Models\Project::updateOrCreate(
                        ['research_title' => $title],
                        [
                            'pi_id' => $employee->id,
                            'directorate_id' => $targetDirectorate->id,
                            'objective' => $objective,
                            'start_year' => is_numeric($startDate) ? (int) $startDate : null,
                            'end_year' => is_numeric($endDate) ? (int) $endDate : null,
                            'status' => $status ?: 'REGISTERED',
                            'project_code' => $code ?: null,
                        ]
                    );

                    $count++;
                }
            }

            $this->info("Successfully imported/updated $count projects across multiple directorates.");

            return 0;
        } catch (\Exception $e) {
            $this->error('Error: '.$e->getMessage());

            return 1;
        }
    }
}
