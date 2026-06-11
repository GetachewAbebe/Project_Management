<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Directorate;
use App\Models\Evaluation;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $projectQuery = Project::query();
        $evaluationQuery = Evaluation::query();

        if ($user->isDirector()) {
            $projectQuery->where('directorate_id', $user->directorate_id);
            $evaluationQuery->whereHas('project', function ($q) use ($user) {
                $q->where('directorate_id', $user->directorate_id);
            });
        }

        $totalProjects = $projectQuery->count();
        $totalEvaluations = $evaluationQuery->count();
        $distinctEvaluated = (clone $evaluationQuery)->distinct('project_id')->count('project_id');

        $stats = [
            'projects' => $totalProjects,
            'evaluations' => $totalEvaluations,
            'ongoing_projects' => (clone $projectQuery)->whereIn('status', ['REGISTERED', 'ONGOING'])->count(),
            'completed_projects' => (clone $projectQuery)->where('status', 'COMPLETED')->count(),
            'terminated_projects' => (clone $projectQuery)->whereIn('status', ['TERMINATED', 'EVALUATED'])->count(),
            'performance_index' => $totalProjects > 0 ? round(($distinctEvaluated / $totalProjects) * 100, 1) : 0,
        ];

        $allStatusCounts = (clone $projectQuery)->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->get();

        $projectStatusCounts = [
            'Ongoing Projects' => 0,
            'Completed Projects' => 0,
            'Terminated Projects' => 0,
        ];

        foreach ($allStatusCounts as $item) {
            match ($item->status) {
                'COMPLETED' => $projectStatusCounts['Completed Projects'] += $item->total,
                'TERMINATED', 'EVALUATED' => $projectStatusCounts['Terminated Projects'] += $item->total,
                default => $projectStatusCounts['Ongoing Projects'] += $item->total,
            };
        }

        $directorateStatsQuery = Directorate::withCount('projects');
        if ($user->isDirector()) {
            $directorateStatsQuery->where('id', $user->directorate_id);
        }

        $directorateStats = $directorateStatsQuery->get()
            ->map(function ($d) use ($totalProjects) {
                return [
                    'name' => $d->name,
                    'count' => $d->projects_count,
                    'percentage' => $totalProjects > 0 ? round(($d->projects_count / $totalProjects) * 100, 1) : 0,
                ];
            });

        $recentProjectsList = Project::with(['pi', 'directorate']);
        if ($user->isDirector()) {
            $recentProjectsList->where('directorate_id', $user->directorate_id);
        }

        $recentProjects = $recentProjectsList->latest()->take(6)->get();

        return view('dashboard.index', compact('stats', 'projectStatusCounts', 'recentProjects', 'directorateStats'));
    }
}
