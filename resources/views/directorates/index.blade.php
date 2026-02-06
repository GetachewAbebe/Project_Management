@extends('layouts.app')

@section('title', 'Directorates')
@section('header_title', 'Institutional Directorates')

@section('content')
<div style="display: flex; justify-content: flex-end; margin-bottom: 2rem;">
    <a href="{{ route('directorates.create') }}" class="btn btn-primary">
        + Register New Directorate
    </a>
</div>

<div class="card">
    <div style="margin-bottom: 2rem;">
        <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--primary-navy);">Directorate Registry</h3>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Institutional departments and governance units.</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Directorate Name</th>
                <th>Registered Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($directorates as $dir)
            <tr>
                <td style="font-size: 0.8rem; font-family: monospace; color: var(--text-muted);">#ID-{{ str_pad($dir->id, 3, '0', STR_PAD_LEFT) }}</td>
                <td>
                    <div style="font-weight: 700; color: var(--primary-navy); font-size: 0.9rem;">{{ $dir->name }}</div>
                </td>
                <td style="font-size: 0.85rem; color: var(--text-muted);">{{ $dir->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('directorates.edit', $dir->id) }}" style="color: var(--primary-navy); font-weight: 700; text-decoration: none; margin-right: 1rem; font-size: 0.85rem;">Edit</a>
                    <form action="{{ route('directorates.destroy', $dir->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: #b91c1c; font-weight: 700; background: none; border: none; cursor: pointer; font-size: 0.85rem;" onclick="return confirm('Completely remove this directorate? This may affect associated personnel and projects.')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 4rem;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="48" style="opacity: 0.2; margin-bottom: 1rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    <div>No directorates registered in the institutional governance model.</div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
