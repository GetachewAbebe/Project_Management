@extends('layouts.app')

@section('title', 'Staff Enrollment')
@section('header_title', 'Personnel Registration')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding-bottom: 4rem;">
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <!-- Personnel Identity Card (Live Preview) -->
        <div class="header-preview-card">
            <div class="preview-badge">NEW PERSONNEL PROFILE</div>
            <div style="display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                <div id="preview-avatar" style="width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; font-weight: 950; border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px);">?</div>
                <div>
                    <h2 id="preview-name" style="color:white; margin:0;">Untitled Professional</h2>
                    <div class="preview-meta">
                        <span id="preview-position">Role Pending Definition</span>
                        <span>•</span>
                        <span id="preview-id">ID: GEN-000</span>
                    </div>
                </div>
            </div>
            <div id="preview-directorate-meta" class="preview-meta" style="margin-top: 1rem; font-size: 0.85rem; opacity: 0.9;">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 0.5rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                <span id="preview-directorate-text">No Directorate Assigned</span>
            </div>
        </div>
        
        <!-- Premium Form Card -->
        <div class="premium-card">
            
            <!-- Section: Primary Identity -->
            <div class="form-section">
                <div class="section-header">
                    <div class="icon-wrapper blue">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <h4>Formal Identity</h4>
                </div>
                
                <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 2rem;">
                    <div class="form-group">
                        <label for="full_name">Full Professional Name <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required placeholder="e.g. Dr. Abebe Kebede" oninput="updateName(this.value)" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                        </div>
                        @error('full_name')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="institutional_id">Institutional ID</label>
                        <div class="input-wrapper">
                            <input type="text" id="institutional_id" name="institutional_id" value="{{ old('institutional_id') }}" placeholder="BET/STAFF/000" oninput="document.getElementById('preview-id').innerText = 'ID: ' + (this.value || 'GEN-000')" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                            </div>
                        </div>
                        @error('institutional_id')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-group" style="margin-top: 1.5rem;">
                    <label for="email">Institutional Email Address</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="name@betin.gov.et" />
                        <div class="input-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                    </div>
                    <div style="font-size: 0.75rem; color: #64748b; margin-top: 0.25rem; font-weight: 600;">* Required only if system access is granted.</div>
                    @error('email')<span class="error-msg">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="divider"></div>

            <!-- Section: Institutional Role -->
            <div class="form-section">
                <div class="section-header">
                    <div class="icon-wrapper green">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h4>Position & Placement</h4>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div class="form-group">
                        <label for="position">Professional Job Title</label>
                        <div class="input-wrapper">
                            <input type="text" id="position" name="position" value="{{ old('position') }}" placeholder="e.g. Lead Research Scientist" oninput="document.getElementById('preview-position').innerText = this.value || 'Role Pending Definition'" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                        </div>
                        @error('position')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="directorate_id">Assigned Directorate <span class="required">*</span></label>
                        <div class="input-wrapper">
                            <select name="directorate_id" id="directorate_id" required onchange="updateDirectoratePreview(this)">
                                <option value="">Select Department</option>
                                @foreach($directorates as $dir)
                                    <option value="{{ $dir->id }}" {{ old('directorate_id') == $dir->id ? 'selected' : '' }}>{{ $dir->name }}</option>
                                @endforeach
                            </select>
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <div class="select-arrow">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                        @error('directorate_id')<span class="error-msg">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Section: System Access -->
            <div class="form-section" style="background: #f0f9ff; border-color: #e0f2fe;">
                <div class="section-header">
                    <div class="icon-wrapper blue" style="background: #e0f2fe; color: #0369a1;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h4 style="color: #0369a1;">Security & System Access</h4>
                </div>

                <div class="form-group">
                    <label for="system_role">System Access Strategy <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <select name="system_role" id="system_role" required>
                            <option value="employee">Registry Only (No System Account)</option>
                            <option value="director">Institutional Director (Admin & Management)</option>
                            <option value="evaluator">Expert Evaluator (Reviewer Privileges)</option>
                        </select>
                        <div class="input-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                        </div>
                        <div class="select-arrow">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                </div>

                <div style="background: white; border-radius: 12px; padding: 1.25rem; margin-top: 1.5rem; border: 1px solid #bae6fd; display: flex; gap: 1rem; align-items: flex-start;">
                    <div style="color: #0369a1;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div>
                        <div style="font-weight: 800; color: #0369a1; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Provisioning Protocol</div>
                        <p style="font-size: 0.85rem; color: #0c4a6e; opacity: 0.8; line-height: 1.5; margin-top: 0.35rem; font-weight: 600;">
                            Granting "Director" or "Evaluator" access will automatically dispatch a secure system invitation to the staff member's formal email address.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    Complete Enrollment
                </button>
                <a href="{{ route('employees.index') }}" class="btn-secondary">
                    Discard
                </a>
            </div>
        </div>
    </form>
</div>

<style>
    /* Premium Theming (Synced with Project Creation) */
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

    .premium-card {
        background: white;
        border-radius: 20px;
        padding: 4.5rem 2.5rem 2.5rem 2.5rem;
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
        padding: 1.75rem;
        margin-bottom: 1.5rem;
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
        margin-bottom: 1.75rem;
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
        margin: 1.5rem 0;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .form-group label {
        font-weight: 800;
        color: #1e293b;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.02em;
        display: flex;
        align-items: center;
    }
    
    .form-group label .required {
        color: #ef4444;
        margin-left: 0.25rem;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper input, .input-wrapper select {
        width: 100%;
        padding: 1rem 1rem 1rem 3.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
        transition: all 0.2s ease;
        background: #f8fafc;
    }
    
    .input-wrapper select {
        appearance: none;
        cursor: pointer;
    }

    .input-wrapper input:focus, .input-wrapper select:focus {
        border-color: var(--brand-blue);
        background: white;
        box-shadow: 0 0 0 4px rgba(0, 59, 92, 0.1);
        outline: none;
    }

    .input-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
        transition: color 0.2s ease;
    }
    
    .select-arrow {
        position: absolute;
        right: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
    }

    .input-wrapper input:focus + .input-icon, 
    .input-wrapper select:focus + .input-icon {
        color: var(--brand-blue);
    }
    
    .error-msg {
        color: #ef4444;
        font-size: 0.85rem;
        font-weight: 700;
        margin-top: 0.35rem;
        display: block;
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
        padding: 1.25rem;
        border-radius: 14px;
        font-weight: 800;
        font-size: 1.05rem;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 10px 25px rgba(0, 139, 75, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(0, 139, 75, 0.4);
    }

    .btn-secondary {
        flex: 1;
        background: white;
        color: #64748b;
        padding: 1.25rem;
        border-radius: 14px;
        font-weight: 700;
        font-size: 1.05rem;
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
</style>

<script>
    function updateName(val) {
        const previewName = document.getElementById('preview-name');
        const previewAvatar = document.getElementById('preview-avatar');
        
        previewName.innerText = val || 'Untitled Professional';
        
        if(val && val.trim()) {
            previewAvatar.innerText = val.trim().charAt(0).toUpperCase();
            previewAvatar.style.background = 'rgba(255,255,255,0.3)';
        } else {
            previewAvatar.innerText = '?';
            previewAvatar.style.background = 'rgba(255,255,255,0.2)';
        }
    }

    function updateDirectoratePreview(select) {
        const text = select.options[select.selectedIndex].text;
        const previewText = document.getElementById('preview-directorate-text');
        
        if(select.value) {
            previewText.innerText = text;
        } else {
            previewText.innerText = 'No Directorate Assigned';
        }
    }

    // Initialize state
    window.addEventListener('DOMContentLoaded', () => {
        updateName(document.getElementById('full_name').value);
        updateDirectoratePreview(document.getElementById('directorate_id'));
    });
</script>
@endsection
