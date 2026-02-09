@extends('layouts.app')

@section('title', 'Institutional Audit')
@section('header_title', 'Performance Evaluation')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding-bottom: 4rem;">
    
    <!-- Identity Header (Matching Project Theme) -->
    <div class="identity-header-eval">
        <div class="header-badge">NEW PERFORMANCE AUDIT</div>
        <h1 id="header-project-title">Select a Project to Evaluate</h1>
        <div class="header-meta">
            <span id="header-pi">Lead Investigator</span>
            <span class="dot">•</span>
            <span id="header-dir">Department</span>
        </div>
    </div>

    <!-- Premium Form Card -->
    <div class="premium-card">
        <form action="{{ route('evaluations.store') }}" method="POST" id="evaluationForm">
            @csrf
            
            <!-- Step 1: Context Selection -->
            <div class="form-section">
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; align-items: start;">
                    <div>
                        <label class="section-label">Target Research Initiative</label>
                        <div class="input-wrapper">
                            <select name="project_id" id="project_id" required onchange="handleProjectChange(this)">
                                <option value="">-- Choose Registered Project --</option>
                                @foreach($projects as $proj)
                                    <option value="{{ $proj->id }}" 
                                            data-pi="{{ $proj->pi->full_name }}" 
                                            data-dir="{{ $proj->directorate->name }}"
                                            {{ ($selected_project_id ?? old('project_id')) == $proj->id ? 'selected' : '' }}>
                                        {{ $proj->research_title }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="section-label">Assigned Auditor</label>
                        <div class="auditor-badge">
                            <div class="auditor-avatar">{{ substr($employee->full_name, 0, 1) }}</div>
                            <div>
                                <div class="auditor-name">{{ $employee->full_name }}</div>
                                <div class="auditor-role">Institutional Evaluator</div>
                            </div>
                        </div>
                        <input type="hidden" name="evaluator_id" value="{{ $employee->id }}">
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Step 2: Rating Engine -->
            <div class="form-section">
                <label class="section-label" style="margin-bottom: 2rem;">Audit Metrics & Key Performance Indicators</label>
                
                <table class="evaluation-table">
                    <thead>
                        <tr>
                            <th>Performance Metric</th>
                            <th style="width: 100px; text-align: center;">Weight</th>
                            <th style="width: 180px; text-align: center;">Rating (1-5)</th>
                            <th style="width: 100px; text-align: right;">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="criteria-row" data-weight="20">
                            <td>
                                <div class="metric-title">Priority Alignment</div>
                                <div class="metric-desc">Strategic synchronization with institutional thematic priorities.</div>
                            </td>
                            <td class="weight-cell">20%</td>
                            <td>
                                <select name="thematic_area_mark" class="rating-engine-select" required onchange="calculateAudit()">
                                    <option value="">-- Select --</option>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select>
                            </td>
                            <td class="points-cell">0.00</td>
                        </tr>
                        <tr class="criteria-row" data-weight="25">
                            <td>
                                <div class="metric-title">Socio-Economic Impact</div>
                                <div class="metric-desc">Potential for community benefit and industrial application.</div>
                            </td>
                            <td class="weight-cell">25%</td>
                            <td>
                                <select name="relevance_mark" class="rating-engine-select" required onchange="calculateAudit()">
                                    <option value="">-- Select --</option>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select>
                            </td>
                            <td class="points-cell">0.00</td>
                        </tr>
                        <tr class="criteria-row" data-weight="25">
                            <td>
                                <div class="metric-title">Methodological Rigor</div>
                                <div class="metric-desc">Scientific design, sampling accuracy, and data architecture.</div>
                            </td>
                            <td class="weight-cell">25%</td>
                            <td>
                                <select name="methodology_mark" class="rating-engine-select" required onchange="calculateAudit()">
                                    <option value="">-- Select --</option>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select>
                            </td>
                            <td class="points-cell">0.00</td>
                        </tr>
                        <tr class="criteria-row" data-weight="20">
                            <td>
                                <div class="metric-title">Technical Feasibility</div>
                                <div class="metric-desc">Availability of resources and robustness of preliminary data.</div>
                            </td>
                            <td class="weight-cell">20%</td>
                            <td>
                                <select name="feasibility_mark" class="rating-engine-select" required onchange="calculateAudit()">
                                    <option value="">-- Select --</option>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select>
                            </td>
                            <td class="points-cell">0.00</td>
                        </tr>
                        <tr class="criteria-row" data-weight="10">
                            <td>
                                <div class="metric-title">Presentation Excellence</div>
                                <div class="metric-desc">Clarity of documentation and articulation of research value.</div>
                            </td>
                            <td class="weight-cell">10%</td>
                            <td>
                                <select name="overall_proposal_mark" class="rating-engine-select" required onchange="calculateAudit()">
                                    <option value="">-- Select --</option>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select>
                            </td>
                            <td class="points-cell">0.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Cumulative Performance Score</td>
                            <td id="final-audit-score">0.0%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="divider"></div>

            <!-- Step 3: Narrative Feedback -->
            <div class="form-section">
                <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 3rem;">
                    <div>
                        <label class="section-label">Institutional Feedback & Narrative Justification</label>
                        <div class="input-wrapper">
                            <textarea name="comments" rows="6" placeholder="Provide detailed audit findings and recommendations for the PI..."></textarea>
                            <div class="input-icon textarea-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="verdict-display">
                        <div class="verdict-label">Audit Outcome</div>
                        <div id="verdict-badge">Waiting for Input</div>
                        <div class="verdict-guide">Score > 70% for Satisfaction</div>
                        <button type="submit" class="btn-audit-submit">Commit Evaluation</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    /* Premium Theming mirroring other pages */
    .identity-header-eval {
        background: linear-gradient(135deg, var(--brand-blue), #1e293b);
        border-radius: 20px;
        padding: 3rem 2rem;
        text-align: center;
        color: white;
        margin-bottom: -40px;
        position: relative;
        z-index: 10;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    .header-badge {
        display: inline-block;
        background: rgba(0, 139, 75, 0.3);
        color: #dcfce7;
        padding: 0.4rem 1.25rem;
        border-radius: 99px;
        font-size: 0.75rem;
        font-weight: 800;
        margin-bottom: 1rem;
        border: 1px solid rgba(0, 139, 75, 0.4);
    }

    #header-project-title { font-size: 2rem; font-weight: 900; margin: 0 0 0.75rem; }
    .header-meta { font-size: 1rem; opacity: 0.8; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 0.75rem; }
    .header-meta .dot { font-size: 0.5rem; opacity: 0.5; }

    .premium-card {
        background: white;
        border-radius: 20px;
        padding: 5rem 3.5rem 3.5rem;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
        position: relative;
        z-index: 5;
    }

    .section-label { font-size: 0.8rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; display: block; margin-bottom: 1rem; }
    
    .input-wrapper { position: relative; }
    .input-wrapper select, .input-wrapper textarea {
        width: 100%;
        padding: 0.85rem 1.25rem 0.85rem 3.25rem;
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
        transition: all 0.2s;
    }
    .input-wrapper select:focus, .input-wrapper textarea:focus { border-color: var(--brand-blue); background: white; outline: none; }

    .input-icon { position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: #94a3b8; }
    .textarea-icon { top: 1.25rem; transform: none; }

    .auditor-badge {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f1f5f9;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
    }
    .auditor-avatar { width: 42px; height: 42px; background: var(--brand-blue); color: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 900; }
    .auditor-name { font-weight: 800; color: #1e293b; font-size: 1rem; }
    .auditor-role { font-size: 0.75rem; color: #64748b; font-weight: 700; }

    .divider { height: 1px; background: #f1f5f9; margin: 3rem 0; }

    /* Table Styles */
    .evaluation-table { width: 100%; border-collapse: separate; border-spacing: 0; }
    .evaluation-table th { text-align: left; padding: 1.5rem 1rem; border-bottom: 2px solid #f1f5f9; font-size: 0.8rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; }
    .evaluation-table td { padding: 1.5rem 1rem; vertical-align: middle; border-bottom: 1px solid #f8fafc; }
    
    .metric-title { font-weight: 800; color: var(--brand-blue); font-size: 1.1rem; margin-bottom: 0.25rem; }
    .metric-desc { font-size: 0.85rem; color: #64748b; font-weight: 500; }
    
    .weight-cell { font-weight: 800; color: #1e293b; text-align: center; }
    .points-cell { font-weight: 950; color: var(--brand-blue); text-align: right; font-size: 1.25rem; font-family: 'Courier New', monospace; }

    .rating-engine-select {
        width: 100%;
        padding: 0.6rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-weight: 800;
        color: #1e293b;
        background: white;
    }

    tfoot td { padding: 2rem 1rem; font-weight: 950; text-transform: uppercase; font-size: 1.25rem; color: #1e293b; background: #f8fafc; border-top: 2px solid var(--brand-blue); }
    #final-audit-score { text-align: right; color: var(--brand-green); font-size: 2rem; }

    /* Verdict Display */
    .verdict-display {
        background: #f1f5f9;
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        border: 1px solid #e2e8f0;
    }
    .verdict-label { font-size: 0.75rem; font-weight: 800; color: #64748b; text-transform: uppercase; margin-bottom: 1rem; }
    #verdict-badge { 
        display: inline-block; 
        padding: 0.75rem 2rem; 
        border-radius: 99px; 
        background: white; 
        color: #94a3b8; 
        font-weight: 950; 
        font-size: 1.25rem; 
        margin-bottom: 1rem; 
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }
    .verdict-guide { font-size: 0.8rem; color: #94a3b8; font-weight: 700; margin-bottom: 2rem; }
    .btn-audit-submit {
        width: 100%;
        background: var(--brand-blue);
        color: white;
        padding: 1rem;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.1rem;
        border: none;
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(0, 59, 92, 0.2);
        transition: all 0.2s;
    }
    .btn-audit-submit:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(0, 59, 92, 0.3); }
</style>

<script>
    function handleProjectChange(el) {
        const opt = el.options[el.selectedIndex];
        if (opt.value) {
            document.getElementById('header-project-title').innerText = opt.text;
            document.getElementById('header-pi').innerText = opt.dataset.pi;
            document.getElementById('header-dir').innerText = opt.dataset.dir;
        } else {
            document.getElementById('header-project-title').innerText = 'Select a Project to Evaluate';
        }
    }

    function calculateAudit() {
        let total = 0;
        document.querySelectorAll('.criteria-row').forEach(row => {
            const weight = parseFloat(row.dataset.weight);
            const mark = parseFloat(row.querySelector('.rating-engine-select').value) || 0;
            const points = (mark / 5) * weight;
            row.querySelector('.points-cell').innerText = points.toFixed(2);
            total += points;
        });

        const finalScore = document.getElementById('final-audit-score');
        const badge = document.getElementById('verdict-badge');
        
        finalScore.innerText = total.toFixed(1) + '%';
        
        if (total >= 70) {
            badge.innerText = 'SATISFACTORY';
            badge.style.background = 'var(--brand-green)';
            badge.style.color = 'white';
        } else if (total > 0) {
            badge.innerText = 'UNSATISFACTORY';
            badge.style.background = '#ef4444';
            badge.style.color = 'white';
        } else {
            badge.innerText = 'WAITING FOR INPUT';
            badge.style.background = 'white';
            badge.style.color = '#94a3b8';
        }
    }

    // Trigger initial load check
    window.addEventListener('DOMContentLoaded', () => {
        const select = document.getElementById('project_id');
        if (select.value) handleProjectChange(select);
    });
</script>
@endsection
