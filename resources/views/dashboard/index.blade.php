@extends('layouts.app')

@section('title', 'Institutional Board')
@section('header_title', 'Governance Board')

@section('content')
<!-- High-Impact Stat Cluster -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem; margin-bottom: 4.5rem;">
    <x-stat-card 
        label="Strategic Initiatives" 
        :value="$stats['ongoing_projects']" 
        color="var(--brand-green)" 
        icon='<svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>'
    />

    <x-stat-card 
        label="Success Ratio" 
        :value="round(($stats['completed_projects'] / max($stats['projects'], 1)) * 100) . '%'" 
        color="#0891b2" 
        icon='<svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
    />

    <x-stat-card 
        label="Pending Reviews" 
        :value="$stats['awaiting_evaluation'] ?? 0" 
        color="#f59e0b" 
        icon='<svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
    />
</div>

<!-- Advanced Analytics Grid -->
<div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 3rem; margin-bottom: 4.5rem;">
    <x-card title="Portfolio Velocity" icon='<svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>' class="card-blue">
        <div style="display: flex; flex-direction: column; gap: 2.25rem;">
            @php
                $statusConfig = [
                    'Ongoing Projects' => ['color' => 'var(--brand-green)', 'label' => 'Active R&D', 'icon' => '🚀'],
                    'Completed Projects' => ['color' => '#0891b2', 'label' => 'Patented/Finalized', 'icon' => '💎'],
                    'Terminated Projects' => ['color' => '#ef4444', 'label' => 'Archived', 'icon' => '📁'],
                ];
            @endphp

            @foreach($projectStatusCounts as $status => $count)
                @php $cfg = $statusConfig[$status] ?? ['color' => '#64748b', 'label' => $status, 'icon' => '•']; @endphp
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 1rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <span style="font-size: 1.25rem;">{{ $cfg['icon'] }}</span>
                            <span style="font-weight: 800; font-size: 1rem; color: var(--brand-blue); letter-spacing: -0.01em;">{{ $cfg['label'] }}</span>
                        </div>
                        <span style="font-weight: 900; color: {{ $cfg['color'] }}; font-size: 1.1rem;">{{ $count }}</span>
                    </div>
                    <div style="height: 14px; background: #f8fafc; border-radius: 99px; overflow: hidden; border: 1px solid #f1f5f9; padding: 2px;">
                        <div style="width: {{ ($count / max($stats['projects'], 1)) * 100 }}%; height: 100%; background: {{ $cfg['color'] }}; border-radius: 99px; box-shadow: 0 0 15px {{ $cfg['color'] }}40;"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>

    <x-card title="Departmental Performance" icon='<svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>' class="card-green">
        <div style="display: flex; flex-direction: column; gap: 1.75rem;">
            @forelse($directorateStats as $d)
                <div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem;">
                        <span style="font-size: 1rem; font-weight: 800; color: #475569;">{{ $d['name'] }}</span>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="font-size: 0.85rem; font-weight: 800; color: var(--brand-green);">{{ $d['count'] }} Projects</span>
                            <span style="font-size: 0.75rem; font-weight: 900; background: #f1fef7; color: #059669; padding: 2px 8px; border-radius: 6px;">{{ $d['percentage'] }}%</span>
                        </div>
                    </div>
                    <div style="height: 8px; background: #f4f7fa; border-radius: 4px; overflow: hidden;">
                        <div style="width: {{ $d['percentage'] }}%; height: 100%; background: linear-gradient(90deg, var(--brand-blue), var(--brand-green)); border-radius: 4px; transition: width 1s cubic-bezier(0.16, 1, 0.3, 1);"></div>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 3rem; color: #94a3b8;">
                    <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 1rem; opacity: 0.3;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p style="font-weight: 800;">Awaiting Departmental Data</p>
                </div>
            @endforelse
        </div>
    </x-card>
</div>

<!-- Detailed Registry View -->
<x-card title="Priority Research Registry" icon='<svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>'>
    <div style="overflow-x: auto;">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>Initiative Details</th>
                    <th>Scientific Lead</th>
                    <th>Directorate</th>
                    <th style="text-align: right;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentProjects as $project)
                <tr class="premium-row">
                    <td>
                        <div style="font-weight: 900; color: var(--brand-blue); font-size: 1.1rem; margin-bottom: 0.5rem; letter-spacing: -0.02em;">{{ $project->research_title }}</div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <span style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase;">ID: {{ $project->project_code ?? 'TBD' }}</span>
                            <span style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase;">•</span>
                            <span style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase;">Est: {{ $project->start_year }}</span>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 40px; height: 40px; background: #f8fafc; border: 2px solid #eef2f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-weight: 900; color: var(--brand-green); font-size: 0.95rem; box-shadow: 0 4px 8px rgba(0,0,0,0.02);">
                                {{ substr($project->pi->full_name, 0, 1) }}
                            </div>
                            <div style="font-weight: 800; font-size: 1rem; color: #334155;">{{ $project->pi->full_name }}</div>
                        </div>
                    </td>
                    <td>
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.25rem; background: #f4f7fa; border-radius: 12px; border: 1px solid #eef2f6;">
                            <div style="width: 6px; height: 6px; background: var(--brand-blue); border-radius: 50%;"></div>
                            <span style="font-size: 0.9rem; font-weight: 800; color: #475569;">{{ $project->directorate->name }}</span>
                        </div>
                    </td>
                    <td style="text-align: right;">
                        <div style="display: inline-flex; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.05));">
                            <x-status-badge :status="$project->status" />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 6rem;">
                        <div style="font-size: 1.1rem; font-weight: 800; color: #94a3b8;">No initiatives registered in this segment.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-card>
@endsection
