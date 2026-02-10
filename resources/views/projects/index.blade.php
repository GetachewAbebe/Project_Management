@extends('layouts.app')

@section('title', 'Project Portfolio')
@section('header_title', 'Research Portfolio')

@section('content')
<div style="max-width: 1400px; margin: 0 auto;">
    
    <!-- Premium Card Container -->
    <div class="premium-card">
        
        <!-- Header -->
        <div class="card-header-flex">
            <div>
                <h3 class="card-title">Registry <span class="highlight">Database</span></h3>
                <p class="card-subtitle">Accessing institutional research assets</p>
            </div>
            @can('create', App\Models\Project::class)
            <a href="{{ route('projects.create') }}" class="btn-primary">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Register New Initiative
            </a>
            @endcan
        </div>

        <!-- Table -->
        <div style="overflow-x: auto;">
            <table class="premium-table">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 15%;">Project Code</th>
                        <th style="width: 25%;">Project Title</th>
                        <th style="width: 20%;">Lead Investigator</th>
                        <th style="width: 15%;">Directorate</th>
                        <th style="width: 10%;">Rating</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $proj)
                    <tr>
                        <td style="font-weight: 700; color: #94a3b8; text-align: center;">
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <div class="reference-badge">{{ $proj->project_code ?? 'NEW' }}</div>
                        </td>
                        <td>
                            <a href="{{ route('projects.show', $proj->id) }}" class="project-title-link">
                                <div class="project-title">{{ $proj->research_title }}</div>
                            </a>
                            <div class="project-meta">
                                <span style="font-size: 0.75rem; color: #64748b; font-weight: 600;">{{ $proj->start_year }} - {{ $proj->end_year ?? 'Ongoing' }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="user-cell">
                                @php
                                    $rawName = $proj->pi?->full_name ?? 'Staff';
                                    $cleanName = preg_replace('/^(Dr\.|Mr\.|Ms\.|Mrs\.)\s+/i', '', $rawName);
                                    $initial = substr($cleanName, 0, 1);
                                @endphp
                                <div class="user-avatar" style="background: linear-gradient(135deg, {{ $loop->even ? '#6366f1, #4f46e5' : '#0ea5e9, #0284c7' }});">
                                    {{ $initial }}
                                </div>
                                <div class="user-name">{{ $rawName }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="directorate-pill">
                                {{ $proj->directorate?->name ?? 'N/A' }}
                            </div>
                        </td>
                        <td>
                            @php
                                $evalCount = $proj->evaluations()->count();
                                $avgScore = $proj->evaluations()->avg('total_score');
                            @endphp
                            @if($evalCount > 0)
                                <div class="score-display">
                                    <div class="score-value">{{ number_format($avgScore, 1) }}%</div>
                                    <div class="score-meta">{{ $evalCount === 1 ? 'Single Review' : 'Peer Consensus' }}</div>
                                </div>
                            @else
                                <span style="color: #cbd5e1; font-size: 0.75rem; font-weight: 700;">PENDING</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $statusColor = match($proj->status) {
                                    'ACTIVE' => 'green',
                                    'REGISTERED' => 'blue',
                                    'FINALIZED' => 'purple', 
                                    default => 'gray'
                                };
                                $statusLabel = match($proj->status) {
                                    'REGISTERED' => 'NEW',
                                    default => str_replace('_', ' ', $proj->status)
                                };
                            @endphp
                            <span class="status-badge {{ $statusColor }}">{{ $statusLabel }}</span>
                        </td>
                        <td style="text-align: right;">
                            <div class="actions-cell">
                                @can('update', $proj)
                                <a href="{{ route('projects.edit', $proj->id) }}" class="action-btn" title="Edit Plan">
                                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                @endcan

                                @can('delete', $proj)
                                <form action="{{ route('projects.destroy', $proj->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete" title="Delete Project">
                                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                                @endcan
                                
                                @can('create', App\Models\Evaluation::class)
                                    @if($proj->status === 'REGISTERED')
                                        <a href="{{ auth()->user()->isAdmin() ? route('evaluation-assignments.create', ['project_id' => $proj->id]) : route('evaluations.create', ['project_id' => $proj->id]) }}" class="action-btn highlight" title="{{ auth()->user()->isAdmin() ? 'Assign Evaluator & Link' : 'Evaluate Project' }}">
                                            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                        </a>
                                    @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 5rem;">
                            <div style="font-size: 1.1rem; font-weight: 700; color: #94a3b8;">No projects found in the registry.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* Premium Card Container */
    .premium-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        padding: 3rem;
        border: 1px solid #f1f5f9;
        min-height: 80vh;
    }

    /* Header */
    .card-header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f8fafc;
    }

    .card-title {
        font-size: 1.75rem;
        font-weight: 950;
        color: var(--brand-blue);
        margin: 0;
        letter-spacing: -0.03em;
    }

    .card-title .highlight {
        color: var(--brand-green);
    }

    .card-subtitle {
        color: #64748b;
        font-weight: 600;
        font-size: 1rem;
        margin-top: 0.25rem;
    }

    /* Primary Button */
    .btn-primary {
        background: linear-gradient(135deg, var(--brand-green), #059669);
        color: white;
        padding: 0.9rem 1.75rem;
        border-radius: 12px;
        font-weight: 800;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(0, 139, 75, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 139, 75, 0.3);
    }

    /* Table Styling */
    .premium-table {
        width: 100%;
        border-collapse: separate; /* Allows spacing between rows */
        border-spacing: 0 1rem; /* Spacing between rows */
    }

    .premium-table thead th {
        text-transform: uppercase;
        font-size: 0.75rem;
        font-weight: 800;
        color: #64748b;
        letter-spacing: 0.05em;
        padding: 0 1rem;
        text-align: left;
    }

    .premium-table tbody tr {
        background: white;
        transition: all 0.2s ease;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }

    .premium-table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        z-index: 10;
        position: relative;
    }

    .premium-table td {
        padding: 1.25rem 1rem;
        vertical-align: middle;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .premium-table td:first-child {
        border-left: 1px solid #f1f5f9;
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
    }
    
    .premium-table td:last-child {
        border-right: 1px solid #f1f5f9;
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    /* Reference Badge */
    .reference-badge {
        background: #f1f5f9;
        color: var(--brand-blue);
        font-weight: 900;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.8rem;
        display: inline-block;
    }

    /* Project Info */
    .project-title {
        font-weight: 800;
        color: var(--brand-blue);
        font-size: 1rem;
        margin-bottom: 0.35rem;
        line-height: 1.4;
    }

    .project-meta {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.8rem;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.35rem;
        color: #64748b;
        font-weight: 600;
    }
    
    .meta-dot {
        width: 3px; 
        height: 3px; 
        background: #cbd5e1; 
        border-radius: 50%;
    }
    
    .meta-validated {
        color: var(--brand-green); 
        font-weight: 800; 
        text-transform: uppercase; 
        font-size: 0.7rem; 
        letter-spacing: 0.05em;
    }

    /* User Cell */
    .user-cell {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .user-avatar {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 0.9rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    .user-name {
        font-weight: 700;
        color: #334155;
        font-size: 0.95rem;
    }

    /* Directorate Pill */
    .directorate-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.35rem 0.75rem;
        background: #f8fafc;
        border-radius: 99px;
        font-size: 0.75rem;
        font-weight: 700;
        color: #475569;
        border: 1px solid #e2e8f0;
    }
    
    .project-title-link {
        text-decoration: none;
        display: block;
        margin-bottom: 0.25rem;
    }
    
    .project-title-link .project-title {
        transition: color 0.2s ease;
    }
    
    .project-title-link:hover .project-title {
        color: var(--brand-green);
        text-decoration: underline;
        text-decoration-color: var(--brand-green);
        text-decoration-thickness: 2px;
        text-underline-offset: 2px;
    }

    /* Status Badges */
    .status-badge {
        font-size: 0.7rem;
        font-weight: 900;
        padding: 0.35rem 0.75rem;
        border-radius: 8px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: inline-block;
    }
    
    .status-badge.green { background: #dcfce7; color: #166534; }
    .status-badge.blue { background: #dbeafe; color: #1e40af; }
    .status-badge.purple { background: #f3e8ff; color: #6b21a8; }
    .status-badge.gray { background: #f1f5f9; color: #475569; }

    /* Action Buttons */
    .actions-cell {
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        color: #64748b;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .action-btn:hover {
        background: #f1f5f9;
        color: var(--brand-blue);
    }
    
    .action-btn.highlight {
        color: var(--brand-blue);
        background: #e0f2fe;
    }
    
    .action-btn.highlight:hover {
        background: #bae6fd;
    }

    .action-btn.delete:hover {
        background: #fee2e2;
        color: #ef4444;
    }
    
    button.action-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
    }
    .score-display { text-align: center; }
    .score-value { font-weight: 950; color: var(--brand-blue); font-size: 1.1rem; line-height: 1; }
    .score-meta { font-size: 0.65rem; color: #94a3b8; font-weight: 800; text-transform: uppercase; margin-top: 2px; }

</style>
@endsection
