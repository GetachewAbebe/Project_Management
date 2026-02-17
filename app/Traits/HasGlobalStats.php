<?php

namespace App\Traits;

use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\Project;

trait HasGlobalStats
{
    /**
     * Get global telemetry stats for the dashboard headers.
     */
    protected function getGlobalStats(): array
    {
        return [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count(),
        ];
    }
}
