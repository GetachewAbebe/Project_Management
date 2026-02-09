@extends('layouts.app')

@section('title', 'Directorate Registry')
@section('header_title', 'Institutional Governance')

@section('content')
<div class="card animate-up">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3.5rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 2rem;">
        <div>
            <h3 style="font-size: 1.75rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.04em; margin: 0;">Directorate <span style="color: var(--brand-green);">Registry</span></h3>
            <p style="font-size: 0.95rem; color: #64748b; font-weight: 700; margin-top: 0.5rem;">Institutional departments and governance units</p>
        </div>
        @can('create', App\Models\Directorate::class)
        <a href="{{ route('directorates.create') }}" class="btn-primary" style="text-decoration: none; padding: 1.1rem 2.25rem; font-size: 0.95rem;">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.75rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
            Register New Directorate
        </a>
        @endcan
    </div>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-spacing: 0 1rem; border-collapse: separate;">
            <thead>
                <tr>
                    <th style="padding-left: 1.5rem;">Unit Identifier</th>
                    <th>Directorate Name</th>
                    <th>Date Established</th>
                    <th style="text-align: right; padding-right: 1.5rem;">Management Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($directorates as $dir)
                <tr class="premium-row">
                    <td style="padding-left: 1.5rem;">
                        <span style="font-family: inherit; font-weight: 900; color: var(--brand-blue); background: #f4f7fa; padding: 0.6rem 1rem; border-radius: 12px; font-size: 0.85rem; border: 1px solid #eef2f6;">
                            #ID-{{ str_pad($dir->id, 3, '0', STR_PAD_LEFT) }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 1.25rem;">
                            <div style="width: 48px; height: 48px; background: rgba(0, 59, 92, 0.05); color: var(--brand-blue); border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <div style="font-weight: 900; color: var(--brand-blue); font-size: 1.15rem; letter-spacing: -0.02em;">{{ $dir->name }}</div>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; flex-direction: column;">
                            <div style="font-weight: 800; color: #475569; font-size: 1rem;">{{ $dir->created_at->format('M d, Y') }}</div>
                            <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.02em;">Registry Date</div>
                        </div>
                    </td>
                    <td style="text-align: right; padding-right: 1.5rem;">
                        <div style="display: flex; gap: 1rem; justify-content: flex-end; align-items: center;">
                            <a href="{{ route('directorates.edit', $dir->id) }}" class="btn-secondary" style="padding: 0.65rem 1.4rem; font-size: 0.85rem; text-decoration: none;">Rename</a>
                            <form action="{{ route('directorates.destroy', $dir->id) }}" method="POST" onsubmit="return confirm('Completely remove this directorate? This may affect associated personnel and projects.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: rgba(239, 68, 68, 0.05); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); padding: 0.65rem 1.4rem; border-radius: 14px; font-weight: 800; font-size: 0.85rem; cursor: pointer; transition: all 0.3s ease; text-transform: uppercase;">Abolish Unit</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 7rem;">
                        <div style="display: flex; flex-direction: column; align-items: center; gap: 1.5rem;">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="60" style="opacity: 0.15; color: var(--brand-blue);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            <div style="font-size: 1.15rem; font-weight: 800; color: #94a3b8;">No directorates registered in the institutional governance model.</div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
