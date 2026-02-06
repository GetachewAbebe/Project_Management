@extends('layouts.app')

@section('title', 'Evaluations')
@section('header_title', 'Submitted Evaluations')

@section('content')
<!-- Evaluation Session Pulse -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.25rem; margin-bottom: 2rem;">
    <!-- Awaiting Evaluation -->
    <div class="card" style="padding: 1.25rem; border-left: 5px solid #6366f1; display: flex; align-items: center; gap: 1rem; background: #f5f3ff;">
        <div style="width: 40px; height: 40px; background: #ede9fe; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #6366f1;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
        </div>
        <div>
            <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Awaiting Evaluation</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary-navy);">{{ $stats['awaiting_evaluation'] }}</div>
        </div>
    </div>

    <!-- Evaluation Passes -->
    <div class="card" style="padding: 1.25rem; border-left: 5px solid var(--primary-green); display: flex; align-items: center; gap: 1rem; background: #f0fdf4;">
        <div style="width: 40px; height: 40px; background: #dcfce7; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--primary-green);">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
        </div>
        <div>
            <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Evaluation Passes</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary-navy);">{{ $stats['passed_evaluations'] }}</div>
        </div>
    </div>

    <!-- Unaccepted -->
    <div class="card" style="padding: 1.25rem; border-left: 5px solid #ef4444; display: flex; align-items: center; gap: 1rem; background: #fef2f2;">
        <div style="width: 40px; height: 40px; background: #fee2e2; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #ef4444;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
        <div>
            <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Unaccepted</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary-navy);">{{ $stats['failed_evaluations'] }}</div>
        </div>
    </div>

    <!-- Average Score -->
    <div class="card" style="padding: 1.25rem; border-left: 5px solid #f59e0b; display: flex; align-items: center; gap: 1rem; background: #fffbeb;">
        <div style="width: 40px; height: 40px; background: #fef3c7; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #f59e0b;">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.976-2.888a1 1 0 00-1.175 0l-3.976 2.888c-.784.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.05 9.427c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
        </div>
        <div>
            <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Average Score</div>
            <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary-navy);">
                @if($stats['total_evaluated'] > 0)
                    {{ number_format($stats['average_score'], 1) }}%
                @else
                    ---
                @endif
            </div>
        </div>
    </div>
</div>

<div style="display: flex; justify-content: flex-end; margin-bottom: 2rem;">
    <a href="{{ route('evaluations.create') }}" class="btn btn-primary">
        + New Evaluation
    </a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Research Project</th>
                <th>Directorate</th>
                <th>Evaluator</th>
                <th>Total Score</th>
                <th>Decision</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($evaluations as $eval)
            <tr>
                <td>
                    <div style="font-weight: 700; color: var(--primary-navy);">{{ $eval->project->research_title }}</div>
                    <div style="font-size: 0.8rem; color: var(--text-muted);">PI: {{ $eval->project->pi->full_name }}</div>
                </td>
                <td>{{ $eval->project->directorate->name }}</td>
                <td>{{ $eval->evaluator->full_name }}</td>
                <td style="font-weight: 800; color: var(--primary-green); font-size: 1.1rem;">
                    {{ number_format($eval->total_score, 1) }}
                </td>
                <td>
                    <span class="status-pill" style="background: {{ $eval->decision === 'SATISFACTORY' ? '#dcfce7' : '#fee2e2' }}; color: {{ $eval->decision === 'SATISFACTORY' ? '#15803d' : '#b91c1c' }};">
                        {{ $eval->decision }}
                    </span>
                </td>
                <td>{{ $eval->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('evaluations.show', $eval->id) }}" style="color: var(--primary-navy); font-weight: 700; text-decoration: none;">View Report</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 3rem;">No evaluations submitted yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
