<?php

namespace App\View\Composers;

use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\Project;
use Illuminate\View\View;

class GlobalStatsComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('globalStats', [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count(),
            'awaiting_evaluation' => Project::where('status', 'REGISTERED')->count(),
            'total_submissions' => Evaluation::count(),
            'distinct_projects' => Evaluation::distinct('project_id')->count(),
            'passed_evaluations' => Evaluation::where('decision', 'SATISFACTORY')->count(),
        ]);
    }
}
