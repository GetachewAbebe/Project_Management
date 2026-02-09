@extends('layouts.app')

@section('title', 'Evaluations Portfolio')
@section('header_title', auth()->user()->isEvaluator() ? 'My Evaluation History' : 'Evaluations Repository')

@section('content')
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem; margin-bottom: 4.5rem;">
    <x-stat-card 
        label="Pending Evaluation" 
        :value="$globalStats['awaiting_evaluation']" 
        color="#6366f1" 
        icon='<svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
    />

    <x-stat-card 
        label="Total Audits" 
        :value="$globalStats['total_submissions']" 
        color="var(--brand-green)" 
        icon='<svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
    />

    <x-stat-card 
        label="Active Portfolio" 
        :value="$globalStats['distinct_projects']" 
        color="var(--brand-blue)" 
        icon='<svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>'
    />
</div>

<div class="card animate-up">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3.5rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 2rem;">
        <div>
            <h3 style="font-size: 1.75rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.04em; margin: 0;">Evaluation <span style="color: var(--brand-green);">Records</span></h3>
            <p style="font-size: 0.95rem; color: #64748b; font-weight: 700; margin-top: 0.5rem;">Managing institutional performance audits</p>
        </div>
        @can('create', App\Models\Evaluation::class)
        <a href="{{ route('evaluations.create') }}" class="btn-primary" style="text-decoration: none; padding: 1.1rem 2.25rem; font-size: 0.95rem;">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.75rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Execute Audit
        </a>
        @endcan
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-spacing: 0 1rem; border-collapse: separate;">
            <thead>
                <tr>
                    <th style="padding-left: 1.5rem;">Research Initiative</th>
                    <th>Directorate</th>
                    <th>Evaluator</th>
                    <th>Audit Score</th>
                    <th>Submission</th>
                    <th style="text-align: right; padding-right: 1.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($evaluations as $eval)
                <tr class="premium-row">
                    <td style="padding-left: 1.5rem;">
                        <div style="font-weight: 900; color: var(--brand-blue); font-size: 1.05rem; line-height: 1.4; margin-bottom: 0.4rem; letter-spacing: -0.01em;">{{ $eval->project->research_title }}</div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="font-size: 0.8rem; color: #94a3b8; font-weight: 800; text-transform: uppercase;">Investigator:</span>
                            <span style="font-size: 0.8rem; color: var(--brand-blue); font-weight: 900;">{{ $eval->project->pi->full_name }}</span>
                        </div>
                    </td>
                    <td>
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.25rem; background: #f4f7fa; border-radius: 12px; border: 1px solid #eef2f6;">
                            <span style="font-size: 0.9rem; font-weight: 800; color: #475569;">{{ $eval->project->directorate->name }}</span>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--brand-blue) 0%, #002d4a 100%); color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 0.95rem;">
                                {{ substr($eval->evaluator->full_name, 0, 1) }}
                            </div>
                            <div style="font-weight: 800; font-size: 0.95rem; color: #334155;">{{ $eval->evaluator->full_name }}</div>
                        </div>
                    </td>
                    <td>
                        <div style="display: inline-flex; flex-direction: column;">
                            <div style="font-weight: 950; color: var(--brand-green); font-size: 1.5rem; line-height: 1; letter-spacing: -0.5px;">{{ number_format($eval->total_score, 1) }}%</div>
                            <div style="font-size: 0.7rem; font-weight: 900; text-transform: uppercase; color: #94a3b8; margin-top: 4px; letter-spacing: 0.05em;">Performance index</div>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; flex-direction: column;">
                            <div style="font-weight: 800; color: #475569; font-size: 0.95rem;">{{ $eval->created_at->format('M d, Y') }}</div>
                            <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700;">{{ $eval->created_at->format('h:i A') }}</div>
                        </div>
                    </td>
                    <td style="text-align: right; padding-right: 1.5rem;">
                        <a href="{{ route('evaluations.show', $eval->id) }}" class="btn-secondary" style="padding: 0.6rem 1.5rem; font-size: 0.85rem; text-decoration: none;">View Narrative</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 7rem;">
                        <div style="font-size: 1.25rem; font-weight: 800; color: #94a3b8;">No institutional audits have been recorded.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
