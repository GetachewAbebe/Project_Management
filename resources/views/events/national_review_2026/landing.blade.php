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
            background: linear-gradient(135deg, var(--navy) 0%, #001f3a 60%, #002d4a 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden; /* CRITICAL: Clips all background orbs/effects */
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
        .orb-1 { width: 80vw; height: 80vw; background: rgba(0, 163, 108, 0.08); top: -20%; right: -20%; filter: blur(150px); }
        .orb-2 { width: 60vw; height: 60vw; background: rgba(0, 59, 92, 0.3); bottom: -10%; left: -10%; filter: blur(120px); }
        .orb-3 { width: 40vw; height: 40vw; background: rgba(245, 158, 11, 0.04); top: 30%; left: 40%; filter: blur(100px); }

        /* Nav */
        .hero-nav {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center; /* CENTERED */
            padding: 2.5rem 5rem; /* Increased vertical breathing room */
            background: rgba(5, 5, 5, 0.4);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
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
            align-items: center;
            justify-content: center;
            gap: 0.85rem;
            background: rgba(220, 38, 38, 0.1); /* Red tint */
            border: 2px solid rgba(220, 38, 38, 0.6); /* Bold Red Border */
            border-radius: 12px;
            padding: 1rem 1.75rem; /* Increased padding */
            box-shadow: 0 0 40px rgba(220, 38, 38, 0.2);
            animation: red-aura-pulse 3s infinite ease-in-out;
        }

        .status-dot-large {
            width: 12px;
            height: 12px;
            background: #ef4444; /* Vibrant Red */
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
            font-size: 0.9rem; /* ENLARGED */
            font-weight: 900;
            color: #f87171; /* Light Red for readability */
            text-transform: uppercase;
            letter-spacing: 0.25em;
            text-shadow: 0 0 12px rgba(220, 38, 38, 0.5);
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
            }
            .hero-left { max-width: 100%; text-align: center; }
            .hero-cta-group { justify-content: center; }
            .hero-right { min-width: unset; width: 100%; max-width: 500px; margin: 0 auto; }
            .stat-bar { padding: 2rem; }
            .stat-row { flex-wrap: wrap; gap: 2rem; justify-content: center; border-radius: 32px; padding: 2rem; }
            .hero { height: auto; min-height: 100vh; overflow-y: auto; }
            body { height: auto; overflow-y: auto; }
        }

        @media (max-width: 900px) {
            .modal-container { grid-template-columns: 1fr; border-radius: 0; min-height: 100vh; max-height: none; }
            .modal-sidebar { display: none; }
            .modal-content { padding: 5rem 2rem 3rem; }
            .modal-overlay { padding: 0; align-items: stretch; }
            .modal-close { top: 1rem; right: 1rem; background: var(--obsidian); color: white; }
        }

        @media (max-width: 640px) {
            .hero-title { font-size: clamp(3rem, 12vw, 4rem); }
            .nav-brand { gap: 0.75rem; }
            .nav-logo-box { width: 60px; padding: 0.35rem; }
            .nav-title { font-size: 0.7rem; }
            .nav-title span { font-size: 0.55rem; }
            .nav-btn { padding: 0.5rem 1rem; font-size: 0.75rem; }
            .hero-subtitle { font-size: 1rem; margin-bottom: 2.5rem; }
            .hero-body { gap: 3rem; }
            .info-card { padding: 1rem 1.5rem; }
        }
        
        /* Modal Overlay */
        .modal-overlay {
            position: fixed; inset: 0; z-index: 1000;
            background: rgba(5, 5, 5, 0.95);
            backdrop-filter: blur(25px);
            display: none; align-items: center; justify-content: center;
            opacity: 0; transition: opacity 0.5s var(--ease);
            padding: 2rem;
            overflow-y: auto;
        }
        .modal-overlay.active { display: flex; opacity: 1; }

        .modal-container {
            width: 100%; max-width: 1200px;
            background: white; border-radius: 40px;
            position: relative; overflow: hidden;
            box-shadow: 0 50px 100px rgba(0,0,0,0.5);
            display: grid; grid-template-columns: 350px 1fr;
            min-height: 80vh; max-height: 90vh;
            transform: scale(0.95); transition: transform 0.5s var(--ease);
        }
        .modal-overlay.active .modal-container { transform: scale(1); }

        .modal-sidebar {
            background: linear-gradient(135deg, #002d4a 0%, #001a2c 100%); 
            padding: 3.5rem 3rem; color: white;
            display: flex; flex-direction: column; gap: 2rem;
            position: relative; overflow: hidden;
        }
        .modal-sidebar::before {
            content: ''; position: absolute; inset: 0;
            background: radial-gradient(circle at 0% 0%, rgba(0, 163, 108, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }
        .modal-close {
            position: absolute; top: 2rem; right: 2rem;
            width: 44px; height: 44px; border-radius: 50%;
            background: var(--smoke); border: none; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            color: var(--obsidian); z-index: 10; transition: all 0.3s;
        }
        .modal-close:hover { background: #fee2e2; color: #ef4444; transform: rotate(90deg); }

        /* Pathfinder logic ported from register page */
        .modal-content { 
            padding: 4rem; position: relative; 
            overflow-y: auto; max-height: 90vh;
        }
        .step-content { display: none; }
        .step-content.active { display: block; animation: slideIn 0.8s var(--ease) forwards; }
        @keyframes slideIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }

        /* Form styling from Zenith registry */
        .field label { display: block; font-size: 0.75rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: #64748b; margin-bottom: 0.75rem; }
        .input-well { background: var(--alabaster); border: 2px solid transparent; border-radius: 12px; padding: 0.4rem 1.25rem; transition: all 0.3s; }
        .input-well:focus-within { border-color: var(--emerald); background: white; box-shadow: 0 10px 25px rgba(0, 163, 108, 0.08); }
        input, select, textarea { width: 100%; border: none; background: transparent; font-family: inherit; font-size: 1rem; font-weight: 600; color: var(--obsidian); outline: none; padding: 0.75rem 0; }
        
        .grid { 
            display: grid; grid-template-columns: repeat(12, 1fr); gap: 1.5rem; 
        }
        .col-12 { grid-column: span 12; }
        .col-6 { grid-column: span 6; }

        @media (max-width: 768px) {
            .col-6 { grid-column: span 12; }
            .grid { gap: 1rem; }
        }

        .modal-nav { margin-top: 3rem; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border); padding-top: 2rem; }
        .btn-modal { padding: 1rem 2.5rem; border-radius: 100px; font-weight: 800; cursor: pointer; transition: all 0.3s; border: none; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.1em; }
        .btn-modal-prev { background: var(--smoke); color: var(--slate); }
        .btn-modal-next { background: var(--obsidian); color: white; }
        .btn-modal-next:hover { background: var(--emerald); transform: translateY(-2px); box-shadow: 0 10px 20px var(--emerald-glow); }

        .file-zone { border: 2px dashed var(--border); border-radius: 16px; padding: 1.5rem; text-align: center; cursor: pointer; transition: all 0.3s; background: var(--alabaster); }
        .file-zone:hover { border-color: var(--emerald); background: white; }

        .step-list { 
            display: flex; flex-direction: column; gap: 4rem; 
            margin-top: 3rem; position: relative; 
        }
        
        /* Pathfinder 3.0 Track System */
        .step-list::before {
            content: ''; position: absolute;
            top: 14px; left: 13px; bottom: 14px;
            width: 2px;
            background-image: linear-gradient(to bottom, rgba(255,255,255,0.08) 50%, transparent 50%);
            background-size: 2px 10px; /* Dashed by default */
            transform: translateX(-50%);
            z-index: 0;
        }

        .step-item { 
            display: flex; align-items: start; gap: 1.5rem; 
            opacity: 0.2; transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1); 
            position: relative; z-index: 1;
        }
        .step-item.active { opacity: 1; transform: translateX(12px); }
        .step-item.completed { opacity: 0.9; }

        /* Solid Glowing Progress Track for Completed Steps */
        .step-item.completed:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 28px; left: 13px;
            width: 2px; height: calc(4rem + 2px);
            background: var(--emerald);
            box-shadow: 0 0 15px var(--emerald-glow);
            transform: translateX(-50%);
            z-index: 1;
            transition: all 0.8s var(--ease);
        }

        .step-dot { 
            width: 28px; height: 28px; border-radius: 50%; 
            border: 2px solid rgba(255,255,255,0.2); flex-shrink: 0; 
            display: flex; align-items: center; justify-content: center;
            font-size: 0.75rem; font-weight: 901; color: white;
            transition: all 0.6s var(--ease);
            background: rgba(255,255,255,0.03);
            position: relative; z-index: 2;
            backdrop-filter: blur(8px);
        }

        /* Pathfinder 3.0 States */
        /* Active: Vivid Blue Pulse */
        .step-item.active .step-dot { 
            background: #007bff; border-color: #00c6ff; 
            box-shadow: 0 0 25px rgba(0, 123, 255, 0.6); 
            transform: scale(1.2);
            animation: blue-pulse 2s infinite;
        }

        /* Completed: Solid Emerald */
        .step-item.completed .step-dot { 
            background: var(--emerald); border-color: var(--emerald); 
            box-shadow: 0 0 15px var(--emerald-glow);
            transform: scale(0.95);
        }

        @keyframes blue-pulse {
            0% { box-shadow: 0 0 20px rgba(0, 123, 255, 0.4); }
            50% { box-shadow: 0 0 40px rgba(0, 123, 255, 0.7); }
            100% { box-shadow: 0 0 20px rgba(0, 123, 255, 0.4); }
        }

        .step-info { display: flex; flex-direction: column; gap: 0.25rem; }
        
        .step-label { 
            font-size: 0.85rem; font-weight: 800; color: white; 
            letter-spacing: 0.08em; text-transform: uppercase;
            transition: all 0.6s var(--ease);
        }
        
        .step-sub {
            font-size: 0.6rem; font-weight: 600; color: rgba(255,255,255,0.4);
            text-transform: uppercase; letter-spacing: 0.1em;
            display: none;
        }

        .step-item.active .step-sub { display: block; animation: fadeIn 0.5s ease forwards; }
        .step-item.active .step-label {
            color: #00c6ff;
            text-shadow: 0 0 15px rgba(0, 198, 255, 0.4);
            animation: float-label 3s ease-in-out infinite;
        }

        /* Submission Window Card inspired by reference footer */
        .submission-window {
            margin-top: auto; padding: 1.25rem;
            background: rgba(255,255,255,0.03);
            border-radius: 16px; border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }
        .window-header {
            font-size: 0.55rem; font-weight: 800; color: rgba(255,255,255,0.3);
            text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: 0.5rem;
        }
        .window-timer {
            font-family: 'Outfit', sans-serif; font-size: 1.1rem; font-weight: 900;
            color: white; display: flex; align-items: baseline; gap: 0.4rem;
        }
        .timer-unit { font-size: 0.6rem; font-weight: 700; opacity: 0.5; }

        /* Ultra-Wide Correction */
        @media (min-width: 2000px) {
            .modal-container { max-width: 1400px; }
            .hero-body { max-width: 1600px; margin: 0 auto; }
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
            <div class="nav-actions">
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">← Back to Dashboard</a>
                @endauth
                <a href="javascript:void(0)" onclick="openModal()" class="nav-btn">Register Now →</a>
            </div>
        </nav>

        {{-- Hero Body --}}
        <div class="hero-body">
            <div class="hero-left">

                <p class="hero-edition">8<sup>th</sup> Annual Review · 2026</p>

                <h1 class="hero-title">
                    Annual Review on
                    <span class="typewriter-container">
                        <span id="typewriter" class="typewrite"></span>
                    </span>
                </h1>

                <p class="hero-subtitle">
                    Ethiopia's premier scientific gathering for bio and emerging technology research. Present your work, connect with leading researchers, and shape the future of science in Africa.
                </p>

                <div class="hero-cta-group">
                    <a href="javascript:void(0)" onclick="openModal()" class="cta-primary">
                        Register to Present
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
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
                        <div class="info-value">March 11 – 13, 2026 · Addis Ababa</div>
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
                        <div class="info-value">February 27, 2026</div>
                    </div>
                </div>

                <div class="registration-status-banner">
                    <div class="status-dot-large"></div>
                    <span class="status-text-prime">Registration Open</span>
                </div>

                {{-- Integrated Admin HUD --}}
                @if($stats !== null)
                <div class="admin-hud-inline">
                    <div class="admin-hud-card">
                        <div class="hud-header">
                            <div class="hud-badge">
                                <div class="badge-dot" style="width:6px;height:6px;background:var(--gold);box-shadow:0 0 10px var(--gold);"></div>
                                Master Dashboard
                            </div>
                        </div>
                        
                        <div class="hud-grid">
                            <div class="hud-stat">
                                <div class="hud-num">{{ $stats['total'] }}</div>
                                <div class="hud-label">Total</div>
                            </div>
                            <div class="hud-stat">
                                <div class="hud-num" style="color:var(--gold)">{{ $stats['pending'] }}</div>
                                <div class="hud-label">Pending</div>
                            </div>
                        </div>

                        <a href="{{ route('event.results') }}" class="btn-hud-results">
                            View In-Depth Data
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19l7-7-7-7"/></svg>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Stats Bar (Content Layer) --}}
        <div class="stat-bar">
            <div class="stat-row">
                <div class="stat-item">
                    <div class="stat-num">8<sup>th</sup></div>
                    <div class="stat-label">Annual Review</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">200+</div>
                    <div class="stat-label">Expected Attendees</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">10</div>
                    <div class="stat-label">Research Tracks</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">3</div>
                    <div class="stat-label">Days of Science</div>
                </div>
            </div>
        </div>

        {{-- Footer (Integrated for Symmetry) --}}
        <footer class="hero-footer">
            <div class="footer-tiny">
                &copy; {{ date('Y') }} <span>Bio and Emerging Technology Institute</span>. All rights reserved.
            </div>
        </footer>
    </section>


    {{-- ══════════ REGISTRATION MODAL ══════════ --}}
    <div class="modal-overlay" id="registrationModal">
        <div class="modal-container">
            <button class="modal-close" onclick="closeModal()">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            
            <aside class="modal-sidebar">
                <div style="position: relative; margin-bottom: 3.5rem;">
                    {{-- Branding Halo --}}
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 220px; height: 220px; background: radial-gradient(circle, rgba(0, 163, 108, 0.2) 0%, transparent 70%); pointer-events: none; z-index: 0;"></div>
                    
                    <div style="position: relative; z-index: 1; width: 130px; height: 130px; background: white; padding: 18px; border-radius: 28px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(0, 163, 108, 0.3); box-shadow: 0 0 35px rgba(0, 163, 108, 0.25), inset 0 0 15px rgba(0,0,0,0.05); transition: all 0.5s var(--ease);">
                        <x-logo width="100%" height="auto" />
                    </div>
                </div>

                <div style="font-family: 'Outfit', sans-serif; position: relative; z-index: 1;">
                    <div style="display: inline-flex; align-items: center; padding: 0.35rem 1rem; background: rgba(0, 163, 108, 0.12); border: 1px solid rgba(0, 163, 108, 0.25); border-radius: 100px; margin-bottom: 1.25rem;">
                        <div style="width: 5px; height: 5px; border-radius: 50%; background: var(--emerald); margin-right: 0.6rem; box-shadow: 0 0 8px var(--emerald);"></div>
                        <span style="font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.25em; color: var(--emerald);">Official Registry</span>
                    </div>

                    <h2 style="font-size: 2.8rem; font-weight: 900; line-height: 0.9; letter-spacing: -0.05em; margin-bottom: 1rem;">
                        National<br>
                        <span style="background: linear-gradient(to right, #00a36c, #007d53); -webkit-background-clip: text; -webkit-text-fill-color: transparent; filter: drop-shadow(0 0 2px rgba(0, 163, 108, 0.3));">Review</span>
                    </h2>

                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1.5rem; opacity: 0.5;">
                        <div style="flex: 1; height: 1px; background: linear-gradient(to right, rgba(255,255,255,0.25), transparent);"></div>
                        <span style="font-family: monospace; font-size: 0.65rem; font-weight: 800; letter-spacing: 0.15em; white-space: nowrap;">EST. 2018 | ADDIS ABABA</span>
                    </div>
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
                    <div class="window-header">Submission Window Closes In</div>
                    <div class="window-timer" id="pathfinderTimer">
                        00<span class="timer-unit">d</span> 00<span class="timer-unit">h</span> 00<span class="timer-unit">m</span>
                    </div>
                </div>
            </aside>

            <main class="modal-content">
                <form action="{{ route('event.register.store') }}" method="POST" enctype="multipart/form-data" id="modalRegisterForm">
                    @csrf
                    
                    <!-- Phase 01: Professional Identity -->
                    <div class="step-content active" id="modalStep1">
                        <div style="margin-bottom: 2.5rem;">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.6rem; font-weight: 900; color: var(--navy); line-height: 1.2;">Complete your Professional Identity Profile</h3>
                        </div>

                        <div class="grid">
                            <div class="field col-12">
                                <label>Full Name</label>
                                <div class="input-well"><input type="text" name="full_name" required placeholder="Enter your full name"></div>
                            </div>
                            <div class="field col-6">
                                <label>Email Address</label>
                                <div class="input-well"><input type="email" name="email" required placeholder="example@domain.com"></div>
                            </div>
                            <div class="field col-6">
                                <label>Phone Number</label>
                                <div class="input-well"><input type="text" name="phone" required placeholder="+251 911 000 000"></div>
                            </div>
                            <div class="field col-12">
                                <label>Organization</label>
                                <div class="input-well"><input type="text" name="organization" required placeholder="Enter institution"></div>
                            </div>
                            <div class="field col-6">
                                <label>City</label>
                                <div class="input-well"><input type="text" name="city" required placeholder="Addis Ababa"></div>
                            </div>
                            <div class="field col-6">
                                <label>Gender</label>
                                <div class="input-well">
                                    <select name="gender" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field col-12">
                                <label>Qualification</label>
                                <div class="input-well">
                                    <select name="qualification" required>
                                        <option value="" disabled selected>Select</option>
                                        <option value="PhD">Doctorate (PhD)</option>
                                        <option value="MSc">Master (MSc)</option>
                                        <option value="BSc">Bachelor (BSc)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Phase 02: Research Thesis -->
                    <div class="step-content" id="modalStep2">
                        <div style="margin-bottom: 2.5rem;">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.6rem; font-weight: 900; color: var(--navy); line-height: 1.2;">Define your Research Thesis & Specialization</h3>
                        </div>

                        <div class="grid">
                            <div class="field col-12">
                                <label>Presentation Title</label>
                                <div class="input-well"><input type="text" name="presentation_title" required placeholder="Title of your research"></div>
                            </div>
                            <div class="field col-12">
                                <label>Specialization / Department</label>
                                <div class="input-well"><input type="text" name="specialization" required placeholder="e.g. Bioinformatics, Biotechnology"></div>
                            </div>
                            <div class="field col-12">
                                <label>Abstract Summary</label>
                                <div class="input-well"><textarea name="abstract_text" rows="3" required placeholder="Briefly describe your work..."></textarea></div>
                            </div>
                            <div class="field col-12">
                                <label>Availability (Present on all dates?)</label>
                                <div class="input-well">
                                    <select name="available_on_date" required>
                                        <option value="Yes">Yes, fully available</option>
                                        <option value="No">No, partial availability</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Phase 03: Submission Pack -->
                    <div class="step-content" id="modalStep3">
                        <div style="margin-bottom: 2.5rem;">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.6rem; font-weight: 900; color: var(--navy); line-height: 1.2;">Finalize your Research Submission Pack</h3>
                        </div>

                        <div class="grid">
                            <div class="field col-6">
                                <label>Manuscript (PDF)</label>
                                <div class="file-zone" onclick="document.getElementById('modalFile').click()">
                                    <input type="file" id="modalFile" name="abstract_file" style="display:none" onchange="updateFileName(this, 'fileStatus')">
                                    <div id="fileStatus" style="font-size: 0.7rem;">📄 Abstract/File</div>
                                </div>
                            </div>
                            <div class="field col-6">
                                <label>Support Letter</label>
                                <div class="file-zone" onclick="document.getElementById('modalSupport').click()">
                                    <input type="file" id="modalSupport" name="support_letter" style="display:none" onchange="updateFileName(this, 'supportStatus')">
                                    <div id="supportStatus" style="font-size: 0.7rem;">📁 Support Doc</div>
                                </div>
                            </div>
                            <div class="field col-12">
                                <label>Discovery Source (How did you hear about us?)</label>
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
                                <label>Additional Questions / Remarks</label>
                                <div class="input-well"><textarea name="questions" rows="2" placeholder="Any special requirements?"></textarea></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-nav">
                        <button type="button" class="btn-modal btn-modal-prev" id="modalPrev" style="display:none" onclick="changeStep(-1)">Previous</button>
                        <div style="flex:1"></div>
                        <button type="button" class="btn-modal btn-modal-next" id="modalNext" onclick="changeStep(1)">Next Phase →</button>
                        <button type="submit" class="btn-modal btn-modal-next" id="modalSubmit" style="display:none; background: var(--emerald);">Finalize Registration</button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('registrationModal').classList.add('active');
            document.body.style.overflow = 'hidden';
            currentModalStep = 1;
            updateModalUI();
        }

        function closeModal() {
            document.getElementById('registrationModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        let currentModalStep = 1;
        function changeStep(dir) {
            const nextStep = currentModalStep + dir;
            if (nextStep < 1 || nextStep > 3) return;

            // Simple validation
            if (dir > 0) {
                const activeContent = document.getElementById('modalStep' + currentModalStep);
                const inputs = activeContent.querySelectorAll('input[required], select[required], textarea[required]');
                let valid = true;
                inputs.forEach(i => { 
                    if(!i.value) { 
                        i.parentElement.style.borderColor = '#ef4444'; 
                        valid = false; 
                    } else { 
                        i.parentElement.style.borderColor = 'transparent'; 
                    } 
                });
                if (!valid) return;
            }

            currentModalStep = nextStep;
            updateModalUI();
        }

        function updateModalUI() {
            document.querySelectorAll('.step-content').forEach((el, i) => el.classList.toggle('active', (i+1) === currentModalStep));
            document.querySelectorAll('.step-item').forEach((el, i) => {
                el.classList.toggle('active', (i+1) === currentModalStep);
                el.classList.toggle('completed', (i+1) < currentModalStep);
            });

            document.getElementById('modalPrev').style.display = currentModalStep === 1 ? 'none' : 'block';
            document.getElementById('modalNext').style.display = currentModalStep === 3 ? 'none' : 'block';
            document.getElementById('modalSubmit').style.display = currentModalStep === 3 ? 'block' : 'none';
        }

        function updateFileName(input, statusId) {
            const status = document.getElementById(statusId);
            if (input.files.length) status.innerHTML = '✅ ' + input.files[0].name;
            else status.innerHTML = (statusId === 'fileStatus') ? '📄 Abstract/File' : '📁 Support Doc';
        }

        // Close on escape
        document.addEventListener('keydown', (e) => { if(e.key === 'Escape') closeModal(); });

        {{-- Typewriter Engine --}}
        const TxtType = function(el, toRotate, period) {
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

            var self = this;
            var delta = 100 - Math.random() * 50;

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
                self.tick();
            }, delta);
        };

        function initTypewriter() {
            var elements = document.getElementsByClassName('typewrite');
            var toRotate = [
                "Health Biotechnology",
                "Plant Biotechnology",
                "Animal Biotechnology",
                "Environmental Biotechnology",
                "Industrial Biotechnology",
                "Nanotechnology",
                "Materials Science and Engineering",
                "Reverse Engineering",
                "Computational Science and Intelligent Systems",
                "Genomics and Bioinformatics"
            ];
            for (var i=0; i<elements.length; i++) {
                new TxtType(elements[i], toRotate, 2500);
            }
        }

        // Pathfinder 3.0 Timer Logic: Targeting February 27, 2026
        function updatePathfinderTimer() {
            const timerEl = document.getElementById('pathfinderTimer');
            if (!timerEl) return;
            
            const target = new Date(2026, 1, 27, 23, 59, 59); // February 27, 2026 (Month is 0-indexed)
            
            const update = () => {
                const now = new Date();
                const diff = target - now;
                if (diff <= 0) {
                    timerEl.innerHTML = `00<span class="timer-unit">d</span> 00<span class="timer-unit">h</span> 00<span class="timer-unit">m</span>`;
                    return;
                }

                const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                
                timerEl.innerHTML = `${d.toString().padStart(2, '0')}<span class="timer-unit">d</span> ${h.toString().padStart(2, '0')}<span class="timer-unit">h</span> ${m.toString().padStart(2, '0')}<span class="timer-unit">m</span>`;
            };
            setInterval(update, 60000);
            update();
        }

        window.addEventListener('load', () => {
            updatePathfinderTimer();
            initTypewriter();
            @if($errors->any())
                openModal();
                const form = document.getElementById('modalRegisterForm');
                @foreach($errors->keys() as $key)
                    const el = form.querySelector('[name="{{ $key }}"]');
                    if (el) el.parentElement.style.borderColor = '#ef4444';
                @endforeach
            @endif
        });
    </script>

</body>
</html>
