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
            --obsidian: #0a1a0e;
            --navy: #1a4a6b;
            --emerald: #1a7a3c;
            --emerald-glow: rgba(26, 122, 60, 0.35);
            --emerald-light: rgba(26, 122, 60, 0.08);
            --gold: #f59e0b;
            --alabaster: #f8f9fa;
            --border: rgba(0,0,0,0.07);
            --ease: cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            color: white; /* Default light text for dark theme */
            background: var(--obsidian); /* Ground the layout with dark theme */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d2b14 0%, #0a1a0e 60%, #0d2233 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Atmosphere Container for clipped effects */
        .hero-atmosphere {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        /* Grid overlay inside atmosphere */
        .hero-atmosphere::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: 1;
        }

        /* Glow orbs inside atmosphere */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 2;
        }
        .orb-1 { width: 80vw; height: 80vw; background: rgba(26, 122, 60, 0.12); top: -20%; right: -20%; filter: blur(150px); }
        .orb-2 { width: 60vw; height: 60vw; background: rgba(26, 74, 107, 0.35); bottom: -10%; left: -10%; filter: blur(120px); }
        .orb-3 { width: 40vw; height: 40vw; background: rgba(26, 122, 60, 0.06); top: 30%; left: 40%; filter: blur(100px); }

        /* Nav */
        .hero-nav {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 5rem;
            background: rgba(10, 26, 14, 0.6);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            border-top: 3px solid var(--emerald);
            box-shadow: 0 4px 30px rgba(0,0,0,0.3);
        }

        .nav-brand {
            display: flex;
            flex-direction: row; /* HORIZONTAL STRIP */
            align-items: center;
            gap: 2rem;
            text-align: left;
        }

        .nav-logo-box {
            background: white;
            padding: 0.8rem 1.1rem;
            border-radius: 16px;
            width: 120px; /* Refined for horizontal balance */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.4s var(--ease);
            flex-shrink: 0;
        }

        .nav-logo-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 163, 108, 0.2);
        }

        .nav-title {
            display: flex;
            align-items: center;
            gap: 2rem; /* Balanced gap for larger text */
            font-family: 'Outfit', sans-serif;
            color: white;
            line-height: 1;
        }

        /* The Vertical Separator */
        .nav-title::after {
            content: '';
            order: 1;
            width: 1px;
            height: 32px; /* Taller for larger text */
            background: rgba(255,255,255,0.2);
            margin: 0 -0.5rem;
        }

        /* Bio and Emerging Tech Institute */
        .nav-title-main {
            order: 0;
            font-size: 1.4rem; /* TITAN SCALE */
            font-weight: 900;
            letter-spacing: -0.02em;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
            white-space: nowrap;
        }

        /* National Review 2026 */
        .nav-title-sub {
            order: 2;
            font-size: 1.1rem; /* SCALED UP */
            font-weight: 800;
            color: var(--emerald);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            filter: drop-shadow(0 0 10px rgba(0, 163, 108, 0.4));
            white-space: nowrap;
        }

        /* ACTIONS REMOVED FROM TOP PER REQUEST */
        .nav-actions {
            display: none;
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
            align-items: flex-start; /* Flow from top */
            justify-content: space-between;
            position: relative;
            z-index: 5;
            padding: 8rem 4% 6rem; /* Top/Bottom padding for mission-critical spacing */
            gap: 6rem;
            width: 100%;
            flex-wrap: wrap; /* Stack naturally on smaller screens */
        }

        .hero-left { flex: 1; max-width: 700px; }

        .registration-status-banner {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column; /* Vertical balance */
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: rgba(220, 38, 38, 0.1);
            border: 2px solid rgba(220, 38, 38, 0.6);
            border-radius: 12px;
            padding: 1rem 1.75rem;
            box-shadow: 0 0 40px rgba(220, 38, 38, 0.2);
            animation: red-aura-pulse 3s infinite ease-in-out;
        }

        .status-banner-main {
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }

        .status-dot-large {
            width: 12px;
            height: 12px;
            background: #ef4444;
            border-radius: 50%;
            box-shadow: 0 0 15px #ef4444;
            position: relative;
        }

        .status-dot-large::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 2px solid #ef4444;
            animation: ring-pulse-red 2s infinite;
        }

        @keyframes red-aura-pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(220, 38, 38, 0.1); border-color: rgba(220, 38, 38, 0.4); }
            50% { box-shadow: 0 0 50px rgba(220, 38, 38, 0.4); border-color: rgba(220, 38, 38, 0.9); }
        }

        @keyframes ring-pulse-red {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(3.5); opacity: 0; }
        }

        .status-text-prime {
            font-size: 0.9rem;
            font-weight: 900;
            color: #f87171;
            text-transform: uppercase;
            letter-spacing: 0.25em;
            text-shadow: 0 0 12px rgba(220, 38, 38, 0.5);
            line-height: 1;
        }

        .status-text-sub {
            font-size: 1.25rem; /* Titan Scale */
            font-weight: 900;
            color: #ffffff; /* High Contrast White */
            letter-spacing: 0.05em;
            text-transform: uppercase;
            text-shadow: 0 0 20px rgba(239, 68, 68, 0.9); /* Intense Glow */
            animation: heartbeat 2s infinite ease-in-out;
            margin-top: 0.25rem;
        }

        @keyframes heartbeat {
            0% { transform: scale(1); filter: brightness(1); }
            15% { transform: scale(1.1); filter: brightness(1.2); }
            30% { transform: scale(1); filter: brightness(1); }
            45% { transform: scale(1.1); filter: brightness(1.2); }
            100% { transform: scale(1); filter: brightness(1); }
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
            font-size: clamp(3rem, 8vw, 6rem); /* Refined for horizontal balance */
            font-weight: 900;
            line-height: 0.9;
            letter-spacing: -0.05em;
            color: white;
            margin-bottom: 2rem;
            position: relative;
        }

        .typewriter-container {
            display: inline-block; /* SEAMLESS INLINE */
            color: var(--emerald);
            margin-left: 0.35rem;
            font-size: 0.9em; /* Balanced for inline flow */
            vertical-align: bottom;
        }

        .typewrite > .wrap {
            border-right: 0.08em solid var(--emerald);
            padding-right: 10px;
            animation: typewriter-cursor 1s infinite;
        }

        @keyframes typewriter-cursor {
            0%, 100% { border-color: var(--emerald); }
            50% { border-color: transparent; }
        }

        .hero-subtitle {
            font-size: 1.15rem;
            font-weight: 500;
            color: rgba(255,255,255,0.65);
            line-height: 1.7;
            max-width: 580px;
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
            gap: 1.5rem;
            min-width: 380px;
            flex-shrink: 0;
        }

        .info-card {
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: all 0.5s var(--ease);
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

        /* Hero bottom bar - Integrated Glass Footer */
        .stat-bar {
            position: relative;
            z-index: 5;
            padding: 2rem 4%; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255,255,255,0.06);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            width: 100%;
            margin: 2rem 0; /* Natural vertical spacing, not grounded */
        }

        .stat-row {
            display: flex;
            gap: 4vw;
            width: 100%;
            justify-content: space-around;
            padding: 0;
            background: transparent;
            backdrop-filter: none;
            border: none;
            border-radius: 0;
        }
        
        .stat-item { 
            text-align: center;
            transition: transform 0.3s;
        }
        .stat-item:hover { transform: translateY(-5px); }

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

        /* ── ADMIN HUD (Inline Version) ── */
        .admin-hud-inline {
            margin-top: 2rem;
            width: 100%;
        }

        .admin-hud-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            pointer-events: auto;
            display: flex; flex-direction: column; gap: 0.5rem;
            transition: all 0.4s var(--ease);
            min-width: 240px;
        }

        .admin-hud-card:hover { 
            background: rgba(255,255,255,0.08);
            transform: translateY(-2px);
            border-color: var(--emerald);
        }

        .hud-header { display: flex; align-items: center; justify-content: space-between; }
        .hud-badge { 
            font-size: 0.6rem; font-weight: 900; color: var(--gold); 
            text-transform: uppercase; letter-spacing: 0.15em;
            display: flex; align-items: center; gap: 0.5rem;
        }

        .hud-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 0.5rem; }
        .hud-stat { display: flex; flex-direction: column; }
        .hud-num { font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 900; color: white; line-height: 1; }
        .hud-label { font-size: 0.55rem; font-weight: 700; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.1em; margin-top: 0.25rem; }

        .btn-hud-results {
            margin-top: 1rem;
            display: flex; align-items: center; justify-content: center; gap: 0.75rem;
            background: white; color: var(--navy); padding: 0.75rem; border-radius: 12px;
            font-size: 0.75rem; font-weight: 900; text-decoration: none;
            transition: all 0.3s;
        }
        .btn-hud-results:hover { background: var(--emerald); color: white; }

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

        /* Synchronized Footer */
        .hero-footer {
            position: relative;
            z-index: 10;
            padding: 2rem 5rem; /* Increased vertical padding to accommodate larger text */
            text-align: center;
            background: rgba(5, 5, 5, 0.4);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255,255,255,0.08);
            width: 100%;
            margin-top: auto; /* This is what grounds the footer to the bottom */
        }

        .footer-tiny {
            font-size: 0.9rem; /* INCREASED FROM 0.7rem */
            color: rgba(255,255,255,0.45);
            font-weight: 500;
            letter-spacing: 0.02em;
        }
        .footer-tiny span { color: var(--emerald); }

        @media (max-width: 1024px) {
            .hero-nav, .hero-body, .section, .admin-section, .cta-section, .hero-footer {
                padding-left: 2rem;
                padding-right: 2rem;
            }
            .hero-body { 
                flex-direction: column; 
                gap: 4rem; 
                padding-top: 6rem; 
                padding-bottom: 6rem;
                height: auto;
                min-height: 100vh;
                overflow-y: auto;
                justify-content: flex-start;
            }
            .hero-right {
                min-width: 100%;
            }
            .about-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            .visual-card { padding: 2rem; }
        }
    </style>
</head>
<body>

    {{-- ══════════ HERO ══════════ --}}
    <section class="hero">
        <div class="hero-atmosphere">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>
        </div>

        {{-- Nav --}}
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

        <div class="hero-body">
            <div class="hero-left">
                <div class="hero-edition">8th National Review</div>
                <h1 class="hero-title">
                    National Bio-Tech
                    <div class="typewriter-container">
                        <span class="typewrite" data-period="2000" data-type='[ "Research Hub", "Innovation 2026", "Scientific Core", "Future Hub" ]'>
                            <span class="wrap"></span>
                        </span>
                    </div>
                </h1>

                <p class="hero-subtitle">
                    Ethiopia's premier scientific gathering for bio and emerging technology research. Present your work, connect with leading researchers, and shape the future of science in Africa.
                </p>

                <div class="hero-cta-group">
                    <a href="{{ route('event.register') }}" class="cta-primary">
                        Register to Present
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>

                <div class="registration-status-banner">
                    <div class="status-banner-main">
                        <div class="status-dot-large"></div>
                        <div class="status-text-prime">Critical Registration Update</div>
                    </div>
                    <div class="status-text-sub">87 SLOTS REMAINING</div>
                </div>

                {{-- Admin Stats HUD (Visible to Admins) --}}
                @if(auth()->check() && auth()->user()->isAdmin() && isset($stats))
                <div class="admin-hud-inline">
                    <div class="admin-hud-card">
                        <div class="hud-header">
                            <span class="hud-badge">
                                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/></svg>
                                Systems Genesis Control
                            </span>
                        </div>
                        <div class="hud-grid">
                            <div class="hud-stat">
                                <span class="hud-num">{{ $stats['total'] }}</span>
                                <span class="hud-label">Registrations</span>
                            </div>
                            <div class="hud-stat">
                                <span class="hud-num">{{ $stats['today'] }}</span>
                                <span class="hud-label">Today</span>
                            </div>
                        </div>
                        <a href="{{ route('dashboard') }}" class="btn-hud-results">
                            Enter Admin Sanctum
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <div class="hero-right">
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <div class="info-label">Event Date</div>
                        <div class="info-value">March 11–13, 2026</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <div class="info-label">Venue</div>
                        <div class="info-value">Addis Ababa, Ethiopia</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <div class="info-label">Accreditation</div>
                        <div class="info-value">Scientific Certification</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stat-bar">
            <div class="stat-row">
                <div class="stat-item">
                    <div class="stat-num">500+</div>
                    <div class="stat-label">Researchers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">45+</div>
                    <div class="stat-label">Institutions</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">12</div>
                    <div class="stat-label">Subject Areas</div>
                </div>
            </div>
            <div class="scroll-hint">
                Scroll to Explore
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </div>
        </div>
    </section>

    {{-- ══════════ ABOUT ══════════ --}}
    <section class="section" id="about">
        <div class="about-grid">
            <div class="about-content">
                <div class="section-tag">About the Review</div>
                <h2 class="section-title">The Frontier of <span class="em">Ethiopian Science</span></h2>
                <p class="section-desc">
                    The 8th National Review brings together the brightest minds in biotechnology and emerging sciences to share breakthroughs that address Ethiopia's most pressing challenges.
                </p>

                <div class="pillar-list">
                    <div class="pillar">
                        <div class="pillar-icon">🧬</div>
                        <div>
                            <div class="pillar-title">Biotechnology Breakthroughs</div>
                            <div class="pillar-desc">Advancing agricultural, health, and industrial bio-tech applications.</div>
                        </div>
                    </div>
                    <div class="pillar">
                        <div class="pillar-icon">🤖</div>
                        <div>
                            <div class="pillar-title">Emerging Technologies</div>
                            <div class="pillar-desc">Exploring AI, nanotechnology, and robotics in the local context.</div>
                        </div>
                    </div>
                    <div class="pillar">
                        <div class="pillar-icon">🌍</div>
                        <div>
                            <div class="pillar-title">Strategic Impact</div>
                            <div class="pillar-desc">Translating high-level research into sustainable economic impacts.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="visual-card">
                <div class="visual-card-content">
                    <div class="vc-label">Event Status</div>
                    <h3 class="vc-title">Shaping the <span>Future</span> of Research</h3>
                    <p class="vc-desc">
                        Register today to be part of Ethiopia's most influential scientific gathering. Call for papers is now active.
                    </p>
                    <div class="vc-stats">
                        <div class="vc-stat">
                            <div class="vc-stat-num">150+</div>
                            <div class="vc-stat-label">Papers Expected</div>
                        </div>
                        <div class="vc-stat">
                            <div class="vc-stat-num">2026</div>
                            <div class="vc-stat-label">Review Year</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════ CTA SECTION ══════════ --}}
    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">Ready to <span>Present?</span></h2>
            <p class="cta-desc">
                Submit your research abstract today and join the elite scientific community at BETIn.
            </p>
            <div class="hero-cta-group" style="justify-content: center;">
                <a href="{{ route('event.register') }}" class="cta-primary">
                    Start Registration Now
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ══════════ FOOTER ══════════ --}}
    <footer class="hero-footer">
        <div class="footer-tiny">
            &copy; {{ date('Y') }} <span>Bio and Emerging Technology Institute</span>. All rights reserved.
        </div>
    </footer>

    {{-- Scripts for Typewriter effect --}}
    <script>
        var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) { delta /= 2; }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i=0; i<elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                  new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
        };
    </script>
</body>
</html>
