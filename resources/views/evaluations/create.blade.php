@extends('layouts.app')

@section('title', 'Individual Project Evaluation')
@section('header_title', 'New Project Evaluation')

@section('content')
<div class="card">
    <form action="{{ route('evaluations.store') }}" method="POST" id="evaluationForm">
        @csrf
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem; background: #f8fafc; padding: 2.5rem; border-radius: 12px; border: 1px solid #e2e8f0;">
            <!-- Project Selection -->
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Target Project</label>
                <select name="project_id" id="project_id" required style="width: 100%; padding: 1rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1.1rem; background: white; font-weight: 600;">
                    <option value="">-- Choose Registered Project --</option>
                    @foreach($projects as $proj)
                        <option value="{{ $proj->id }}" 
                                data-pi="{{ $proj->pi->full_name }}" 
                                data-pi-id="{{ $proj->pi_id }}"
                                data-dir="{{ $proj->directorate->name }}"
                                {{ ($selected_project_id ?? old('project_id')) == $proj->id ? 'selected' : '' }}>
                            {{ $proj->research_title }}
                        </option>
                    @endforeach
                </select>
                <div id="projectDetails" style="margin-top: 1.5rem; font-size: 0.95rem; display: none; background: white; padding: 1rem; border-radius: 8px; border: 1px solid #edf2f7;">
                    <div style="margin-bottom: 0.5rem;"><strong style="color: var(--text-muted);">Principal Investigator:</strong> <span id="display_pi" style="font-weight: 700; color: var(--primary-navy);"></span></div>
                    <div><strong style="color: var(--text-muted);">Directorate:</strong> <span id="display_dir" style="font-weight: 700; color: var(--primary-navy);"></span></div>
                </div>
                @error('project_id')
                    <div style="color: #b91c1c; font-size: 0.85rem; margin-top: 0.75rem; font-weight: 600;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Evaluator Identity -->
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Evaluating Staff Identity</label>
                <div style="background: white; padding: 1rem 1.5rem; border: 1px solid #cbd5e1; border-radius: 8px; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 44px; height: 44px; background: var(--primary-navy); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.2rem;">
                        {{ substr($employee->full_name, 0, 1) }}
                    </div>
                    <div>
                        <div style="font-weight: 800; color: var(--primary-navy); font-size: 1.1rem;">{{ $employee->full_name }}</div>
                        <div style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">{{ $employee->position }} | {{ $employee->directorate->name }}</div>
                    </div>
                </div>
                <input type="hidden" name="evaluator_id" value="{{ $employee->id }}">
                <div style="margin-top: 1rem; font-size: 0.8rem; color: var(--text-muted); font-style: italic;">
                    💡 You are submitting an individual evaluation. This will be averaged with other submissions for this project.
                </div>
            </div>
        </div>

        <!-- Rating Scale Helper -->
        <div style="background: white; border: 1px solid #e2e8f0; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: space-around; align-items: center;">
                <div style="text-align: center;">
                    <div style="width: 32px; height: 32px; background: #22c55e; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; margin: 0 auto 0.25rem;">5</div>
                    <div style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Excellent</div>
                </div>
                <div style="text-align: center;">
                    <div style="width: 32px; height: 32px; background: #34d399; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; margin: 0 auto 0.25rem;">4</div>
                    <div style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Very Good</div>
                </div>
                <div style="text-align: center;">
                    <div style="width: 32px; height: 32px; background: #f59e0b; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; margin: 0 auto 0.25rem;">3</div>
                    <div style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Good</div>
                </div>
                <div style="text-align: center;">
                    <div style="width: 32px; height: 32px; background: #f97316; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; margin: 0 auto 0.25rem;">2</div>
                    <div style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Fair</div>
                </div>
                <div style="text-align: center;">
                    <div style="width: 32px; height: 32px; background: #ef4444; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; margin: 0 auto 0.25rem;">1</div>
                    <div style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Poor</div>
                </div>
            </div>
        </div>

        <table style="width: 100%; margin-bottom: 3rem;">
            <thead>
                <tr>
                    <th style="width: 60%;">Evaluation Criteria</th>
                    <th style="text-align: center;">Weight (%)</th>
                    <th style="text-align: center;">Your Rating (1-5)</th>
                    <th style="text-align: right;">Weighted Mark</th>
                </tr>
            </thead>
            <tbody>
                <tr class="criteria-row" data-weight="20">
                    <td>1. Thematic area alignment with the priority area</td>
                    <td style="text-align: center;">20</td>
                    <td>
                        <select name="thematic_area_mark" class="rating-select" required style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid var(--border-color); font-weight: 700;">
                            <option value="">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 800; color: var(--primary-navy);">0.00</td>
                </tr>
                <tr class="criteria-row" data-weight="25">
                    <td>2. Relevance to the socio-economic needs/priorities</td>
                    <td style="text-align: center;">25</td>
                    <td>
                        <select name="relevance_mark" class="rating-select" required style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid var(--border-color); font-weight: 700;">
                            <option value="">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 800; color: var(--primary-navy);">0.00</td>
                </tr>
                <tr class="criteria-row" data-weight="25">
                    <td>3. Research Methodology (Design, data collection, sampling...)</td>
                    <td style="text-align: center;">25</td>
                    <td>
                        <select name="methodology_mark" class="rating-select" required style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid var(--border-color); font-weight: 700;">
                            <option value="">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 800; color: var(--primary-navy);">0.00</td>
                </tr>
                <tr class="criteria-row" data-weight="20">
                    <td>4. Feasibility and Preliminary Results</td>
                    <td style="text-align: center;">20</td>
                    <td>
                        <select name="feasibility_mark" class="rating-select" required style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid var(--border-color); font-weight: 700;">
                            <option value="">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 800; color: var(--primary-navy);">0.00</td>
                </tr>
                <tr class="criteria-row" data-weight="10">
                    <td>5. Overall Proposal/Presentation Quality</td>
                    <td style="text-align: center;">10</td>
                    <td>
                        <select name="overall_proposal_mark" class="rating-select" required style="width: 100%; padding: 0.75rem; border-radius: 8px; border: 1px solid var(--border-color); font-weight: 700;">
                            <option value="">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 800; color: var(--primary-navy);">0.00</td>
                </tr>
                <tr style="background: #f1f5f9; border-top: 2px solid var(--primary-navy);">
                    <td colspan="3" style="text-align: right; padding: 1.5rem; font-weight: 800; text-transform: uppercase;">Your Total Evaluation Score</td>
                    <td id="totalScore" style="text-align: right; padding: 1.5rem; font-size: 1.6rem; font-weight: 900; color: var(--primary-navy);">0.00</td>
                </tr>
            </tbody>
        </table>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2.5rem; align-items: start;">
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Evaluator's Comments and Justification</label>
                <textarea name="comments" rows="6" style="width: 100%; padding: 1.25rem; border: 1px solid var(--border-color); border-radius: 12px; font-size: 1rem; line-height: 1.6; background: #fdfdfd;" placeholder="Please provide detailed feedback on the project's strengths and weaknesses..."></textarea>
            </div>
            <div style="padding: 2rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; text-align: center;">
                <div style="font-size: 0.75rem; font-weight: 800; color: var(--text-muted); margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 0.05em;">Your Verdict</div>
                <div id="decisionBadge" style="display: inline-block; padding: 0.75rem 2rem; border-radius: 50px; font-weight: 900; font-size: 1.1rem; background: #e2e8f0; color: #64748b; margin-bottom: 1.5rem; transition: all 0.3s ease;">
                    PENDING RATING
                </div>
                <div style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5;">
                    Submitting this will complete your portion of the evaluation for this project.
                </div>
            </div>
        </div>

        <div style="margin-top: 4rem; display: flex; justify-content: center; border-top: 1px solid #e2e8f0; padding-top: 3rem;">
            <button type="submit" class="btn btn-primary" style="padding: 1.25rem 5rem; font-size: 1.25rem; font-weight: 800; box-shadow: 0 10px 15px -3px rgba(30, 41, 59, 0.25);">
                Submit My Evaluation
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const projectSelect = document.getElementById('project_id');
        const projectDetails = document.getElementById('projectDetails');
        const displayPi = document.getElementById('display_pi');
        const displayDir = document.getElementById('display_dir');
        const decisionBadge = document.getElementById('decisionBadge');

        projectSelect.addEventListener('change', () => {
            const selected = projectSelect.options[projectSelect.selectedIndex];
            if (selected && selected.value) {
                displayPi.textContent = selected.dataset.pi;
                displayDir.textContent = selected.dataset.dir;
                projectDetails.style.display = 'block';
            } else {
                projectDetails.style.display = 'none';
            }
        });

        if (projectSelect.value) {
            projectSelect.dispatchEvent(new Event('change'));
        }

        const ratingSelects = document.querySelectorAll('.rating-select');
        const totalScoreDisplay = document.getElementById('totalScore');

        function updateCalculations() {
            let total = 0;
            document.querySelectorAll('.criteria-row').forEach(row => {
                const weight = parseFloat(row.dataset.weight);
                const mark = parseFloat(row.querySelector('.rating-select').value) || 0;
                const actual = (mark / 5) * weight;
                row.querySelector('.actual-mark').textContent = actual.toFixed(2);
                total += actual;
            });

            totalScoreDisplay.textContent = total.toFixed(2);

            if (total > 0) {
                if (total >= 70) {
                    decisionBadge.textContent = 'SATISFACTORY';
                    decisionBadge.style.background = '#dcfce7';
                    decisionBadge.style.color = '#15803d';
                    decisionBadge.style.transform = 'scale(1.05)';
                } else {
                    decisionBadge.textContent = 'UNSATISFACTORY';
                    decisionBadge.style.background = '#fee2e2';
                    decisionBadge.style.color = '#b91c1c';
                    decisionBadge.style.transform = 'scale(1.05)';
                }
            } else {
                decisionBadge.textContent = 'PENDING RATING';
                decisionBadge.style.background = '#e2e8f0';
                decisionBadge.style.color = '#64748b';
                decisionBadge.style.transform = 'scale(1)';
            }
        }

        ratingSelects.forEach(select => {
            select.addEventListener('change', updateCalculations);
        });
    });
</script>
@endsection
