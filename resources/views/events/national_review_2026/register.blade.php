<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annual Review Registry 2026 | Bio and Emerging Technology Institute</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --obsidian: #0a1a0e;
            --navy: #1a5c2e;
            --emerald: #1a7a3c;
            --emerald-glow: rgba(26, 122, 60, 0.35);
            --emerald-light: rgba(26, 122, 60, 0.08);
            --gold: #f59e0b;
            --border: #e2e8f0;
            --ease: cubic-bezier(0.16, 1, 0.3, 1);
            --slate: #64748b;
            --smoke: #f8fafc;
            --shadow-deep: 0 20px 60px -15px rgba(0,0,0,0.08);
            --shadow-soft: 0 10px 40px -10px rgba(0,0,0,0.05);
        }

        /* Custom Typography Refinements */
        sup {
            font-size: 0.65em;
            vertical-align: super;
            line-height: 0;
            position: relative;
            top: -0.1em;
            margin-left: 0.05em;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── HEADER (Vibrant Zenith) ── */
        .hero-nav {
            position: sticky; top: 0; z-index: 100;
            display: flex; align-items: center; justify-content: center;
            padding: 1.5rem 5rem;
            background: linear-gradient(135deg, #0f172a 30%, #1a4a6b 100%);
            backdrop-filter: blur(24px);
            border-bottom: 2px solid rgba(255,255,255,0.1);
            border-top: 4px solid var(--emerald);
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            transition: all 0.5s var(--ease);
        }

        .hero-nav::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.03);
            pointer-events: none;
        }

        .hero-nav:hover {
            padding-top: 1.3rem;
            padding-bottom: 1.3rem;
            background: linear-gradient(135deg, #131d35 30%, #1a7a3c 100%);
        }

        .nav-brand { display: flex; align-items: center; gap: 2rem; }
        .nav-logo-box {
            background: white; padding: 0.8rem 1.1rem; border-radius: 16px;
            width: 110px; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.4s var(--ease);
            flex-shrink: 0;
        }

        .nav-logo-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 163, 108, 0.2);
        }
        .nav-title { display: flex; align-items: center; gap: 2rem; font-family: 'Outfit', sans-serif; color: white; line-height: 1; position: relative; }
        .nav-title::after { 
            content: ''; 
            width: 1px; height: 32px; 
            background: rgba(255,255,255,0.2); 
            margin: 0 -0.5rem;
        }
        .nav-title-main { font-size: 1.25rem; font-weight: 900; letter-spacing: -0.02em; white-space: nowrap; color: white; }
        .nav-title-sub { 
            font-size: 0.95rem; font-weight: 800; color: var(--emerald); 
            letter-spacing: 0.2em; text-transform: uppercase; white-space: nowrap;
            filter: drop-shadow(0 0 10px rgba(0, 163, 108, 0.4));
        }

        /* ── FOOTER (Vibrant Zenith) ── */
        .hero-footer {
            padding: 2rem 5rem; text-align: center;
            background: linear-gradient(135deg, #1a7a3c 0%, #0f172a 100%);
            border-top: 1px solid rgba(255,255,255,0.1);
            width: 100%;
            margin-top: auto;
            position: relative;
            box-shadow: 0 -10px 40px rgba(0,0,0,0.1);
        }

        .hero-footer::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.02);
            pointer-events: none;
        }

        .footer-tiny { font-size: 0.95rem; color: rgba(255,255,255,0.6); font-weight: 500; letter-spacing: 0.02em; position: relative; z-index: 2; }
        .footer-tiny span { color: white; font-weight: 800; border-bottom: 2px solid var(--emerald); }

        /* ── PAGE CONTENT ── */
        .page-content {
            flex: 1; display: flex; align-items: flex-start; justify-content: center;
            padding: 3rem 2rem;
        }

        .register-container {
            width: 100%; max-width: 1400px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-deep);
            display: grid; grid-template-columns: 320px 1fr;
            position: relative;
        }

        .register-container::after {
            content: ''; position: absolute; top: 0; left: -100%; width: 50%; height: 100%;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);
            transform: skewX(-25deg); transition: 0.7s; pointer-events: none;
        }
        .register-container:hover::after { left: 150%; }

        /* ── SIDEBAR (Supreme Glass) ── */
        .sidebar {
            background: linear-gradient(135deg, #0f172a 30%, #1a4a6b 100%);
            padding: 4rem 2.5rem; color: white;
            display: flex; flex-direction: column; gap: 2rem;
            position: relative; overflow: hidden;
            border-right: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar::before {
            content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%;
            background: radial-gradient(circle at 30% 30%, rgba(26, 122, 60, 0.15) 0%, transparent 50%);
            animation: rotate-glow 20s linear infinite; pointer-events: none;
        }
        @keyframes rotate-glow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

        .step-list { display: flex; flex-direction: column; gap: 3rem; margin-top: 1rem; position: relative; }
        .step-list::before { content: ''; position: absolute; top: 14px; left: 13px; bottom: 14px; width: 2px; background: rgba(255,255,255,0.1); transform: translateX(-50%); }
        .step-item { display: flex; align-items: flex-start; gap: 1.25rem; opacity: 0.35; transition: all 0.5s var(--ease); position: relative; z-index: 1; }
        .step-item.active { opacity: 1; }
        .step-item.completed { opacity: 0.8; }
        .step-item.completed:not(:last-child)::after { content: ''; position: absolute; top: 28px; left: 13px; width: 2px; height: calc(3rem + 2px); background: var(--emerald); transform: translateX(-50%); }
        .step-dot { 
            width: 32px; height: 32px; border-radius: 50%; 
            border: 2px solid rgba(255,255,255,0.2); 
            display: flex; align-items: center; justify-content: center; 
            font-size: 0.8rem; font-weight: 900; color: white; 
            background: rgba(255,255,255,0.05); flex-shrink: 0; 
            transition: all 0.4s var(--ease);
            position: relative;
        }
        .step-item.active .step-dot { 
            background: var(--emerald); border-color: transparent; 
            box-shadow: 0 0 25px rgba(26, 122, 60, 0.6);
            transform: scale(1.1);
        }
        .step-item.completed .step-dot { background: #22c55e; border-color: transparent; }

        .submission-window { 
            margin-top: auto; padding: 1.5rem; 
            background: rgba(255,255,255,0.03); 
            border-radius: 20px; border: 1px solid rgba(255,255,255,0.08);
            backdrop-filter: blur(10px);
            box-shadow: inset 0 0 20px rgba(0,0,0,0.2);
        }
        .window-header { font-size: 0.55rem; font-weight: 800; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: 0.5rem; }
        .window-timer { font-family: 'Outfit', sans-serif; font-size: 1.1rem; font-weight: 900; color: white; display: flex; align-items: baseline; gap: 0.4rem; }
        .timer-unit { font-size: 0.6rem; font-weight: 700; opacity: 0.5; }

        /* ── FORM CONTENT ── */
        .form-content { padding: 4rem 6rem; background: white; }

        .step-content { display: none; }
        .step-content.active { display: block; animation: slideIn 0.5s var(--ease) forwards; }
        @keyframes slideIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }

        .step-heading { font-family: 'Outfit', sans-serif; font-size: 1.6rem; font-weight: 900; color: var(--navy); margin-bottom: 0.5rem; }
        .step-desc { font-size: 0.9rem; color: var(--slate); margin-bottom: 2.5rem; }

        .project-card:hover { 
            transform: translateY(-5px); 
            box-shadow: var(--shadow-deep); 
            border-color: rgba(0, 163, 108, 0.2); 
            background: #fafafa !important;
        }

        .grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; }
        .col-12 { grid-column: span 12; }
        .col-9 { grid-column: span 9; }
        .col-8 { grid-column: span 8; }
        .col-6 { grid-column: span 6; }
        .col-4 { grid-column: span 4; }
        .col-3 { grid-column: span 3; }

        .field { display: flex; flex-direction: column; gap: 0.5rem; }
        .field label { font-size: 0.72rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.15em; color: var(--navy); opacity: 0.7; }
        .field input, .field select, .field textarea {
            width: 100%; padding: 1rem 1.25rem;
            border: 1.5px solid var(--border); border-radius: 12px;
            font-family: inherit; font-size: 0.95rem; font-weight: 600;
            color: #0f172a; background: #ffffff;
            outline: none; transition: all 0.3s var(--ease);
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
        }
        .field input:focus, .field select:focus, .field textarea:focus {
            border-color: var(--emerald);
            background: white;
            box-shadow: 
                0 10px 20px -5px rgba(26, 122, 60, 0.1),
                0 0 0 4px rgba(26, 122, 60, 0.05);
            transform: translateY(-1px);
        }
        .field input::placeholder, .field textarea::placeholder { color: #94a3b8; }

        .file-zone {
            border: 2px dashed var(--border); border-radius: 12px;
            padding: 2rem; text-align: center; cursor: pointer;
            transition: all 0.25s; background: var(--smoke);
            color: var(--slate); font-size: 0.85rem; font-weight: 600;
        }
        .file-zone:hover { border-color: var(--emerald); background: var(--emerald-light); color: var(--navy); }
        .file-zone .file-icon { font-size: 1.5rem; margin-bottom: 0.5rem; }

        .form-nav { margin-top: 3rem; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 2rem; }
        .btn-action { padding: 1.1rem 2.5rem; border-radius: 100px; font-weight: 900; cursor: pointer; transition: all 0.4s var(--ease); border: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.12em; font-family: inherit; }
        .btn-prev { background: #f1f5f9; color: var(--slate); border: 1.5px solid var(--border); }
        .btn-prev:hover { background: #e2e8f0; color: #0f172a; transform: translateX(-5px); }
        .btn-next { background: var(--navy); color: white; box-shadow: 0 10px 25px rgba(26, 92, 46, 0.3); }
        .btn-next:hover { background: var(--emerald); transform: translateY(-3px) translateX(5px); box-shadow: 0 15px 35px rgba(26, 122, 60, 0.4); }
        .btn-submit { background: var(--emerald); color: white; box-shadow: 0 10px 25px rgba(26, 122, 60, 0.3); }
        .btn-submit:hover { transform: translateY(-3px); box-shadow: 0 20px 40px rgba(26, 122, 60, 0.5); }

        .error-msg { font-size: 0.75rem; color: #ef4444; margin-top: 0.25rem; }

        @media (max-width: 1024px) {
            .hero-nav { padding: 1.5rem 2rem; }
            .register-container { grid-template-columns: 1fr; }
            .sidebar { display: none; }
            .form-content { padding: 3rem 2rem; }
            .col-6 { grid-column: span 12; }
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <nav class="hero-nav">
        <div class="nav-brand">
            <div class="nav-logo-box">
                <x-logo width="100%" height="auto" />
            </div>
            <div class="nav-title">
                <div class="nav-title-main">Bio and Emerging Technology Institute</div>
                <div class="nav-title-sub">Annual Review 2026</div>
            </div>
        </div>
    </nav>

    <main class="page-content">
        <div class="register-container">

            {{-- Sidebar --}}
            <aside class="sidebar">
                <div style="font-family: 'Outfit', sans-serif; position: relative; z-index: 1;">

                    <div style="display: inline-block; background: var(--emerald); color: white; font-size: 0.65rem; font-weight: 900; letter-spacing: 0.25em; text-transform: uppercase; padding: 0.3rem 0.9rem; border-radius: 100px; margin-bottom: 1.25rem;">BETin</div>
                    <h2 style="font-size: 2.6rem; font-weight: 900; line-height: 1; letter-spacing: -0.04em; margin-bottom: 1rem;">
                        8<sup>th</sup> Annual<br><span style="color: var(--emerald);">Review</span>
                    </h2>
                    <div style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.78rem; color: rgba(255,255,255,0.5); font-weight: 600;">
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        March 11–13, 2026
                        <span style="opacity:0.3;">·</span>
                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Addis Ababa
                    </div>
                </div>

                <div class="step-list">
                    <div class="step-item active" data-step="1">
                        <div class="step-dot">1</div>
                        <div>
                            <div class="step-label">Professional Identity</div>
                            <div class="step-sub">Phase 01 of 03</div>
                        </div>
                    </div>
                    <div class="step-item" data-step="2">
                        <div class="step-dot">2</div>
                        <div>
                            <div class="step-label">Research Thesis</div>
                            <div class="step-sub">Phase 02 of 03</div>
                        </div>
                    </div>
                    <div class="step-item" data-step="3">
                        <div class="step-dot">3</div>
                        <div>
                            <div class="step-label">Submission Pack</div>
                            <div class="step-sub">Phase 03 of 03</div>
                        </div>
                    </div>
                </div>

                <div class="submission-window">
                    <div class="window-header">Deadline Countdown</div>
                    <div class="window-timer" id="pathfinderTimer">
                        00<span class="timer-unit">d</span> 00<span class="timer-unit">h</span> 00<span class="timer-unit">m</span>
                    </div>
                </div>
            </aside>

            {{-- Form --}}
            <section class="form-content">
                @if($errors->any())
                    <div style="background:#fef2f2; border:1px solid #fecaca; border-radius:10px; padding:1rem 1.25rem; margin-bottom:2rem; color:#dc2626; font-size:0.85rem; font-weight:600;">
                        Please fix the highlighted fields below.
                    </div>
                @endif

                <form action="{{ route('event.register.store') }}" method="POST" enctype="multipart/form-data" id="registerForm">
                    @csrf

                    {{-- Step 1 --}}
                    <div class="step-content active" id="step1">
                        <h3 class="step-heading">Professional Identity Profile</h3>
                        <p class="step-desc">Tell us who you are and where you're from.</p>
                        <div class="grid">
                            <div class="field col-12">
                                <label>Full Name</label>
                                <input type="text" name="full_name" required value="{{ old('full_name') }}" placeholder="Enter your full name">
                                @error('full_name')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-6">
                                <label>Email Address</label>
                                <input type="email" name="email" required value="{{ old('email') }}" placeholder="example@domain.com">
                                @error('email')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-6">
                                <label>Phone Number</label>
                                <input type="text" name="phone" required value="{{ old('phone') }}" placeholder="+251 911 000 000">
                                @error('phone')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-12">
                                <label>Organization / Institution</label>
                                <input type="text" name="organization" required value="{{ old('organization') }}" placeholder="Enter your institution name">
                                @error('organization')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-6">
                                <label>Job Title / Position</label>
                                <input type="text" name="job_title" required value="{{ old('job_title') }}" placeholder="e.g. Senior Researcher, Professor">
                                @error('job_title')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-6">
                                <label>Department / Faculty</label>
                                <input type="text" name="department" required value="{{ old('department') }}" placeholder="e.g. Biotechnology, Engineering">
                                @error('department')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-4">
                                <label>City</label>
                                <input type="text" name="city" required value="{{ old('city') }}" placeholder="Addis Ababa">
                                @error('city')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-4">
                                <label>Gender</label>
                                <select name="gender" required>
                                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select gender</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-4">
                                <label>Qualification</label>
                                <select name="qualification" required>
                                    <option value="" disabled {{ old('qualification') ? '' : 'selected' }}>Select level</option>
                                    <option value="PhD" {{ old('qualification') == 'PhD' ? 'selected' : '' }}>Doctorate (PhD)</option>
                                    <option value="MSc" {{ old('qualification') == 'MSc' ? 'selected' : '' }}>Master (MSc)</option>
                                    <option value="BSc" {{ old('qualification') == 'BSc' ? 'selected' : '' }}>Bachelor (BSc)</option>
                                </select>
                                @error('qualification')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-12">
                                <label>Primary Area of Expertise</label>
                                <input type="text" name="expertise" required value="{{ old('expertise') }}" placeholder="e.g. Bio-Informatics, Crop Science, Health Tech">
                                @error('expertise')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-12">
                                <label>Have you attended previous Annual Reviews?</label>
                                <select name="previous_attendance" required>
                                    <option value="" disabled {{ old('previous_attendance') ? '' : 'selected' }}>Select response</option>
                                    <option value="First Time" {{ old('previous_attendance') == 'First Time' ? 'selected' : '' }}>No, this is my first time</option>
                                    <option value="Once" {{ old('previous_attendance') == 'Once' ? 'selected' : '' }}>Yes, I have attended once before</option>
                                    <option value="Multiple" {{ old('previous_attendance') == 'Multiple' ? 'selected' : '' }}>Yes, I am a regular attendee</option>
                                </select>
                                @error('previous_attendance')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="step-content" id="step2">
                        <h3 class="step-heading">Project/Research Information</h3>
                        <p class="step-desc">Describe your research focus and presentation.</p>
                        <div class="grid">
                            <div class="field col-6">
                                <label>Presentation Title</label>
                                <input type="text" name="presentation_title" required value="{{ old('presentation_title') }}" placeholder="Title of your research presentation">
                                @error('presentation_title')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-6">
                                <label>Project Status</label>
                                <select name="project_status" required id="projectStatus">
                                    <option value="" disabled {{ old('project_status') ? '' : 'selected' }}>Select status</option>
                                    <option value="New" {{ old('project_status') == 'New' ? 'selected' : '' }}>New Project</option>
                                    <option value="Ongoing" {{ old('project_status') == 'Ongoing' ? 'selected' : '' }}>Ongoing Research</option>
                                    <option value="Completed" {{ old('project_status') == 'Completed' ? 'selected' : '' }}>Completed (Last 3 years)</option>
                                </select>
                                <div style="font-size:0.65rem; color:#94a3b8; margin-top:0.25rem;">Completed works must be from 2023 or later.</div>
                                @error('project_status')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-12">
                                <label>Abstract Submission <span style="font-weight:400; text-transform:none; letter-spacing:0; color:var(--emerald);">(Submit Text OR File)</span></label>
                                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:1.5rem; align-items: stretch;">
                                    <div class="field">
                                        <textarea name="abstract_text" id="abstractText" rows="6" placeholder="Briefly describe your research work (minimum 50 characters)..." style="height:100%">{{ old('abstract_text') }}</textarea>
                                    </div>
                                    <div class="file-zone" onclick="document.getElementById('abstractFileInput').click()" style="display:flex; flex-direction:column; justify-content:center; height:100%">
                                        <input type="file" id="abstractFileInput" name="abstract_file" style="display:none" onchange="updateFileInfo(this, 'abstractFileInfo')">
                                        <div class="file-icon">📄</div>
                                        <div id="abstractFileInfo">Click to upload abstract file</div>
                                        <div style="font-size:0.7rem; color:#94a3b8; margin-top:0.25rem;">PDF, DOC, DOCX · Max 10MB</div>
                                    </div>
                                </div>
                                <div id="abstractError" class="error-msg" style="display:none">Please provide either an abstract text or upload an abstract file.</div>
                                @error('abstract_text')<div class="error-msg">{{ $message }}</div>@enderror
                                @error('abstract_file')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-12">
                                <label>Thematic Area</label>
                                <select name="thematic_area" required>
                                    <option value="" disabled {{ old('thematic_area') ? '' : 'selected' }}>Select Thematic Area</option>
                                    <option value="Health Biotechnology" {{ old('thematic_area') == 'Health Biotechnology' ? 'selected' : '' }}>Health Biotechnology</option>
                                    <option value="Plant Biotechnology" {{ old('thematic_area') == 'Plant Biotechnology' ? 'selected' : '' }}>Plant Biotechnology</option>
                                    <option value="Animal Biotechnology" {{ old('thematic_area') == 'Animal Biotechnology' ? 'selected' : '' }}>Animal Biotechnology</option>
                                    <option value="Environmental Biotechnology" {{ old('thematic_area') == 'Environmental Biotechnology' ? 'selected' : '' }}>Environmental Biotechnology</option>
                                    <option value="Industrial Biotechnology" {{ old('thematic_area') == 'Industrial Biotechnology' ? 'selected' : '' }}>Industrial Biotechnology</option>
                                    <option value="Nanotechnology" {{ old('thematic_area') == 'Nanotechnology' ? 'selected' : '' }}>Nanotechnology</option>
                                    <option value="Materials Science & Engineering" {{ old('thematic_area') == 'Materials Science & Engineering' ? 'selected' : '' }}>Materials Science & Engineering</option>
                                    <option value="Reverse Engineering" {{ old('thematic_area') == 'Reverse Engineering' ? 'selected' : '' }}>Reverse Engineering</option>
                                    <option value="Computational Science" {{ old('thematic_area') == 'Computational Science' ? 'selected' : '' }}>Computational Science</option>
                                    <option value="Genomics & Bioinformatics" {{ old('thematic_area') == 'Genomics & Bioinformatics' ? 'selected' : '' }}>Genomics & Bioinformatics</option>
                                </select>
                                @error('thematic_area')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-12">
                                <label>Availability (Can you attend all event dates?)</label>
                                <select name="available_on_date" required>
                                    <option value="Yes" {{ old('available_on_date') == 'Yes' ? 'selected' : '' }}>Yes, I am fully available</option>
                                    <option value="No" {{ old('available_on_date') == 'No' ? 'selected' : '' }}>No, I have partial availability</option>
                                </select>
                            </div>

                            <div class="field col-12" style="margin-top: 1rem; padding: 1.5rem; background: rgba(0, 163, 108, 0.03); border-radius: 16px; border: 1px dashed rgba(0, 163, 108, 0.2);">
                                <label style="color: var(--emerald); margin-bottom: 1rem;">Additional Presentations</label>
                                <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 1rem;">
                                    <span style="font-size: 0.85rem; font-weight: 600; color: #64748b;">Do you have more projects to present?</span>
                                    <select id="hasMoreProjects" onchange="toggleMultiProject(this.value)" style="width: auto; padding: 0.5rem 1rem;">
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>
                                
                                <div id="multiProjectConfig" style="display:none; animation: fadeIn 0.4s ease;">
                                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                                        <span style="font-size: 0.85rem; font-weight: 600; color: #64748b;">How many additional projects?</span>
                                        <input type="number" id="projectCount" min="1" max="5" value="1" onchange="generateProjectFields(this.value)" style="width: 80px; padding: 0.5rem;">
                                    </div>
                                    <div id="additionalProjectsContainer" style="display: grid; gap: 1rem;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="step-content" id="step3">
                        <h3 class="step-heading">Finalize Submission Pack</h3>
                        <p class="step-desc">Upload your documents and complete your registration.</p>
                        <div class="grid">
                            <div class="field col-6">
                                <label>Presentation PPT (Optional)</label>
                                <div class="file-zone" onclick="document.getElementById('pptInput').click()">
                                    <input type="file" id="pptInput" name="presentation_ppt" style="display:none" onchange="updateFileInfo(this, 'pptInfo')">
                                    <div class="file-icon">📊</div>
                                    <div id="pptInfo">Click to upload Presentation PPT</div>
                                    <div style="font-size:0.7rem; color:#94a3b8; margin-top:0.25rem;">PPT, PPTX · Max 20MB</div>
                                </div>
                            </div>
                            <div class="field col-6">
                                <label>Support Letter</label>
                                <div class="file-zone" onclick="document.getElementById('supportInput').click()">
                                    <input type="file" id="supportInput" name="support_letter" style="display:none" onchange="updateFileInfo(this, 'supportInfo')">
                                    <div class="file-icon">📁</div>
                                    <div id="supportInfo">Click to upload support letter</div>
                                    <div style="font-size:0.7rem; color:#94a3b8; margin-top:0.25rem;">PDF, DOC, JPG · Max 10MB</div>
                                </div>
                            </div>
                            <div class="field col-12">
                                <label>How did you hear about this event?</label>
                                <select name="discovery_source" id="discoverySource" required onchange="toggleInviterField()">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="BETin Portal">BETin Portal</option>
                                    <option value="Invited Directly">Invited Directly</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Email/Invitation">Email / Official Invitation</option>
                                    <option value="Colleague">Colleague / Word of Mouth</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="field col-12" id="inviterField" style="display:none; animation: slideIn 0.4s var(--ease) forwards;">
                                <label>Who invited you?</label>
                                <input type="text" name="inviter_name" id="inviterName" value="{{ old('inviter_name') }}" placeholder="Enter the name of your inviter">
                                @error('inviter_name')<div class="error-msg">{{ $message }}</div>@enderror
                            </div>
                            <div class="field col-12">
                                <label>Additional Remarks <span style="font-weight:400; text-transform:none; letter-spacing:0;">(optional)</span></label>
                                <textarea name="questions" rows="3" placeholder="Any special requirements or questions?">{{ old('questions') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-nav">
                        <button type="button" class="btn-action btn-prev" id="btnPrev" style="display:none" onclick="changeFormStep(-1)">← Previous</button>
                        <div style="flex:1"></div>
                        <button type="button" class="btn-action btn-next" id="btnNext" onclick="changeFormStep(1)">Continue →</button>
                        <button type="submit" class="btn-action btn-submit" id="btnSubmit" style="display:none">Submit Registration ✓</button>
                    </div>
                </form>
            </section>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="hero-footer">
        <div class="footer-tiny">
            &copy; {{ date('Y') }} <span>Bio and Emerging Technology Institute</span>. All rights reserved.
        </div>
    </footer>

    <script>
        let currentStep = 1;

        function changeFormStep(dir) {
            if (dir > 0) {
                const active = document.getElementById('step' + currentStep);
                
                // Special validation for Step 2: Abstract either text or file
                if (currentStep === 2) {
                    const abstractText = document.getElementById('abstractText').value.trim();
                    const abstractFile = document.getElementById('abstractFileInput').files.length > 0;
                    const errorEl = document.getElementById('abstractError');
                    
                    if (!abstractText && !abstractFile) {
                        errorEl.style.display = 'block';
                        window.scrollTo({ top: errorEl.offsetTop - 100, behavior: 'smooth' });
                        return;
                    } else {
                        errorEl.style.display = 'none';
                    }
                }

                const inputs = active.querySelectorAll('input[required], select[required], textarea[required]');
                let valid = true;
                inputs.forEach(i => {
                    // Skip abstractText if file is provided
                    if (i.id === 'abstractText' && document.getElementById('abstractFileInput').files.length > 0) return;
                    
                    i.style.borderColor = i.value ? '' : '#ef4444';
                    if (!i.value) valid = false;
                });
                if (!valid) return;
            }
            currentStep = Math.min(Math.max(currentStep + dir, 1), 3);
            updateFormUI();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function updateFormUI() {
            document.querySelectorAll('.step-content').forEach((el, i) => el.classList.toggle('active', (i+1) === currentStep));
            document.querySelectorAll('.step-item').forEach((el, i) => {
                el.classList.toggle('active', (i+1) === currentStep);
                el.classList.toggle('completed', (i+1) < currentStep);
            });
            document.getElementById('btnPrev').style.display = currentStep === 1 ? 'none' : 'inline-block';
            document.getElementById('btnNext').style.display = currentStep === 3 ? 'none' : 'inline-block';
            document.getElementById('btnSubmit').style.display = currentStep === 3 ? 'inline-block' : 'none';
        }

        function updateFileInfo(input, elId) {
            const el = document.getElementById(elId);
            if (input.files.length) el.innerHTML = '✅ ' + input.files[0].name;
        }

        function updateTimer() {
            const timerEl = document.getElementById('pathfinderTimer');
            const target = new Date(2026, 1, 27, 23, 59, 59);
            const update = () => {
                const diff = target - new Date();
                if (diff <= 0) { timerEl.innerHTML = `Closed`; return; }
                const d = Math.floor(diff / 86400000);
                const h = Math.floor((diff % 86400000) / 3600000);
                const m = Math.floor((diff % 3600000) / 60000);
                timerEl.innerHTML = `${String(d).padStart(2,'0')}<span class="timer-unit">d</span> ${String(h).padStart(2,'0')}<span class="timer-unit">h</span> ${String(m).padStart(2,'0')}<span class="timer-unit">m</span>`;
            };
            setInterval(update, 60000); update();
        }

        window.onload = function() {
            updateTimer();
            toggleInviterField(); // Initial state check
        };

        function toggleInviterField() {
            const source = document.getElementById('discoverySource').value;
            const field = document.getElementById('inviterField');
            const input = document.getElementById('inviterName');
            
            if (source === 'Invited Directly') {
                field.style.display = 'flex';
                input.setAttribute('required', 'required');
            } else {
                field.style.display = 'none';
                input.removeAttribute('required');
                input.value = ''; // Clear if hidden
            }
        }

        function toggleMultiProject(val) {
            const config = document.getElementById('multiProjectConfig');
            config.style.display = val === 'yes' ? 'block' : 'none';
            if (val === 'yes') generateProjectFields(document.getElementById('projectCount').value);
            else document.getElementById('additionalProjectsContainer').innerHTML = '';
        }

        function generateProjectFields(count) {
            const container = document.getElementById('additionalProjectsContainer');
            container.innerHTML = '';
            count = Math.min(Math.max(count, 1), 5);
            
            for (let i = 1; i <= count; i++) {
                const row = document.createElement('div');
                row.className = 'grid project-card';
                row.style.background = 'white';
                row.style.padding = '2rem';
                row.style.borderRadius = '24px';
                row.style.border = '1.5px solid rgba(0, 163, 108, 0.08)';
                row.style.borderLeft = '6px solid var(--emerald)';
                row.style.marginBottom = '1.5rem';
                row.style.boxShadow = '0 10px 30px -10px rgba(0,0,0,0.06)';
                row.style.transition = 'all 0.4s var(--ease)';
                row.style.animation = `slideIn 0.5s var(--ease) ${i * 0.1}s both`;
                
                row.innerHTML = `
                    <div class="col-12" style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem;">
                        <span style="background: rgba(0, 163, 108, 0.08); color: var(--emerald); padding: 0.5rem 1rem; border-radius: 12px; font-size: 0.75rem; font-weight: 900; letter-spacing: 0.12em; border: 1.5px solid rgba(0, 163, 108, 0.15); display: flex; align-items: center; gap: 0.5rem;">
                            <span style="opacity: 0.5;">#0${i}</span> ADDITIONAL PROJECT
                        </span>
                        <div style="height: 1px; flex: 1; background: linear-gradient(90deg, rgba(0, 163, 108, 0.1), transparent);"></div>
                    </div>
                    <div class="field col-8">
                        <label>Presentation Title</label>
                        <input type="text" name="extra_titles[]" required placeholder="Enter the title of your additional research project">
                    </div>
                    <div class="field col-4">
                        <label>Project Status</label>
                        <select name="extra_statuses[]" required>
                            <option value="New">New Project</option>
                            <option value="Ongoing">Ongoing Research</option>
                            <option value="Completed">Completed (Last 3 years)</option>
                        </select>
                    </div>
                `;
                container.appendChild(row);
            }
        }

        @if($errors->any())
            @php
                $step1Fields = ['full_name','email','phone','organization', 'job_title', 'department','city','gender','qualification', 'expertise', 'previous_attendance'];
                $step2Fields = ['presentation_title','project_status','abstract_text','abstract_file','thematic_area','available_on_date'];
                $goTo = 3;
                foreach($errors->keys() as $k) {
                    if(in_array($k, $step1Fields)) { $goTo = 1; break; }
                    if(in_array($k, $step2Fields)) { $goTo = 2; break; }
                }
            @endphp
            currentStep = {{ $goTo }};
            updateFormUI();
        @endif
    </script>
</body>
</html>
