@extends('layouts.app')

@section('title', 'Executive Dashboard')
@section('header_title', 'Governance Board')

@section('content')

<!-- Page Header with Futuristic Command Center Aesthetic -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4rem; padding: 2.5rem 0; border-bottom: 2px solid #f1f5f9; position: relative;">
    <div style="flex: 1;">
        <!-- Intelligence Status Badge -->
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem; background: rgba(0, 139, 75, 0.05); padding: 0.35rem 1rem; border-radius: 99px; border: 1px solid rgba(0, 139, 75, 0.15); box-shadow: 0 0 20px rgba(0, 139, 75, 0.05);">
                <div style="width: 8px; height: 8px; background: var(--brand-green); border-radius: 50%; box-shadow: 0 0 12px var(--brand-green); animation: pulse 2s infinite;"></div>
                <span style="font-size: 0.7rem; font-weight: 950; color: var(--brand-green); text-transform: uppercase; letter-spacing: 0.15em;">System Status • Active Session</span>
            </div>
            <div style="height: 1px; flex: 0.1; background: linear-gradient(90deg, rgba(0, 139, 75, 0.2), transparent);"></div>
        </div>

        <!-- Main Executive Title -->
        <h1 style="font-size: 3rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.05em; margin: 0; line-height: 0.9; position: relative;">
            Executive <span style="color: var(--brand-green); background: linear-gradient(135deg, var(--brand-green) 0%, #006d3d 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Command Center</span>
        </h1>
        
        <!-- Tactical Subtext -->
        <div style="margin-top: 1rem; display: flex; align-items: center; gap: 1.5rem; color: #94a3b8; font-size: 0.85rem; font-weight: 700;">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span>Dashboard Overview</span>
            </div>
            <div style="width: 4px; height: 4px; background: #cbd5e1; border-radius: 50%;"></div>
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>System Health: Synchronized</span>
            </div>
        </div>
    </div>

    <!-- Tactical Command Clock -->
    <div style="background: white; padding: 1.15rem 1.75rem; border-radius: 20px; border: 1px solid #f1f5f9; box-shadow: 0 10px 30px rgba(0,0,0,0.03); display: flex; align-items: center; gap: 1.5rem;">
        <div style="text-align: right;">
            <div style="font-size: 0.7rem; font-weight: 950; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.15em; margin-bottom: 4px;">Current System Time</div>
            <div style="font-size: 1.75rem; font-weight: 950; color: var(--brand-blue); font-family: 'Outfit', sans-serif; letter-spacing: -0.03em; line-height: 1;">
                {{ now()->format('H:i') }}<span style="color: var(--brand-green); font-size: 0.85em; margin-left: 2px;">:{{ now()->format('s') }}</span>
            </div>
        </div>
        <div style="width: 52px; height: 52px; background: rgba(0, 59, 92, 0.05); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: var(--brand-blue); position: relative;">
            <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <div style="position: absolute; top: -2px; right: -2px; width: 12px; height: 12px; background: var(--brand-green); border-radius: 50%; border: 3px solid white; box-shadow: 0 0 10px var(--brand-green);"></div>
        </div>
    </div>
</div>

<!-- Enhanced Stat Cards with Trends -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem; margin-bottom: 4rem;">
    <!-- Research Core metrics -->
    <div style="background: white; border-radius: 24px; padding: 2rem; border: 1px solid #f1f5f9; box-shadow: 0 4px 20px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 1.5rem;">
        <div style="width: 64px; height: 64px; background: rgba(0, 59, 92, 0.05); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: var(--brand-blue);">
            <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        </div>
        <div>
            <div style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 4px;">Research Portfolio</div>
            <div style="font-size: 2.25rem; font-weight: 950; color: var(--brand-blue); line-height: 1;">{{ $stats['projects'] }}</div>
        </div>
    </div>

    <div style="background: white; border-radius: 24px; padding: 2rem; border: 1px solid #f1f5f9; box-shadow: 0 4px 20px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 1.5rem;">
        <div style="width: 64px; height: 64px; background: rgba(0, 139, 75, 0.05); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: var(--brand-green);">
            <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <div style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 4px;">Performance Index</div>
            <div style="font-size: 2.25rem; font-weight: 950; color: var(--brand-green); line-height: 1;">{{ round($stats['performance_index']) }}%</div>
        </div>
    </div>

    <div style="background: white; border-radius: 24px; padding: 2rem; border: 1px solid #f1f5f9; box-shadow: 0 4px 20px rgba(0,0,0,0.02); display: flex; align-items: center; gap: 1.5rem;">
        <div style="width: 64px; height: 64px; background: rgba(245, 158, 11, 0.05); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: #f59e0b;">
            <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <div style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 4px;">Registry Pipeline</div>
            <div style="font-size: 2.25rem; font-weight: 950; color: #f59e0b; line-height: 1;">{{ $stats['ongoing_projects'] }}</div>
        </div>
    </div>
</div>

<!-- Enhanced Analytics Grid -->
<div style="display: grid; grid-template-columns: 1fr 1.3fr; gap: 2.5rem; margin-bottom: 3.5rem;">
    <!-- Portfolio Velocity -->
    <x-card title="Portfolio Velocity" icon='<svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>' class="card-blue">
        <div style="display: flex; flex-direction: column; gap: 2rem;">
            @php
                $statusConfig = [
                    'Ongoing Projects' => ['color' => 'var(--brand-green)', 'label' => 'Active R&D', 'icon' => '🚀', 'bg' => 'rgba(0, 139, 75, 0.06)', 'border' => 'rgba(0, 139, 75, 0.2)'],
                    'Completed Projects' => ['color' => '#0891b2', 'label' => 'Completed', 'icon' => '✅', 'bg' => 'rgba(8, 145, 178, 0.06)', 'border' => 'rgba(8, 145, 178, 0.2)'],
                    'Terminated Projects' => ['color' => '#64748b', 'label' => 'Archived', 'icon' => '📦', 'bg' => 'rgba(100, 116, 139, 0.06)', 'border' => 'rgba(100, 116, 139, 0.2)'],
                ];
            @endphp

            @foreach($projectStatusCounts as $status => $count)
                @php $cfg = $statusConfig[$status] ?? ['color' => '#64748b', 'label' => $status, 'icon' => '•', 'bg' => '#f8fafc', 'border' => '#e2e8f0']; @endphp
                <div style="padding: 1.75rem; background: {{ $cfg['bg'] }}; border-radius: 16px; border: 2px solid {{ $cfg['border'] }}; transition: all 0.3s ease; cursor: pointer;" class="velocity-item-pro">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <span style="font-size: 2rem;">{{ $cfg['icon'] }}</span>
                            <div>
                                <div style="font-weight: 950; font-size: 1.1rem; color: var(--brand-blue); letter-spacing: -0.01em;">{{ $cfg['label'] }}</div>
                                <div style="font-size: 0.8rem; font-weight: 800; color: #94a3b8; margin-top: 0.25rem;">{{ round(($count / max($stats['projects'], 1)) * 100, 1) }}% of total</div>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-weight: 950; color: {{ $cfg['color'] }}; font-size: 2.5rem; line-height: 1;">{{ $count }}</div>
                            <div style="font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.25rem;">Projects</div>
                        </div>
                    </div>
                    <div style="height: 14px; background: white; border-radius: 99px; overflow: hidden; box-shadow: inset 0 2px 4px rgba(0,0,0,0.08); border: 1px solid {{ $cfg['border'] }};">
                        <div style="width: {{ ($count / max($stats['projects'], 1)) * 100 }}%; height: 100%; background: {{ $cfg['color'] }}; border-radius: 99px; box-shadow: 0 0 20px {{ $cfg['color'] }}60; transition: width 1.8s cubic-bezier(0.16, 1, 0.3, 1);"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>

    <!-- Departmental Performance -->
    <x-card title="Departmental Performance" icon='<svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>' class="card-green">
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            @forelse($directorateStats as $index => $d)
                <div style="padding: 1.5rem; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border-radius: 16px; border: 2px solid #e2e8f0; transition: all 0.3s ease; position: relative; overflow: hidden;" class="dept-item-pro">
                    <!-- Rank Badge -->
                    <div style="position: absolute; top: 1rem; right: 1rem; width: 36px; height: 36px; background: linear-gradient(135deg, var(--brand-blue), var(--brand-green)); color: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 950; font-size: 1.1rem; box-shadow: 0 4px 12px rgba(0, 59, 92, 0.2);">
                        #{{ $index + 1 }}
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.25rem; padding-right: 3rem;">
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem;">
                                <div style="width: 12px; height: 12px; background: linear-gradient(135deg, var(--brand-blue), var(--brand-green)); border-radius: 50%; box-shadow: 0 0 15px rgba(0, 139, 75, 0.5);"></div>
                                <span style="font-size: 1.15rem; font-weight: 950; color: #1e293b;">{{ $d['name'] }}</span>
                            </div>
                            <div style="font-size: 0.85rem; color: #64748b; font-weight: 700; padding-left: 1.5rem;">
                                {{ $d['count'] }} active {{ Str::plural('project', $d['count']) }}
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 2rem; font-weight: 950; color: var(--brand-green); line-height: 1;">{{ $d['percentage'] }}%</div>
                            <div style="font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em;">Share</div>
                        </div>
                    </div>
                    
                    <div style="height: 12px; background: #f1f5f9; border-radius: 99px; overflow: hidden; box-shadow: inset 0 2px 4px rgba(0,0,0,0.06); border: 1px solid #e2e8f0;">
                        <div style="width: {{ $d['percentage'] }}%; height: 100%; background: linear-gradient(90deg, var(--brand-blue), var(--brand-green)); border-radius: 99px; box-shadow: 0 0 20px rgba(0, 139, 75, 0.5); transition: width 1.8s cubic-bezier(0.16, 1, 0.3, 1);"></div>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 4rem; color: #94a3b8;">
                    <svg width="64" height="64" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 1.5rem; opacity: 0.2;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <p style="font-weight: 900; font-size: 1.1rem; margin-bottom: 0.5rem;">No Departmental Data</p>
                    <p style="font-size: 0.9rem; font-weight: 700;">Awaiting project assignments</p>
                </div>
            @endforelse
        </div>
    </x-card>
</div>

<!-- Enhanced Registry Table -->
<x-card title="Priority Research Registry" icon='<svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>'>
    <!-- Table Filters -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; padding-bottom: 1.5rem; border-bottom: 2px solid #f1f5f9;">
        <div style="display: flex; gap: 1rem;">
            <button style="padding: 0.65rem 1.25rem; background: var(--brand-blue); color: white; border: none; border-radius: 10px; font-weight: 900; font-size: 0.85rem; cursor: pointer; transition: all 0.3s ease;">All Projects</button>
            <button style="padding: 0.65rem 1.25rem; background: white; color: #64748b; border: 2px solid #e2e8f0; border-radius: 10px; font-weight: 900; font-size: 0.85rem; cursor: pointer; transition: all 0.3s ease;">Active Only</button>
            <button style="padding: 0.65rem 1.25rem; background: white; color: #64748b; border: 2px solid #e2e8f0; border-radius: 10px; font-weight: 900; font-size: 0.85rem; cursor: pointer; transition: all 0.3s ease;">Completed</button>
        </div>
        <div style="font-size: 0.85rem; font-weight: 800; color: #64748b;">
            Showing <span style="color: var(--brand-blue); font-weight: 950;">{{ $recentProjects->count() }}</span> projects
        </div>
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: separate; border-spacing: 0 0.75rem;">
            <thead>
                <tr style="background: #f8fafc;">
                    <th style="text-align: left; padding: 1rem 1.5rem; font-size: 0.8rem; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em; border-radius: 12px 0 0 12px;">Initiative Details</th>
                    <th style="text-align: left; padding: 1rem 1.5rem; font-size: 0.8rem; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">Scientific Lead</th>
                    <th style="text-align: left; padding: 1rem 1.5rem; font-size: 0.8rem; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;">Directorate</th>
                    <th style="text-align: right; padding: 1rem 1.5rem; font-size: 0.8rem; font-weight: 900; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em; border-radius: 0 12px 12px 0;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentProjects as $project)
                <tr class="premium-row-pro" style="background: white; transition: all 0.3s ease;">
                    <td style="padding: 1.5rem; border-top: 2px solid #f1f5f9; border-bottom: 2px solid #f1f5f9; border-left: 2px solid #f1f5f9; border-radius: 16px 0 0 16px;">
                        <div style="font-weight: 950; color: var(--brand-blue); font-size: 1.15rem; margin-bottom: 0.75rem; letter-spacing: -0.02em;">{{ $project->research_title }}</div>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <span style="font-size: 0.75rem; font-weight: 900; color: white; background: linear-gradient(135deg, var(--brand-blue), var(--brand-green)); padding: 0.35rem 0.85rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 4px 10px rgba(0, 59, 92, 0.2);">{{ $project->project_code ?? 'TBD' }}</span>
                            <span style="font-size: 0.8rem; font-weight: 800; color: #94a3b8;">Started: {{ $project->start_year }}</span>
                        </div>
                    </td>
                    <td style="padding: 1.5rem; border-top: 2px solid #f1f5f9; border-bottom: 2px solid #f1f5f9;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--brand-green) 0%, #006d3d 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-weight: 950; color: white; font-size: 1.15rem; box-shadow: 0 8px 20px rgba(0, 139, 75, 0.3);">
                                {{ substr($project->pi->full_name, 0, 1) }}
                            </div>
                            <div>
                                <div style="font-weight: 950; font-size: 1rem; color: #1e293b;">{{ $project->pi->full_name }}</div>
                                <div style="font-size: 0.8rem; font-weight: 700; color: #94a3b8; margin-top: 0.25rem;">Principal Investigator</div>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 1.5rem; border-top: 2px solid #f1f5f9; border-bottom: 2px solid #f1f5f9;">
                        <div style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, #f8fafc, white); border-radius: 12px; border: 2px solid #e2e8f0;">
                            <div style="width: 10px; height: 10px; background: var(--brand-blue); border-radius: 50%; box-shadow: 0 0 12px rgba(0, 59, 92, 0.5);"></div>
                            <span style="font-size: 0.95rem; font-weight: 950; color: #475569;">{{ $project->directorate->name }}</span>
                        </div>
                    </td>
                    <td style="text-align: right; padding: 1.5rem; border-top: 2px solid #f1f5f9; border-bottom: 2px solid #f1f5f9; border-right: 2px solid #f1f5f9; border-radius: 0 16px 16px 0;">
                        <div style="display: inline-flex; filter: drop-shadow(0 6px 16px rgba(0,0,0,0.1));">
                            <x-status-badge :status="$project->status" />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 6rem; background: white; border-radius: 16px;">
                        <svg width="80" height="80" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin: 0 auto 2rem; opacity: 0.15;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        <div style="font-size: 1.25rem; font-weight: 950; color: #94a3b8; margin-bottom: 0.5rem;">No Research Initiatives</div>
                        <div style="font-size: 0.95rem; font-weight: 700; color: #cbd5e1;">Start by creating your first project</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-card>

<style>
    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.95); }
    }

    .stat-card-pro:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
        border-color: var(--brand-green);
    }

    .velocity-item-pro:hover {
        transform: translateX(8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .dept-item-pro:hover {
        transform: translateX(8px);
        box-shadow: 0 12px 30px rgba(0, 139, 75, 0.15);
        border-color: var(--brand-green);
    }

    .premium-row-pro:hover {
        background: linear-gradient(135deg, rgba(0, 139, 75, 0.03), rgba(0, 59, 92, 0.03)) !important;
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .premium-row-pro:hover td {
        border-color: var(--brand-green) !important;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    a:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(0, 139, 75, 0.35);
    }
</style>
@endsection
