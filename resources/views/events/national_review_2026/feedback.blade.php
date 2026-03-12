<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8th National Research Review Feedback | Bio and Emerging Technology Institute</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --obsidian: #0f1f12;
            --navy: #1a4a6b;
            --emerald: #1a7a3c;
            --emerald-glow: rgba(26, 122, 60, 0.20);
            --emerald-light: rgba(26, 122, 60, 0.04);
            --gold: #f59e0b;
            --alabaster: #f8f9fa;
            --border: rgba(0,0,0,0.05);
            --ease: cubic-bezier(0.16, 1, 0.3, 1);
            --text-main: #0f172a;
            --text-sub: #475569;
            --glass: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.5);
            --shadow-soft: 0 10px 40px -10px rgba(0,0,0,0.05);
            --shadow-deep: 0 20px 60px -15px rgba(0,0,0,0.08);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── HERO ── */
        .hero-nav {
            position: sticky; top: 0; z-index: 100;
            display: flex; align-items: center; justify-content: center;
            padding: 1.5rem 5%;
            background: linear-gradient(135deg, #0f172a 30%, #1a4a6b 100%);
            backdrop-filter: blur(24px);
            border-bottom: 2px solid rgba(255,255,255,0.1);
            border-top: 4px solid var(--emerald);
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .nav-brand { display: flex; align-items: center; gap: 2rem; }
        .nav-logo-box {
            background: white; padding: 0.8rem 1.1rem; border-radius: 16px;
            width: 110px; display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .nav-title { display: flex; align-items: center; gap: 2rem; font-family: 'Outfit', sans-serif; color: white; line-height: 1; }
        .nav-title-main { font-size: 1.25rem; font-weight: 900; letter-spacing: -0.02em; white-space: nowrap; }
        .nav-title-sub { font-size: 0.95rem; font-weight: 800; color: var(--emerald); letter-spacing: 0.2em; text-transform: uppercase; white-space: nowrap; }

        .page-header {
            padding: 4rem 10% 2rem;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header-badge {
            display: inline-block;
            background: var(--emerald-light);
            color: var(--emerald);
            padding: 0.5rem 1.5rem;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            margin-bottom: 1.5rem;
            border: 1px solid var(--emerald-glow);
        }

        .header-title {
            font-family: 'Outfit', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            color: var(--text-main);
            letter-spacing: -0.04em;
            line-height: 1;
            margin-bottom: 1rem;
        }

        .header-subtitle {
            font-size: 1.1rem;
            color: var(--text-sub);
            font-weight: 500;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container {
            max-width: 900px;
            margin: 2rem auto 6rem;
            padding: 0 1.5rem;
            width: 100%;
        }

        .feedback-card {
            background: white;
            border-radius: 32px;
            padding: 4rem;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-deep);
            position: relative;
            overflow: hidden;
        }

        .feedback-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--emerald), var(--gold));
        }

        .field-group {
            margin-bottom: 3rem;
        }

        .group-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--navy);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .group-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; }
        .col-span-2 { grid-column: span 2; }

        .field { display: flex; flex-direction: column; gap: 0.75rem; }
        .field label {
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-sub);
        }

        .field input, .field select, .field textarea {
            width: 100%;
            padding: 1rem 1.5rem;
            border: 2px solid #f1f5f9;
            border-radius: 16px;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s var(--ease);
            background: #fafbfc;
        }

        .field input:focus, .field select:focus, .field textarea:focus {
            outline: none;
            border-color: var(--emerald);
            background: white;
            box-shadow: 0 0 0 5px var(--emerald-light);
            transform: translateY(-2px);
        }

        /* ── RATING SYSTEM ── */
        .rating-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem;
            background: #f8fafc;
            border-radius: 20px;
            margin-bottom: 1rem;
            border: 1px solid #f1f5f9;
            transition: all 0.3s;
        }

        .rating-row:hover {
            border-color: var(--emerald-glow);
            background: white;
            box-shadow: var(--shadow-soft);
        }

        .rating-info { flex: 1; }
        .rating-label { font-weight: 800; color: var(--text-main); font-size: 1rem; }
        .rating-desc { font-size: 0.8rem; color: var(--text-sub); margin-top: 0.25rem; font-weight: 500; }

        .rating-options {
            display: flex;
            gap: 0.5rem;
        }

        .rating-box {
            position: relative;
            cursor: pointer;
        }

        .rating-box input {
            position: absolute;
            opacity: 0;
        }

        .rating-box span {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-weight: 900;
            font-size: 1.1rem;
            color: #94a3b8;
            transition: all 0.2s;
        }

        .rating-box:hover span {
            border-color: var(--emerald);
            color: var(--emerald);
        }

        .rating-box input:checked + span {
            background: var(--emerald);
            border-color: var(--emerald);
            color: white;
            box-shadow: 0 8px 20px var(--emerald-glow);
            transform: scale(1.1);
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, var(--emerald) 0%, var(--navy) 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 20px;
            border: none;
            font-family: 'Outfit', sans-serif;
            font-size: 1.25rem;
            font-weight: 900;
            cursor: pointer;
            transition: all 0.4s var(--ease);
            box-shadow: 0 20px 40px -10px rgba(26, 122, 60, 0.3);
            margin-top: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .btn-submit:hover {
            transform: translateY(-4px);
            box-shadow: 0 30px 60px -10px rgba(26, 122, 60, 0.4);
        }

        .footer {
            text-align: center;
            padding: 3rem;
            background: #0f172a;
            color: rgba(255,255,255,0.4);
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .grid { grid-template-columns: 1fr; }
            .feedback-card { padding: 2rem; }
            .header-title { font-size: 2rem; }
            .rating-row { flex-direction: column; align-items: flex-start; gap: 1.5rem; }
            .rating-options { width: 100%; justify-content: space-between; }
        }
    </style>
</head>
<body>

    <nav class="hero-nav">
        <div class="nav-brand">
            <div class="nav-logo-box">
                <x-logo width="100%" height="auto" />
            </div>
            <div class="nav-title">
                <div class="nav-title-main">Bio and Emerging Technology Institute</div>
                <div class="nav-title-sub">Review Hub</div>
            </div>
        </div>
    </nav>

    <header class="page-header">
        <div class="header-badge">8th National Research Review</div>
        <h1 class="header-title">Participant Feedback</h1>
        <p class="header-subtitle">Your insights fuel our scientific progress. Please share your experience to help us refine future reviews.</p>
    </header>

    <main class="form-container">
        <div class="feedback-card">
            <form action="{{ route('review.feedback.store') }}" method="POST">
                @csrf
                
                <div class="field-group">
                    <h3 class="group-title">Personal Profile</h3>
                    <div class="grid">
                        <div class="field">
                            <label>Full Name</label>
                            <input type="text" name="full_name" required placeholder="Enter your name">
                        </div>
                        <div class="field">
                            <label>Email Address</label>
                            <input type="email" name="email" required placeholder="example@domain.com">
                        </div>
                        <div class="field">
                            <label>Organization</label>
                            <input type="text" name="organization" placeholder="e.g. AAU, BETIn, Jimma Univ">
                        </div>
                        <div class="field">
                            <label>Role in Review</label>
                            <select name="role">
                                <option value="" disabled selected>Select your role</option>
                                <option value="Presenter">Research Presenter</option>
                                <option value="Evaluator">Technical Evaluator</option>
                                <option value="Attendee">General Attendee</option>
                                <option value="Official">Institutional Official</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field-group">
                    <h3 class="group-title">Experience Metrics</h3>
                    
                    <div class="rating-row">
                        <div class="rating-info">
                            <div class="rating-label">Overall Event Excellence</div>
                            <div class="rating-desc">How would you rate the 8th National Research Review overall?</div>
                        </div>
                        <div class="rating-options">
                            @for($i=1; $i<=5; $i++)
                            <label class="rating-box">
                                <input type="radio" name="event_rating" value="{{ $i }}" required>
                                <span>{{ $i }}</span>
                            </label>
                            @endfor
                        </div>
                    </div>

                    <div class="rating-row">
                        <div class="rating-info">
                            <div class="rating-label">Technical Session Quality</div>
                            <div class="rating-desc">Quality of research presentations and scientific discourse.</div>
                        </div>
                        <div class="rating-options">
                            @for($i=1; $i<=5; $i++)
                            <label class="rating-box">
                                <input type="radio" name="technical_rating" value="{{ $i }}" required>
                                <span>{{ $i }}</span>
                            </label>
                            @endfor
                        </div>
                    </div>

                    <div class="rating-row">
                        <div class="rating-info">
                            <div class="rating-label">Logistical Coordination</div>
                            <div class="rating-desc">Effectiveness of venue, hospitality, and overall organization at ICT Park.</div>
                        </div>
                        <div class="rating-options">
                            @for($i=1; $i<=5; $i++)
                            <label class="rating-box">
                                <input type="radio" name="logistics_rating" value="{{ $i }}" required>
                                <span>{{ $i }}</span>
                            </label>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="field-group">
                    <h3 class="group-title">Narrative Feedback</h3>
                    <div class="field col-span-2">
                        <label>Recommendations & Comments</label>
                        <textarea name="comments" rows="5" placeholder="Please share your specific observations or suggestions for future excellence..."></textarea>
                    </div>
                    <div class="field col-span-2" style="margin-top:2rem">
                        <label>Future Intent</label>
                        <select name="future_attendance">
                            <option value="Yes" selected>Yes, I plan to attend the 9th National Review</option>
                            <option value="Maybe">Maybe, depending on thematic alignment</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Submit Scientific Feedback
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                </button>
            </form>
        </div>
    </main>

    <footer class="footer">
        &copy; 2026 Bio and Emerging Technology Institute. All Rights Reserved.
    </footer>

</body>
</html>
