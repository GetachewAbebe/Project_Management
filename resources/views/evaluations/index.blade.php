@extends('layouts.app')

@section('title', 'Evaluations Portfolio')
@section('header_title', auth()->user()->isEvaluator() ? 'My Evaluation History' : 'Evaluations Repository')

@section('content')
<div style="max-width: 1400px; margin: 0 auto; padding-bottom: 4rem;">
    
    <!-- Premium Stat Cards -->
    <div class="stats-grid">
        <a href="{{ route('evaluations.create') }}" class="premium-stat-card clickable" style="border-left: 4px solid #6366f1; text-decoration: none;">
            <div class="stat-icon" style="background: #eef2ff; color: #6366f1;">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Pending Evaluation</div>
                <div class="stat-value">{{ $globalStats['awaiting_evaluation'] }}</div>
                <div style="font-size: 0.7rem; color: #6366f1; font-weight: 700; margin-top: 0.25rem;">CLICK TO EVALUATE →</div>
            </div>
        </a>

        <div class="premium-stat-card" style="border-left: 4px solid var(--brand-green);">
            <div class="stat-icon" style="background: #ecfdf5; color: var(--brand-green);">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Evaluations</div>
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

    <!-- Pending Reviews Section (Intake Queue) -->
    @if($pendingProjects->count() > 0)
    <div class="premium-card" style="margin-bottom: 2.5rem; border-top: 5px solid #6366f1; min-height: auto;">
        <div class="card-header-flex" style="margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 class="card-title" style="color: #6366f1;">Intake <span class="highlight" style="color: #1e1b4b;">Queue</span></h3>
                <p class="card-subtitle">{{ $pendingProjects->count() }} projects awaiting scientific evaluation</p>
            </div>
            @if(auth()->user()->isAdmin())
            <a href="{{ route('evaluation-assignments.index') }}" style="text-decoration: none; padding: 0.6rem 1.25rem; background: #f8fafc; border: 2px solid #e2e8f0; border-radius: 12px; color: #475569; font-weight: 800; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem; transition: all 0.2s ease;">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                Manage Evaluation Links
            </a>
            @endif
        </div>

        <div style="overflow-x: auto;">
            <table class="premium-table">
                <thead>
                    <tr>
                        <th style="width: 40%;">Project Identity</th>
                        <th style="width: 20%;">Directorate</th>
                        <th style="width: 25%;">Principal Investigator</th>
                        <th style="width: 15%; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendingProjects as $proj)
                    <tr>
                        <td>
                            <div class="project-title" style="font-size: 0.95rem;">{{ $proj->research_title }}</div>
                            <div class="project-meta">
                                <span class="reference-badge" style="font-size: 0.65rem; padding: 0.2rem 0.5rem; background: #eef2ff; color: #6366f1;">{{ $proj->project_code ?? 'REG-'.$proj->id }}</span>
                                <span style="font-size: 0.75rem; color: #94a3b8; font-weight: 700;">{{ $proj->start_year }} CYCLE</span>
                            </div>
                        </td>
                        <td>
                            <div class="directorate-pill">{{ $proj->directorate->name ?? 'N/A' }}</div>
                        </td>
                        <td>
                            <div class="user-cell">
                                @php
                                    $rawName = $proj->pi?->full_name ?? 'Staff';
                                    $cleanName = preg_replace('/^(Dr\.|Mr\.|Ms\.|Mrs\.)\s+/i', '', $rawName);
                                    $initial = substr($cleanName, 0, 1);
                                @endphp
                                <div class="user-avatar" style="background: #f8fafc; color: #475569; border: 1px solid #e2e8f0; width: 30px; height: 30px; font-size: 0.8rem;">
                                    {{ $initial }}
                                </div>
                                <div class="user-name" style="font-size: 0.85rem;">{{ $rawName }}</div>
                            </div>
                        </td>
                        <td style="text-align: right;">
                             <a href="{{ auth()->user()->isAdmin() ? route('evaluation-assignments.create', ['project_id' => $proj->id]) : route('evaluations.create', ['project_id' => $proj->id]) }}" class="btn-primary" style="background: #6366f1; font-size: 0.8rem; padding: 0.6rem 1rem; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.2);">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.3rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                {{ auth()->user()->isAdmin() ? 'Send Evaluation Link' : 'Evaluate Now' }}
                             </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!-- Main Container (Completed Records) -->
    <div class="premium-card">
        <!-- Header -->
        <div class="card-header-flex">
            <div>
                <h3 class="card-title">Evaluation <span class="highlight">Records</span></h3>
                <p class="card-subtitle">Managing institutional performance evaluations</p>
            </div>
            @can('create', App\Models\Evaluation::class)
            <a href="{{ route('evaluations.create') }}" class="btn-primary">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Execute Evaluation
            </a>
            @endcan
        </div>

        <!-- Table -->
        <div style="overflow-x: auto;">
            <table class="premium-table">
                <thead>
                    <tr>
                        <th style="width: 25%;">Research Initiative</th>
                        <th style="width: 10%;">Directorate</th>
                        <th style="width: 30%;">Scientific Reviews (Side-by-Side)</th>
                        <th style="width: 15%;">Aggregate Score</th>
                        <th style="width: 12%;">Outcome</th>
                        <th style="width: 8%; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($evaluatedProjects as $project)
                    <tr>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="project-title-link">
                                <div class="project-title" style="font-size: 0.9rem;">{{ $project->research_title }}</div>
                            </a>
                            <div class="project-meta">
                                <span style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase;">By: {{ $project->pi->full_name }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="directorate-pill" style="font-size: 0.7rem; padding: 0.25rem 0.5rem;">
                                {{ $project->directorate->name }}
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; gap: 0.75rem;">
                                @foreach($project->evaluations as $eval)
                                <div style="flex: 1; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 0.5rem; position: relative;" title="Evaluator: {{ $eval->evaluator->full_name }}">
                                    <div style="font-size: 0.65rem; color: #64748b; font-weight: 800; text-transform: uppercase; margin-bottom: 0.2rem;">Expert {{ $loop->iteration }}</div>
                                    <div style="display: flex; align-items: center; justify-content: space-between;">
                                        <div style="font-weight: 900; color: #1e293b; font-size: 0.9rem;">{{ number_format($eval->total_score, 1) }}%</div>
                                        <div style="width: 4px; height: 16px; border-radius: 2px; background: {{ $eval->decision === 'SATISFACTORY' ? '#10b981' : '#ef4444' }};"></div>
                                    </div>
                                    <div style="font-size: 0.6rem; color: #94a3b8; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">{{ $eval->evaluator->full_name }}</div>
                                </div>
                                @endforeach
                                @if($project->evaluations->count() < 1)
                                    <div style="flex: 1; border: 1px dashed #cbd5e1; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; color: #94a3b8; font-weight: 600;">Awaiting...</div>
                                @endif
                                @if($project->evaluations->count() < 2)
                                    <div style="flex: 1; border: 1px dashed #cbd5e1; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; color: #94a3b8; font-weight: 600;">Slot 2 Empty</div>
                                @endif
                            </div>
                        </td>
                        <td>
                            @php $avg = $project->evaluations->avg('total_score'); @endphp
                            <div class="score-display">
                                <span class="score-number" style="color: {{ $avg >= 70 ? '#10b981' : '#64748b' }};">{{ number_format($avg, 1) }}%</span>
                                <div class="score-bar-bg"><div class="score-bar-fill" style="width: {{ $avg }}%; background: {{ $avg >= 70 ? '#10b981' : '#94a3b8' }};"></div></div>
                            </div>
                        </td>
                        <td>
                            @php
                                $status = $project->status_details;
                            @endphp
                            <div style="display: inline-block; padding: 0.35rem 0.75rem; border-radius: 8px; background: {{ $status['bg'] }}; color: {{ $status['text'] }}; font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em;">
                                {{ $status['label'] }}
                            </div>
                        </td>
                        <td style="text-align: right;">
                            <div class="actions-cell">
                                <a href="{{ route('projects.show', $project->id) }}" class="action-btn highlight" title="Full Scientific Comparison">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 6rem 2rem;">
                            <div style="margin-bottom: 1.5rem;">
                                <svg width="64" height="64" fill="none" stroke="#e2e8f0" viewBox="0 0 24 24" style="margin: 0 auto;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            </div>
                            <div style="font-size: 1.25rem; font-weight: 800; color: #475569; margin-bottom: 0.5rem;">No evaluated projects yet.</div>
                            <p style="color: #64748b; font-weight: 600; max-width: 400px; margin: 0 auto 2rem auto;">Projects that have received at least one scientific evaluation will appear here with institutional consensus data.</p>
                            @can('create', App\Models\Evaluation::class)
                            <a href="{{ route('evaluations.create') }}" class="btn-primary" style="display: inline-flex; width: auto; text-decoration: none;">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.5rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                                Start First Evaluation
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Helpful Workflow Tip -->
    <div style="margin-top: 2rem; background: #fffbeb; border: 1px solid #fef3c7; border-radius: 16px; padding: 1.5rem; display: flex; gap: 1.25rem; align-items: center;">
        <div style="width: 44px; height: 44px; background: #fef3c7; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #d97706;">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
        <div>
            <div style="font-weight: 800; color: #92400e; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.05em;">Evaluation Workflow Guidance</div>
            <p style="font-size: 0.85rem; color: #b45309; font-weight: 600; line-height: 1.5; margin-top: 0.25rem;">
                Looking for a specific project? Only projects in the <strong>"REGISTERED"</strong> status appear in the intake. You can also trigger evaluations directly from the <strong>Project Registry</strong> using the magnifying glass (🔍) icon.
            </p>
        </div>
    </div>
</div>

<style>
    .premium-stat-card.clickable:hover {
        border-color: #6366f1 !important;
        background: #fafbff;
    }
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
