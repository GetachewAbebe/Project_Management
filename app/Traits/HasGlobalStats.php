<?php

namespace App\Traits;

use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Evaluation;

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
            'evaluations' => Evaluation::count()
        ];
    }
}
