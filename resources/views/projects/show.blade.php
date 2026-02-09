@extends('layouts.app')

@section('title', 'Project Details')
@section('header_title', 'Project Information')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding-bottom: 4rem;">
    
    <!-- Top Actions -->
    <div style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('projects.index') }}" class="btn-secondary">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Registry
        </a>
        @can('update', $project)
        <a href="{{ route('projects.edit', $project->id) }}" class="btn-primary">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            Edit Project
        </a>
        @endcan
    </div>

    <!-- Project Identity Card (Matching Registration Preview) -->
    <div class="identity-card">
        <div class="identity-badge">
            {{ $project->status == 'REGISTERED' ? 'NEW PROJECT' : $project->status }}
        </div>
        <h1 class="project-title-hero">{{ $project->research_title }}</h1>
        <div class="identity-meta">
            <span>{{ $project->directorate->name }}</span>
            <span class="separator">•</span>
            <span>{{ $project->start_year }}</span>
        </div>
        <div class="identity-pi">
            Led by {{ $project->pi->full_name }}
        </div>
    </div>

    <!-- Premium Details Card -->
    <div class="premium-card">
        <!-- Info Grid -->
        <div class="info-grid">
            <!-- PI & Directorate -->
            <div class="info-group">
                <label>Principal Investigator</label>
                <div class="display-field">
                    <div class="pi-avatar">
                        {{ substr($project->pi->full_name, 0, 1) }}
                    </div>
                    <span>{{ $project->pi->full_name }}</span>
                </div>
            </div>

            <div class="info-group">
                <label>Assigned Directorate</label>
                <div class="directorate-badge">
                    {{ $project->directorate->name }}
                </div>
            </div>

            <!-- Project Code -->
            <div class="info-group">
                <label>Project Code</label>
                <div class="display-field code-font">
                    {{ $project->project_code ?? 'Pending Generation...' }}
                </div>
            </div>

            <!-- Timeline -->
            <div class="info-group">
                <label>Timeline</label>
                <div class="display-field">
                    {{ $project->start_year }} — {{ $project->end_year ?? 'Ongoing' }}
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <!-- Objectives -->
        <div class="content-section">
            <label>General Objectives</label>
            <div class="objective-box">
                {{ $project->objective }}
            </div>
        </div>

        @if($project->evaluations && $project->evaluations->count() > 0)
        <div class="divider"></div>
        
        <!-- Evaluations -->
        <div class="content-section">
            <label>Evaluations & Feedback</label>
            <div class="evaluations-list">
                @foreach($project->evaluations as $eval)
                <div class="evaluation-card">
                    <div class="eval-header">
                        <div class="evaluator-info">
                            <div class="eval-avatar">E</div>
                            <div>
                                <div class="eval-name">{{ $eval->evaluator_name }}</div>
                                <div class="eval-date">{{ $eval->created_at->format('M d, Y') }}</div>
                            </div>
                        </div>
                        <div class="eval-rating">Score: {{ $eval->score ?? 'N/A' }}</div>
                    </div>
                    <div class="eval-body">
                        {{ $eval->feedback }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    /* Global Buttons */
    .btn-primary {
        background: var(--brand-blue);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }
    .btn-primary:hover { background: #1e3a8a; transform: translateY(-2px); }

    .btn-secondary {
        background: white;
        color: #64748b;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: 1px solid #e2e8f0;
        transition: all 0.2s;
    }
    .btn-secondary:hover { background: #f8fafc; color: #334155; }

    /* Identity Card */
    .identity-card {
        background: linear-gradient(135deg, var(--brand-blue), #1e3a8a);
        border-radius: 20px;
        padding: 3rem 2rem;
        text-align: center;
        color: white;
        box-shadow: 0 10px 30px rgba(30, 58, 138, 0.2);
        margin-bottom: -40px; /* Overlap effect */
        position: relative;
        z-index: 10;
        width: 92%;
        margin-left: auto;
        margin-right: auto;
    }

    .identity-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 0.35rem 1rem;
        border-radius: 99px;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        margin-bottom: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .project-title-hero {
        font-size: 2rem;
        font-weight: 800;
        margin: 0 0 1rem 0;
        line-height: 1.2;
    }

    .identity-meta {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .identity-meta .separator { margin: 0 0.5rem; opacity: 0.5; }

    .identity-pi {
        font-size: 0.9rem;
        font-weight: 700;
        opacity: 0.95;
    }

    /* Premium Details Card */
    .premium-card {
        background: white;
        border-radius: 20px;
        padding: 4rem 3rem 3rem 3rem; /* Top padding accounts for overlap */
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(0, 0, 0, 0.02);
        position: relative;
        z-index: 5;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem 3rem;
        margin-bottom: 2rem;
    }

    .info-group label, .content-section label {
        display: block;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #64748b;
        font-weight: 800;
        margin-bottom: 0.75rem;
    }

    .display-field {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .pi-avatar {
        width: 32px;
        height: 32px;
        background: #e0f2fe;
        color: var(--brand-blue);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.9rem;
    }

    .directorate-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: #fdf2f8; /* Pink tint example */
        color: #be185d;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.95rem;
    }
    
    .code-font {
        font-family: 'Courier New', monospace;
        letter-spacing: -0.5px;
        background: #f1f5f9;
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 6px;
    }

    .divider {
        height: 1px;
        background: #f1f5f9;
        margin: 2.5rem 0;
    }

    .objective-box {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #334155;
        background: #f8fafc;
        padding: 2rem;
        border-radius: 12px;
        border: 1px solid #f1f5f9;
    }

    /* Evaluations */
    .evaluation-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.01);
    }
    
    .eval-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .evaluator-info {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }
    
    .eval-avatar {
        width: 36px;
        height: 36px;
        background: #f1f5f9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        color: #64748b;
    }
    
    .eval-name { font-weight: 700; color: #1e293b; font-size: 0.95rem; }
    .eval-date { font-size: 0.8rem; color: #94a3b8; font-weight: 600; }
    
    .eval-rating {
        background: #dcfce7;
        color: #166534;
        padding: 0.25rem 0.75rem;
        border-radius: 99px;
        font-weight: 800;
        font-size: 0.8rem;
    }
    
    .eval-body {
        font-size: 1rem;
        line-height: 1.6;
        color: #475569;
    }
</style>
@endsection
