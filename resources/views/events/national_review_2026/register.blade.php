<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8th National Review | Technical Zenith Registry</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --obsidian: #050505;
            --emerald: #00a36c;
            --emerald-glow: rgba(0, 163, 108, 0.4);
            --alabaster: #f8f9fa;
            --smoke: #f1f3f5;
            --slate: #495057;
            --border: rgba(0,0,0,0.06);
            --ease: cubic-bezier(0.8, 0, 0.2, 1);
            --radius: 16px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: var(--alabaster);
            font-family: 'Inter', sans-serif;
            color: var(--obsidian);
            min-height: 100vh;
            padding: 4rem 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        /* Technical Background */
        .tech-bg {
            position: fixed; inset: 0; z-index: -1;
            background: 
                radial-gradient(circle at 10% 20%, rgba(0, 163, 108, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(59, 130, 246, 0.03) 0%, transparent 40%);
        }

        .blueprint {
            position: fixed; inset: 0; z-index: -1;
            background-image: linear-gradient(var(--border) 1px, transparent 1px), linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.4;
        }

        .container {
            width: 100%;
            max-width: 1400px;
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 4rem;
            align-items: start;
        }

        /* Supreme Sidebar - V5 Final Zenith */
        .masthead {
            padding: 2rem;
            position: sticky;
            top: 4rem;
            display: flex;
            flex-direction: column;
            gap: 2.5rem;
            min-height: calc(100vh - 8rem);
        }

        .supreme-brand-card {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 32px;
            padding: 3rem;
            box-shadow: 
                0 0 0 1px rgba(0,0,0,0.02),
                0 30px 60px -20px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
        }

        .supreme-brand-card::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 4px;
            background: var(--emerald);
        }

        .logo-prestige {
            width: 65px;
            margin-bottom: 3rem;
            filter: drop-shadow(0 15px 30px rgba(0, 163, 108, 0.1));
            transition: var(--ease);
        }

        .logo-prestige:hover {
            transform: scale(1.08) rotate(-2deg);
            filter: drop-shadow(0 20px 40px rgba(0, 163, 108, 0.2));
        }

        .inst-meta {
            font-size: 0.6rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5em;
            color: var(--emerald);
            margin-bottom: 1rem;
            display: block;
        }

        .inst-title {
            font-size: 0.8rem;
            font-weight: 700;
            line-height: 1.5;
            color: var(--slate);
            margin-bottom: 2.5rem;
            max-width: 200px;
        }

        .event-title {
            font-family: 'Outfit', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            line-height: 0.88;
            letter-spacing: -0.06em;
            color: var(--obsidian);
        }

        .event-title span { 
            display: block;
            color: var(--emerald); 
            font-size: 3.2rem;
            margin-top: 0.1em;
        }

        .security-badge {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0,0,0,0.04);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .security-ref {
            font-family: monospace;
            font-size: 0.55rem;
            font-weight: 700;
            color: var(--slate);
            letter-spacing: 0.1em;
            opacity: 0.6;
        }

        /* Pathfinder 2.0 */
        .vertical-stepper {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            position: relative;
            padding: 2.5rem;
            background: white;
            border-radius: 32px;
            border: 1px solid var(--border);
            flex: 1;
        }

        .vertical-stepper::before {
            content: '';
            position: absolute;
            left: 3.2rem; top: 3.5rem; bottom: 3.5rem;
            width: 1px;
            background: var(--border);
            z-index: 1;
        }

        .step {
            position: relative;
            display: flex;
            align-items: center;
            gap: 2rem;
            opacity: 0.4;
            transition: var(--ease);
            padding: 0.25rem 0;
            z-index: 2;
        }

        .step.active { opacity: 1; }
        .step.completed { opacity: 0.6; }

        .step-node {
            width: 24px;
            height: 24px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--ease);
            flex-shrink: 0;
        }

        .step.active .step-node {
            background: var(--emerald);
            border-color: var(--emerald);
            box-shadow: 0 0 20px var(--emerald-glow);
            transform: scale(1.2);
        }

        .step.completed .step-node {
            background: var(--obsidian);
            border-color: var(--obsidian);
        }

        .step-node-inner {
            width: 6px;
            height: 6px;
            background: var(--border);
            border-radius: 50%;
            transition: var(--ease);
        }

        .step.active .step-node-inner { background: white; transform: scale(1.2); }
        .step.completed .step-node-inner { 
            background: white; 
            width: 8px; height: 4px; border-radius: 1px;
            transform: rotate(-45deg) translate(1px, -1px);
        }

        .step-text {
            display: flex;
            flex-direction: column;
        }

        .step-tag {
            font-size: 0.55rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: var(--slate);
        }

        .step-name {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--obsidian);
            letter-spacing: -0.02em;
        }

        .step-status {
            font-size: 0.55rem;
            font-weight: 600;
            color: var(--emerald);
            margin-top: 0.2rem;
            opacity: 0;
            transform: translateY(5px);
            transition: var(--ease);
        }

        .step.active .step-status { opacity: 1; transform: translateY(0); }

        /* Mission Control Footer */
        .mission-control {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .bento-node {
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            transition: var(--ease);
        }

        .bento-node:first-child { grid-column: span 2; }
        .bento-node:hover { border-color: var(--emerald-glow); transform: translateY(-3px); box-shadow: 0 10px 30px rgba(0,0,0,0.03); }

        .bento-label {
            font-size: 0.55rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--slate);
        }

        .bento-value {
            font-family: 'Outfit', sans-serif;
            font-size: 0.75rem;
            font-weight: 800;
            color: var(--obsidian);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .bento-sub {
            font-family: monospace;
            font-size: 0.55rem;
            color: var(--slate);
            opacity: 0.6;
        }

        .status-pulse {
            width: 6px; height: 6px;
            background: var(--emerald);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--emerald-glow);
            animation: supremePulse 2s infinite;
        }

        @keyframes supremePulse { 
            0% { transform: scale(1); opacity: 1; box-shadow: 0 0 0 0 rgba(0, 163, 108, 0.4); }
            70% { transform: scale(1.5); opacity: 0; box-shadow: 0 0 0 10px rgba(0, 163, 108, 0); }
            100% { transform: scale(1); opacity: 0; }
        }

        /* Dossier Card */
        .dossier-card {
            background: white;
            border-radius: 40px;
            box-shadow: 
                0 0 0 1px rgba(0,0,0,0.005),
                0 50px 120px -30px rgba(0,0,0,0.1);
            padding: 8rem;
            min-height: 850px;
            position: relative;
            overflow: hidden;
        }

        .section-header { margin-bottom: 5rem; }

        .section-label {
            font-size: 0.95rem;
            font-weight: 900;
            color: var(--emerald);
            text-transform: uppercase;
            letter-spacing: 0.5em;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .section-label::after { 
            content: ''; 
            flex: 1; 
            height: 1px; 
            background: linear-gradient(90deg, var(--emerald-glow), transparent); 
        }

        /* Grid Layout */
        .grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 4rem 3rem;
        }

        .col-12 { grid-column: span 12; }
        .col-6 { grid-column: span 6; }

        /* Precision Fields */
        .field {
            position: relative;
        }

        .field label {
            display: block;
            font-size: 0.8rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--slate);
            margin-bottom: 1.25rem;
        }

        .input-well {
            background: var(--smoke);
            border-radius: 16px;
            padding: 0.5rem 2rem;
            border: 2px solid transparent;
            transition: var(--ease);
            display: flex;
            align-items: center;
        }

        .input-well:focus-within {
            background: white;
            border-color: var(--emerald);
            box-shadow: 0 15px 40px rgba(0, 163, 108, 0.08);
            transform: translateY(-2px);
        }

        input, select, textarea {
            width: 100%;
            padding: 1.5rem 0;
            background: transparent;
            border: none;
            font-family: inherit;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--obsidian);
            outline: none;
        }

        textarea { resize: none; padding: 1.5rem 0; }

        /* File Area */
        .file-zone {
            background: var(--smoke);
            border: 2px dashed var(--border);
            border-radius: 24px;
            padding: 6rem 2rem;
            text-align: center;
            cursor: pointer;
            transition: var(--ease);
        }

        .file-zone:hover {
            border-color: var(--emerald);
            background: white;
            transform: translateY(-8px);
            box-shadow: 0 30px 60px -12px rgba(0,0,0,0.05);
        }

        .file-icon {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            display: block;
        }

        .file-title { font-weight: 900; text-transform: uppercase; font-size: 1rem; letter-spacing: 0.2em; color: var(--obsidian); }
        .file-sub { font-size: 0.9rem; color: var(--slate); margin-top: 0.5rem; }

        /* Navigation */
        .nav-bar {
            margin-top: 8rem;
            padding-top: 5rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            padding: 2rem 5rem;
            border-radius: 100px;
            font-family: 'Outfit', sans-serif;
            font-size: 1.1rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            cursor: pointer;
            transition: var(--ease);
            border: none;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .btn-prev { background: transparent; color: var(--slate); border: 2px solid var(--border); }
        .btn-next { background: var(--obsidian); color: white; box-shadow: 0 30px 60px -15px rgba(0,0,0,0.2); }
        .btn-next:hover { background: var(--emerald); transform: translateY(-5px); box-shadow: 0 30px 60px -15px rgba(0, 163, 108, 0.3); }

        .btn:active { transform: scale(0.95); }

        /* Animations */
        @keyframes dossierEnter {
            from { opacity: 0; transform: translateY(40px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .step-content { display: none; }
        .step-content.active { display: block; animation: dossierEnter 1s var(--ease) forwards; }

        /* Status Overlay */
        .overlay {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(30px);
            display: none; align-items: center; justify-content: center;
            flex-direction: column; gap: 3rem;
        }

        .loader {
            width: 80px; height: 80px;
            border: 6px solid var(--smoke);
            border-top-color: var(--emerald);
            border-radius: 50%;
            animation: spin 1s var(--ease) infinite;
        }

        @keyframes spin { 100% { transform: rotate(360deg); } }

        @media (max-width: 1200px) {
            .container { grid-template-columns: 1fr; gap: 4rem; }
            .masthead { position: static; padding: 0; text-align: center; }
            .logo-box { margin: 0 auto 3rem; }
            .vertical-stepper { display: none; }
            .dossier-card { padding: 4rem 2rem; }
            .section-title { font-size: 3rem; }
        }
    </style>
</head>
<body>
    <div class="tech-bg"></div>
    <div class="blueprint"></div>

    <div class="overlay" id="overlay">
        <div class="loader"></div>
        <p style="font-weight: 900; text-transform: uppercase; letter-spacing: 0.5em; color: var(--obsidian);">Synchronizing Dossier...</p>
    </div>

    <div class="container">
        <aside class="masthead">
            <div class="supreme-brand-card">
                <div class="logo-prestige">
                    <x-logo width="100%" height="auto" />
                </div>
                
                <span class="inst-meta">Executive Registry</span>
                <div class="inst-title">Bio and Emerging Technology Institute</div>
                
                <h1 class="event-title">National <span>Review</span></h1>
                
                <div class="security-badge">
                    <div class="security-ref">REF_ID: BETIN-NR-2026-X</div>
                </div>
            </div>
            
            <nav class="vertical-stepper">
                <div class="step active" id="node1">
                    <div class="step-node"><div class="step-node-inner"></div></div>
                    <div class="step-text">
                        <span class="step-tag">Phase 01</span>
                        <div class="step-name">Personal Info</div>
                        <span class="step-status">Active Module</span>
                    </div>
                </div>
                <div class="step" id="node2">
                    <div class="step-node"><div class="step-node-inner"></div></div>
                    <div class="step-text">
                        <span class="step-tag">Phase 02</span>
                        <div class="step-name">Institutional</div>
                        <span class="step-status">Awaiting Data</span>
                    </div>
                </div>
                <div class="step" id="node3">
                    <div class="step-node"><div class="step-node-inner"></div></div>
                    <div class="step-text">
                        <span class="step-tag">Phase 03</span>
                        <div class="step-name">Submission</div>
                        <span class="step-status">Awaiting Upload</span>
                    </div>
                </div>
                <div class="step" id="node4">
                    <div class="step-node"><div class="step-node-inner"></div></div>
                    <div class="step-text">
                        <span class="step-tag">Phase 04</span>
                        <div class="step-name">Confirmation</div>
                        <span class="step-status">Pending Review</span>
                    </div>
                </div>
            </nav>

            <div class="mission-control">
                <div class="bento-node">
                    <span class="bento-label">Portal Status</span>
                    <div class="bento-value">
                        <div class="status-pulse"></div>
                        SYSTEM_READY
                    </div>
                </div>
                <div class="bento-node">
                    <span class="bento-label">Local Time</span>
                    <div class="bento-value" id="liveTime">09:25:36</div>
                </div>
                <div class="bento-node">
                    <span class="bento-label">Session ID</span>
                    <div class="bento-value">BETIN-X72</div>
                    <span class="bento-sub">AUTH_SECURE</span>
                </div>
            </div>
        </aside>

        <main class="dossier-card">
            <form action="{{ route('event.register.store') }}" method="POST" enctype="multipart/form-data" id="registryForm">
                @csrf
                
                <!-- STEP 1: Identity -->
                <div class="step-content active" id="step1">
                    <div class="section-header">
                        <span class="section-label">Personal Information</span>
                    </div>
                    <div class="grid">
                        <div class="field col-12">
                            <label>Full Name</label>
                            <div class="input-well">
                                <input type="text" name="full_name" value="{{ old('full_name') }}" required placeholder="Enter your full name">
                            </div>
                        </div>
                        <div class="field col-6">
                            <label>Gender</label>
                            <div class="input-well">
                                <select name="gender" required>
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="field col-6">
                            <label>Email Address</label>
                            <div class="input-well">
                                <input type="email" name="email" value="{{ old('email') }}" required placeholder="example@domain.com">
                            </div>
                        </div>
                        <div class="field col-6">
                            <label>Phone Number</label>
                            <div class="input-well">
                                <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="+251 911 000 000">
                            </div>
                        </div>
                        <div class="field col-6">
                            <label>City</label>
                            <div class="input-well">
                                <input type="text" name="city" value="{{ old('city') }}" required placeholder="Enter city">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Institutional -->
                <div class="step-content" id="step2">
                    <div class="section-header">
                        <span class="section-label">Institutional Background</span>
                    </div>
                    <div class="grid">
                        <div class="field col-12">
                            <label>Organization / Institution</label>
                            <div class="input-well">
                                <input type="text" name="organization" value="{{ old('organization') }}" required placeholder="Enter your organization">
                            </div>
                        </div>
                        <div class="field col-6">
                            <label>Highest Qualification</label>
                            <div class="input-well">
                                <select name="qualification" required>
                                    <option value="" disabled selected>Select qualification</option>
                                    <option value="PhD">Doctorate (PhD)</option>
                                    <option value="MSc">Master of Science (MSc)</option>
                                    <option value="BSc">Bachelor of Science (BSc)</option>
                                </select>
                            </div>
                        </div>
                        <div class="field col-6">
                            <label>Field of Specialization</label>
                            <div class="input-well">
                                <input type="text" name="specialization" value="{{ old('specialization') }}" required placeholder="e.g. Molecular Biology">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Submission -->
                <div class="step-content" id="step3">
                    <div class="section-header">
                        <span class="section-label">Research Submission</span>
                    </div>
                    <div class="grid">
                        <div class="field col-12">
                            <label>Presentation Title</label>
                            <div class="input-well">
                                <input type="text" name="presentation_title" value="{{ old('presentation_title') }}" required placeholder="Enter title of your work">
                            </div>
                        </div>
                        <div class="field col-12">
                            <label>Abstract</label>
                            <div class="input-well">
                                <textarea name="abstract_text" rows="6" required placeholder="Provide a summary of your research..."></textarea>
                            </div>
                        </div>
                        <div class="field col-12">
                            <label>Manuscript Upload (PDF)</label>
                            <div class="file-zone" id="abstractDropZone">
                                <input type="file" name="abstract_file" id="abstractFile" style="display: none;">
                                <div class="file-icon">📄</div>
                                <div class="file-title">Click or drag to upload manuscript</div>
                                <div class="file-sub">PDF/PPT Formats Supported (Max 10MB)</div>
                                
                                <div id="abstractPreview" style="margin-top: 3rem; display: none; background: var(--obsidian); color: white; padding: 2.5rem; border-radius: 20px; align-items: center; justify-content: space-between;">
                                    <span id="abstractName" style="font-weight: 700; font-family: 'Outfit';">document_01.pdf</span>
                                    <button type="button" onclick="event.stopPropagation(); removeFile('abstract')" style="background: var(--emerald); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 10px; font-weight: 900; cursor: pointer;">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Confirmation -->
                <div class="step-content" id="step4">
                    <div class="section-header">
                        <span class="section-label">Final Authorization</span>
                    </div>
                    <div class="grid">
                        <div class="field col-6">
                            <label>Availability</label>
                            <div class="input-well">
                                <select name="available_on_date" required>
                                    <option value="Yes">Yes, I will attend</option>
                                    <option value="No">Availability Not Guaranteed</option>
                                </select>
                            </div>
                        </div>
                        <div class="field col-6">
                            <label>How did you hear about us?</label>
                            <div class="input-well">
                                <select name="discovery_source" required>
                                    <option value="Official">Official BETin Portal</option>
                                    <option value="Invitation">Direct Scientific Invite</option>
                                    <option value="Ref">Scientific Peer Reference</option>
                                </select>
                            </div>
                        </div>
                        <div class="field col-12">
                            <label>Support Letter</label>
                            <div class="file-zone" id="supportDropZone">
                                <input type="file" name="support_letter" id="supportFile" style="display: none;">
                                <div class="file-icon">📝</div>
                                <div class="file-title">Click or drag to upload support letter</div>
                                <div id="supportPreview" style="margin-top: 3rem; display: none; background: var(--emerald); color: white; padding: 2.5rem; border-radius: 20px; align-items: center; justify-content: space-between;">
                                    <span id="supportName" style="font-weight: 700; font-family: 'Outfit';">auth_letter.pdf</span>
                                    <button type="button" onclick="event.stopPropagation(); removeFile('support')" style="background: var(--obsidian); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 10px; font-weight: 900; cursor: pointer;">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nav-bar">
                    <button type="button" class="btn btn-prev" id="prevBtn" style="display: none;">← Previous Step</button>
                    <div></div>
                    <button type="button" class="btn btn-next" id="nextBtn">Next Step →</button>
                    <button type="submit" class="btn btn-next" id="submitBtn" style="display: none; background: var(--emerald);">Authenticate</button>
                </div>
            </form>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentStep = 1;
            const totalSteps = 4;
            const form = document.getElementById('registryForm');
            const nextBtn = document.getElementById('nextBtn');
            const prevBtn = document.getElementById('prevBtn');
            const submitBtn = document.getElementById('submitBtn');
            const overlay = document.getElementById('overlay');

            function updateUI() {
                document.querySelectorAll('.step-content').forEach((el, i) => {
                    el.classList.toggle('active', (i + 1) === currentStep);
                });
                document.querySelectorAll('.step').forEach((el, i) => {
                    el.classList.toggle('active', (i + 1) === currentStep);
                    el.classList.toggle('completed', (i + 1) < currentStep);
                    
                    const statusText = el.querySelector('.step-status');
                    if (i + 1 < currentStep) statusText.textContent = 'Verified';
                    else if (i + 1 === currentStep) statusText.textContent = 'Active Module';
                    else statusText.textContent = 'Awaiting Data';
                });

                prevBtn.style.display = currentStep === 1 ? 'none' : 'flex';
                
                if (currentStep < totalSteps) {
                    nextBtn.style.display = 'flex';
                    submitBtn.style.display = 'none';
                } else {
                    nextBtn.style.display = 'none';
                    submitBtn.style.display = 'flex';
                }
            }

            window.removeFile = function(type) {
                const input = document.getElementById(type + 'File');
                const preview = document.getElementById(type + 'Preview');
                input.value = '';
                preview.style.display = 'none';
            };

            ['abstract', 'support'].forEach(type => {
                const zone = document.getElementById(type + 'DropZone');
                const input = document.getElementById(type + 'File');
                const preview = document.getElementById(type + 'Preview');
                const nameEl = document.getElementById(type + 'Name');

                zone.addEventListener('click', () => input.click());

                input.addEventListener('change', () => {
                    if (input.files.length) {
                        nameEl.textContent = input.files[0].name;
                        preview.style.display = 'flex';
                    }
                });

                zone.addEventListener('dragover', (e) => { e.preventDefault(); zone.style.borderColor = 'var(--emerald)'; });
                zone.addEventListener('dragleave', () => { zone.style.borderColor = 'var(--border)'; });
                zone.addEventListener('drop', (e) => {
                    e.preventDefault();
                    zone.style.borderColor = 'var(--border)';
                    if (e.dataTransfer.files.length) {
                        input.files = e.dataTransfer.files;
                        nameEl.textContent = input.files[0].name;
                        preview.style.display = 'flex';
                    }
                });
            });

            function validateStep() {
                const currEl = document.querySelector('.step-content.active');
                const inputs = currEl.querySelectorAll('input[required], select[required], textarea[required]');
                let valid = true;
                inputs.forEach(input => {
                    const well = input.closest('.input-well');
                    if (!input.value.trim()) {
                        valid = false;
                        if (well) well.style.borderColor = '#ef4444';
                    } else {
                        if (well) well.style.borderColor = 'transparent';
                    }
                });
                return valid;
            }

            nextBtn.addEventListener('click', () => {
                if (validateStep()) {
                    currentStep++;
                    updateUI();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });

            prevBtn.addEventListener('click', () => {
                currentStep--;
                updateUI();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            form.addEventListener('submit', () => {
                overlay.style.display = 'flex';
            });

            // Live Time Update
            function updateTime() {
                const now = new Date();
                const timeStr = now.getHours().toString().padStart(2, '0') + ':' + 
                                now.getMinutes().toString().padStart(2, '0') + ':' + 
                                now.getSeconds().toString().padStart(2, '0');
                document.getElementById('liveTime').textContent = timeStr;
            }
            setInterval(updateTime, 1000);
            updateTime();
        });
    </script>
</body>
</html>
