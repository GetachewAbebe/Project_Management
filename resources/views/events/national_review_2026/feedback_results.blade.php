@extends('layouts.app')

@section('title', 'Review Feedback Results')

@section('content')
<div class="feedback-dashboard">
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 font-weight-bold text-dark">Participant Feedback</h1>
                <p class="text-muted">Insights from the 8th National Research Review attendees.</p>
            </div>
            <div class="stats-overview d-flex gap-4">
                <div class="stat-item text-center px-4 py-2 bg-white rounded shadow-sm border">
                    <div class="h4 mb-0 font-weight-bold">{{ count($feedbacks) }}</div>
                    <small class="text-uppercase font-weight-bold text-muted" style="font-size: 0.65rem;">Total Submissions</small>
                </div>
                <div class="stat-item text-center px-4 py-2 bg-white rounded shadow-sm border">
                    <div class="h4 mb-0 font-weight-bold text-success">{{ number_format($feedbacks->avg('event_rating'), 1) }}</div>
                    <small class="text-uppercase font-weight-bold text-muted" style="font-size: 0.65rem;">Avg Event Rating</small>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-lg overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" style="vertical-align: middle;">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 px-4 py-3">Participant</th>
                                <th class="border-0 py-3">Organization & Role</th>
                                <th class="border-0 py-3 text-center">Ratings (E/T/L)</th>
                                <th class="border-0 py-3">Feedback Highlights</th>
                                <th class="border-0 py-3">Intent</th>
                                <th class="border-0 px-4 py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($feedbacks as $item)
                            <tr>
                                <td class="px-4">
                                    <div class="font-weight-bold">{{ $item->full_name }}</div>
                                    <small class="text-muted">{{ $item->email }}</small>
                                </td>
                                <td>
                                    <div class="badge badge-light border text-dark">{{ $item->role ?? 'N/A' }}</div>
                                    <div class="small text-muted mt-1">{{ $item->organization }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <span class="badge {{ $item->event_rating >= 4 ? 'badge-success' : 'badge-warning' }}" title="Event">{{ $item->event_rating }}</span>
                                        <span class="badge {{ $item->technical_rating >= 4 ? 'badge-success' : 'badge-warning' }}" title="Technical">{{ $item->technical_rating }}</span>
                                        <span class="badge {{ $item->logistics_rating >= 4 ? 'badge-success' : 'badge-warning' }}" title="Logistics">{{ $item->logistics_rating }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 300px;" title="{{ $item->comments }}">
                                        {{ $item->comments ?? 'No additional remarks.' }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge {{ $item->future_attendance == 'Yes' ? 'badge-success' : 'badge-secondary' }}">
                                        {{ $item->future_attendance }}
                                    </span>
                                </td>
                                <td class="px-4">
                                    <small class="font-weight-bold text-muted">{{ $item->created_at->format('M d, Y') }}</small>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">No feedback submitted yet.</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($feedbacks instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="card-footer bg-white border-top-0 py-3">
                {{ $feedbacks->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .feedback-dashboard { background: #f4f7f6; min-height: 90vh; }
    .table th { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b; font-weight: 800; }
    .table td { border-top: 1px solid #f1f5f9; padding-top: 1.25rem; padding-bottom: 1.25rem; }
    .badge { padding: 0.5em 0.8em; font-weight: 700; border-radius: 6px; }
    .badge-success { background-color: #ecfdf5; color: #059669; }
    .badge-warning { background-color: #fffbeb; color: #d97706; }
    .badge-secondary { background-color: #f1f5f9; color: #475569; }
    .badge-light { background-color: #f8fafc; }
</style>
@endsection
