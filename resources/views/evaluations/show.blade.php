@extends('layouts.app')

@section('title', 'Evaluation Report')
@section('header_title', 'Detailed Evaluation Report')

@section('content')
<div style="display: flex; justify-content: space-between; margin-bottom: 2rem;">
    <a href="{{ route('evaluations.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main);">
        &larr; Back to History
    </a>
    <button onclick="window.print()" class="btn btn-primary">
        Print Official Report
    </button>
</div>

<div class="card" id="printableArea">
    <div style="text-align: center; margin-bottom: 3rem; border-bottom: 2px solid var(--primary-navy); padding-bottom: 2rem;">
        <h3 style="color: var(--primary-navy); font-size: 1.5rem; margin-bottom: 0.5rem;">BIO AND EMERGING TECHNOLOGY INSTITUTE (BETin)</h3>
        <h4 style="text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted);">Research Project Evaluation Summary</h4>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 4rem; background: #f8fafc; padding: 2rem; border-radius: 12px;">
        <div>
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Research Project Title</label>
                <div style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy);">{{ $evaluation->project->research_title }}</div>
            </div>
            <div>
                <label style="display: block; font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Principal Investigator (PI)</label>
                <div style="font-weight: 600;">{{ $evaluation->project->pi->full_name }}</div>
            </div>
        </div>
        <div>
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Directorate</label>
                <div style="font-weight: 600;">{{ $evaluation->project->directorate->name }}</div>
            </div>
            <div>
                <label style="display: block; font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Lead Evaluator</label>
                <div style="font-weight: 600;">{{ $evaluation->evaluator->full_name }}</div>
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-bottom: 4rem;">
        <div style="font-size: 0.8rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-bottom: 1rem;">Overall Evaluation Results</div>
        <div style="display: flex; justify-content: center; align-items: baseline; gap: 2rem;">
            <div style="text-align: center;">
                <div style="font-size: 4rem; font-weight: 900; color: var(--primary-navy);">{{ number_format($evaluation->total_score, 1) }}</div>
                <div style="font-size: 0.9rem; font-weight: 700; color: var(--text-muted);">PERCENTAGE SCORE</div>
            </div>
            <div style="padding: 1rem 2.5rem; border-radius: 50px; font-weight: 900; font-size: 1.5rem; background: {{ $evaluation->decision === 'SATISFACTORY' ? '#dcfce7' : '#fee2e2' }}; color: {{ $evaluation->decision === 'SATISFACTORY' ? '#15803d' : '#b91c1c' }};">
                {{ $evaluation->decision }}
            </div>
        </div>
    </div>

    <table style="width: 100%; margin-bottom: 4rem;">
        <thead>
            <tr>
                <th style="width: 60%;">Evaluation Criteria</th>
                <th style="text-align: center;">Weight</th>
                <th style="text-align: center;">Mark (1-5)</th>
                <th style="text-align: right;">Actual</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1. Thematic area alignment</td>
                <td style="text-align: center;">20%</td>
                <td style="text-align: center;">{{ $evaluation->thematic_area_mark }}</td>
                <td style="text-align: right; font-weight: 700;">{{ number_format(($evaluation->thematic_area_mark / 5) * 20, 2) }}</td>
            </tr>
            <tr>
                <td>2. Socio-economic Relevance</td>
                <td style="text-align: center;">25%</td>
                <td style="text-align: center;">{{ $evaluation->relevance_mark }}</td>
                <td style="text-align: right; font-weight: 700;">{{ number_format(($evaluation->relevance_mark / 5) * 25, 2) }}</td>
            </tr>
            <tr>
                <td>3. Research Methodology</td>
                <td style="text-align: center;">25%</td>
                <td style="text-align: center;">{{ $evaluation->methodology_mark }}</td>
                <td style="text-align: right; font-weight: 700;">{{ number_format(($evaluation->methodology_mark / 5) * 25, 2) }}</td>
            </tr>
            <tr>
                <td>4. Feasibility & Preliminary Results</td>
                <td style="text-align: center;">20%</td>
                <td style="text-align: center;">{{ $evaluation->feasibility_mark }}</td>
                <td style="text-align: right; font-weight: 700;">{{ number_format(($evaluation->feasibility_mark / 5) * 20, 2) }}</td>
            </tr>
            <tr>
                <td>5. Presentation Quality</td>
                <td style="text-align: center;">10%</td>
                <td style="text-align: center;">{{ $evaluation->overall_proposal_mark }}</td>
                <td style="text-align: right; font-weight: 700;">{{ number_format(($evaluation->overall_proposal_mark / 5) * 10, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div style="background: #f1f5f9; padding: 2.5rem; border-radius: 12px; border-left: 6px solid var(--primary-navy);">
        <h5 style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.05em; color: var(--primary-navy); margin-bottom: 1rem;">Evaluator's Final Comments</h5>
        <p style="white-space: pre-wrap; font-size: 1.1rem; line-height: 1.6; color: var(--text-main);">{{ $evaluation->comments ?? 'No specific comments provided.' }}</p>
    </div>

    <div style="margin-top: 5rem; display: flex; justify-content: space-between;">
        <div style="text-align: center; width: 250px;">
            <div style="border-bottom: 1px solid var(--text-main); margin-bottom: 0.5rem; height: 40px;"></div>
            <div style="font-size: 0.8rem; font-weight: 700;">Evaluator Signature</div>
        </div>
        <div style="text-align: center; width: 250px;">
            <div style="border-bottom: 1px solid var(--text-main); margin-bottom: 0.5rem;">{{ now()->format('M d, Y') }}</div>
            <div style="font-size: 0.8rem; font-weight: 700;">Date of Certification</div>
        </div>
    </div>
</div>

<style>
@media print {
    body { background: white; }
    .sidebar, header, .btn { display: none !important; }
    .main-wrapper { margin: 0; width: 100%; }
    .content { padding: 0; }
    .card { box-shadow: none; border: none; padding: 0; }
}
</style>
@endsection
