<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmed | 8<sup>th</sup> Annual Review</title>

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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* ── HEADER (Vibrant Zenith Sync) ── */
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
            content: ''; position: absolute; inset: 0; background: rgba(255, 255, 255, 0.03); pointer-events: none;
        }

        .hero-nav:hover {
            padding-top: 1.3rem; padding-bottom: 1.3rem;
            background: linear-gradient(135deg, #131d35 30%, #1a7a3c 100%);
        }

        .nav-brand { display: flex; align-items: center; gap: 2rem; }
        .nav-logo-box {
            background: white; padding: 0.8rem 1.1rem; border-radius: 16px; width: 110px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1); transition: all 0.4s var(--ease);
        }
        .nav-logo-box:hover { transform: translateY(-2px); box-shadow: 0 15px 35px rgba(0, 163, 108, 0.2); }

        .nav-title { display: flex; align-items: center; gap: 2rem; color: white; line-height: 1; position: relative; }
        .nav-title::after { content: ''; width: 1px; height: 32px; background: rgba(255,255,255,0.2); margin: 0 -0.5rem; }
        .nav-title-main { font-size: 1.25rem; font-weight: 900; letter-spacing: -0.02em; white-space: nowrap; }
        .nav-title-sub { font-size: 0.95rem; font-weight: 800; color: var(--emerald); letter-spacing: 0.2em; text-transform: uppercase; white-space: nowrap; }

        /* ── PAGE CONTENT ── */
        .page-content {
            flex: 1; display: flex; align-items: center; justify-content: center;
            padding: 4rem 2rem;
            background: radial-gradient(circle at 10% 20%, rgba(0, 163, 108, 0.03) 0%, transparent 40%),
                        radial-gradient(circle at 90% 80%, rgba(0, 31, 49, 0.03) 0%, transparent 40%);
        }

        .container {
            width: 100%;
            max-width: 600px;
            animation: revealUp 0.8s var(--ease) both;
            z-index: 10;
        }

        @keyframes revealUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── RECEIPT CARD ── */
        .receipt-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            padding: 3.5rem;
            border-radius: 32px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: var(--shadow-deep);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .receipt-card::before {
            content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 6px;
            background: linear-gradient(90deg, var(--emerald), var(--navy));
        }

        .success-aura {
            width: 90px; height: 90px; background: var(--emerald-light); color: var(--emerald);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 2.5rem; position: relative; animation: pulseEmerald 2s infinite;
        }

        @keyframes pulseEmerald {
            0% { box-shadow: 0 0 0 0 rgba(0, 163, 108, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(0, 163, 108, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 163, 108, 0); }
        }

        .conf-title { font-size: 2.2rem; font-weight: 950; color: var(--navy); margin-bottom: 0.75rem; letter-spacing: -0.04em; }
        .conf-desc { font-size: 1rem; color: var(--slate); margin-bottom: 3rem; font-weight: 500; }

        .details-grid { border-top: 1.5px solid #f1f5f9; padding-top: 2rem; display: grid; gap: 1rem; text-align: left; }
        .detail-row { display: flex; justify-content: space-between; align-items: baseline; font-size: 0.95rem; }
        .detail-label { font-weight: 800; color: var(--slate); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .detail-value { font-weight: 700; color: var(--navy); }

        .btn-portal {
            display: inline-block; margin-top: 3rem; padding: 1.25rem 3rem; background: var(--navy);
            color: white; text-decoration: none; border-radius: 100px; font-weight: 900;
            font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.15em;
            transition: all 0.4s var(--ease); box-shadow: 0 10px 25px rgba(0, 31, 49, 0.2);
        }
        .btn-portal:hover { background: var(--emerald); transform: translateY(-3px); box-shadow: 0 15px 35px rgba(0, 163, 108, 0.3); }

        /* ── FOOTER SYNC ── */
        .hero-footer {
            padding: 2rem 5rem; text-align: center; background: linear-gradient(135deg, #1a7a3c 0%, #0f172a 100%);
            border-top: 1px solid rgba(255,255,255,0.1); width: 100%; margin-top: auto; position: relative;
            box-shadow: 0 -10px 40px rgba(0,0,0,0.1);
        }
        .hero-footer::before { content: ''; position: absolute; inset: 0; background: rgba(255, 255, 255, 0.02); pointer-events: none; }
        .footer-tiny { font-size: 0.95rem; color: rgba(255,255,255,0.6); font-weight: 500; letter-spacing: 0.02em; position: relative; z-index: 2; }
        .footer-tiny span { color: white; font-weight: 800; border-bottom: 2px solid var(--emerald); }

        @media (max-width: 992px) {
            .hero-nav, .hero-footer { padding: 1.5rem 2rem; }
            .nav-title { display: none; }
        }

        @media (max-width: 768px) {
            .hero-nav { padding: 1.25rem 1.5rem; }
            .nav-brand { gap: 1rem; }
            .nav-logo-box { width: 80px; padding: 0.5rem; }
            .nav-title { display: flex; gap: 1rem; }
            .nav-title::after { height: 24px; margin: 0; }
            .nav-title-main { font-size: 0.9rem; white-space: normal; line-height: 1.3; color: white; }
            .nav-title-sub { font-size: 0.7rem; letter-spacing: 0.1em; color: var(--emerald); }

            .page-content { padding: 2rem 1rem; }
            .receipt-card { padding: 2rem 1.5rem; }
            .conf-title { font-size: 1.6rem; }
            .detail-row { flex-direction: column; gap: 0.25rem; margin-bottom: 1rem; }
            .detail-label { font-size: 0.65rem; }
            .detail-value { font-size: 0.9rem; }
            .btn-portal { width: 100%; text-align: center; padding: 1rem 1.5rem; font-size: 0.75rem; }
        }

        @media (max-width: 480px) {
            .nav-title::after { display: none; }
            .nav-title { flex-direction: column; align-items: flex-start; gap: 0.25rem; }
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
        <div class="container">
            <div class="receipt-card">
                <div class="success-aura">
                    <svg width="45" height="45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"/></svg>
                </div>

                <h1 class="conf-title">Registration Confirmed</h1>
                <p class="conf-desc">Thank you, <strong>{{ $registration->full_name }}</strong>. Your registration for the 8<sup>th</sup> Annual Review has been successfully received.</p>

                <div style="background: var(--emerald-light); border: 1px solid rgba(0, 163, 108, 0.2); padding: 1.5rem; border-radius: 20px; margin-bottom: 2.5rem; text-align: left; display: flex; gap: 1rem; align-items: flex-start; animation: slideIn 0.4s var(--ease) both;">
                    <div style="font-size: 1.5rem;">🏗️</div>
                    <div>
                        <div style="font-weight: 800; color: var(--emerald); font-size: 0.9rem; margin-bottom: 0.3rem;">You can Edit your application at any time!</div>
                        <div style="font-size: 0.85rem; color: var(--navy); opacity: 0.8; font-weight: 500; line-height: 1.4;">
                            We understand you may need to refine your research data or upload documents later. Use the secure link below to access your personal portal and **update your submission** (including Institutional Support Letter and PPT) before the event deadline.
                        </div>
                    </div>
                </div>

                <div class="details-grid">
                    <div class="detail-row">
                        <span class="detail-label">Event Focus</span>
                        <span class="detail-value">8<sup>th</sup> Annual Review</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Schedule</span>
                        <span class="detail-value">March 11 – 13, 2026</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Organizer</span>
                        <span class="detail-value" style="color: var(--emerald);">BETin</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Location</span>
                        <span class="detail-value">Addis Ababa, Ethiopia, ICT Park</span>
                    </div>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="{{ url('/national-review-2026/registration/' . $registration->reference_code) }}" class="btn-portal">Access Participant Dashboard</a>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="hero-footer">
        <div class="footer-tiny">
            &copy; {{ date('Y') }} <span>Bio and Emerging Technology Institute</span>. All rights reserved.
        </div>
    </footer>

</body>
</html>
