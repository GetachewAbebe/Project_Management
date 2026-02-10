@extends('layouts.app')

@section('title', 'Evaluation Report')
@section('header_title', 'Detailed Evaluation Report')

@section('content')
<div style="display: flex; justify-content: space-between; margin-bottom: 2.5rem;">
    <a href="{{ route('evaluations.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main); font-weight: 700; padding: 0.75rem 1.5rem;">
        &larr; Back to History
    </a>
    <button onclick="window.print()" class="btn btn-primary" style="padding: 0.75rem 2rem; font-weight: 800; display: flex; align-items: center; gap: 0.5rem;">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2-2" /></svg>
        Print Report
    </button>
</div>

<div class="card" id="printableArea" style="padding: 4rem; position: relative;">
    <div style="text-align: center; margin-bottom: 4rem; border-bottom: 3px double var(--primary-navy); padding-bottom: 2.5rem;">
        <h2 style="color: var(--primary-navy); font-size: 1.8rem; font-weight: 900; margin-bottom: 0.5rem;">BIO AND EMERGING TECHNOLOGY INSTITUTE (BETin)</h2>
        <h4 style="text-transform: uppercase; letter-spacing: 0.15em; color: var(--text-muted); font-weight: 600;">Individual Research Project Evaluation</h4>
    </div>

    <div style="display: grid; grid-template-columns: 3fr 1fr; gap: 3rem; margin-bottom: 4rem;">
        <div>
            <div style="margin-bottom: 2rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem;">Project Title</label>
                <div style="font-size: 1.4rem; font-weight: 800; color: var(--primary-navy); line-height: 1.4;">{{ $evaluation->project->research_title }}</div>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 0.5rem;">Lead Investigator (PI)</label>
                    <div style="font-weight: 700; color: var(--text-main);">{{ $evaluation->project->pi->full_name }}</div>
                </div>
                <div>
                    <label style="display: block; font-size: 0.75rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 0.5rem;">Directorate</label>
                    <div style="font-weight: 700; color: var(--text-main);">{{ $evaluation->project->directorate->name }}</div>
                </div>
            </div>
        </div>
        <div style="text-align: center; background: #f8fafc; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0;">
            <div style="font-size: 0.7rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; margin-bottom: 0.5rem;">Total Mark</div>
            <div style="font-size: 3rem; font-weight: 900; color: var(--primary-navy); line-height: 1;">{{ number_format($evaluation->total_score, 1) }}%</div>
            <div style="margin-top: 1rem; padding: 0.5rem 1rem; border-radius: 50px; font-weight: 800; font-size: 0.85rem; background: {{ $evaluation->decision === 'SATISFACTORY' ? '#dcfce7' : '#fee2e2' }}; color: {{ $evaluation->decision === 'SATISFACTORY' ? '#15803d' : '#b91c1c' }};">
                {{ $evaluation->decision }}
            </div>
        </div>
    </div>

    <table style="width: 100%; margin-bottom: 4rem;">
        <thead>
            <tr style="background: var(--primary-navy); color: white;">
                <th style="width: 60%; padding: 1rem; text-align: left;">Evaluation Criteria</th>
                <th style="text-align: center; width: 15%;">Weight</th>
                <th style="text-align: center; width: 10%;">Rating</th>
                <th style="text-align: right; width: 15%; padding-right: 1.5rem;">Score</th>
            </tr>
        </thead>
        <tbody style="font-weight: 600;">
            @php
                $criteria = [
                    ['Thematic area alignment', 20, 'thematic_area_mark'],
                    ['Socio-economic Relevance', 25, 'relevance_mark'],
                    ['Research Methodology', 25, 'methodology_mark'],
                    ['Feasibility & Preliminary Results', 20, 'feasibility_mark'],
                    ['Presentation Quality', 10, 'overall_proposal_mark'],
                ];
            @endphp
            @foreach($criteria as $item)
            @php
                $mark = $evaluation->{$item[2]};
                $weighted = ($mark / 5) * $item[1];
            @endphp
            <tr style="border-bottom: 1px solid #edf2f7;">
                <td style="padding: 1.25rem;">{{ $loop->iteration }}. {{ $item[0] }}</td>
                <td style="text-align: center; color: var(--text-muted);">{{ $item[1] }}%</td>
                <td style="text-align: center;">{{ $mark }}</td>
                <td style="text-align: right; padding-right: 1.5rem; color: var(--primary-navy); font-weight: 800;">{{ number_format($weighted, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="background: #f8fafc;">
                <td colspan="3" style="text-align: right; padding: 1.5rem; font-weight: 800; text-transform: uppercase;">Final Weighted Score</td>
                <td style="text-align: right; padding: 1.5rem; font-size: 1.4rem; font-weight: 900; color: var(--primary-navy); padding-right: 1.5rem;">{{ number_format($evaluation->total_score, 1) }}%</td>
            </tr>
        </tfoot>
    </table>

    <div style="background: #ffffff; border: 2px solid #f1f5f9; padding: 2.5rem; border-radius: 12px; margin-bottom: 5rem;">
        <h5 style="text-transform: uppercase; font-size: 0.75rem; font-weight: 900; letter-spacing: 0.1em; color: var(--primary-navy); margin-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 0.5rem;">Evaluator Details & Comments</h5>
        <div style="display: flex; gap: 3rem; margin-bottom: 2rem;">
            <div>
                <div style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 0.25rem;">Evaluator Name</div>
                <div style="font-weight: 800; color: var(--text-main); font-size: 1.1rem;">{{ $evaluation->evaluator->full_name }}</div>
            </div>
            <div>
                <div style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 0.25rem;">Position</div>
                <div style="font-weight: 600; color: var(--text-main);">{{ $evaluation->evaluator->position }}</div>
            </div>
        </div>
        <div style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-bottom: 0.5rem;">Detailed Feedback</div>
        <p style="white-space: pre-wrap; font-size: 1rem; line-height: 1.7; color: var(--text-main); font-style: italic; background: #fdfdfd; padding: 1rem; border-radius: 8px; border: 1px dashed #cbd5e1; margin-bottom: 2rem;">{{ $evaluation->comments ?: 'The evaluator has not provided specific commentary for this project.' }}</p>

        @if($evaluation->critical_issues)
        <div style="background: #fff5f5; border: 2px solid #feb2b2; border-radius: 12px; padding: 1.5rem; margin-top: 2rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem; color: #c53030; font-weight: 900; font-size: 0.8rem; text-transform: uppercase; margin-bottom: 0.75rem;">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                Critical Management Alert
            </div>
            <p style="white-space: pre-wrap; font-size: 1rem; line-height: 1.6; color: #742a2a; font-weight: 700;">{{ $evaluation->critical_issues }}</p>
        </div>
        @endif
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; margin-top: 6rem;">
        <div style="text-align: center;">
            <div style="border-bottom: 2px solid #334155; height: 50px; margin-bottom: 1rem; line-height: 70px; font-weight: 800; color: var(--text-main);">
                {{ $evaluation->evaluator->full_name }}
            </div>
            <div style="font-weight: 900; text-transform: uppercase; font-size: 0.8rem; color: var(--primary-navy);">Evaluator's Signature</div>
        </div>
        <div style="text-align: center;">
            <div style="border-bottom: 2px solid #334155; height: 50px; margin-bottom: 1rem; line-height: 70px; font-weight: 800; color: var(--text-main);">{{ $evaluation->created_at->format('M d, Y') }}</div>
            <div style="font-weight: 900; text-transform: uppercase; font-size: 0.8rem; color: var(--primary-navy);">Date of Evaluation</div>
        </div>
    </div>
    
    <div style="position: absolute; bottom: 2rem; left: 0; right: 0; text-align: center; font-size: 0.65rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 2px; opacity: 0.5;">
        Official Institutional Document • BIO AND EMERGING TECHNOLOGY INSTITUTE
    </div>
</div>

<style>
@media print {
    body { background: white !important; }
    .sidebar, header, nav, .btn, aside { display: none !important; }
    .main-wrapper { margin: 0 !important; width: 100% !important; padding: 0 !important; }
    .content { padding: 0 !important; }
    .card { box-shadow: none !important; border: none !important; margin: 0 !important; padding: 0 !important; }
    #printableArea { width: 100% !important; border: none !important; }
}
</style>
@endsection
