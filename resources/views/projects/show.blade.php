@extends('layouts.app')

@section('title', 'Project Details')
@section('header_title', 'Project Information')

@section('content')
<div style="display: flex; gap: 1.5rem; margin-bottom: 2rem;">
    <a href="{{ route('projects.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main);">
        &larr; Back to Portfolio
    </a>
    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">
        Edit Details
    </a>
</div>

<div class="card" style="padding: 0; overflow: hidden; border: 1px solid var(--border-color);">
    <div style="background: #f8fafc; padding: 2rem; border-bottom: 1px solid var(--border-color);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
            <div>
                <span style="font-size: 0.75rem; font-weight: 800; color: var(--primary-green); text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 0.5rem;">
                    {{ $project->directorate->name }}
                </span>
                <h1 style="font-size: 2rem; font-weight: 800; color: var(--primary-navy); line-height: 1.2;">
                    {{ $project->research_title }}
                </h1>
            </div>
            @php
                $statusColors = [
                    'REGISTERED' => ['bg' => '#f1f5f9', 'text' => '#64748b', 'label' => 'NEW REGISTRY'],
                    'ONGOING' => ['bg' => '#dcfce7', 'text' => '#166534', 'label' => 'ACTIVE PROGRESS'],
                    'COMPLETED' => ['bg' => '#dbeafe', 'text' => '#1e40af', 'label' => 'COMPLETED'],
                    'EVALUATED' => ['bg' => '#f5f3ff', 'text' => '#5b21b6', 'label' => 'EVALUATED'],
                ];
                $st = $statusColors[strtoupper($project->status)] ?? ['bg' => '#f1f5f9', 'text' => '#64748b', 'label' => $project->status];
            @endphp
            <div style="background: {{ $st['bg'] }}; color: {{ $st['text'] }}; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 800; font-size: 0.8rem; text-transform: uppercase;">
                {{ $st['label'] }}
            </div>
        </div>

        <div style="display: flex; gap: 2rem; align-items: center;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 40px; height: 40px; background: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: var(--primary-navy); border: 1px solid var(--border-color);">
                    {{ substr($project->pi->full_name, 0, 1) }}
                </div>
                <div>
                    <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase;">Principal Investigator</div>
                    <div style="font-weight: 700; color: var(--primary-navy);">{{ $project->pi->full_name }}</div>
                </div>
            </div>
            
            <div style="height: 30px; width: 1px; background: var(--border-color);"></div>

            <div>
                <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase;">Project Code</div>
                <div style="font-weight: 700; font-family: monospace; color: var(--text-main);">{{ $project->project_code ?? '---' }}</div>
            </div>

            <div style="height: 30px; width: 1px; background: var(--border-color);"></div>

            <div>
                <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase;">Duration</div>
                <div style="font-weight: 700; color: var(--text-main);">{{ $project->start_year }} - {{ $project->end_year ?? 'TBD' }}</div>
            </div>
        </div>
    </div>

    <div style="padding: 2.5rem;">
        <div style="margin-bottom: 3rem;">
            <h3 style="font-size: 1.1rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                Research Objective
            </h3>
            <div style="font-size: 1.1rem; line-height: 1.8; color: var(--text-main); white-space: pre-wrap; background: #fff; padding: 1.5rem; border-radius: 12px; border: 1px solid #f1f5f9;">
                {{ $project->objective }}
            </div>
        </div>

        @if($project->evaluations && $project->evaluations->count() > 0)
        <div>
            <h3 style="font-size: 1.1rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 1.5rem;">Recent Evaluations</h3>
            @foreach($project->evaluations as $eval)
            <div style="background: #f8fafc; border-radius: 12px; padding: 1.5rem; border: 1px solid var(--border-color); margin-bottom: 1rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                    <div style="font-weight: 700; color: var(--primary-navy);">Evaluation by {{ $eval->evaluator_name }}</div>
                    <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $eval->created_at->format('M d, Y') }}</div>
                </div>
                <div style="font-size: 0.95rem; line-height: 1.6; color: var(--text-main);">
                    {{ $eval->feedback }}
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
