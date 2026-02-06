@extends('layouts.app')

@section('title', 'Project Evaluation')
@section('header_title', 'New Project Evaluation')

@section('content')
<div class="card">
    <form action="{{ route('evaluations.store') }}" method="POST" id="evaluationForm">
        @csrf
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem; background: #f8fafc; padding: 2rem; border-radius: 12px;">
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Select Project to Evaluate</label>
                <select name="project_id" id="project_id" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: white;">
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
                <div id="projectDetails" style="margin-top: 1rem; font-size: 0.85rem; display: none;">
                    <p><strong>PI:</strong> <span id="display_pi"></span></p>
                    <p><strong>Directorate:</strong> <span id="display_dir"></span></p>
                </div>
            </div>
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Lead Evaluator (Chair)</label>
                <select name="evaluator_id" id="evaluator_id" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">-- Select Staff Member --</option>
                    @foreach($employees as $emp)
                        <option value="{{ $emp->id }}" data-emp-id="{{ $emp->id }}" {{ old('evaluator_id') == $emp->id ? 'selected' : '' }}>{{ $emp->full_name }} ({{ $emp->directorate->name }})</option>
                    @endforeach
                </select>
                @error('evaluator_id')
                    <div style="color: #b91c1c; font-size: 0.8rem; margin-top: 0.5rem; font-weight: 600;">{{ $message }}</div>
                @enderror
                <div id="piWarning" style="display: none; background: #fef3c7; color: #92400e; padding: 0.75rem; border-radius: 8px; margin-top: 0.75rem; font-size: 0.8rem; font-weight: 600; border: 1px solid #fbbf24;">
                    ⚠️ Conflict of Interest: The PI cannot serve as the evaluation chairperson for their own project.
                </div>
            </div>
        </div>

        <div style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.25rem; border-radius: 12px; margin-bottom: 2rem; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
            <div style="font-size: 0.75rem; font-weight: 800; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Evaluation Rating Scale</div>
            <div style="display: flex; gap: 1.25rem; flex-wrap: wrap; justify-content: center;">
                <div style="display: flex; align-items: center; gap: 0.5rem; background: white; padding: 0.5rem 1rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                    <span style="width: 24px; height: 24px; background: #22c55e; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem;">5</span>
                    <span style="font-weight: 700; color: #166534; font-size: 0.9rem;">Excellent</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem; background: white; padding: 0.5rem 1rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                    <span style="width: 24px; height: 24px; background: #34d399; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem;">4</span>
                    <span style="font-weight: 700; color: #065f46; font-size: 0.9rem;">Very Good</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem; background: white; padding: 0.5rem 1rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                    <span style="width: 24px; height: 24px; background: #f59e0b; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem;">3</span>
                    <span style="font-weight: 700; color: #92400e; font-size: 0.9rem;">Good</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem; background: white; padding: 0.5rem 1rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                    <span style="width: 24px; height: 24px; background: #f97316; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem;">2</span>
                    <span style="font-weight: 700; color: #9a3412; font-size: 0.9rem;">Fair</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem; background: white; padding: 0.5rem 1rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                    <span style="width: 24px; height: 24px; background: #ef4444; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.8rem;">1</span>
                    <span style="font-weight: 700; color: #991b1b; font-size: 0.9rem;">Poor</span>
                </div>
            </div>
        </div>

        <table style="width: 100%; margin-bottom: 3rem;">
            <thead>
                <tr>
                    <th style="width: 50%;">Evaluation Criteria</th>
                    <th style="text-align: center;">Weight (%)</th>
                    <th style="text-align: center;">Rating (1-5)</th>
                    <th style="text-align: right;">Actual Mark</th>
                </tr>
            </thead>
            <tbody>
                <tr class="criteria-row" data-weight="20">
                    <td>1. Thematic area alignment with the priority area</td>
                    <td style="text-align: center;">20</td>
                    <td>
                        <select name="thematic_area_mark" class="rating-select" required style="width: 100%; padding: 0.5rem; border-radius: 6px; border: 1px solid var(--border-color);">
                            <option value="">Select</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 700;">0.00</td>
                </tr>
                <tr class="criteria-row" data-weight="25">
                    <td>2. Relevance to the socio-economic needs/priorities</td>
                    <td style="text-align: center;">25</td>
                    <td>
                        <select name="relevance_mark" class="rating-select" required style="width: 100%; padding: 0.5rem; border-radius: 6px; border: 1px solid var(--border-color);">
                            <option value="">Select</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 700;">0.00</td>
                </tr>
                <tr class="criteria-row" data-weight="25">
                    <td>3. Research Methodology (Design, data collection, sampling...)</td>
                    <td style="text-align: center;">25</td>
                    <td>
                        <select name="methodology_mark" class="rating-select" required style="width: 100%; padding: 0.5rem; border-radius: 6px; border: 1px solid var(--border-color);">
                            <option value="">Select</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 700;">0.00</td>
                </tr>
                <tr class="criteria-row" data-weight="20">
                    <td>4. Feasibility and Preliminary Results</td>
                    <td style="text-align: center;">20</td>
                    <td>
                        <select name="feasibility_mark" class="rating-select" required style="width: 100%; padding: 0.5rem; border-radius: 6px; border: 1px solid var(--border-color);">
                            <option value="">Select</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 700;">0.00</td>
                </tr>
                <tr class="criteria-row" data-weight="10">
                    <td>5. Overall Proposal/Presentation Quality</td>
                    <td style="text-align: center;">10</td>
                    <td>
                        <select name="overall_proposal_mark" class="rating-select" required style="width: 100%; padding: 0.5rem; border-radius: 6px; border: 1px solid var(--border-color);">
                            <option value="">Select</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                        </select>
                    </td>
                    <td class="actual-mark" style="text-align: right; font-weight: 700;">0.00</td>
                </tr>
                <tr style="background: #e2e8f0; border-top: 2px solid var(--primary-navy);">
                    <td colspan="3" style="text-align: right; padding: 1.5rem; font-weight: 800;">TOTAL EVALUATION SCORE (100%)</td>
                    <td id="totalScore" style="text-align: right; padding: 1.5rem; font-size: 1.4rem; font-weight: 900; color: var(--primary-navy);">0.00</td>
                </tr>
            </tbody>
        </table>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 2rem;">
            <div style="flex-grow: 1;">
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Evaluator's Comments and Suggestions</label>
                <textarea name="comments" rows="5" style="width: 100%; padding: 1rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;" placeholder="Detailed feedback..."></textarea>
            </div>
            <div style="width: 300px; padding: 2rem; background: #f8fafc; border-radius: 12px; text-align: center;">
                <div style="font-size: 0.75rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Overall Decision</div>
                <div id="decisionBadge" style="display: inline-block; padding: 0.75rem 1.5rem; border-radius: 50px; font-weight: 800; font-size: 1rem; background: #e2e8f0; color: #64748b;">
                    PENDING RATING
                </div>
            </div>
        </div>

        <div style="margin-top: 3rem; display: flex; justify-content: center; gap: 1rem;">
            <button type="submit" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.1rem;">
                Submit Final Evaluation
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
        const evaluatorSelect = document.getElementById('evaluator_id');
        const piWarning = document.getElementById('piWarning');

        function handleProjectChange() {
            const selected = projectSelect.options[projectSelect.selectedIndex];
            if (selected && selected.value) {
                const piId = selected.dataset.piId;
                displayPi.textContent = selected.dataset.pi;
                displayDir.textContent = selected.dataset.dir;
                projectDetails.style.display = 'block';
                
                // Filter evaluator dropdown to exclude PI
                Array.from(evaluatorSelect.options).forEach(option => {
                    if (option.dataset.empId === piId) {
                        option.disabled = true;
                        option.style.color = '#cbd5e1';
                        option.textContent = option.textContent.replace(' (PI - Cannot Evaluate Own Project)', '') + ' (PI - Cannot Evaluate Own Project)';
                    } else {
                        option.disabled = false;
                        option.style.color = '';
                        option.textContent = option.textContent.replace(' (PI - Cannot Evaluate Own Project)', '');
                    }
                });
                
                // Show warning if PI is currently selected as evaluator
                if (evaluatorSelect.value === piId) {
                    piWarning.style.display = 'block';
                    evaluatorSelect.value = ''; // Clear the selection
                } else {
                    piWarning.style.display = 'none';
                }
            } else {
                projectDetails.style.display = 'none';
                piWarning.style.display = 'none';
                // Re-enable all evaluator options
                Array.from(evaluatorSelect.options).forEach(option => {
                    option.disabled = false;
                    option.style.color = '';
                    option.textContent = option.textContent.replace(' (PI - Cannot Evaluate Own Project)', '');
                });
            }
        }

        projectSelect.addEventListener('change', handleProjectChange);
        if (projectSelect.value) handleProjectChange();

        const ratingSelects = document.querySelectorAll('.rating-select');
        const totalScoreDisplay = document.getElementById('total_score'); // Note: The ID in the cell is totalScore
        const decisionBadge = document.getElementById('decisionBadge');

        function updateCalculations() {
            let total = 0;
            document.querySelectorAll('.criteria-row').forEach(row => {
                const weight = parseFloat(row.dataset.weight);
                const mark = parseFloat(row.querySelector('.rating-select').value) || 0;
                const actual = (mark / 5) * weight;
                row.querySelector('.actual-mark').textContent = actual.toFixed(2);
                total += actual;
            });

            document.getElementById('totalScore').textContent = total.toFixed(2);

            if (total > 0) {
                if (total >= 70) {
                    decisionBadge.textContent = 'SATISFACTORY';
                    decisionBadge.style.background = '#dcfce7';
                    decisionBadge.style.color = '#15803d';
                } else {
                    decisionBadge.textContent = 'UNSATISFACTORY';
                    decisionBadge.style.background = '#fee2e2';
                    decisionBadge.style.color = '#b91c1c';
                }
            } else {
                decisionBadge.textContent = 'PENDING RATING';
                decisionBadge.style.background = '#e2e8f0';
                decisionBadge.style.color = '#64748b';
            }
        }

        ratingSelects.forEach(select => {
            select.addEventListener('change', updateCalculations);
        });
    });
</script>
@endsection
