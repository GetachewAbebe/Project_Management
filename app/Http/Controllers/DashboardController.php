<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use App\Models\Evaluation;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Base Query
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
            'ongoing_projects' => (clone $projectQuery)->where(function ($q) {
                $q->where('status', 'like', '%ONGOING%')
                    ->orWhere('status', 'like', '%ON GOING%')
                    ->orWhere('status', 'REGISTERED');
            })->count(),
            'completed_projects' => (clone $projectQuery)->where('status', 'like', '%COMPLETED%')->count(),
            'terminated_projects' => (clone $projectQuery)->whereIn('status', ['TERMINATED', 'EVALUATED'])->count(),
            'performance_index' => $totalProjects > 0 ? round(($distinctEvaluated / $totalProjects) * 100, 1) : 0,
        ];

        // Consolidate Research Status Distribution into 3 categories
        $allStatusCounts = (clone $projectQuery)->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->get();

        $projectStatusCounts = [
            'Ongoing Projects' => 0,
            'Completed Projects' => 0,
            'Terminated Projects' => 0,
        ];

        foreach ($allStatusCounts as $item) {
            $statusStr = strtoupper($item->status);

            if (str_contains($statusStr, 'COMPLETED')) {
                $projectStatusCounts['Completed Projects'] += $item->total;
            } elseif (str_contains($statusStr, 'TERMINATED') || $statusStr === 'EVALUATED') {
                $projectStatusCounts['Terminated Projects'] += $item->total;
            } else {
                // Everything else (ONGOING, REGISTERED, etc.) goes to Ongoing
                $projectStatusCounts['Ongoing Projects'] += $item->total;
            }
        }

        // Directorate Distribution (Heatmap) - Admins see all, Directors see only theirs
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

        // Recent Projects - All reachable projects (Directors see theirs first)
        $recentProjectsList = Project::with(['pi', 'directorate']);
        if ($user->isDirector()) {
            $recentProjectsList->where('directorate_id', $user->directorate_id);
        }

        $recentProjects = $recentProjectsList->latest()
            ->take(6)
            ->get();

        return view('dashboard.index', compact('stats', 'projectStatusCounts', 'recentProjects', 'directorateStats'));
    }
}
