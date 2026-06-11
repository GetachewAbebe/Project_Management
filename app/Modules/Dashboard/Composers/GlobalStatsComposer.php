<?php

namespace App\Modules\Dashboard\Composers;

use App\Models\Directorate;
use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\Project;
use Illuminate\View\View;

class GlobalStatsComposer
{
    public function compose(View $view): void
    {
        $trend = Project::select('created_at')
            ->where('created_at', '>=', now()->subMonths(6))
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($project) {
                return $project->created_at->format('M');
            })
            ->map(fn ($group) => $group->count());

        $view->with('globalStats', [
            'directorates' => Directorate::count(),
            'employees' => Employee::count(),
            'projects' => Project::count(),
            'evaluations' => Evaluation::count(),
            'awaiting_evaluation' => Project::where('status', 'REGISTERED')->count(),
            'total_submissions' => Evaluation::count(),
            'distinct_projects' => Evaluation::distinct('project_id')->count(),
            'passed_evaluations' => Evaluation::where('decision', 'SATISFACTORY')->count(),
            'searchable_projects' => Project::select('id', 'project_code', 'research_title')->get(),

            'projects_by_directorate' => Directorate::withCount('projects')
                ->get()
                ->pluck('projects_count', 'name'),

            'registration_trend' => $trend,

            'status_distribution' => Project::select('status')
                ->get()
                ->groupBy('status')
                ->map(fn ($group) => $group->count()),
        ]);
    }
}
