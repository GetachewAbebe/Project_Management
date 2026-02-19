<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Dashboard | 8<sup>th</sup> Annual Review</title>
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
            max-width: 900px;
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

        .profile-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            padding: 4rem;
            border-radius: 40px;
            box-shadow: var(--shadow-deep);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-top: 6px solid var(--emerald);
            border-bottom: 4px solid var(--gold);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .section-title {
            font-size: 0.75rem;
            font-weight: 950;
            color: var(--emerald);
            text-transform: uppercase;
            letter-spacing: 0.2em;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, var(--emerald-light), transparent);
        }

        .data-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .data-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .data-label {
            font-size: 0.7rem;
            font-weight: 800;
            color: var(--slate);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .data-value {
            font-weight: 700;
            color: var(--navy);
            font-size: 1.1rem;
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--navy);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 100px;
            text-decoration: none;
            font-weight: 900;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            transition: all 0.4s var(--ease);
            box-shadow: 0 10px 25px rgba(0, 31, 49, 0.2);
        }

        .btn-edit:hover {
            background: var(--emerald);
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 163, 108, 0.3);
        }

        .file-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .status-badge {
            padding: 0.2rem 0.6rem;
            border-radius: 100px;
            font-size: 0.65rem;
            font-weight: 900;
            text-transform: uppercase;
        }

        .badge-success { background: var(--emerald-light); color: var(--emerald); }
        .badge-warning { background: rgba(197, 160, 89, 0.1); color: var(--gold); }
    </style>
</head>
<body>
    <div class="container">
        <header class="header-box">
            <div class="logo-wrapper">
                <x-logo width="100%" height="auto" />
            </div>
            <div>
                <h2 style="font-size: 2.2rem; font-weight: 900; letter-spacing: -0.02em; line-height: 1.1;">Participant <span style="color: var(--emerald);">Dashboard</span></h2>
            </div>
        </header>

        <div class="profile-card">
            <div class="section-title">Professional Identity</div>
            <div class="data-grid">
                <div class="data-item">
                    <span class="data-label">Full Name</span>
                    <span class="data-value">{{ $registration->full_name }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Email Address</span>
                    <span class="data-value">{{ $registration->email }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Organization</span>
                    <span class="data-value">{{ $registration->organization }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Job Title / Department</span>
                    <span class="data-value">{{ $registration->job_title }} · {{ $registration->department }}</span>
                </div>
            </div>

            <div class="section-title">Research & Submission</div>
            <div class="data-grid">
                <div class="data-item" style="grid-column: span 2;">
                    <span class="data-label">Presentation Title</span>
                    <span class="data-value">{{ $registration->presentation_title }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Thematic Area</span>
                    <span class="data-value">{{ $registration->thematic_area }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Project Status</span>
                    <span class="data-value">{{ $registration->project_status }}</span>
                </div>
            </div>

            <div class="section-title">Documents & Logistics</div>
            <div class="data-grid">
                <div class="data-item">
                    <span class="data-label">Institutional Support Letter</span>
                    <div class="file-status">
                        @if($registration->support_letter_path)
                            <span class="status-badge badge-success">Uploaded ✅</span>
                             <a href="{{ Storage::url($registration->support_letter_path) }}" target="_blank" style="color: var(--emerald); text-decoration: none;">View File</a>
                        @else
                            <span class="status-badge badge-warning">Missing ⚠️</span>
                        @endif
                    </div>
                </div>
                <div class="data-item">
                    <span class="data-label">Presentation PPT</span>
                    <div class="file-status">
                        @if($registration->presentation_ppt_path)
                            <span class="status-badge badge-success">Uploaded ✅</span>
                             <a href="{{ Storage::url($registration->presentation_ppt_path) }}" target="_blank" style="color: var(--emerald); text-decoration: none;">View File</a>
                        @else
                            <span class="status-badge badge-warning">Missing ⚠️</span>
                        @endif
                    </div>
                </div>
                <div class="data-item">
                    <span class="data-label">Travel Option</span>
                    <span class="data-value">{{ $registration->travel_option }}</span>
                </div>
                <div class="data-item">
                    <span class="data-label">Accommodation Needed</span>
                    <span class="data-value">{{ $registration->needs_hotel }}</span>
                </div>
            </div>

            <div style="text-align: center; margin-top: 2rem; border-top: 1px solid var(--border); padding-top: 3rem;">
                <a href="{{ url('/national-review-2026/registration/' . $registration->reference_code . '/edit') }}" class="btn-edit">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    Update My Documents
                </a>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ url('/national-review-2026') }}" style="color: var(--slate); text-decoration: none; font-weight: 700; font-size: 0.85rem;">← Back to Event Portal</a>
        </div>
    </div>
</body>
</html>
