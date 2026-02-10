@extends('layouts.app')

@section('title', 'Project Evaluation')
@section('header_title', 'Performance Evaluation')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding-bottom: 4rem;">
    
    <!-- Intelligent Header Card (Mirroring Project Registration) -->
    <div class="header-preview-card">
        <div class="preview-badge">NEW PROJECT EVALUATION</div>
        <h2 id="header-project-title" style="color:white; margin:0;">Select a Project to Evaluate</h2>
        <div class="preview-meta">
            <span id="header-pi">Lead Investigator</span>
            <span>•</span>
            <span id="header-dir">Scientific Directorate</span>
        </div>
    </div>

    <!-- Premium Form Card -->
    <div class="premium-card">
        <form action="{{ route('evaluations.store') }}" method="POST" id="evaluationForm">
            @csrf
            
            <!-- Context Selection -->
            <div class="form-section">
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; align-items: start;">
                    <div class="form-group">
                        <label class="section-label">Target Research Initiative <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <select name="project_id" id="project_id" required onchange="handleProjectChange(this)">
                                <option value="">-- Choose Registered Project --</option>
                                @foreach($projects as $proj)
                                    <option value="{{ $proj->id }}" 
                                            data-pi="{{ $proj->pi?->full_name ?? 'N/A' }}" 
                                            data-pi-id="{{ $proj->pi_id }}"
                                            data-dir="{{ $proj->directorate?->name ?? 'N/A' }}"
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
                        <label class="section-label">Assigned Evaluator</label>
                        <div class="evaluator-badge-shared">
                            @php
                                $displayName = $employee ? $employee->full_name : auth()->user()->name;
                                $displayRole = $employee ? 'Institutional Evaluator' : 'System Administrator';
                                $initial = substr($displayName, 0, 1);
                            @endphp
                            <div class="badge-avatar">{{ $initial }}</div>
                            <div class="badge-info">
                                <div class="badge-name">{{ $displayName }}</div>
                                <div class="badge-role">{{ $displayRole }}</div>
                            </div>
                        </div>
                        <input type="hidden" name="evaluator_id" value="{{ $employee?->id }}">
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Rating Engine -->
            <div class="form-section">
                <div class="section-header-shared">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <h4>Evaluation Metrics & Key Performance Indicators</h4>
                </div>
                
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
                        @php
                            $metrics = [
                                ['Priority Alignment', 'thematic_area_mark', '20', 'Strategic synchronization with institutional thematic priorities.'],
                                ['Socio-Economic Impact', 'relevance_mark', '25', 'Potential for community benefit and industrial application.'],
                                ['Methodological Rigor', 'methodology_mark', '25', 'Scientific design, sampling accuracy, and data architecture.'],
                                ['Technical Feasibility', 'feasibility_mark', '20', 'Availability of resources and robustness of preliminary data.'],
                                ['Presentation Excellence', 'overall_proposal_mark', '10', 'Clarity of documentation and articulation of research value.']
                            ];
                        @endphp
                        @foreach($metrics as $m)
                        <tr class="criteria-row" data-weight="{{ $m[2] }}">
                            <td>
                                <div class="metric-title">{{ $m[0] }}</div>
                                <div class="metric-desc">{{ $m[3] }}</div>
                            </td>
                            <td class="weight-cell">{{ $m[2] }}%</td>
                            <td>
                                <select name="{{ $m[1] }}" class="rating-engine-select" required onchange="calculateEvaluation()">
                                    <option value="">-- Rate --</option>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select>
                            </td>
                            <td class="points-cell">0.00</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Cumulative Performance Score</td>
                            <td id="final-evaluation-score">0.0%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="divider"></div>

            <!-- Narrative Feedback -->
            <div class="form-section">
                <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 3rem;">
                    <div class="form-group">
                        <label class="section-label">Institutional Feedback & Narrative Justification</label>
                        <div class="input-wrapper">
                            <textarea name="comments" rows="6" placeholder="Provide detailed evaluation findings and recommendations for the PI..."></textarea>
                            <div class="input-icon textarea-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="verdict-display-shared">
                        <div class="verdict-label">Evaluation Outcome</div>
                        <div id="verdict-badge">Waiting for Input</div>
                        <div class="verdict-guide">Target Score: > 70% for Satisfaction</div>
                        <button type="submit" class="btn-primary-shared">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Commit Evaluation
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    /* Shared Theme Classes */
    .header-preview-card {
        background: linear-gradient(135deg, var(--brand-blue), #004e8d);
        border-radius: 24px;
        padding: 2.5rem;
        margin-bottom: -40px;
        position: relative;
        z-index: 10;
        box-shadow: 0 25px 50px rgba(0, 59, 92, 0.25);
        color: white;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.15);
        width: 92%;
        margin-left: auto;
        margin-right: auto;
    }

    .preview-badge {
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 900;
        letter-spacing: 0.15em;
        padding: 0.35rem 1rem;
        border-radius: 99px;
        display: inline-block;
        margin-bottom: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(4px);
    }

    .header-preview-card h2 { font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; }
    .preview-meta { font-size: 1rem; opacity: 0.9; font-weight: 600; display: flex; gap: 0.75rem; align-items: center; justify-content: center; }

    .premium-card {
        background: white;
        border-radius: 20px;
        padding: 5rem 3rem 3rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(0, 0, 0, 0.02);
        z-index: 5;
    }

    .form-section { background: #fdfdfd; border: 1px solid #f3f4f6; border-radius: 12px; padding: 2rem; margin-bottom: 1.5rem; }
    
    .section-label { font-weight: 800; color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 1rem; }
    .section-header-shared { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 1rem; color: var(--brand-blue); }
    .section-header-shared h4 { margin: 0; font-size: 1.1rem; font-weight: 850; text-transform: uppercase; }

    .input-wrapper { position: relative; }
    .input-wrapper select, .input-wrapper textarea {
        width: 100%; padding: 0.85rem 1rem 0.85rem 3rem; border: 2px solid #e2e8f0; border-radius: 10px; font-size: 0.95rem; font-weight: 700; color: #1e293b; background: #f8fafc; transition: all 0.2s;
    }
    .input-wrapper select:focus, .input-wrapper textarea:focus { border-color: var(--brand-blue); background: white; outline: none; box-shadow: 0 0 0 4px rgba(0, 59, 92, 0.05); }

    .input-icon { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #94a3b8; }
    .textarea-icon { top: 1.25rem; transform: none; }

    .divider { height: 1px; background: #f1f5f9; margin: 2rem 0; }

    .evaluation-table { width: 100%; border-collapse: separate; border-spacing: 0; }
    .evaluation-table th { text-align: left; padding: 1.5rem 1rem; border-bottom: 2px solid #f1f5f9; font-size: 0.75rem; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; }
    .evaluation-table td { padding: 1.5rem 1rem; vertical-align: middle; border-bottom: 1px solid #f8fafc; }
    
    .metric-title { font-weight: 850; color: var(--brand-blue); font-size: 1.05rem; margin-bottom: 0.25rem; }
    .metric-desc { font-size: 0.85rem; color: #64748b; font-weight: 500; }
    
    .rating-engine-select { width: 100%; padding: 0.6rem 0.75rem; border: 2px solid #e2e8f0; border-radius: 8px; font-weight: 800; color: #1e293b; background: #f8fafc; }
    .points-cell { font-weight: 950; color: var(--brand-blue); text-align: right; font-size: 1.25rem; font-family: 'Courier New', monospace; }

    tfoot td { padding: 2rem 1rem; font-weight: 950; text-transform: uppercase; font-size: 1.25rem; color: #1e293b; background: #f8fafc; border-top: 2px solid var(--brand-blue); border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; }
    #final-evaluation-score { text-align: right; color: var(--brand-green); font-size: 2.25rem; }

    .verdict-display-shared { background: #f1f5f9; border-radius: 16px; padding: 2rem; text-align: center; border: 1px solid #e2e8f0; }
    .verdict-label { font-size: 0.8rem; font-weight: 900; color: #64748b; text-transform: uppercase; margin-bottom: 1rem; }
    #verdict-badge { display: inline-block; padding: 0.75rem 2rem; border-radius: 99px; background: white; color: #94a3b8; font-weight: 950; font-size: 1.25rem; margin-bottom: 1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: all 0.3s; }
    .verdict-guide { font-size: 0.85rem; color: #64748b; font-weight: 700; margin-bottom: 2rem; }

    .btn-primary-shared {
        width: 100%; background: linear-gradient(135deg, var(--brand-green), #059669); color: white; padding: 1rem; border-radius: 12px; font-weight: 900; font-size: 1.1rem; border: none; cursor: pointer; box-shadow: 0 8px 25px rgba(0, 139, 75, 0.25); display: flex; align-items: center; justify-content: center; gap: 0.75rem; transition: all 0.2s ease;
    }
    .btn-primary-shared:hover { transform: translateY(-3px); box-shadow: 0 12px 35px rgba(0, 139, 75, 0.35); }
@endstyle

<script>
    function handleProjectChange(el) {
        const opt = el.options[el.selectedIndex];
        if (opt.value) {
            document.getElementById('header-project-title').innerText = opt.text;
            document.getElementById('header-pi').innerText = opt.dataset.pi;
            document.getElementById('header-dir').innerText = opt.dataset.dir;
        } else {
            document.getElementById('header-project-title').innerText = 'Select a Project to Evaluate';
            document.getElementById('header-pi').innerText = 'Lead Investigator';
            document.getElementById('header-dir').innerText = 'Scientific Directorate';
        }
    }

    function calculateEvaluation() {
        let total = 0;
        document.querySelectorAll('.criteria-row').forEach(row => {
            const weight = parseFloat(row.dataset.weight);
            const mark = parseFloat(row.querySelector('.rating-engine-select').value) || 0;
            const points = (mark / 5) * weight;
            row.querySelector('.points-cell').innerText = points.toFixed(2);
            total += points;
        });

        const finalScore = document.getElementById('final-evaluation-score');
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
