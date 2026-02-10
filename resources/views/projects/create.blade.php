@extends('layouts.app')

@section('title', 'Register Project')
@section('header_title', 'Initiative Registration')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding-bottom: 4rem;">
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <!-- Intelligent Header Card (Live Preview) -->
        <div class="header-preview-card">
            <div class="preview-badge">NEW PROJECT</div>
            <h2 id="preview-title" style="color:white; margin:0;">Untitled Research Project</h2>
            <div class="preview-meta">
                <span id="preview-directorate">No Directorate Assigned</span>
                <span>•</span>
                <span id="preview-year">{{ date('Y') }}</span>
            </div>
            <div class="preview-meta" style="margin-top: 0.25rem; font-size: 0.85rem; opacity: 0.9;">
                <span id="preview-pi" style="font-weight: 400;">No PI Selected</span>
            </div>
        </div>
        
        <!-- Premium Form Card -->
        <div class="premium-card">
            
            <!-- Section: Core Details -->
            <div class="form-section">
                <div class="form-group">
                    <label for="research_title">Research Title <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <input type="text" id="research_title" name="research_title" value="{{ old('research_title') }}" required placeholder="Enter the full scientific title of the research..." oninput="updatePreview(this.value)" />
                        <div class="input-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                    </div>
                    @error('research_title')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="divider"></div>

            <!-- Section: Leadership -->
            <div class="form-section">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div class="form-group">
                        <label for="pi_id">Principal Investigator (PI) <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <select name="pi_id" id="pi_id" required>
                                <option value="">Select Professional</option>
                                @foreach($employees->groupBy('directorate.name') as $directorateName => $staff)
                                    <optgroup label="{{ $directorateName }}">
                                        @foreach($staff as $emp)
                                            <option value="{{ $emp->id }}" 
                                                    data-directorate="{{ $directorateName }}"
                                                    data-code="{{ strtoupper(substr($directorateName, 0, 3)) }}"
                                                    {{ old('pi_id') == $emp->id ? 'selected' : '' }}>
                                                {{ $emp->full_name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div class="select-arrow">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                        @error('pi_id')
                            <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Assigned Directorate</label>
                        <div id="directorate-badge" class="directorate-badge empty">
                            <span class="badge-icon">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </span>
                            <span id="directorate-text">Pending Selection...</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Section: Objectives -->
            <div class="form-section">
                <div class="form-group">
                    <label for="objective">General Objectives</label>
                    <div class="input-wrapper">
                        <textarea  name="objective" id="objective" rows="5" placeholder="Outline the primary goals and intended impact of this research...">{{ old('objective') }}</textarea>
                        <div class="input-icon textarea-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                        </div>
                    </div>
                    @error('objective')
                        <div class="error-msg">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="divider"></div>

            <!-- Section: Schedule & Ref -->
            <div class="form-section">
                <div style="display: grid; grid-template-columns: 1fr 1fr 1.5fr; gap: 2rem;">
                    <div class="form-group">
                        <label for="start_year">Start Year <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="number" id="start_year" name="start_year" value="{{ old('start_year', date('Y')) }}" required min="1900" max="2100" oninput="document.getElementById('preview-year').innerText = this.value" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                        @error('start_year')
                            <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="end_year">End Year</label>
                        <div class="input-wrapper">
                            <input type="number" id="end_year" name="end_year" value="{{ old('end_year') }}" min="1900" max="2100" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="project_code">Project Code <span  id="auto-gen-badge" style="display:none; font-size: 0.75rem; background: #dbeafe; color: #1e40af; padding: 0.1rem 0.5rem; border-radius: 99px; margin-left: 0.5rem;">Auto-Suggested</span></label>
                        <div class="input-wrapper">
                            <input type="text" id="project_code" name="project_code" value="{{ old('project_code') }}" placeholder="e.g. BETin/SAD/24/001" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                            </div>
                        </div>
                        @error('project_code')
                            <div class="error-msg">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Register
                </button>
                <a href="{{ route('projects.index') }}" class="btn-secondary">
                    Discard
                </a>
            </div>
        </div>
    </form>
</div>

<style>
    /* Live Preview Card */
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
        transform: translateY(20px);
        width: 92%;
        margin-left: auto;
        margin-right: auto;
        overflow: hidden;
    }

    .header-preview-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
        pointer-events: none;
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

    .header-preview-card h2 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        line-height: 1.2;
        text-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    .preview-meta {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 0.75rem;
        font-weight: 600;
        display: flex;
        gap: 0.75rem;
        align-items: center;
        justify-content: center;
    }

    /* Premium Form Styling */
    .premium-card {
        background: white;
        border-radius: 20px;
        padding: 3rem 2rem 2rem 2rem; /* Reduced padding */
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(0, 0, 0, 0.02);
        position: relative;
        overflow: hidden;
        z-index: 5;
    }

    .form-section {
        background: #fdfdfd; 
        border: 1px solid #f3f4f6;
        border-radius: 12px;
        padding: 1.5rem; /* Reduced internal padding */
        margin-bottom: 1.25rem; /* Reduced gap between sections */
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .form-section:hover {
        background: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        transform: translateY(-1px);
        border-color: #e2e8f0;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .section-header h4 {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--brand-blue);
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .icon-wrapper {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-wrapper.blue { background: rgba(0, 59, 92, 0.08); color: var(--brand-blue); }
    .icon-wrapper.green { background: rgba(0, 139, 75, 0.08); color: var(--brand-green); }

    .divider {
        height: 1px;
        background: #f1f5f9;
        margin: 1.5rem 0; /* Reduced divider margin */
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.35rem; /* Tighter label-input gap */
        margin-bottom: 0.75rem; /* Tighter field grouping */
    }

    .form-group label {
        font-weight: 800; /* Extra Bold */
        color: #1e293b; /* Darker Color */
        font-size: 0.9rem;
        display: flex;
        align-items: center;
    }
    
    /* Make Research Title Input stronger */
    #research_title {
        font-weight: 800;
        font-size: 1.1rem;
        color: var(--brand-blue);
    }
    
    .form-group label .required {
        color: #ef4444;
        margin-left: 0.25rem;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper input, .input-wrapper select, .input-wrapper textarea {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 3rem; /* Slightly reduced input padding */
        border: 2px solid #e2e8f0;
        border-radius: 10px; /* Slightly tighter radius */
        font-size: 0.95rem;
        font-weight: 600;
        color: #1e293b;
        transition: all 0.2s ease;
        background: #f8fafc;
    }

    .input-wrapper textarea {
        padding-top: 1rem;
        min-height: 120px;
        resize: vertical;
    }
    
    .input-wrapper select {
        appearance: none;
        cursor: pointer;
    }
    
    .input-wrapper select optgroup {
        font-weight: 800;
        color: var(--brand-blue);
        font-style: normal;
    }

    .input-wrapper input:focus, .input-wrapper select:focus, .input-wrapper textarea:focus {
        border-color: var(--brand-blue);
        background: white;
        box-shadow: 0 0 0 4px rgba(0, 59, 92, 0.1);
        outline: none;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
        transition: color 0.2s ease;
    }
    
    .textarea-icon {
        top: 1.6rem;
        transform: none;
    }
    
    .select-arrow {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
    }

    .input-wrapper input:focus + .input-icon, 
    .input-wrapper select:focus + .input-icon,
    .input-wrapper textarea:focus + .input-icon {
        color: var(--brand-blue);
    }
    
    /* Directorate Badge */
    .directorate-badge {
        background: #e0f2fe;
        color: #0369a1;
        border: 1px solid #bae6fd;
        padding: 0.9rem 1rem;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 700;
        transition: all 0.3s ease;
    }
    
    .directorate-badge.empty {
        background: #f1f5f9;
        color: #94a3b8;
        border-color: #e2e8f0;
    }

    .error-msg {
        color: #ef4444;
        font-size: 0.85rem;
        font-weight: 600;
        margin-top: 0.25rem;
    }

    .form-actions {
        display: flex;
        gap: 1.5rem;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #f1f5f9;
    }

    .btn-primary {
        flex: 2;
        background: linear-gradient(135deg, var(--brand-green), #059669);
        color: white;
        padding: 1rem;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 8px 20px rgba(0, 139, 75, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(0, 139, 75, 0.4);
    }

    .btn-secondary {
        flex: 1;
        background: white;
        color: #64748b;
        padding: 1rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        border: 2px solid #e2e8f0;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-secondary:hover {
        background: #f1f5f9;
        color: #475569;
        border-color: #cbd5e1;
    }
    
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    function updatePreview(val) {
        document.getElementById('preview-title').innerText = val || 'Untitled Research Project';
    }

    document.getElementById('pi_id').addEventListener('change', function() {
        // Get the selected options data
        const selected = this.options[this.selectedIndex];
        const directorate = selected.getAttribute('data-directorate');
        const code = selected.getAttribute('data-code');
        const piName = selected.text;
        
        // Update the display badge and preview
        const badge = document.getElementById('directorate-badge');
        const badgeText = document.getElementById('directorate-text');
        const previewDir = document.getElementById('preview-directorate');
        const previewPi = document.getElementById('preview-pi');
        
        if(directorate) {
            badge.classList.remove('empty');
            badgeText.innerText = directorate;
            previewDir.innerText = directorate;
            previewPi.innerText = 'Led by ' + piName.trim();
            previewPi.style.fontWeight = '700';
            
            // Auto Suggest Code if empty
            const codeInput = document.getElementById('project_code');
            const year = new Date().getFullYear();
            if(!codeInput.value) {
                codeInput.value = `BETin/${code}/${year}/XXX`;
                document.getElementById('auto-gen-badge').style.display = 'inline-block';
            }
        } else {
            badge.classList.add('empty');
            badgeText.innerText = 'Pending Selection...';
            previewDir.innerText = 'No Directorate Assigned';
            previewPi.innerText = 'No PI Selected';
            previewPi.style.fontWeight = '400';
        }
    });

    // Run on load in case of validation errors returning old input
    window.addEventListener('DOMContentLoaded', () => {
        const piSelect = document.getElementById('pi_id');
        if (piSelect && piSelect.value) {
            piSelect.dispatchEvent(new Event('change'));
        }
        
        // Also run live preview update for title and year
        const titleInput = document.getElementById('research_title');
        if(titleInput && titleInput.value) updatePreview(titleInput.value);
        
        const yearInput = document.getElementById('start_year');
        if(yearInput && yearInput.value) document.getElementById('preview-year').innerText = yearInput.value;
    });
</script>
@endsection
