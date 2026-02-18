<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Review Registry 2026 | Bio and Emerging Technology Institute</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --obsidian: #050505;
            --navy: #003B5C;
            --emerald: #00a36c;
            --emerald-glow: rgba(0, 163, 108, 0.35);
            --gold: #f59e0b;
            --border: rgba(255,255,255,0.08);
            --ease: cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--obsidian);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* ── GLOBAL LAYOUT (SHARED WITH LANDING) ── */
        .hero-nav {
            position: sticky; top: 0; z-index: 100;
            display: flex; align-items: center; justify-content: center;
            padding: 2.5rem 5rem;
            background: rgba(5, 5, 5, 0.6);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .nav-brand { display: flex; align-items: center; gap: 2rem; }
        .nav-logo-box {
            background: white; padding: 0.8rem 1.1rem; border-radius: 16px;
            width: 110px; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .nav-title { display: flex; align-items: center; gap: 2rem; font-family: 'Outfit', sans-serif; color: white; line-height: 1; }
        .nav-title::after { content: ''; width: 1px; height: 28px; background: rgba(255,255,255,0.2); }
        .nav-title-main { font-size: 1.2rem; font-weight: 900; letter-spacing: -0.02em; white-space: nowrap; }
        .nav-title-sub { font-size: 0.9rem; font-weight: 800; color: var(--emerald); letter-spacing: 0.2em; text-transform: uppercase; white-space: nowrap; }

        .hero-footer {
            padding: 2rem 5rem; text-align: center;
            background: rgba(5, 5, 5, 0.4); backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255,255,255,0.08);
            margin-top: auto;
        }
        .footer-tiny { font-size: 0.9rem; color: rgba(255,255,255,0.45); font-weight: 500; }
        .footer-tiny span { color: var(--emerald); }

        /* ── ATMOSPHERE ── */
        .atmosphere {
            position: fixed; inset: 0; z-index: 0;
            overflow: hidden; pointer-events: none;
        }
        .atmosphere::before {
            content: ''; position: absolute; inset: 0;
            background-image: linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 60px 60px; z-index: 1;
        }
        .orb { position: absolute; border-radius: 50%; filter: blur(140px); opacity: 0.6; pointer-events: none; }
        .orb-1 { width: 70vw; height: 70vw; background: rgba(0, 163, 108, 0.08); top: -20%; right: -20%; }
        .orb-2 { width: 50vw; height: 50vw; background: rgba(0, 59, 92, 0.4); bottom: -10%; left: -10%; }

        /* ── REGISTRY PORTAL ── */
        .page-content {
            flex: 1; display: flex; align-items: center; justify-content: center;
            padding: 3rem 2rem; position: relative; z-index: 10;
        }

        .register-container {
            width: 100%; max-width: 1400px;
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(40px);
            border: 1px solid var(--border);
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 50px 100px rgba(0,0,0,0.6);
            display: grid; grid-template-columns: 360px 1fr;
            min-height: 80vh;
        }

        .sidebar {
            background: linear-gradient(135deg, rgba(0, 59, 92, 0.4) 0%, rgba(0, 26, 44, 0.6) 100%); 
            padding: 4rem 2.5rem; color: white;
            display: flex; flex-direction: column; gap: 2rem;
            position: relative; overflow: hidden;
            border-right: 1px solid var(--border);
        }

        .form-content { padding: 4rem 6rem; background: transparent; }
        .step-content { display: none; }
        .step-content.active { display: block; animation: slideIn 0.8s var(--ease) forwards; }
        @keyframes slideIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }

        .field label { display: block; font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.15em; color: rgba(255,255,255,0.4); margin-bottom: 0.75rem; }
        .input-well { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; padding: 0.25rem 1rem; transition: all 0.3s; }
        .input-well:focus-within { border-color: var(--emerald); background: rgba(255,255,255,0.07); box-shadow: 0 0 20px rgba(0, 163, 108, 0.15); }
        input, select, textarea { width: 100%; border: none; background: transparent; font-family: inherit; font-size: 0.95rem; font-weight: 600; color: white; outline: none; padding: 0.75rem 0; }
        select option { background: #0a0a0a; color: white; }

        .grid { display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; }
        .col-12 { grid-column: span 12; }
        .col-6 { grid-column: span 6; }

        .form-nav { margin-top: 3.5rem; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 2rem; }
        .btn-action { padding: 1rem 2.25rem; border-radius: 100px; font-weight: 800; cursor: pointer; transition: all 0.4s var(--ease); border: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; }
        .btn-prev { background: rgba(255,255,255,0.05); color: rgba(255,255,255,0.5); }
        .btn-prev:hover { background: rgba(255,255,255,0.1); color: white; }
        .btn-next { background: var(--emerald); color: white; box-shadow: 0 10px 30px var(--emerald-glow); }
        .btn-next:hover { transform: translateY(-3px); box-shadow: 0 20px 50px var(--emerald-glow); }

        .file-zone { border: 1px dashed rgba(255,255,255,0.15); border-radius: 16px; padding: 1.5rem; text-align: center; cursor: pointer; transition: all 0.3s; background: rgba(255,255,255,0.03); color: rgba(255,255,255,0.6); font-size: 0.8rem; font-weight: 600; }
        .file-zone:hover { border-color: var(--emerald); background: rgba(255,255,255,0.06); color: white; }

        .step-list { display: flex; flex-direction: column; gap: 4rem; margin-top: 1rem; position: relative; }
        .step-list::before { content: ''; position: absolute; top: 14px; left: 13px; bottom: 14px; width: 2px; background-image: linear-gradient(to bottom, rgba(255,255,255,0.08) 50%, transparent 50%); background-size: 2px 10px; transform: translateX(-50%); z-index: 0; }
        .step-item { display: flex; align-items: start; gap: 1.5rem; opacity: 0.2; transition: all 0.6s var(--ease); position: relative; z-index: 1; }
        .step-item.active { opacity: 1; transform: translateX(12px); }
        .step-item.completed { opacity: 0.9; }
        .step-item.completed:not(:last-child)::after { content: ''; position: absolute; top: 28px; left: 13px; width: 2px; height: calc(4rem + 2px); background: var(--emerald); box-shadow: 0 0 15px var(--emerald-glow); transform: translateX(-50%); z-index: 1; }
        .step-dot { width: 28px; height: 28px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 901; color: white; background: rgba(255,255,255,0.03); position: relative; z-index: 2; backdrop-filter: blur(8px); }
        .step-item.active .step-dot { background: #007bff; border-color: #00c6ff; box-shadow: 0 0 25px rgba(0, 123, 255, 0.6); transform: scale(1.2); }
        .step-item.completed .step-dot { background: var(--emerald); border-color: var(--emerald); box-shadow: 0 0 15px var(--emerald-glow); }
        .step-label { font-size: 0.85rem; font-weight: 800; color: white; letter-spacing: 0.08em; text-transform: uppercase; }
        .step-sub { font-size: 0.6rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.1em; display: none; }
        .step-item.active .step-sub { display: block; }

        .submission-window { margin-top: auto; padding: 1.25rem; background: rgba(255,255,255,0.03); border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); }
        .window-header { font-size: 0.55rem; font-weight: 800; color: rgba(255,255,255,0.3); text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: 0.5rem; }
        .window-timer { font-family: 'Outfit', sans-serif; font-size: 1.1rem; font-weight: 900; color: white; display: flex; align-items: baseline; gap: 0.4rem; }
        .timer-unit { font-size: 0.6rem; font-weight: 700; opacity: 0.5; }

        @media (max-width: 900px) {
            .hero-nav { padding: 1rem 2rem; }
            .nav-title { display: none; }
            .register-container { grid-template-columns: 1fr; border-radius: 0; }
            .sidebar { display: none; }
            .page-content { padding: 0; }
        }
    </style>
</head>
<body>

    <div class="atmosphere">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
    </div>

    {{-- Header --}}
    <nav class="hero-nav">
        <div class="nav-brand">
            <div class="nav-logo-box">
                <x-logo width="100%" height="auto" />
            </div>
            <div class="nav-title">
                <div class="nav-title-main">Bio and Emerging Technology Institute</div>
                <div class="nav-title-sub">National Review 2026</div>
            </div>
        </div>
    </nav>

    <main class="page-content">
        <div class="register-container">
            <aside class="sidebar">
                <div style="font-family: 'Outfit', sans-serif;">
                    <h2 style="font-size: 2.2rem; font-weight: 900; line-height: 1.1; letter-spacing: -0.05em; margin-bottom: 1rem;">
                        BETin<br>Annual<br><span style="color: var(--emerald);">Review</span>
                    </h2>
                </div>

                <div class="step-list">
                    <div class="step-item active" data-step="1">
                        <div class="step-dot">1</div>
                        <div class="step-info">
                            <span class="step-label">Professional Identity</span>
                            <span class="step-sub">Phase 01 of 03</span>
                        </div>
                    </div>
                    <div class="step-item" data-step="2">
                        <div class="step-dot">2</div>
                        <div class="step-info">
                            <span class="step-label">Research Thesis</span>
                            <span class="step-sub">Phase 02 of 03</span>
                        </div>
                    </div>
                    <div class="step-item" data-step="3">
                        <div class="step-dot">3</div>
                        <div class="step-info">
                            <span class="step-label">Submission Pack</span>
                            <span class="step-sub">Phase 03 of 03</span>
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

            <section class="form-content">
                <form action="{{ route('event.register.store') }}" method="POST" enctype="multipart/form-data" id="registerForm">
                    @csrf
                    
                    <div class="step-content active" id="step1">
                        <div style="margin-bottom: 2.5rem;">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 900; color: white;">Complete your Professional Identity Profile</h3>
                        </div>
                        <div class="grid">
                            <div class="field col-12">
                                <label>Full Name</label>
                                <div class="input-well"><input type="text" name="full_name" required value="{{ old('full_name') }}" placeholder="Enter your full name"></div>
                            </div>
                            <div class="field col-6">
                                <label>Email Address</label>
                                <div class="input-well"><input type="email" name="email" required value="{{ old('email') }}" placeholder="example@domain.com"></div>
                            </div>
                            <div class="field col-6">
                                <label>Phone Number</label>
                                <div class="input-well"><input type="text" name="phone" required value="{{ old('phone') }}" placeholder="+251 911 000 000"></div>
                            </div>
                            <div class="field col-12">
                                <label>Organization</label>
                                <div class="input-well"><input type="text" name="organization" required value="{{ old('organization') }}" placeholder="Enter institution"></div>
                            </div>
                            <div class="field col-6">
                                <label>City</label>
                                <div class="input-well"><input type="text" name="city" required value="{{ old('city') }}" placeholder="Addis Ababa"></div>
                            </div>
                            <div class="field col-6">
                                <label>Gender</label>
                                <div class="input-well">
                                    <select name="gender" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field col-12">
                                <label>Qualification</label>
                                <div class="input-well">
                                    <select name="qualification" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="PhD" {{ old('qualification') == 'PhD' ? 'selected' : '' }}>Doctorate (PhD)</option>
                                        <option value="MSc" {{ old('qualification') == 'MSc' ? 'selected' : '' }}>Master (MSc)</option>
                                        <option value="BSc" {{ old('qualification') == 'BSc' ? 'selected' : '' }}>Bachelor (BSc)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step-content" id="step2">
                        <div style="margin-bottom: 2.5rem;">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 900; color: white;">Define your Research Thesis & Specialization</h3>
                        </div>
                        <div class="grid">
                            <div class="field col-12">
                                <label>Presentation Title</label>
                                <div class="input-well"><input type="text" name="presentation_title" required value="{{ old('presentation_title') }}" placeholder="Title of your research"></div>
                            </div>
                            <div class="field col-12">
                                <label>Specialization / Department</label>
                                <div class="input-well"><input type="text" name="specialization" required value="{{ old('specialization') }}" placeholder="e.g. Bioinformatics, Biotechnology"></div>
                            </div>
                            <div class="field col-12">
                                <label>Abstract Summary</label>
                                <div class="input-well"><textarea name="abstract_text" rows="3" required placeholder="Briefly describe your work...">{{ old('abstract_text') }}</textarea></div>
                            </div>
                            <div class="field col-12">
                                <label>Availability (Present on all dates?)</label>
                                <div class="input-well">
                                    <select name="available_on_date" required>
                                        <option value="Yes" {{ old('available_on_date') == 'Yes' ? 'selected' : '' }}>Yes, fully available</option>
                                        <option value="No" {{ old('available_on_date') == 'No' ? 'selected' : '' }}>No, partial availability</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step-content" id="step3">
                        <div style="margin-bottom: 2.5rem;">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 900; color: white;">Finalize your Research Submission Pack</h3>
                        </div>
                        <div class="grid">
                            <div class="field col-6">
                                <label>Manuscript (PDF)</label>
                                <div class="file-zone" onclick="document.getElementById('fileInput').click()">
                                    <input type="file" id="fileInput" name="abstract_file" style="display:none" onchange="updateFileInfo(this, 'fileInfo')">
                                    <div id="fileInfo">📄 Click to Upload Abstract</div>
                                </div>
                            </div>
                            <div class="field col-6">
                                <label>Support Letter</label>
                                <div class="file-zone" onclick="document.getElementById('supportInput').click()">
                                    <input type="file" id="supportInput" name="support_letter" style="display:none" onchange="updateFileInfo(this, 'supportInfo')">
                                    <div id="supportInfo">📁 Support Letter</div>
                                </div>
                            </div>
                            <div class="field col-12">
                                <label>Discovery Source</label>
                                <div class="input-well">
                                    <select name="discovery_source" required>
                                        <option value="Social Media">Social Media</option>
                                        <option value="Email/Invitation">Email/Invitation</option>
                                        <option value="BETI Website">BETI Website</option>
                                        <option value="Colleague">Colleague</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field col-12">
                                <label>Additional Remarks</label>
                                <div class="input-well"><textarea name="questions" rows="2" placeholder="Any special requirements?">{{ old('questions') }}</textarea></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-nav">
                        <button type="button" class="btn-action btn-prev" id="btnPrev" style="display:none" onclick="changeFormStep(-1)">← Previous</button>
                        <div style="flex:1"></div>
                        <button type="button" class="btn-action btn-next" id="btnNext" onclick="changeFormStep(1)">Next Phase →</button>
                        <button type="submit" class="btn-action btn-next" id="btnSubmit" style="display:none; background: var(--emerald);">Finalize Registry</button>
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
            const nextStep = currentStep + dir;
            if (nextStep < 1 || nextStep > 3) return;

            if (dir > 0) {
                const active = document.getElementById('step' + currentStep);
                const inputs = active.querySelectorAll('input[required], select[required], textarea[required]');
                let valid = true;
                inputs.forEach(i => {
                    if(!i.value) { i.parentElement.style.borderColor = '#ef4444'; valid = false; }
                    else { i.parentElement.style.borderColor = 'rgba(255,255,255,0.1)'; }
                });
                if (!valid) return;
            }

            currentStep = nextStep;
            updateFormUI();
        }

        function updateFormUI() {
            document.querySelectorAll('.step-content').forEach((el, i) => el.classList.toggle('active', (i+1) === currentStep));
            document.querySelectorAll('.step-item').forEach((el, i) => {
                el.classList.toggle('active', (i+1) === currentStep);
                el.classList.toggle('completed', (i+1) < currentStep);
            });
            document.getElementById('btnPrev').style.display = currentStep === 1 ? 'none' : 'block';
            document.getElementById('btnNext').style.display = currentStep === 3 ? 'none' : 'block';
            document.getElementById('btnSubmit').style.display = currentStep === 3 ? 'block' : 'none';
        }

        function updateFileInfo(input, elId) {
            const el = document.getElementById(elId);
            if (input.files.length) el.innerHTML = '✅ ' + input.files[0].name;
            else el.innerHTML = (elId === 'fileInfo') ? '📄 Click to Upload Abstract' : '📁 Support Letter';
        }

        function updateTimer() {
            const timerEl = document.getElementById('pathfinderTimer');
            const target = new Date(2026, 1, 27, 23, 59, 59);
            const update = () => {
                const now = new Date();
                const diff = target - now;
                if (diff <= 0) { timerEl.innerHTML = `00<span class="timer-unit">d</span> 00<span class="timer-unit">h</span> 00<span class="timer-unit">m</span>`; return; }
                const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                timerEl.innerHTML = `${d.toString().padStart(2, '0')}<span class="timer-unit">d</span> ${h.toString().padStart(2, '0')}<span class="timer-unit">h</span> ${m.toString().padStart(2, '0')}<span class="timer-unit">m</span>`;
            };
            setInterval(update, 60000); update();
        }

        window.onload = updateTimer;

        @if($errors->any())
            @php
                $step1Errors = ['full_name', 'email', 'phone', 'organization', 'city', 'gender', 'qualification'];
                $step2Errors = ['presentation_title', 'specialization', 'abstract_text', 'available_on_date'];
                $hasStep1 = false; $hasStep2 = false;
                foreach($errors->keys() as $key) {
                    if(in_array($key, $step1Errors)) $hasStep1 = true;
                    if(in_array($key, $step2Errors)) $hasStep2 = true;
                }
            @endphp
            @if($hasStep1) currentStep = 1; @elseif($hasStep2) currentStep = 2; @else currentStep = 3; @endif
            updateFormUI();
            @foreach($errors->keys() as $key)
                const el = document.querySelector('[name="{{ $key }}"]');
                if (el) el.parentElement.style.borderColor = '#ef4444';
            @endforeach
        @endif
    </script>
</body>
</html>
