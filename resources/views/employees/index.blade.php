@extends('layouts.app')

@section('title', 'Employees')
@section('header_title', 'Staff Management')

@section('content')
<div style="display: flex; justify-content: flex-end; margin-bottom: 2rem;">
    <a href="{{ route('employees.create') }}" class="btn btn-primary">
        + Enroll New Staff Member
    </a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Full Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Employee ID</th>
                <th>System Access</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $emp)
            <tr>
                <td style="font-weight: 700; color: var(--text-muted); font-size: 0.85rem; width: 40px;">{{ $loop->iteration }}</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <div style="width: 32px; height: 32px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: var(--primary-navy); font-size: 0.75rem;">
                            {{ substr($emp->full_name, 0, 1) }}
                        </div>
                        <div>
                            <div style="font-weight: 700; color: var(--primary-navy); font-size: 0.9rem;">{{ $emp->full_name }}</div>
                            <div style="font-size: 0.7rem; color: var(--text-muted);">{{ $emp->email }}</div>
                        </div>
                    </div>
                </td>
                <td style="font-size: 0.85rem; font-weight: 600; color: var(--text-main);">{{ $emp->directorate->name }}</td>
                <td style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">{{ $emp->position ?? 'Staff' }}</td>
                <td style="font-size: 0.8rem; font-family: monospace; color: var(--text-muted);">{{ $emp->institutional_id ?? '---' }}</td>
                <td>
                    @if($emp->system_role === 'director')
                        <span style="font-size: 0.65rem; background: #eff6ff; color: #1e40af; padding: 2px 8px; border-radius: 12px; font-weight: 800; text-transform: uppercase;">Director Access</span>
                    @else
                        <span style="font-size: 0.65rem; background: #f1f5f9; color: #64748b; padding: 2px 8px; border-radius: 12px; font-weight: 800; text-transform: uppercase;">Registry Only</span>
                    @endif
                    
                    @if($emp->user)
                        <div style="font-size: 0.6rem; color: #166534; font-weight: 700; margin-top: 4px; display: flex; align-items: center; gap: 4px;">
                            <div style="width: 6px; height: 6px; background: #22c55e; border-radius: 50%;"></div>
                            Portal Active
                        </div>
                    @elseif($emp->system_role === 'director')
                        <div style="font-size: 0.6rem; color: #94a3b8; font-weight: 700; margin-top: 4px; display: flex; align-items: center; gap: 4px;">
                            <div style="width: 6px; height: 6px; background: #cbd5e1; border-radius: 50%;"></div>
                            Invitation Pending
                        </div>
                    @endif
                </td>
                <td>
                    <a href="{{ route('employees.edit', $emp->id) }}" style="color: var(--primary-navy); font-weight: 700; text-decoration: none; margin-right: 1rem; font-size: 0.85rem;">Edit</a>
                    <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: #b91c1c; font-weight: 700; background: none; border: none; cursor: pointer; font-size: 0.85rem;" onclick="return confirm('Completely remove this staff member and all associated system credentials?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 4rem;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="48" style="opacity: 0.2; margin-bottom: 1rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    <div>No staff members enrolled in the institutional registry.</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
