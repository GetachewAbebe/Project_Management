@extends('layouts.app')

@section('title', 'Institutional Registry')
@section('header_title', 'Personnel Directory')

@section('content')
<div class="card animate-up">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3.5rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 2rem; flex-wrap: wrap; gap: 1.5rem;">
        <div>
            <h3 style="font-size: 1.75rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.04em; margin: 0;">Staff <span style="color: var(--brand-green);">Directory</span></h3>
            <p style="font-size: 0.95rem; color: #64748b; font-weight: 700; margin-top: 0.5rem;">
                {{ $employees->total() }} staff member{{ $employees->total() !== 1 ? 's' : '' }} registered
            </p>
        </div>

        <div style="display: flex; gap: 1.25rem; align-items: center; flex-wrap: wrap;">
            @can('create', App\Models\Employee::class)
            <a href="{{ route('employees.create') }}" class="btn-primary" style="text-decoration: none; padding: 1.1rem 2.25rem; font-size: 0.95rem;">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.75rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Register
            </a>
            @endcan
        </div>
    </div>

    <!-- Server-side filters -->
    <form method="GET" action="{{ route('employees.index') }}" style="display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap; align-items: center;">
        <div class="search-container" style="flex: 1; min-width: 220px;">
            <svg class="search-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by name, email, or ID..."
                class="search-input"
                x-on:input.debounce.400ms="$el.closest('form').submit()"
            >
        </div>

        @if(auth()->user()->isAdmin() && $directorates->count())
        <select name="directorate_id" class="filter-select" onchange="this.form.submit()">
            <option value="">All Directorates</option>
            @foreach($directorates as $dir)
            <option value="{{ $dir->id }}" {{ request('directorate_id') == $dir->id ? 'selected' : '' }}>{{ $dir->name }}</option>
            @endforeach
        </select>
        @endif

        <select name="role" class="filter-select" onchange="this.form.submit()">
            <option value="">All Roles</option>
            <option value="employee" {{ request('role') === 'employee' ? 'selected' : '' }}>Staff</option>
            <option value="director" {{ request('role') === 'director' ? 'selected' : '' }}>Director</option>
            <option value="evaluator" {{ request('role') === 'evaluator' ? 'selected' : '' }}>Evaluator</option>
        </select>

        @if(request()->hasAny(['search', 'directorate_id', 'role']))
        <a href="{{ route('employees.index') }}" style="font-size: 0.8rem; color: #94a3b8; font-weight: 700; text-decoration: none; white-space: nowrap;">Clear filters</a>
        @endif
    </form>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-spacing: 0 1rem; border-collapse: separate;">
            <thead>
                <tr>
                    <th style="padding-left: 1.5rem;">Professional</th>
                    <th>Contact & ID</th>
                    <th>Directorate</th>
                    <th>Access Level</th>
                    <th style="text-align: right;">System Status</th>
                    <th style="text-align: right; padding-right: 1.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $emp)
                @php
                    $accountStatus = match(true) {
                        $emp->user !== null                                                   => ['label' => 'ACTIVE',      'bg' => '#ecfdf5', 'text' => '#059669', 'dot' => '#059669'],
                        $emp->invitation !== null && !$emp->invitation->isExpired()           => ['label' => 'INVITED',     'bg' => '#fffbeb', 'text' => '#d97706', 'dot' => '#f59e0b'],
                        $emp->invitation !== null                                             => ['label' => 'LINK EXPIRED','bg' => '#fff1f2', 'text' => '#e11d48', 'dot' => '#fca5a5'],
                        default                                                               => ['label' => 'NO ACCOUNT',  'bg' => '#f8fafc', 'text' => '#94a3b8', 'dot' => '#cbd5e1'],
                    };
                @endphp
                <tr class="premium-row">
                    <td style="padding-left: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 1.25rem;">
                            <div style="width: 54px; height: 54px; background: linear-gradient(135deg, var(--brand-blue) 0%, #002d4a 100%); color: white; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.25rem; box-shadow: 0 4px 12px rgba(0, 59, 92, 0.15);">
                                {{ substr($emp->full_name, 0, 1) }}
                            </div>
                            <div>
                                <div style="font-weight: 900; color: var(--brand-blue); font-size: 1.1rem; letter-spacing: -0.01em;">{{ $emp->full_name }}</div>
                                <div style="font-size: 0.8rem; color: var(--brand-green); font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 2px;">{{ $emp->position ?? 'Professional Staff' }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 800; font-size: 0.95rem; color: #334155; margin-bottom: 0.4rem;">{{ $emp->email ?? '—' }}</div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <span style="font-size: 0.75rem; color: #94a3b8; font-weight: 800; text-transform: uppercase;">ID:</span>
                            <span style="font-size: 0.8rem; background: #f4f7fa; color: var(--brand-blue); font-weight: 900; padding: 2px 8px; border-radius: 6px; border: 1px solid #eef2f6;">{{ $emp->institutional_id ?? '—' }}</span>
                        </div>
                    </td>
                    <td>
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.25rem; background: rgba(0, 139, 75, 0.05); border-radius: 12px; border: 1px solid rgba(0, 139, 75, 0.1);">
                            <div style="width: 6px; height: 6px; background: var(--brand-green); border-radius: 50%;"></div>
                            <span style="font-size: 0.9rem; font-weight: 800; color: var(--brand-green);">{{ $emp->directorate->name ?? 'N/A' }}</span>
                        </div>
                    </td>
                    <td>
                        <div style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.5rem 1rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--brand-blue);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            <span style="font-size: 0.8rem; font-weight: 900; color: var(--brand-blue); text-transform: uppercase;">{{ $emp->user?->role ?? ucfirst($emp->system_role) }}</span>
                        </div>
                    </td>
                    <td style="text-align: right;">
                        <span style="display: inline-flex; align-items: center; gap: 0.5rem; color: {{ $accountStatus['text'] }}; font-weight: 900; font-size: 0.75rem; background: {{ $accountStatus['bg'] }}; padding: 0.5rem 1.25rem; border-radius: 30px; letter-spacing: 0.05em;">
                            <span style="width: 6px; height: 6px; background: {{ $accountStatus['dot'] }}; border-radius: 50%;"></span>
                            {{ $accountStatus['label'] }}
                        </span>
                    </td>
                    <td style="text-align: right; padding-right: 1.5rem;">
                        <div style="display: flex; gap: 0.75rem; justify-content: flex-end; align-items: center;">
                            @can('update', $emp)
                            <a href="{{ route('employees.edit', $emp->id) }}" class="btn-secondary" style="padding: 0.6rem 1.2rem; font-size: 0.85rem; text-decoration: none;">Update Info</a>
                            @endcan
                            @can('delete', $emp)
                            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" onsubmit="return confirm('Archive this staff record? Their login access will be suspended.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: rgba(239, 68, 68, 0.05); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); padding: 0.6rem 1.25rem; border-radius: 12px; font-weight: 800; font-size: 0.85rem; cursor: pointer; transition: all 0.2s; text-transform: uppercase; letter-spacing: 0.03em;">Archive</button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 5rem 2rem; color: #94a3b8; font-weight: 700;">
                        @if(request()->hasAny(['search', 'directorate_id', 'role']))
                            No staff members match your search criteria.
                        @else
                            No staff members registered yet.
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($employees->hasPages())
    <div style="margin-top: 1.5rem; display: flex; justify-content: center;">
        {{ $employees->links() }}
    </div>
    @endif
</div>

<style>
@keyframes pulse {
    0% { transform: scale(0.95); opacity: 0.8; }
    50% { transform: scale(1.1); opacity: 1; }
    100% { transform: scale(0.95); opacity: 0.8; }
}

.search-container {
    position: relative;
}

.search-input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.75rem;
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-family: 'Outfit', sans-serif;
    font-weight: 600;
    color: var(--brand-blue);
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.search-input:focus {
    outline: none;
    border-color: var(--brand-green);
    background: white;
    box-shadow: 0 4px 15px rgba(0, 139, 75, 0.1);
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
}

.filter-select {
    padding: 0.75rem 1rem;
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-family: 'Outfit', sans-serif;
    font-weight: 600;
    color: var(--brand-blue);
    cursor: pointer;
    transition: border-color 0.2s;
}

.filter-select:focus {
    outline: none;
    border-color: var(--brand-green);
}
</style>
@endsection
