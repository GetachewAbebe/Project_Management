@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: #f8fafc; min-height: 92vh; padding: 2rem;">
    <div class="max-w-7xl mx-auto">
        <div class="card-header-flex" style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1 style="font-size: 2rem; font-weight: 950; color: #1e293b; letter-spacing: -0.025em;">Secure Evaluation Links</h1>
                <p style="color: #64748b; font-weight: 600;">Managing authorized access for scientific project reviews.</p>
            </div>
            <a href="{{ route('evaluation-assignments.create') }}" class="btn-primary-shared" style="text-decoration: none; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, #6366f1, #4f46e5); border-radius: 10px; color: white; font-weight: 700; display: flex; align-items: center; gap: 0.5rem; box-shadow: 0 4px 15px rgba(99, 102, 241, 0.2);">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                New Assignment
            </a>
        </div>

        @if(session('success'))
            <div style="background: #ecfdf5; border-left: 4px solid #10b981; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; color: #065f46; font-weight: 700; display: flex; align-items: center; gap: 0.75rem;">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="premium-card-shared" style="background: white; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #f1f5f9; overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: #f8fafc; border-bottom: 1px solid #f1f5f9;">
                    <tr>
                        <th style="padding: 1.25rem; text-align: left; color: #64748b; font-weight: 800; text-transform: uppercase; font-size: 0.75rem;">Evaluation Assignment</th>
                        <th style="padding: 1.25rem; text-align: left; color: #64748b; font-weight: 800; text-transform: uppercase; font-size: 0.75rem;">Secure Evaluation Link</th>
                        <th style="padding: 1.25rem; text-align: center; color: #64748b; font-weight: 800; text-transform: uppercase; font-size: 0.75rem;">Status</th>
                        <th style="padding: 1.25rem; text-align: right; color: #64748b; font-weight: 800; text-transform: uppercase; font-size: 0.75rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($assignments as $assignment)
                    <tr style="border-bottom: 1px solid #f8fafc;">
                        <td style="padding: 1.5rem;">
                            <div style="font-weight: 800; color: #1e293b; font-size: 0.95rem; margin-bottom: 0.25rem;">{{ $assignment->project->research_title }}</div>
                            <div style="display: flex; flex-direction: column; gap: 0.25rem;">
                                <div style="display: flex; align-items: center; gap: 0.5rem; color: #475569; font-weight: 700; font-size: 0.85rem;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    {{ $assignment->evaluator->full_name }}
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.5rem; color: #94a3b8; font-weight: 600; font-size: 0.75rem; padding-left: 1.4rem;">
                                    {{ $assignment->evaluator->email }}
                                </div>
                            </div>
                        </td>
                        <td style="padding: 1.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <input type="text" value="{{ route('evaluate.public', $assignment->token) }}" readonly style="flex: 1; min-width: 300px; padding: 0.5rem 1rem; border-radius: 8px; border: 1px solid #e2e8f0; background: #f8fafc; color: #64748b; font-family: monospace; font-size: 0.8rem;">
                                <button onclick="copyToClipboard('{{ route('evaluate.public', $assignment->token) }}', this)" style="padding: 0.5rem; background: #f1f5f9; border: none; border-radius: 8px; cursor: pointer; color: #475569;" title="Copy Link">
                                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                </button>
                            </div>
                            @if($assignment->expires_at)
                                <div style="font-size: 0.7rem; color: #94a3b8; font-weight: 700; margin-top: 0.4rem; text-transform: uppercase;">Expires: {{ $assignment->expires_at->format('M d, Y') }}</div>
                            @endif
                        </td>
                        <td style="padding: 1.5rem; text-align: center;">
                            @php
                                $statusColor = match($assignment->status) {
                                    'PENDING' => '#6366f1',
                                    'COMPLETED' => '#10b981',
                                    'EXPIRED' => '#ef4444',
                                    default => '#94a3b8'
                                };
                                $bgColor = match($assignment->status) {
                                    'PENDING' => '#eef2ff',
                                    'COMPLETED' => '#ecfdf5',
                                    'EXPIRED' => '#fef2f2',
                                    default => '#f8fafc'
                                };
                            @endphp
                            <span style="display: inline-block; padding: 0.4rem 0.8rem; border-radius: 20px; background: {{ $bgColor }}; color: {{ $statusColor }}; font-size: 0.75rem; font-weight: 900;">{{ $assignment->status }}</span>
                        </td>
                        <td style="padding: 1.5rem; text-align: right;">
                            <form action="{{ route('evaluation-assignments.destroy', $assignment->id) }}" method="POST" onsubmit="return confirm('Revoke this link? The evaluator will no longer be able to access the form.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 0.6rem; background: #fff1f2; border: none; border-radius: 8px; cursor: pointer; color: #e11d48;" title="Revoke Link">
                                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="padding: 5rem; text-align: center; color: #94a3b8; font-weight: 700;">No evaluation links generated yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text, btn) {
        navigator.clipboard.writeText(text).then(() => {
            const originalIcon = btn.innerHTML;
            btn.innerHTML = '<svg width="18" height="18" fill="none" stroke="#10b981" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>';
            setTimeout(() => {
                btn.innerHTML = originalIcon;
            }, 2000);
        });
    }
</script>
@endsection
