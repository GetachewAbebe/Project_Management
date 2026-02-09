@extends('layouts.app')

@section('title', 'Project Portfolio')
@section('header_title', 'Research Portfolio')

@section('content')
<div class="card animate-up">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3.5rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 2rem;">
        <div>
            <h3 style="font-size: 1.75rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.04em; margin: 0;">Registry <span style="color: var(--brand-green);">Database</span></h3>
            <p style="font-size: 0.95rem; color: #64748b; font-weight: 700; margin-top: 0.5rem;">Accessing institutional research assets</p>
        </div>
        @can('create', App\Models\Project::class)
        <a href="{{ route('projects.create') }}" class="btn-primary" style="text-decoration: none; padding: 1.1rem 2.25rem; font-size: 0.95rem;">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.75rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Register New Initiative
        </a>
        @endcan
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-spacing: 0 1rem; border-collapse: separate;">
            <thead>
                <tr>
                    <th style="padding-left: 1.5rem;">Reference</th>
                    <th>Title & Meta</th>
                    <th>Lead Investigator</th>
                    <th>Directorate</th>
                    <th style="text-align: right;">Status</th>
                    <th style="text-align: right; padding-right: 1.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $proj)
                <tr class="premium-row">
                    <td style="padding-left: 1.5rem;">
                        <span style="font-family: inherit; font-weight: 900; color: var(--brand-blue); background: #f4f7fa; padding: 0.6rem 1rem; border-radius: 12px; font-size: 0.85rem; border: 1px solid #eef2f6;">
                            {{ $proj->project_code ?? 'NEW' }}
                        </span>
                    </td>
                    <td>
                        <div style="max-width: 450px;">
                            <div style="font-weight: 900; color: var(--brand-blue); font-size: 1.05rem; line-height: 1.3; margin-bottom: 0.5rem; letter-spacing: -0.01em;">{{ $proj->research_title }}</div>
                            <div style="display: flex; gap: 1rem; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 0.4rem;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #94a3b8;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span style="font-size: 0.8rem; color: #94a3b8; font-weight: 800; text-transform: uppercase;">{{ $proj->start_year }} - {{ $proj->end_year }}</span>
                                </div>
                                <span style="width: 4px; height: 4px; background: #cbd5e1; border-radius: 50%;"></span>
                                <span style="font-size: 0.8rem; color: var(--brand-green); font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em;">Validated Registry</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 42px; height: 42px; background: #f8fafc; border: 2px solid #eef2f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-weight: 900; color: var(--brand-blue); font-size: 1rem; box-shadow: 0 4px 8px rgba(0,0,0,0.02);">
                                {{ substr($proj->pi->full_name, 0, 1) }}
                            </div>
                            <div style="font-weight: 800; font-size: 1rem; color: #334155;">{{ $proj->pi->full_name }}</div>
                        </div>
                    </td>
                    <td>
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.25rem; background: #f4f7fa; border-radius: 12px; border: 1px solid #eef2f6;">
                            <div style="width: 6px; height: 6px; background: var(--brand-blue); border-radius: 50%;"></div>
                            <span style="font-size: 0.9rem; font-weight: 800; color: #475569;">{{ $proj->directorate->name }}</span>
                        </div>
                    </td>
                    <td style="text-align: right;">
                        <x-status-badge :status="$proj->status" />
                    </td>
                    <td style="text-align: right; padding-right: 1.5rem;">
                        <div style="display: flex; gap: 0.75rem; justify-content: flex-end; align-items: center;">
                            @can('update', $proj)
                            <a href="{{ route('projects.edit', $proj->id) }}" class="btn-secondary" style="padding: 0.6rem 1.2rem; font-size: 0.85rem; text-decoration: none;">Edit Plan</a>
                            @endcan
                            
                            @if($proj->status === 'REGISTERED')
                            @can('create', App\Models\Evaluation::class)
                            <a href="{{ route('evaluations.create', ['project_id' => $proj->id]) }}" class="btn-primary" style="padding: 0.67rem 1.4rem; font-size: 0.85rem; text-decoration: none; background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%); box-shadow: 0 8px 16px rgba(8, 145, 178, 0.3);">Run Evaluation</a>
                            @endcan
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 7rem;">
                        <div style="font-size: 1.25rem; font-weight: 800; color: #94a3b8;">No projects currently registered in the system.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
