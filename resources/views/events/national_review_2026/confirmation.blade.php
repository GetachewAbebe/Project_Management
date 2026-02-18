<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmed | 8th National Review</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand-blue: #003B5C;
            --brand-green: #008B4B;
            --primary: var(--brand-blue);
            --accent: var(--brand-green);
            --bg: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #001f31;
            --text-muted: #64748b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            line-height: 1.6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            width: 100%;
            max-width: 500px;
            animation: fadeIn 0.8s ease-out;
            text-align: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(34, 197, 94, 0.1);
            color: var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
        }

        .title {
            font-size: 2rem;
            font-weight: 900;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1rem;
            color: var(--text-muted);
            margin-bottom: 2.5rem;
        }

        .info-card {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            border: 1px solid rgba(0,0,0,0.02);
        }

        .reference-label {
            font-size: 0.75rem;
            font-weight: 800;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }

        .reference-code {
            font-size: 1.5rem;
            font-weight: 950;
            color: var(--primary);
            letter-spacing: 0.05em;
            background: #f1f5f9;
            padding: 1rem;
            border-radius: 12px;
            display: inline-block;
            margin-bottom: 1.5rem;
        }

        .event-info {
            border-top: 1px solid #f1f5f9;
            padding-top: 1.5rem;
            text-align: left;
        }

        .info-item {
            margin-bottom: 0.75rem;
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
        }

        .info-item .label { font-weight: 700; color: var(--text-muted); }
        .info-item .value { font-weight: 600; color: var(--text-main); }

        .btn-home {
            display: inline-block;
            margin-top: 1rem;
            padding: 1rem 2rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <header style="display: flex; align-items: center; gap: 2rem; margin-bottom: 3rem; text-align: left;">
            <div style="background: white; padding: 0.8rem; border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 59, 92, 0.05); width: 120px; flex-shrink: 0;">
                <x-logo width="100%" height="auto" />
            </div>
            <div>
                <div style="font-size: 0.8rem; font-weight: 800; color: var(--brand-blue); text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.8;">Bio and Emerging Technology Institute</div>
                <h2 style="font-size: 1.75rem; font-weight: 900; color: var(--primary); letter-spacing: -0.02em;">8th National <span style="color: var(--brand-green);">Review</span></h2>
            </div>
        </header>

        <div class="success-icon">
            <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
        </div>

        <h1 class="title">Registration Confirmed</h1>
        <p class="subtitle">Thank you, <strong>{{ $registration->full_name }}</strong>. Your registration for the 8th National Review has been successfully received.</p>

        <div class="info-card">
            <div class="reference-label">Your Participant ID</div>
            <div class="reference-code">{{ $registration->reference_code }}</div>

            <div class="event-info">
                <div class="info-item">
                    <span class="label">Event</span>
                    <span class="value">8th National Review</span>
                </div>
                <div class="info-item">
                    <span class="label">Date</span>
                    <span class="value">March 11 - 13, 2026</span>
                </div>
                <div class="info-item">
                    <span class="label">Organizer</span>
                    <span class="value">BETI</span>
                </div>
            </div>
        </div>

        <a href="{{ route('event.register') }}" class="btn-home">Register Another</a>
    </div>
</body>
</html>
