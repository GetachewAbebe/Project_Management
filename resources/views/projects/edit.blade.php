@extends('layouts.app')

@section('title', 'Edit Project')
@section('header_title', 'Update Project Details')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding-bottom: 4rem;">
    
    <!-- Live Preview Card (Matching Registration/Details) -->
    <div class="header-preview-card" id="preview-card">
        <div class="preview-badge" id="preview-status-badge">
            {{ $project->status == 'REGISTERED' ? 'NEW PROJECT' : $project->status }}
        </div>
        <h2 id="preview-title" style="color:white; margin:0; font-weight: 800; font-size: 2rem;">{{ $project->research_title }}</h2>
        <div class="preview-meta">
            <span id="preview-directorate">{{ $project->directorate->name }}</span>
            <span>•</span>
            <span id="preview-year">{{ $project->start_year }}</span>
        </div>
        <div class="preview-meta" style="margin-top: 0.25rem; font-size: 0.85rem; opacity: 0.9;">
            <span id="preview-pi" style="font-weight: 700;">Led by {{ $project->pi->full_name }}</span>
        </div>
    </div>

    <!-- Premium Form Card -->
    <div class="premium-card">
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Section: Core Details -->
            <div class="form-section">
                <div class="form-group">
                    <label for="research_title">Research Title <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <input type="text" id="research_title" name="research_title" value="{{ old('research_title', $project->research_title) }}" required placeholder="Enter the full scientific title..." oninput="updatePreview(this.value)" />
                        <div class="input-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Section: Leadership & Status -->
            <div class="form-section">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div class="form-group">
                        <label for="pi_id">Principal Investigator (PI) <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <select name="pi_id" id="pi_id" required>
                                @foreach($employees->groupBy('directorate.name') as $directorateName => $staff)
                                    <optgroup label="{{ $directorateName }}">
                                        @foreach($staff as $emp)
                                            <option value="{{ $emp->id }}" 
                                                    data-directorate="{{ $directorateName }}"
                                                    {{ old('pi_id', $project->pi_id) == $emp->id ? 'selected' : '' }}>
                                                {{ $emp->full_name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Project Status <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <select name="status" id="status" required onchange="updateStatusPreview(this.value)">
                                <option value="REGISTERED" {{ old('status', $project->status) == 'REGISTERED' ? 'selected' : '' }}>NEW (REGISTERED)</option>
                                <option value="ACTIVE" {{ old('status', $project->status) == 'ACTIVE' ? 'selected' : '' }}>ACTIVE PROGRESS</option>
                                <option value="FINALIZED" {{ old('status', $project->status) == 'FINALIZED' ? 'selected' : '' }}>FINALIZED</option>
                            </select>
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Section: Objectives -->
            <div class="form-section">
                <div class="form-group">
                    <label for="objective">General Objectives <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <textarea name="objective" id="objective" rows="5" required placeholder="Outline the goals...">{{ old('objective', $project->objective) }}</textarea>
                        <div class="input-icon textarea-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Section: Schedule & Code -->
            <div class="form-section">
                <div style="display: grid; grid-template-columns: 1fr 1fr 1.5fr; gap: 2rem;">
                    <div class="form-group">
                        <label for="start_year">Start Year <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="number" id="start_year" name="start_year" value="{{ old('start_year', $project->start_year) }}" required min="1900" max="2100" oninput="document.getElementById('preview-year').innerText = this.value" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="end_year">End Year</label>
                        <div class="input-wrapper">
                            <input type="number" id="end_year" name="end_year" value="{{ old('end_year', $project->end_year) }}" min="1900" max="2100" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="project_code">Project Code</label>
                        <div class="input-wrapper">
                            <input type="text" id="project_code" name="project_code" value="{{ old('project_code', $project->project_code) }}" placeholder="e.g. BETin/DIR/24/001" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Update Project
                </button>
                <a href="{{ route('projects.show', $project->id) }}" class="btn-secondary">
                    Discard Changes
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    /* Styles matching create.blade.php for perfect consistency */
    .header-preview-card {
        background: linear-gradient(135deg, var(--brand-blue), #1e3a8a);
        border-radius: 20px;
        padding: 3.5rem 2rem;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.15);
        transform: translateY(20px);
        width: 92%;
        margin: 0 auto;
        color: white;
        position: relative;
        z-index: 10;
        box-shadow: 0 10px 30px rgba(30, 58, 138, 0.15);
    }

    .preview-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 0.35rem 1.25rem;
        border-radius: 99px;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        margin-bottom: 1.25rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .preview-meta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        font-size: 1.1rem;
        opacity: 0.85;
        font-weight: 500;
        margin-top: 0.5rem;
    }

    .premium-card {
        background: white;
        border-radius: 20px;
        padding: 3rem 2rem 2rem 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(0, 0, 0, 0.02);
        position: relative;
        z-index: 5;
    }

    .form-section {
        background: #fdfdfd; 
        border: 1px solid #f3f4f6;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.25rem;
    }

    .divider { height: 1px; background: #f1f5f9; margin: 1.5rem 0; }

    .form-group { display: flex; flex-direction: column; gap: 0.35rem; margin-bottom: 0.75rem; }
    .form-group label { font-weight: 800; color: #1e293b; font-size: 0.9rem; }
    
    #research_title { font-weight: 800; font-size: 1.1rem; color: var(--brand-blue); }

    .input-wrapper { position: relative; display: flex; align-items: center; }
    .input-wrapper input, .input-wrapper select, .input-wrapper textarea {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 3rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 600;
        color: #1e293b;
        background: #f8fafc;
    }

    .input-icon { position: absolute; left: 1rem; color: #94a3b8; }
    .required { color: #ef4444; margin-left: 0.25rem; }

    .btn-primary {
        background: var(--brand-blue);
        color: white;
        padding: 0.9rem 2rem;
        border-radius: 12px;
        font-weight: 800;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-secondary {
        background: #f1f5f9;
        color: #475569;
        padding: 0.9rem 2rem;
        border-radius: 12px;
        font-weight: 800;
        text-decoration: none;
    }

    .form-actions { display: flex; gap: 1rem; margin-top: 2rem; padding-top: 1rem; }
</style>

<script>
    function updatePreview(val) {
        document.getElementById('preview-title').innerText = val || 'Untitled Research Project';
    }

    function updateStatusPreview(val) {
        const badge = document.getElementById('preview-status-badge');
        badge.innerText = val === 'REGISTERED' ? 'NEW PROJECT' : val;
    }

    document.getElementById('pi_id').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const dirName = selected.getAttribute('data-directorate');
        document.getElementById('preview-directorate').innerText = dirName || 'No Directorate';
        document.getElementById('preview-pi').innerText = 'Led by ' + selected.text.trim();
    });
</script>
@endsection
