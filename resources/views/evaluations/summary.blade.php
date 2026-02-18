@extends('layouts.app')

@section('title', 'Evaluation Summary Report')
@section('header_title', 'Performance Analytics')

@section('content')
<div style="max-width: 1400px; margin: 0 auto; padding-bottom: 5rem;">
    <div class="premium-card">
        <div class="card-header-flex">
            <div>
                <h3 class="card-title">Evaluation <span class="highlight">Summary Report</span></h3>
                <p class="card-subtitle">Formal institutional research performance overview</p>
            </div>
            <div style="display: flex; gap: 1rem;">
                <a href="{{ route('evaluations.summary.export') }}" class="btn-secondary" style="background: #2b5797; border-color: #2b5797; color: white;">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Export to Word
                </a>
                <button onclick="window.print()" class="btn-secondary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 8px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    Print Report
                </button>
            </div>
        </div>

        <!-- Executive Summary Paragraphs -->
        <div style="margin-top: 2rem; padding: 1.5rem; background: #f8fafc; border-radius: 16px; border: 1px solid #e2e8f0; line-height: 1.6; color: #334155;">
            <p style="margin-bottom: 1rem; font-size: 1rem;">
                Currently, the institute is overseeing a total of <strong>{{ $stats['total'] }}</strong> research initiatives. Out of these, <strong>{{ $stats['evaluated'] }}</strong> projects have undergone the formal evaluation process by our expert panel, while <strong>{{ $stats['unevaluated'] }}</strong> initiatives are currently awaiting evaluation as per the institutional registry.
            </p>
            <p style="font-size: 1rem;">
                From the evaluated initiatives, <strong>{{ $stats['accepted'] }}</strong> projects have successfully met the institutional quality standards with an average score above 70%, while <strong>{{ $stats['unaccepted'] }}</strong> projects have been categorized as unaccepted due to performance results below the required threshold.
            </p>
        </div>

        <div style="overflow-x: auto; margin-top: 2rem;">
            <table class="report-table">
                <thead>
                    <tr>
                        <th rowspan="2" style="width: 50px;">No.</th>
                        <th rowspan="2" style="width: 150px;">Directorate</th>
                        <th rowspan="2" style="width: 150px;">Principal investigator</th>
                        <th rowspan="2" style="width: 200px;">Project title</th>
                        <th colspan="2">Evaluation score from 100</th>
                        <th rowspan="2" style="width: 80px;">Average</th>
                        <th rowspan="2" style="width: 100px;">Remark</th>
                        <th rowspan="2" style="width: 250px;">Comments</th>
                    </tr>
                    <tr>
                        <th style="width: 90px; border-top: 1px solid #000;">Evaluator 1</th>
                        <th style="width: 90px; border-top: 1px solid #000;">Evaluator 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        @php
                            $evals = $project->evaluations->sortBy('created_at')->values();
                            $score1 = $evals->get(0)?->total_score ?? '-';
                            $score2 = $evals->get(1)?->total_score ?? '-';
                            
                            $comments = $evals->map(function($e, $index) {
                                return "<strong>Evaluator " . ($index + 1) . "</strong>: " . ($e->comments ?: 'No comments');
                            })->implode('<br>');

                            $average = '-';
                            if (is_numeric($score1) && is_numeric($score2)) {
                                $average = ($score1 + $score2) / 2;
                            } elseif (is_numeric($score1)) {
                                $average = $score1;
                            }

                            $remark = 'Unevaluated';
                            if ($evals->count() > 0) {
                                if (is_numeric($average)) {
                                    $remark = $average >= 70 ? 'Accepted' : 'Unaccepted';
                                } else {
                                    $remark = 'Pending';
                                }
                            }
                        @endphp
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="font-weight: 800;">{{ $project->directorate?->name }}</td>
                            <td style="font-weight: 800;">{{ $project->pi?->full_name }}</td>
                            <td>{{ $project->research_title }}</td>
                            <td style="text-align: center;">{{ is_numeric($score1) ? round($score1, 1) : $score1 }}</td>
                            <td style="text-align: center;">{{ is_numeric($score2) ? round($score2, 1) : $score2 }}</td>
                            <td style="text-align: center; font-weight: 900;">{{ is_numeric($average) ? round($average, 1) : $average }}</td>
                            <td style="font-weight: 900; color: {{ $remark === 'Accepted' ? '#059669' : ($remark === 'Unaccepted' ? '#dc2626' : '#94a3b8') }}">
                                {{ $remark }}
                            </td>
                            <td style="font-size: 0.8rem; line-height: 1.4;">
                                {!! $comments ?: '<span style="color: #94a3b8 italic;">No evaluators assigned</span>' !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .report-table {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid #000;
        font-family: 'Inter', sans-serif;
    }

    .report-table th, .report-table td {
        border: 1px solid #000;
        padding: 12px 15px;
        text-align: left;
        color: #000;
        font-size: 0.95rem;
    }

    .report-table thead th {
        background: #f8fafc;
        font-weight: 950;
        text-align: center;
        text-transform: capitalize;
    }

    .report-table tbody tr:hover {
        background: rgba(0,0,0,0.02);
    }

    @media print {
        .app-footer, .sidebar, .institutional-header, .btn-secondary, .card-subtitle {
            display: none !important;
        }
        .main-content {
            margin: 0 !important;
            padding: 0 !important;
        }
        .report-table {
            border: 2px solid #000 !important;
        }
        .report-table th, .report-table td {
            border: 1px solid #000 !important;
        }
    }
</style>
@endsection
