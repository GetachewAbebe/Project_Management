@extends('layouts.app')

@section('title', 'Project Evaluation')

@section('content')
<div class="evaluation-portal">
    <div class="portal-container">
        
        <!-- Private Access Flag -->
        <div class="access-banner">
            <div class="banner-left">
                <div class="pulse-dot"></div>
                <span>Authorized Expert Review Portal</span>
            </div>
            <div class="banner-right">Token Verified</div>
        </div>

        <form action="{{ route('evaluate.public.submit', $assignment->token) }}" method="POST" id="evalForm">
            @csrf
            
            <!-- NEW PROJECT EVALUATION HEADER -->
            <div class="premium-card header-card">
                <div class="card-badge">Institutional Review</div>
                <h1 class="main-title">NEW PROJECT EVALUATION</h1>
                <p class="section-desc">Select a Project to Evaluate</p>
                
                <div class="project-info-grid">
                    <div class="info-item full">
                        <label>Target Research Initiative</label>
                        <div class="value initiative-title">{{ $project->research_title }}</div>
                    </div>
                    <div class="info-item">
                        <label>Lead Investigator</label>
                        <div class="value">{{ $project->pi->full_name }}</div>
                    </div>
                    <div class="info-item">
                        <label>Scientific Directorate</label>
                        <div class="value">{{ $project->directorate->name }}</div>
                    </div>
                </div>
            </div>

            <!-- ASSIGNED EVALUATOR -->
            <div class="premium-card evaluator-card">
                <div class="evaluator-flex">
                    <div class="eval-avatar">
                        {{ substr($employee->full_name, 0, 1) }}
                    </div>
                    <div class="eval-meta">
                        <label>Assigned Evaluator</label>
                        <div class="eval-name">{{ $employee->full_name }}</div>
                        <div class="eval-role">System Administrator</div>
                    </div>
                </div>
            </div>

            <!-- METRICS SECTION -->
            <div class="premium-card metrics-card">
                <h3 class="stats-header">Evaluation Metrics & Key Performance Indicators</h3>
                
                <div class="metrics-container">
                    @php
                        $metrics = [
                            'thematic_area_mark' => ['label' => 'Priority Alignment', 'desc' => 'Strategic synchronization with institutional thematic priorities.', 'weight' => '20%'],
                            'relevance_mark' => ['label' => 'Socio-Economic Impact', 'desc' => 'Potential for community benefit and industrial application.', 'weight' => '25%'],
                            'methodology_mark' => ['label' => 'Methodological Rigor', 'desc' => 'Scientific design, sampling accuracy, and data architecture.', 'weight' => '25%'],
                            'feasibility_mark' => ['label' => 'Technical Feasibility', 'desc' => 'Availability of resources and robustness of preliminary data.', 'weight' => '20%'],
                            'overall_proposal_mark' => ['label' => 'Presentation Excellence', 'desc' => 'Clarity of documentation and articulation of research value.', 'weight' => '10%']
                        ];
                    @endphp

                    @foreach($metrics as $field => $data)
                    <div class="metric-row">
                        <div class="metric-info">
                            <div class="metric-label">{{ $data['label'] }}</div>
                            <div class="metric-desc">{{ $data['desc'] }}</div>
                            <div class="metric-weight">Weight: {{ $data['weight'] }}</div>
                        </div>
                        <div class="rating-controls">
                            <label class="control-label">Rating (1-5)</label>
                            <div class="stars-container">
                                @for($i = 1; $i <= 5; $i++)
                                <label class="star-box">
                                    <input type="radio" name="{{ $field }}" value="{{ $i }}" required>
                                    <span>{{ $i }}</span>
                                </label>
                                @endfor
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- TOTAL SCORE -->
                <div class="score-summary">
                    <div class="score-left">
                        <div class="score-label">Cumulative Performance Score</div>
                        <div class="score-percentage" id="totalScoreDisplay">0.0%</div>
                    </div>
                    <div class="outcome-box">
                        <div class="outcome-label">Evaluation Outcome</div>
                        <div class="outcome-value" id="outcomeText">Waiting for Input</div>
                        <div class="target-hint">Target Score: > 70% for Satisfaction</div>
                    </div>
                </div>
            </div>

            <!-- FEEDBACK SECTION -->
            <div class="premium-card feedback-card">
                <h3 class="stats-header">Institutional Feedback & Narrative Justification</h3>
                <label class="input-label">Provide detailed evaluation findings and recommendations for the PI...</label>
                <textarea name="comments" class="form-textarea" placeholder="Enter scientific remarks here sync avec le justification..." rows="5"></textarea>
            </div>

            <!-- CRITICAL ISSUES BOX -->
            <div class="premium-card feedback-card" style="border-top: 5px solid #ef4444;">
                <h3 class="stats-header" style="color: #ef4444;">🚨 Critical Management Issues</h3>
                <label class="input-label">Flag high-priority concerns, sensitive findings, or urgent recommendations specifically for Top Management review...</label>
                <textarea name="critical_issues" class="form-textarea" placeholder="Enter critical concerns for management attention only (Optional)..." rows="4" style="border-color: #fee2e2;"></textarea>
                <div style="margin-top: 1rem; display: flex; align-items: center; gap: 0.5rem; color: #ef4444; font-size: 0.75rem; font-weight: 800;">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    CONFIDENTIAL COMMUNICATION TO TOP MANAGEMENT
                </div>
            </div>

            <!-- SUBMIT ACTION -->
            <div class="submit-wrapper">
                <button type="submit" class="commit-btn">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    Commit Evaluation
                </button>
                <p class="disclaimer">By committing this evaluation, you confirm this assessment is strictly based on institutional scientific benchmarks.</p>
            </div>
        </form>

        <footer class="portal-footer">
            &copy; {{ date('Y') }} Bio and Emerging Technology Institute. Transforming Ideas into Impacts
        </footer>
    </div>
</div>

<style>
    .evaluation-portal {
        background: #f8fafc;
        min-height: 100vh;
        padding: 2rem 0;
        font-family: 'Outfit', sans-serif;
    }

    .portal-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    .access-banner {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 12px;
        padding: 0.75rem 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .banner-left { display: flex; align-items: center; gap: 0.75rem; font-weight: 800; color: #1e40af; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; }
    .banner-right { font-weight: 700; color: #3b82f6; font-size: 0.7rem; }
    .pulse-dot { width: 8px; height: 8px; background: #3b82f6; border-radius: 50%; box-shadow: 0 0 8px rgba(59, 130, 246, 0.5); animation: pulse 2s infinite; }

    .premium-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #f1f5f9;
        box-shadow: 0 4px 20px rgba(0,0,0,0.02);
    }

    .header-card { background: linear-gradient(135deg, white, #f8faff); }
    .card-badge { display: inline-block; background: #6366f1; color: white; padding: 0.35rem 0.75rem; border-radius: 6px; font-size: 0.7rem; font-weight: 950; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1.5rem; }
    .main-title { font-size: 2.5rem; font-weight: 950; color: #0f172a; margin: 0 0 0.5rem 0; letter-spacing: -0.03em; }
    .section-desc { font-weight: 600; color: #64748b; margin-bottom: 2.5rem; }

    .project-info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
    .info-item.full { grid-column: 1 / -1; }
    .info-item label { display: block; font-size: 0.75rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; }
    .info-item .value { font-weight: 800; color: #1e293b; font-size: 1.1rem; }
    .initiative-title { color: #6366f1 !important; line-height: 1.3; }

    .evaluator-flex { display: flex; align-items: center; gap: 1.25rem; }
    .eval-avatar { width: 56px; height: 56px; background: #1e293b; color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: 950; font-size: 1.5rem; box-shadow: 0 8px 15px rgba(30, 41, 59, 0.2); }
    .eval-meta label { display: block; font-size: 0.7rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin-bottom: 0.2rem; }
    .eval-name { font-weight: 900; color: #1e293b; font-size: 1.25rem; }
    .eval-role { color: #6366f1; font-weight: 700; font-size: 0.8rem; }

    .stats-header { font-size: 1.2rem; font-weight: 950; color: #0f172a; margin: 0 0 2rem 0; padding-bottom: 1rem; border-bottom: 2px solid #f1f5f9; }
    
    .metric-row { display: grid; grid-template-columns: 1fr 280px; gap: 3rem; padding-bottom: 2.5rem; margin-bottom: 2.5rem; border-bottom: 1px dashed #f1f5f9; }
    .metric-label { font-size: 1.2rem; font-weight: 900; color: #1e293b; margin-bottom: 0.5rem; }
    .metric-desc { font-size: 0.95rem; color: #64748b; font-weight: 600; line-height: 1.5; margin-bottom: 0.75rem; }
    .metric-weight { display: inline-block; font-size: 0.75rem; font-weight: 900; color: #6366f1; background: #eef2ff; padding: 0.2rem 0.6rem; border-radius: 4px; }

    .control-label { display: block; font-size: 0.7rem; font-weight: 800; color: #94a3b8; text-transform: uppercase; margin-bottom: 1rem; }
    .stars-container { display: flex; gap: 0.75rem; }
    .star-box { flex: 1; position: relative; cursor: pointer; }
    .star-box input { position: absolute; opacity: 0; }
    .star-box span { display: block; background: #f8fafc; border: 2px solid #f1f5f9; padding: 0.75rem; border-radius: 12px; text-align: center; font-weight: 950; font-size: 1.25rem; color: #64748b; transition: all 0.2s; }
    .star-box:hover span { background: #f1f5f9; border-color: #cbd5e1; }
    .star-box input:checked + span { background: #1e293b; border-color: #1e293b; color: white; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }

    .score-summary { background: #f8fafc; border-radius: 16px; padding: 2rem; display: flex; justify-content: space-between; align-items: center; border: 1px solid #e2e8f0; }
    .score-label { font-weight: 800; color: #64748b; font-size: 0.9rem; margin-bottom: 0.5rem; }
    .score-percentage { font-size: 3rem; font-weight: 950; color: #1e293b; letter-spacing: -0.05em; }
    .outcome-box { text-align: right; }
    .outcome-label { font-weight: 800; color: #64748b; font-size: 0.75rem; text-transform: uppercase; margin-bottom: 0.5rem; }
    .outcome-value { font-size: 1.5rem; font-weight: 950; color: #64748b; margin-bottom: 0.25rem; }
    .target-hint { font-size: 0.75rem; font-weight: 700; color: #94a3b8; }

    .input-label { display: block; font-size: 0.85rem; font-weight: 700; color: #64748b; margin-bottom: 1.25rem; }
    .form-textarea { width: 100%; padding: 1.5rem; border: 2px solid #f1f5f9; border-radius: 16px; font-size: 1rem; font-weight: 600; font-family: inherit; transition: all 0.3s; resize: none; overflow: hidden; }
    .form-textarea:focus { outline: none; border-color: #6366f1; box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1); }

    .submit-wrapper { text-align: center; margin-top: 3rem; }
    .commit-btn { background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 1.25rem 4rem; border-radius: 16px; border: none; font-size: 1.25rem; font-weight: 950; cursor: pointer; transition: all 0.3s; box-shadow: 0 12px 25px rgba(16, 185, 129, 0.25); display: inline-flex; align-items: center; gap: 0.75rem; }
    .commit-btn:hover { transform: translateY(-2px); box-shadow: 0 15px 30px rgba(16, 185, 129, 0.3); }
    .disclaimer { margin-top: 1.5rem; font-size: 0.75rem; color: #94a3b8; font-weight: 600; max-width: 400px; margin-left: auto; margin-right: auto; }

    .portal-footer { text-align: center; margin-top: 4rem; color: #cbd5e1; font-weight: 800; font-size: 0.85rem; letter-spacing: 0.02em; }

    @media (max-width: 768px) {
        .portal-container { padding: 0 1rem; }
        .premium-card { padding: 1.5rem; }
        .main-title { font-size: 1.8rem; }
        .project-info-grid { grid-template-columns: 1fr; gap: 1.5rem; }
        .metric-row { grid-template-columns: 1fr; gap: 1.5rem; }
        .score-summary { flex-direction: column; text-align: center; gap: 2rem; }
        .outcome-box { text-align: center; }
        .stars-container { gap: 0.4rem; }
        .star-box span { padding: 0.5rem; font-size: 1.1rem; border-radius: 8px; }
        .commit-btn { width: 100%; justify-content: center; }
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.1); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('evalForm');
    const totalDisplay = document.getElementById('totalScoreDisplay');
    const outcomeText = document.getElementById('outcomeText');
    const weights = {
        'thematic_area_mark': 0.20,
        'relevance_mark': 0.25,
        'methodology_mark': 0.25,
        'feasibility_mark': 0.20,
        'overall_proposal_mark': 0.10
    };

    function calculateTotal() {
        let total = 0;
        let answered = 0;
        
        Object.keys(weights).forEach(field => {
            const selected = form.querySelector(`input[name="${field}"]:checked`);
            if (selected) {
                total += (parseInt(selected.value) / 5) * 100 * weights[field];
                answered++;
            }
        });

        totalDisplay.innerText = total.toFixed(1) + '%';
        
        if (answered < 5) {
            outcomeText.innerText = 'Waiting for Input';
            outcomeText.style.color = '#94a3b8';
            totalDisplay.style.color = '#1e293b';
        } else if (total >= 70) {
            outcomeText.innerText = 'SATISFACTORY';
            outcomeText.style.color = '#10b981';
            totalDisplay.style.color = '#10b981';
        } else {
            outcomeText.innerText = 'UNSATISFACTORY';
            outcomeText.style.color = '#ef4444';
            totalDisplay.style.color = '#ef4444';
        }
    }

    form.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', calculateTotal);
    });
});
</script>
@endsection
