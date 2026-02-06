@extends('layouts.app')

@section('title', 'Projects')
@section('header_title', 'Research Portfolio')

@section('content')
<div style="display: flex; justify-content: flex-end; margin-bottom: 2rem;">
    <a href="{{ route('projects.create') }}" class="btn btn-primary">
        + Register Project
    </a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>PI</th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $proj)
            <tr>
                <td style="font-weight: 700; color: var(--text-muted); font-size: 0.85rem; width: 40px;">{{ $loop->iteration }}</td>
                <td>{{ $proj->pi->full_name }}</td>
                <td style="font-weight: 700;">
                    <a href="{{ route('projects.show', $proj->id) }}" style="color: var(--primary-navy); text-decoration: none; border-bottom: 2px solid #e2e8f0; padding-bottom: 2px; transition: all 0.2s;" onmouseover="this.style.borderColor='var(--primary-green)'" onmouseout="this.style.borderColor='#e2e8f0'">
                        {{ $proj->research_title }}
                    </a>
                </td>
                <td>{{ $proj->start_year ?? '-' }}</td>
                <td>{{ $proj->end_year ?? '-' }}</td>
                <td>
                    @php
                        $statusColors = [
                            'REGISTERED' => ['bg' => '#f1f5f9', 'text' => '#64748b', 'label' => 'NEW'],
                            'ONGOING' => ['bg' => '#dcfce7', 'text' => '#166534', 'label' => 'ONGOING'],
                            'COMPLETED' => ['bg' => '#dbeafe', 'text' => '#1e40af', 'label' => 'COMPLETED'],
                            'EVALUATED' => ['bg' => '#f5f3ff', 'text' => '#5b21b6', 'label' => 'EVALUATED'],
                        ];
                        $st = $statusColors[strtoupper($proj->status)] ?? ['bg' => '#f1f5f9', 'text' => '#64748b', 'label' => $proj->status];
                    @endphp
                    <span class="status-pill" style="background: {{ $st['bg'] }}; color: {{ $st['text'] }}; font-weight: 800; font-size: 0.7rem;">
                        {{ $st['label'] }}
                    </span>
                </td>
                <td style="font-family: monospace; font-size: 0.8rem;">{{ $proj->project_code }}</td>
                <td>
                    @php
                        $user = auth()->user();
                        $canManage = $user->isAdmin() || ($user->isDirector() && $proj->directorate_id == $user->directorate_id);
                    @endphp

                    @if($canManage)
                        @if($proj->status === 'REGISTERED')
                            <a href="{{ route('evaluations.create', ['project_id' => $proj->id]) }}" style="color: var(--primary-green); font-weight: 700; text-decoration: none; margin-right: 1rem;">Evaluate</a>
                        @endif
                        <a href="{{ route('projects.edit', $proj->id) }}" style="color: var(--primary-navy); font-weight: 400; text-decoration: none; margin-right: 1rem;">Edit</a>
                    @else
                        <span style="font-size: 0.7rem; color: var(--text-muted); font-style: italic; font-weight: 600;">Read Only</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center; color: var(--text-muted); padding: 3rem;">No projects registered yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
