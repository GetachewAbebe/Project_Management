@extends('layouts.app')

@section('title', 'Evaluations Portfolio')
@section('header_title', auth()->user()->isEvaluator() ? 'My Evaluation History' : 'Evaluations Repository')

@section('content')
<div style="max-width: 1400px; margin: 0 auto; padding-bottom: 4rem;">
    
    <!-- Premium Stat Cards -->
    <div class="stats-grid">
        <div class="premium-stat-card" style="border-left: 4px solid #6366f1;">
            <div class="stat-icon" style="background: #eef2ff; color: #6366f1;">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Pending Evaluation</div>
                <div class="stat-value">{{ $globalStats['awaiting_evaluation'] }}</div>
            </div>
        </div>

        <div class="premium-stat-card" style="border-left: 4px solid var(--brand-green);">
            <div class="stat-icon" style="background: #ecfdf5; color: var(--brand-green);">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Audits</div>
                <div class="stat-value">{{ $globalStats['total_submissions'] }}</div>
            </div>
        </div>

        <div class="premium-stat-card" style="border-left: 4px solid var(--brand-blue);">
            <div class="stat-icon" style="background: #f0f9ff; color: var(--brand-blue);">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Active Portfolio</div>
                <div class="stat-value">{{ $globalStats['distinct_projects'] }}</div>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="premium-card">
        <!-- Header -->
        <div class="card-header-flex">
            <div>
                <h3 class="card-title">Evaluation <span class="highlight">Records</span></h3>
                <p class="card-subtitle">Managing institutional performance audits</p>
            </div>
            @can('create', App\Models\Evaluation::class)
            <a href="{{ route('evaluations.create') }}" class="btn-primary">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Execute Audit
            </a>
            @endcan
        </div>

        <!-- Table -->
        <div style="overflow-x: auto;">
            <table class="premium-table">
                <thead>
                    <tr>
                        <th style="width: 30%;">Research Initiative</th>
                        <th style="width: 15%;">Directorate</th>
                        <th style="width: 20%;">Evaluator</th>
                        <th style="width: 15%;">Audit Score</th>
                        <th style="width: 12%;">Submission</th>
                        <th style="width: 8%; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($evaluations as $eval)
                    <tr>
                        <td>
                            <a href="{{ route('projects.show', $eval->project->id) }}" class="project-title-link">
                                <div class="project-title">{{ $eval->project->research_title }}</div>
                            </a>
                            <div class="project-meta">
                                <span style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase;">By: {{ $eval->project->pi->full_name }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="directorate-pill">
                                {{ $eval->project->directorate->code }}
                            </div>
                        </td>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar" style="background: linear-gradient(135deg, var(--brand-blue), #1e293b);">
                                    {{ substr($eval->evaluator->full_name, 0, 1) }}
                                </div>
                                <div class="user-name">{{ $eval->evaluator->full_name }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="score-display">
                                <span class="score-number">{{ number_format($eval->total_score, 1) }}%</span>
                                <div class="score-bar-bg"><div class="score-bar-fill" style="width: {{ $eval->total_score }}%;"></div></div>
                            </div>
                        </td>
                        <td>
                            <div class="submission-date">
                                <div class="date-main">{{ $eval->created_at->format('M d, Y') }}</div>
                                <div class="date-sub">{{ $eval->created_at->format('h:i A') }}</div>
                            </div>
                        </td>
                        <td style="text-align: right;">
                            <div class="actions-cell">
                                <a href="{{ route('evaluations.show', $eval->id) }}" class="action-btn highlight" title="View Details">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 5rem;">
                            <div style="font-size: 1.1rem; font-weight: 700; color: #94a3b8;">No institutional audits have been recorded.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* Stats Layout */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .premium-stat-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
        transition: transform 0.2s ease;
    }

    .premium-stat-card:hover {
        transform: translateY(-3px);
    }

    .stat-icon {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-label {
        font-size: 0.85rem;
        font-weight: 800;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.25rem;
    }

    .stat-value {
        font-size: 1.75rem;
        font-weight: 950;
        color: #1e293b;
        line-height: 1;
    }

    /* Premium Card & Table (Consistency with projects.index) */
    .premium-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
        padding: 2.5rem;
        border: 1px solid #f1f5f9;
        min-height: 500px;
    }

    .card-header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f8fafc;
    }

    .card-title { font-size: 1.75rem; font-weight: 950; color: var(--brand-blue); margin: 0; letter-spacing: -0.03em; }
    .card-title .highlight { color: var(--brand-green); }
    .card-subtitle { color: #64748b; font-weight: 600; font-size: 1rem; margin-top: 0.25rem; }

    .btn-primary {
        background: var(--brand-blue);
        color: white;
        padding: 0.8rem 1.75rem;
        border-radius: 12px;
        font-weight: 800;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        box-shadow: 0 8px 15px rgba(30, 58, 138, 0.2);
    }

    .premium-table { width: 100%; border-collapse: separate; border-spacing: 0 0.75rem; }
    .premium-table thead th { text-transform: uppercase; font-size: 0.75rem; font-weight: 800; color: #64748b; letter-spacing: 0.05em; padding: 0 1rem; }
    
    .premium-table tbody tr { background: white; transition: all 0.2s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.02); }
    .premium-table tbody tr:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.05); }

    .premium-table td { padding: 1.25rem 1rem; vertical-align: middle; border-top: 1px solid #f1f5f9; border-bottom: 1px solid #f1f5f9; }
    .premium-table td:first-child { border-left: 1px solid #f1f5f9; border-top-left-radius: 12px; border-bottom-left-radius: 12px; }
    .premium-table td:last-child { border-right: 1px solid #f1f5f9; border-top-right-radius: 12px; border-bottom-right-radius: 12px; }

    /* Custom Cells */
    .project-title-link { text-decoration: none; }
    .project-title { font-weight: 800; color: var(--brand-blue); font-size: 1.05rem; transition: color 0.2s; }
    .project-title-link:hover .project-title { color: var(--brand-green); }
    
    .directorate-pill {
        display: inline-flex;
        padding: 0.35rem 0.75rem;
        background: #f1f5f9;
        color: #475569;
        border-radius: 8px;
        font-weight: 800;
        font-size: 0.8rem;
    }

    .user-cell { display: flex; align-items: center; gap: 0.75rem; }
    .user-avatar { width: 34px; height: 34px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 800; font-size: 0.85rem; }
    .user-name { font-weight: 700; color: #334155; font-size: 0.95rem; }

    .score-display { display: flex; flex-direction: column; gap: 0.4rem; width: 100px; }
    .score-number { font-size: 1.25rem; font-weight: 950; color: var(--brand-green); line-height: 1; }
    .score-bar-bg { height: 4px; background: #f1f5f9; border-radius: 2px; overflow: hidden; }
    .score-bar-fill { height: 100%; background: var(--brand-green); border-radius: 2px; }

    .date-main { font-weight: 800; color: #334155; font-size: 0.9rem; }
    .date-sub { font-size: 0.75rem; color: #94a3b8; font-weight: 700; }

    .action-btn { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.2s; text-decoration: none; color: #64748b; }
    .action-btn.highlight { color: var(--brand-blue); background: #f0f9ff; }
    .action-btn.highlight:hover { background: #bae6fd; color: #0284c7; }
</style>
@endsection
