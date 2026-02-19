<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Scientific Profile | 8<sup>th</sup> Annual Review</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #001f31;
            --emerald: #00a36c;
            --emerald-light: rgba(0, 163, 108, 0.08);
            --gold: #c5a059;
            --slate: #64748b;
            --border: rgba(0, 0, 0, 0.08);
            --shadow-deep: 0 20px 50px -12px rgba(0, 0, 0, 0.15);
            --ease: cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            background: #f8fafc;
            color: var(--navy);
            line-height: 1.6;
            padding: 2rem;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            animation: revealUp 0.8s var(--ease) both;
        }

        @keyframes revealUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 3.5rem;
        }

        .logo-wrapper {
            background: white;
            padding: 1rem;
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(0, 31, 49, 0.12);
            width: 100px;
            border: 1px solid var(--border);
            transition: transform 0.4s var(--ease);
        }

        .logo-wrapper:hover {
            transform: translateY(-5px) scale(1.05);
        }

        .edit-card {
            background: white;
            padding: 4rem;
            border-radius: 40px;
            box-shadow: var(--shadow-deep);
            border: 1px solid var(--border);
            border-top: 6px solid var(--emerald);
            border-bottom: 4px solid var(--gold);
            position: relative;
            overflow: hidden;
        }

        .edit-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            opacity: 0.5;
        }

        .alert-success {
            background: var(--emerald-light);
            color: var(--emerald);
            padding: 1.5rem;
            border-radius: 16px;
            font-weight: 700;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideIn 0.4s var(--ease);
        }

        .field { margin-bottom: 2.5rem; }
        .field label { 
            display: block; font-size: 0.75rem; font-weight: 900; 
            text-transform: uppercase; letter-spacing: 0.15em; color: var(--slate);
            margin-bottom: 1rem; 
        }

        .file-zone {
            border: 2px dashed var(--border);
            padding: 2.5rem;
            border-radius: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s var(--ease);
        }

        .file-zone:hover {
            border-color: var(--emerald);
            background: var(--emerald-light);
        }

        .file-icon { font-size: 2rem; margin-bottom: 1rem; display: block; }
        .file-info { font-weight: 700; font-size: 0.95rem; color: var(--navy); }

        .btn-submit {
            width: 100%;
            background: var(--navy);
            color: white;
            padding: 1.25rem;
            border: none;
            border-radius: 100px;
            font-family: inherit;
            font-weight: 950;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            cursor: pointer;
            transition: all 0.4s var(--ease);
            box-shadow: 0 10px 30px rgba(0, 31, 49, 0.15);
        }

        .btn-submit:hover {
            background: var(--emerald);
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 163, 108, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header-box">
            <div class="logo-wrapper">
                <x-logo width="100%" height="auto" />
            </div>
            <div>
                <h2 style="font-size: 2.2rem; font-weight: 900; letter-spacing: -0.04em; line-height: 1.1;">Participant <span style="color: var(--emerald);">Dashboard</span></h2>
            </div>
        </header>

        <div class="edit-card">
            @if(session('success'))
                <div class="alert-success">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            <p style="color: var(--slate); margin-bottom: 3rem; font-size: 1rem; font-weight: 500;">
                Hello <strong>{{ $registration->full_name }}</strong>, you can use this portal to upload or replace your official documents for the 8<sup>th</sup> Annual Review.
            </p>

            <form action="{{ url('/national-review-2026/registration/' . $registration->reference_code) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="field">
                    <label>Institutional Support Letter</label>
                    <div class="file-zone" onclick="document.getElementById('supportInput').click()">
                        <input type="file" id="supportInput" name="support_letter" style="display:none" onchange="updateFileInfo(this, 'supportInfo')">
                        <span class="file-icon">📁</span>
                        <div id="supportInfo" class="file-info">
                            @if($registration->support_letter_path)
                                Change current support letter
                            @else
                                Click to upload institutional support letter
                            @endif
                        </div>
                        <div style="font-size: 0.7rem; color: var(--slate); margin-top: 0.5rem;">PDF, DOC, JPG · Max 10MB</div>
                    </div>
                    @error('support_letter')<div style="color:red; font-size:0.8rem; margin-top:0.5rem;">{{ $message }}</div>@enderror
                </div>

                <div class="field">
                    <label>Presentation PPT</label>
                    <div class="file-zone" onclick="document.getElementById('pptInput').click()">
                        <input type="file" id="pptInput" name="presentation_ppt" style="display:none" onchange="updateFileInfo(this, 'pptInfo')">
                        <span class="file-icon">📊</span>
                        <div id="pptInfo" class="file-info">
                            @if($registration->presentation_ppt_path)
                                Change current presentation PPT
                            @else
                                Click to upload scientific presentation (PPT)
                            @endif
                        </div>
                        <div style="font-size: 0.7rem; color: var(--slate); margin-top: 0.5rem;">PPT, PPTX · Max 20MB</div>
                    </div>
                    @error('presentation_ppt')<div style="color:red; font-size:0.8rem; margin-top:0.5rem;">{{ $message }}</div>@enderror
                </div>

                <div style="margin-top: 4rem;">
                    <button type="submit" class="btn-submit">Save & Update Submission ✓</button>
                </div>
            </form>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <a href="{{ url('/national-review-2026/registration/' . $registration->reference_code) }}" style="color: var(--slate); text-decoration: none; font-weight: 700; font-size: 0.85rem;">← Back to Profile</a>
        </div>
    </div>

    <script>
        function updateFileInfo(input, infoId) {
            const info = document.getElementById(infoId);
            if (input.files && input.files[0]) {
                info.innerHTML = `Selected: <strong>${input.files[0].name}</strong>`;
                info.parentElement.style.borderColor = 'var(--emerald)';
                info.parentElement.style.background = 'var(--emerald-light)';
            }
        }
    </script>
</body>
</html>
