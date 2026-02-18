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

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            background: radial-gradient(circle at 10% 20%, rgba(0, 163, 108, 0.05) 0%, transparent 40%),
                        radial-gradient(circle at 90% 80%, rgba(0, 31, 49, 0.05) 0%, transparent 40%),
                        #f8fafc;
            color: var(--navy);
            line-height: 1.6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
            overflow-x: hidden;
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

        /* ── HEADER SYNC ── */
        .header-box {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 3.5rem;
            text-align: left;
        }

        .logo-wrapper {
            background: white;
            padding: 0.75rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 31, 49, 0.08);
            width: 110px;
            flex-shrink: 0;
            border: 1px solid var(--border);
        }

        .brand-text-main {
            font-size: 0.7rem;
            font-weight: 900;
            color: var(--navy);
            text-transform: uppercase;
            letter-spacing: 0.15em;
            opacity: 0.7;
            margin-bottom: 0.25rem;
        }

        .brand-text-title {
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--navy);
            letter-spacing: -0.03em;
            line-height: 1.1;
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
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 6px;
            background: linear-gradient(90deg, var(--emerald), var(--navy));
        }

        .success-aura {
            width: 90px;
            height: 90px;
            background: var(--emerald-light);
            color: var(--emerald);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2.5rem;
            position: relative;
            animation: pulseEmerald 2s infinite;
        }

        @keyframes pulseEmerald {
            0% { box-shadow: 0 0 0 0 rgba(0, 163, 108, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(0, 163, 108, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 163, 108, 0); }
        }

        .conf-title {
            font-size: 2.2rem;
            font-weight: 950;
            color: var(--navy);
            margin-bottom: 0.75rem;
            letter-spacing: -0.04em;
        }

        .conf-desc {
            font-size: 1rem;
            color: var(--slate);
            margin-bottom: 3rem;
            font-weight: 500;
        }

        .participant-id-box {
            background: #f8fafc;
            border: 1.5px dashed var(--border);
            padding: 1.5rem;
            border-radius: 20px;
            margin-bottom: 2.5rem;
        }

        .id-label {
            font-size: 0.7rem;
            font-weight: 950;
            color: var(--slate);
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 0.5rem;
        }

        .id-value {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 950;
            color: var(--navy);
            letter-spacing: 0.1em;
            background: linear-gradient(135deg, var(--navy), var(--emerald));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .details-grid {
            border-top: 1.5px solid #f1f5f9;
            padding-top: 2rem;
            display: grid;
            gap: 1rem;
            text-align: left;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            font-size: 0.95rem;
        }

        .detail-label { font-weight: 800; color: var(--slate); font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .detail-value { font-weight: 700; color: var(--navy); }

        .btn-portal {
            display: inline-block;
            margin-top: 3rem;
            padding: 1.25rem 3rem;
            background: var(--navy);
            color: white;
            text-decoration: none;
            border-radius: 100px;
            font-weight: 900;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            transition: all 0.4s var(--ease);
            box-shadow: 0 10px 25px rgba(0, 31, 49, 0.2);
        }

        .btn-portal:hover {
            background: var(--emerald);
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 163, 108, 0.3);
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
                <div class="brand-text-main">Bio and Emerging Technology Institute</div>
                <h2 class="brand-text-title">8<sup>th</sup> Annual <span style="color: var(--emerald);">Review</span></h2>
            </div>
        </header>

        <div class="receipt-card">
            <div class="success-aura">
                <svg width="45" height="45" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"/></svg>
            </div>

            <h1 class="conf-title">Registration Confirmed</h1>
            <p class="conf-desc">Thank you, <strong>{{ $registration->full_name }}</strong>. Your registration for the 8<sup>th</sup> Annual Review has been successfully received.</p>

            <div style="background: var(--emerald-light); border: 1px solid rgba(0, 163, 108, 0.2); padding: 1.5rem; border-radius: 20px; margin-bottom: 2.5rem; text-align: left; display: flex; gap: 1rem; align-items: center; animation: slideIn 0.4s var(--ease) both;">
                <div style="font-size: 1.5rem;">📧</div>
                <div>
                    <div style="font-weight: 800; color: var(--emerald); font-size: 0.9rem; margin-bottom: 0.1rem;">Confirmation Email Sent</div>
                    <div style="font-size: 0.85rem; color: var(--navy); opacity: 0.8; font-weight: 500;">Please check your inbox. You can use the secure link in the email to **edit your application** or upload missing documents anytime.</div>
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
                    <span class="detail-value">Addis Ababa, Ethiopia</span>
                </div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ route('event.landing') }}" class="btn-portal">Return to Event Portal</a>
        </div>
    </div>
</body>
</html>
