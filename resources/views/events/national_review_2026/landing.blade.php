<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8th National Review 2026 | Bio and Emerging Technology Institute</title>
    <meta name="description" content="Join the 8th BETIn National Review — Ethiopia's premier scientific gathering for bio and emerging technology research.">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --obsidian: #050505;
            --navy: #003B5C;
            --emerald: #00a36c;
            --emerald-glow: rgba(0, 163, 108, 0.35);
            --emerald-light: rgba(0, 163, 108, 0.08);
            --gold: #f59e0b;
            --alabaster: #f8f9fa;
            --border: rgba(0,0,0,0.07);
            --ease: cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--obsidian);
            background: var(--alabaster);
            overflow-x: hidden;
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--navy) 0%, #001f3a 60%, #002d4a 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Grid overlay */
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* Glow orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
        }
        .orb-1 { width: 600px; height: 600px; background: rgba(0, 163, 108, 0.12); top: -100px; right: -100px; }
        .orb-2 { width: 400px; height: 400px; background: rgba(0, 59, 92, 0.4); bottom: -50px; left: -50px; }
        .orb-3 { width: 300px; height: 300px; background: rgba(245, 158, 11, 0.06); top: 40%; left: 30%; }

        /* Nav */
        .hero-nav {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 5rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .nav-logo-box {
            background: white;
            padding: 0.5rem 0.75rem;
            border-radius: 10px;
            width: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-title {
            font-family: 'Outfit', sans-serif;
            font-size: 0.85rem;
            font-weight: 800;
            color: white;
            line-height: 1.3;
            letter-spacing: -0.01em;
        }

        .nav-title span {
            display: block;
            font-size: 0.65rem;
            font-weight: 600;
            color: var(--emerald);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-link {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: color 0.2s;
        }

        .nav-link:hover { color: white; }

        .nav-btn {
            background: var(--emerald);
            color: white;
            padding: 0.65rem 1.5rem;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 800;
            text-decoration: none;
            transition: all 0.3s var(--ease);
            box-shadow: 0 8px 25px var(--emerald-glow);
        }

        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px var(--emerald-glow);
        }

        /* Hero Content */
        .hero-body {
            flex: 1;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 5;
            padding: 5rem 5rem 6rem;
            gap: 5rem;
        }

        .hero-left { flex: 1; max-width: 700px; }

        .event-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(0, 163, 108, 0.12);
            border: 1px solid rgba(0, 163, 108, 0.3);
            border-radius: 100px;
            padding: 0.5rem 1.25rem;
            margin-bottom: 2.5rem;
        }

        .badge-dot {
            width: 8px; height: 8px;
            background: var(--emerald);
            border-radius: 50%;
            box-shadow: 0 0 12px var(--emerald-glow);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.4); opacity: 0.7; }
        }

        .badge-text {
            font-size: 0.7rem;
            font-weight: 800;
            color: var(--emerald);
            text-transform: uppercase;
            letter-spacing: 0.15em;
        }

        .hero-edition {
            font-size: 0.75rem;
            font-weight: 800;
            color: rgba(255,255,255,0.35);
            text-transform: uppercase;
            letter-spacing: 0.4em;
            margin-bottom: 1.5rem;
        }

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(3.5rem, 6vw, 6rem);
            font-weight: 900;
            line-height: 0.9;
            letter-spacing: -0.04em;
            color: white;
            margin-bottom: 1rem;
        }

        .hero-title .accent {
            color: var(--emerald);
            display: block;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            font-weight: 500;
            color: rgba(255,255,255,0.55);
            line-height: 1.7;
            max-width: 520px;
            margin-bottom: 3.5rem;
        }

        .hero-cta-group {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            background: var(--emerald);
            color: white;
            padding: 1.25rem 3rem;
            border-radius: 100px;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 900;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: all 0.4s var(--ease);
            box-shadow: 0 20px 50px var(--emerald-glow);
        }

        .cta-primary:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 30px 70px var(--emerald-glow);
        }

        .cta-primary svg { transition: transform 0.3s var(--ease); }
        .cta-primary:hover svg { transform: translateX(5px); }

        .cta-secondary {
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.2s;
        }

        .cta-secondary:hover { color: white; }

        /* Event Info Cards */
        .hero-right {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            min-width: 300px;
        }

        .info-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            transition: all 0.3s var(--ease);
        }

        .info-card:hover {
            background: rgba(255,255,255,0.08);
            border-color: rgba(0, 163, 108, 0.3);
            transform: translateX(5px);
        }

        .info-icon {
            width: 44px; height: 44px;
            background: rgba(0, 163, 108, 0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--emerald);
            flex-shrink: 0;
        }

        .info-label {
            font-size: 0.6rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: rgba(255,255,255,0.35);
            margin-bottom: 0.3rem;
        }

        .info-value {
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 800;
            color: white;
        }

        /* Hero bottom bar */
        .hero-bottom {
            position: relative;
            z-index: 5;
            border-top: 1px solid rgba(255,255,255,0.06);
            padding: 1.5rem 5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-row {
            display: flex;
            gap: 4rem;
        }

        .stat-item { text-align: center; }

        .stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 900;
            color: white;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.65rem;
            font-weight: 700;
            color: rgba(255,255,255,0.35);
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-top: 0.25rem;
        }

        .scroll-hint {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: rgba(255,255,255,0.3);
            font-size: 0.75rem;
            font-weight: 600;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(6px); }
        }

        /* ── ABOUT SECTION ── */
        .section {
            padding: 8rem 5rem;
        }

        .section-tag {
            font-size: 0.7rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.4em;
            color: var(--emerald);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-tag::after {
            content: '';
            flex: 1;
            max-width: 60px;
            height: 2px;
            background: var(--emerald);
            border-radius: 2px;
        }

        .section-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 900;
            letter-spacing: -0.03em;
            color: var(--navy);
            line-height: 1.05;
            margin-bottom: 1.5rem;
        }

        .section-title .em { color: var(--emerald); }

        .section-desc {
            font-size: 1.05rem;
            color: #64748b;
            line-height: 1.8;
            max-width: 600px;
        }

        /* About Grid */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }

        .pillar-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .pillar {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
            padding: 1.5rem;
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border);
            transition: all 0.3s var(--ease);
        }

        .pillar:hover {
            border-color: var(--emerald);
            box-shadow: 0 10px 30px rgba(0, 163, 108, 0.08);
            transform: translateY(-3px);
        }

        .pillar-icon {
            width: 44px; height: 44px;
            background: var(--emerald-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--emerald);
            flex-shrink: 0;
        }

        .pillar-title {
            font-weight: 800;
            color: var(--navy);
            font-size: 0.95rem;
            margin-bottom: 0.3rem;
        }

        .pillar-desc {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* Visual card */
        .visual-card {
            background: linear-gradient(135deg, var(--navy) 0%, #002d4a 100%);
            border-radius: 32px;
            padding: 4rem;
            position: relative;
            overflow: hidden;
        }

        .visual-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .visual-card-content { position: relative; z-index: 2; }

        .vc-label {
            font-size: 0.6rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.3em;
            color: var(--emerald);
            margin-bottom: 2rem;
        }

        .vc-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: white;
            line-height: 1;
            letter-spacing: -0.04em;
            margin-bottom: 1.5rem;
        }

        .vc-title span { color: var(--emerald); }

        .vc-desc {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.5);
            line-height: 1.7;
            margin-bottom: 3rem;
        }

        .vc-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .vc-stat {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 1.25rem;
        }

        .vc-stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 900;
            color: white;
            line-height: 1;
        }

        .vc-stat-label {
            font-size: 0.65rem;
            font-weight: 700;
            color: rgba(255,255,255,0.35);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-top: 0.4rem;
        }

        /* ── ADMIN PANEL ── */
        .admin-section {
            background: white;
            border-top: 3px solid var(--emerald);
            padding: 4rem 5rem;
        }

        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2.5rem;
        }

        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: #fef3c7;
            border: 1px solid #fde68a;
            border-radius: 100px;
            padding: 0.4rem 1rem;
            font-size: 0.65rem;
            font-weight: 900;
            color: #92400e;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .admin-stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .admin-stat-card {
            background: var(--alabaster);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s var(--ease);
        }

        .admin-stat-card:hover {
            border-color: var(--emerald);
            box-shadow: 0 8px 25px rgba(0, 163, 108, 0.08);
        }

        .admin-stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--navy);
            line-height: 1;
        }

        .admin-stat-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-top: 0.5rem;
        }

        .admin-actions {
            display: flex;
            gap: 1rem;
        }

        .btn-results {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--navy);
            color: white;
            padding: 0.9rem 2rem;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s var(--ease);
        }

        .btn-results:hover {
            background: var(--emerald);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px var(--emerald-glow);
        }

        /* ── CTA SECTION ── */
        .cta-section {
            background: linear-gradient(135deg, var(--navy) 0%, #002d4a 100%);
            padding: 8rem 5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .cta-content { position: relative; z-index: 2; }

        .cta-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 900;
            color: white;
            letter-spacing: -0.04em;
            line-height: 1;
            margin-bottom: 1.5rem;
        }

        .cta-title span { color: var(--emerald); }

        .cta-desc {
            font-size: 1.05rem;
            color: rgba(255,255,255,0.5);
            max-width: 500px;
            margin: 0 auto 3.5rem;
            line-height: 1.7;
        }

        /* Footer */
        .footer {
            background: var(--obsidian);
            padding: 2.5rem 5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-copy {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.3);
            font-weight: 600;
        }

        .footer-copy span { color: var(--emerald); }

        @media (max-width: 1024px) {
            .hero-nav, .hero-body, .hero-bottom, .section, .admin-section, .cta-section, .footer {
                padding-left: 2rem;
                padding-right: 2rem;
            }
            .hero-body { flex-direction: column; gap: 3rem; padding-top: 4rem; }
            .hero-right { min-width: unset; width: 100%; }
            .about-grid { grid-template-columns: 1fr; }
            .admin-stats-grid { grid-template-columns: repeat(2, 1fr); }
            .stat-row { gap: 2rem; }
        }

        @media (max-width: 640px) {
            .hero-title { font-size: 3rem; }
            .nav-title { display: none; }
            .admin-stats-grid { grid-template-columns: 1fr 1fr; }
            .hero-bottom { flex-direction: column; gap: 1.5rem; }
        }
    </style>
</head>
<body>

    {{-- ══════════ HERO ══════════ --}}
    <section class="hero">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>

        {{-- Nav --}}
        <nav class="hero-nav">
            <div class="nav-brand">
                <div class="nav-logo-box">
                    <x-logo width="100%" height="auto" />
                </div>
                <div class="nav-title">
                    Bio and Emerging Technology Institute
                    <span>National Review 2026</span>
                </div>
            </div>
            <div class="nav-actions">
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">← Back to Dashboard</a>
                @endauth
                <a href="{{ route('event.register') }}" class="nav-btn">Register Now →</a>
            </div>
        </nav>

        {{-- Hero Body --}}
        <div class="hero-body">
            <div class="hero-left">
                <div class="event-badge">
                    <div class="badge-dot"></div>
                    <span class="badge-text">Registration Open</span>
                </div>

                <p class="hero-edition">8th Annual Edition · 2026</p>

                <h1 class="hero-title">
                    National
                    <span class="accent">Review</span>
                </h1>

                <p class="hero-subtitle">
                    Ethiopia's premier scientific gathering for bio and emerging technology research. Present your work, connect with leading researchers, and shape the future of science in Africa.
                </p>

                <div class="hero-cta-group">
                    <a href="{{ route('event.register') }}" class="cta-primary">
                        Register to Present
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#about" class="cta-secondary">
                        Learn More
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="hero-right">
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="info-label">Event Date</div>
                        <div class="info-value">March 2026 · Addis Ababa</div>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="info-label">Venue</div>
                        <div class="info-value">Bio and Emerging Technology Institute</div>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="info-label">Eligibility</div>
                        <div class="info-value">Researchers, PhD & MSc Scholars</div>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="info-label">Submission Deadline</div>
                        <div class="info-value">Open — Register Early</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="hero-bottom">
            <div class="stat-row">
                <div class="stat-item">
                    <div class="stat-num">8th</div>
                    <div class="stat-label">Annual Edition</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">500+</div>
                    <div class="stat-label">Expected Attendees</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">20+</div>
                    <div class="stat-label">Research Tracks</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">3</div>
                    <div class="stat-label">Days of Science</div>
                </div>
            </div>
            <div class="scroll-hint">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
                Scroll to explore
            </div>
        </div>
    </section>

    {{-- ══════════ ADMIN PANEL (visible only to admins) ══════════ --}}
    @if($stats !== null)
    <div class="admin-section">
        <div class="admin-header">
            <div>
                <div class="admin-badge">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    Admin Overview
                </div>
                <h2 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 900; color: var(--navy); margin-top: 0.75rem; letter-spacing: -0.02em;">
                    Registration Dashboard
                </h2>
            </div>
            <div class="admin-actions">
                <a href="{{ route('event.results') }}" class="btn-results">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 2v-6m-8 13h11a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    View Full Results
                </a>
            </div>
        </div>

        <div class="admin-stats-grid">
            <div class="admin-stat-card" style="border-top: 3px solid var(--emerald);">
                <div class="admin-stat-num" style="color: var(--emerald);">{{ $stats['total'] }}</div>
                <div class="admin-stat-label">Total Registrations</div>
            </div>
            <div class="admin-stat-card" style="border-top: 3px solid #3b82f6;">
                <div class="admin-stat-num" style="color: #3b82f6;">{{ $stats['male'] }}</div>
                <div class="admin-stat-label">Male Participants</div>
            </div>
            <div class="admin-stat-card" style="border-top: 3px solid #ec4899;">
                <div class="admin-stat-num" style="color: #ec4899;">{{ $stats['female'] }}</div>
                <div class="admin-stat-label">Female Participants</div>
            </div>
            <div class="admin-stat-card" style="border-top: 3px solid var(--gold);">
                <div class="admin-stat-num" style="color: var(--gold);">{{ $stats['pending'] }}</div>
                <div class="admin-stat-label">Pending Review</div>
            </div>
        </div>
    </div>
    @endif

    {{-- ══════════ ABOUT SECTION ══════════ --}}
    <section class="section" id="about" style="background: white;">
        <div class="about-grid">
            <div>
                <p class="section-tag">About the Event</p>
                <h2 class="section-title">
                    Where Science<br>Meets <span class="em">Innovation</span>
                </h2>
                <p class="section-desc">
                    The BETIn National Review is Ethiopia's flagship scientific conference, bringing together researchers, academics, and industry leaders to share breakthroughs in bio and emerging technology.
                </p>

                <div class="pillar-list">
                    <div class="pillar">
                        <div class="pillar-icon">
                            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="pillar-title">Research Presentations</div>
                            <div class="pillar-desc">Present your original research to a panel of distinguished scientists and peers.</div>
                        </div>
                    </div>
                    <div class="pillar">
                        <div class="pillar-icon">
                            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="pillar-title">Networking & Collaboration</div>
                            <div class="pillar-desc">Connect with Ethiopia's leading scientists, researchers, and technology innovators.</div>
                        </div>
                    </div>
                    <div class="pillar">
                        <div class="pillar-icon">
                            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="pillar-title">Recognition & Awards</div>
                            <div class="pillar-desc">Outstanding research is recognized with institutional awards and certificates of excellence.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="visual-card">
                <div class="visual-card-content">
                    <p class="vc-label">Event Theme · 2026</p>
                    <h3 class="vc-title">Advancing <span>Science</span> for Sustainable Development</h3>
                    <p class="vc-desc">
                        This year's review focuses on translating scientific research into real-world solutions that address Ethiopia's most pressing development challenges.
                    </p>
                    <div class="vc-stats">
                        <div class="vc-stat">
                            <div class="vc-stat-num">8th</div>
                            <div class="vc-stat-label">Annual Edition</div>
                        </div>
                        <div class="vc-stat">
                            <div class="vc-stat-num">2026</div>
                            <div class="vc-stat-label">Academic Year</div>
                        </div>
                        <div class="vc-stat">
                            <div class="vc-stat-num">PhD</div>
                            <div class="vc-stat-label">Min. Qualification</div>
                        </div>
                        <div class="vc-stat">
                            <div class="vc-stat-num">Free</div>
                            <div class="vc-stat-label">Registration</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════ FINAL CTA ══════════ --}}
    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">Ready to <span>Present</span><br>Your Research?</h2>
            <p class="cta-desc">
                Join hundreds of researchers at Ethiopia's most prestigious scientific review. Secure your spot today.
            </p>
            <a href="{{ route('event.register') }}" class="cta-primary" style="display: inline-flex; font-size: 1.1rem; padding: 1.5rem 4rem;">
                Begin Registration
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="footer">
        <div class="footer-copy">
            &copy; {{ date('Y') }} <span>Bio and Emerging Technology Institute</span>. All rights reserved.
        </div>
        <div class="footer-copy">
            REF: BETIN-NR-2026 · <span>projects.betin.gov.et</span>
        </div>
    </footer>

</body>
</html>
