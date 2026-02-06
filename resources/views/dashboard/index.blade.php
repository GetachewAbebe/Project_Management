@extends('layouts.app')

@section('title', 'Dashboard')
@section('header_title', 'Institutional Overview')

@section('content')
<!-- Research Lifecycle Pulse -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
    <!-- New Projects -->
    <!-- Ongoing Projects -->
    <div class="card" style="padding: 1.25rem; border-left: 5px solid #22c55e; display: flex; align-items: center; gap: 1rem; background: #f0fdf4;">
        <div style="width: 40px; height: 40px; background: #dcfce7; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #22c55e;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
        </div>
        <div>
            <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Ongoing Projects</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary-navy);">{{ $stats['ongoing_projects'] }}</div>
        </div>
    </div>

    <!-- Completed Projects -->
    <div class="card" style="padding: 1.25rem; border-left: 5px solid #3b82f6; display: flex; align-items: center; gap: 1rem; background: #eff6ff;">
        <div style="width: 40px; height: 40px; background: #dbeafe; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #3b82f6;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
        <div>
            <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Completed Projects</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary-navy);">{{ $stats['completed_projects'] }}</div>
        </div>
    </div>

    <!-- Terminated Projects -->
    <div class="card" style="padding: 1.25rem; border-left: 5px solid #ef4444; display: flex; align-items: center; gap: 1rem; background: #fef2f2;">
        <div style="width: 40px; height: 40px; background: #fee2e2; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #ef4444;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
        <div>
            <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Terminated Projects</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary-navy);">{{ $stats['terminated_projects'] }}</div>
        </div>
    </div>


</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
    <!-- Project Status Distribution -->
    <div class="card" style="border-top: 5px solid var(--primary-navy);">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 2rem; display: flex; align-items: center; gap: 0.75rem;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
            Research Status
        </h3>
        
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            @php
                $statusColors = [
                    'Ongoing Projects' => '#22c55e',
                    'Completed Projects' => '#3b82f6',
                    'Terminated Projects' => '#ef4444',
                ];
            @endphp

            @foreach($projectStatusCounts as $status => $count)
                <div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.6rem; font-size: 0.85rem; font-weight: 700; color: var(--text-main);">
                        <span style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="width: 8px; height: 8px; background: {{ $statusColors[$status] }}; border-radius: 50%;"></span>
                            {{ $status }}
                        </span>
                        <span>{{ $count }}</span>
                    </div>
                    <div style="width: 100%; height: 8px; background: #f1f5f9; border-radius: 4px; overflow: hidden;">
                        <div style="width: {{ ($count / max($stats['projects'], 1)) * 100 }}%; height: 100%; background: {{ $statusColors[$status] }}; transition: width 0.5s ease-out;"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Departmental Heatmap -->
    <div class="card" style="border-top: 5px solid var(--primary-green);">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 2rem; display: flex; align-items: center; gap: 0.75rem;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
            Departmental Distribution
        </h3>

        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
            @forelse($directorateStats as $d)
                <div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.4rem; font-size: 0.85rem; font-weight: 600; color: var(--text-muted);">
                        <span>{{ $d['name'] }}</span>
                        <span style="color: var(--primary-navy);">{{ $d['percentage'] }}%</span>
                    </div>
                    <div style="width: 100%; height: 6px; background: #f8fafc; border-radius: 3px; overflow: hidden; border: 1px solid #eef2f6;">
                        <div style="width: {{ $d['percentage'] }}%; height: 100%; background: linear-gradient(90deg, var(--primary-navy) 0%, var(--primary-green) 100%);"></div>
                    </div>
                </div>
            @empty
                <p style="color: var(--text-muted); text-align: center; padding: 2rem 0;">No departmental data.</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Recent Activity Table -->
<div class="card" style="margin-top: 2rem; border-top: 5px solid #3b82f6;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--primary-navy); display: flex; align-items: center; gap: 0.75rem;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            Intelligence Registry (Recent)
        </h3>
        <a href="{{ route('projects.index') }}" class="btn btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">View All Projects</a>
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: separate; border-spacing: 0 0.75rem;">
            <thead>
                <tr>
                    <th style="padding: 0.75rem 1rem; text-align: left; color: var(--text-muted); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; border-bottom: 2px solid #f1f5f9;">Scientific Initiative</th>
                    <th style="padding: 0.75rem 1rem; text-align: left; color: var(--text-muted); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; border-bottom: 2px solid #f1f5f9;">Lead Scientist</th>
                    <th style="padding: 0.75rem 1rem; text-align: left; color: var(--text-muted); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; border-bottom: 2px solid #f1f5f9;">Directorate</th>
                    <th style="padding: 0.75rem 1rem; text-align: right; color: var(--text-muted); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; border-bottom: 2px solid #f1f5f9;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentProjects as $project)
                    <tr style="transition: all 0.2s ease;">
                        <td style="padding: 1rem; border-radius: 8px 0 0 8px;">
                            <div style="font-weight: 700; color: var(--primary-navy); font-size: 0.95rem;">{{ Str::limit($project->research_title, 50) }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Initiated {{ $project->created_at->diffForHumans() }}</div>
                        </td>
                        <td style="padding: 1rem;">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <div style="width: 32px; height: 32px; background: var(--primary-navy); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem;">{{ substr($project->pi->full_name, 0, 1) }}</div>
                                <span style="font-weight: 600; font-size: 0.9rem;">{{ $project->pi->full_name }}</span>
                            </div>
                        </td>
                        <td style="padding: 1rem;">
                            <span style="font-size: 0.75rem; background: #eff6ff; color: #1e40af; padding: 0.35rem 0.75rem; border-radius: 20px; font-weight: 700;">{{ $project->directorate->name }}</span>
                        </td>
                        <td style="padding: 1rem; text-align: right; border-radius: 0 8px 8px 0;">
                            @php
                                $badgeColor = $statusColors[strtoupper($project->status)] ?? '#6366f1';
                            @endphp
                            <span style="padding: 0.35rem 0.75rem; background: {{ $badgeColor }}20; color: {{ $badgeColor }}; border-radius: 8px; font-size: 0.75rem; font-weight: 800;">
                                {{ strtoupper($project->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 4rem; color: var(--text-muted);">No recent laboratory initiatives found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
