<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8<sup>th</sup> National Research Review 2026 | Bio and Emerging Technology Institute</title>
    <meta name="description" content="Join the 8th BETIn National Research Review — Ethiopia's premier scientific gathering for bio and emerging technology research.">
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
            --glass: rgba(255, 255, 255, 0.75);
            --glass-border: rgba(255, 255, 255, 0.4);
            --shadow-soft: 0 10px 40px -10px rgba(0,0,0,0.05);
            --shadow-deep: 0 20px 60px -15px rgba(0,0,0,0.08);
        }

        /* Custom Typography Refinements */
        sup {
            font-size: 0.65em;
            vertical-align: super;
            line-height: 0;
            position: relative;
            top: -0.1em;
            margin-left: 0.05em;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            background: linear-gradient(160deg, #f0f7f2 0%, #f8fafc 50%, #f1f8fe 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Atmosphere Container for clipped effects */
        /* Noise texture overlay for premium feel */
        .hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3%3Ffilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            opacity: 0.015;
            pointer-events: none;
            z-index: 1;
        }

        .hero-atmosphere {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        /* Atmosphere 2.0: Higher Density Patterns */
        .hero-atmosphere::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(rgba(26,122,60,0.08) 1px, transparent 1px),
                linear-gradient(rgba(26,122,60,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(26,122,60,0.02) 1px, transparent 1px);
            background-size: 30px 30px, 120px 120px, 120px 120px;
            z-index: 1;
            opacity: 0.8;
        }

        /* Layered Light System */
        .orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 2;
            animation: orb-float 25s infinite ease-in-out alternate;
        }
        .orb-1 { width: 85vw; height: 85vw; background: radial-gradient(circle, rgba(26, 122, 60, 0.1) 0%, transparent 70%); top: -30%; right: -20%; filter: blur(180px); animation-duration: 30s; }
        .orb-2 { width: 65vw; height: 65vw; background: radial-gradient(circle, rgba(26, 74, 107, 0.08) 0%, transparent 70%); bottom: -15%; left: -10%; filter: blur(140px); animation-duration: 35s; animation-delay: -5s; }
        .orb-3 { width: 50vw; height: 50vw; background: radial-gradient(circle, rgba(26, 122, 60, 0.05) 0%, transparent 70%); top: 40%; left: 30%; filter: blur(120px); animation-duration: 40s; animation-delay: -10s; }
        .orb-4 { width: 40vw; height: 40vw; background: radial-gradient(circle, rgba(245, 158, 11, 0.02) 0%, transparent 70%); top: 10%; left: 10%; filter: blur(100px); animation-duration: 45s; }
        .orb-5 { width: 90vw; height: 90vw; background: radial-gradient(circle, rgba(255, 255, 255, 0.6) 0%, transparent 80%); top: -50%; left: -10%; filter: blur(200px); z-index: 1; opacity: 0.4; }

        @keyframes orb-float {
            0% { transform: translate(0, 0) scale(1.0); }
            33% { transform: translate(5%, -5%) scale(1.05); }
            66% { transform: translate(-3%, 7%) scale(0.95); }
            100% { transform: translate(5%, -2%) scale(1.02); }
        }

        /* Nav */
        /* Vibrant Zenith Nav */
        .hero-nav {
            position: relative;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 5% 2rem;
            background: linear-gradient(135deg, #0f172a 30%, #1a4a6b 100%);
            backdrop-filter: blur(24px);
            border-bottom: 2px solid rgba(255,255,255,0.1);
            border-top: 4px solid var(--emerald);
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            transition: all 0.5s var(--ease);
        }

        .hero-nav::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.03);
            pointer-events: none;
        }

        .hero-nav:hover {
            padding-top: 1.8rem;
            padding-bottom: 1.8rem;
            background: linear-gradient(135deg, #131d35 30%, #1a7a3c 100%);
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
            gap: 2rem;
            font-family: 'Outfit', sans-serif;
            color: white;
            line-height: 1;
        }

        /* The Vertical Separator */
        .nav-title::after {
            content: '';
            order: 1;
            width: 1px;
            height: 32px;
            background: rgba(255,255,255,0.2);
            margin: 0 -0.5rem;
        }

        /* Bio and Emerging Technology Institute */
        .nav-title-main {
            order: 0;
            font-size: 1.4rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            color: white;
            white-space: nowrap;
        }

        /* National Research Review 2026 */
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
            position: relative;
            z-index: 5;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4rem 10% 6rem;
            gap: 6rem;
            max-width: 1440px;
            margin: 0 auto;
            width: 100%;
            flex-wrap: wrap; /* Stack naturally on smaller screens */
        }

        .hero-left { flex: 1; max-width: 700px; }

        .registration-status-banner {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: rgba(26, 122, 60, 0.03);
            border: 1px solid rgba(26, 122, 60, 0.2);
            border-radius: 20px;
            padding: 1.25rem 2rem;
            box-shadow: 
                0 10px 30px -10px rgba(26, 122, 60, 0.1),
                inset 0 0 20px rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
            animation: ribbon-breathe 4s infinite ease-in-out;
        }

        /* Border pulse effect */
        .registration-status-banner::after {
            content: '';
            position: absolute;
            inset: -1px;
            background: conic-gradient(from 0deg, transparent, var(--emerald), transparent 25%);
            animation: border-rotate 4s linear infinite;
            border-radius: 20px;
            padding: 1px;
            -webkit-mask: 
                linear-gradient(#fff 0 0) content-box, 
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        @keyframes border-rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes ribbon-breathe {
            0%, 100% { transform: scale(1); box-shadow: 0 10px 30px -10px rgba(26, 122, 60, 0.1); }
            50% { transform: scale(1.02); box-shadow: 0 15px 40px -10px rgba(26, 122, 60, 0.2); }
        }

        .status-banner-main {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            position: relative;
            z-index: 2;
        }

        .status-dot-large {
            width: 10px;
            height: 10px;
            background: var(--emerald);
            border-radius: 50%;
            box-shadow: 0 0 15px var(--emerald);
            position: relative;
        }

        .status-dot-large::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            border: 1.5px solid var(--emerald);
            animation: ring-pulse-emerald 2s infinite;
        }

        @keyframes ring-pulse-emerald {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(3.5); opacity: 0; }
        }

        .status-text-prime {
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--emerald);
            text-transform: uppercase;
            letter-spacing: 0.3em;
            line-height: 1;
        }

        .status-text-sub {
            font-size: 1.5rem;
            font-weight: 900;
            background: linear-gradient(to bottom, #1a7a3c, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            margin-top: 0.1rem;
            position: relative;
            z-index: 2;
        }

        .hero-edition {
            font-size: 0.75rem;
            font-weight: 800;
            color: var(--emerald);
            text-transform: uppercase;
            letter-spacing: 0.4em;
            margin-bottom: 1.5rem;
        }

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(3.2rem, 9vw, 6.5rem);
            font-weight: 900;
            line-height: 0.85;
            letter-spacing: -0.06em;
            color: var(--text-main);
            margin-bottom: 2.5rem;
            position: relative;
            filter: drop-shadow(0 0 40px rgba(26, 122, 60, 0.1));
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
            color: var(--text-sub);
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
            color: var(--text-sub);
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.2s;
        }

        .cta-secondary:hover { color: var(--text-main); }

        /* Eye-catching Enquiry Link */
        .enquiry-link {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1.5rem;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(26, 122, 60, 0.15);
            border-radius: 100px;
            color: var(--emerald);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all 0.4s var(--ease);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        }

        .enquiry-link:hover {
            background: white;
            transform: translateY(-2px);
            border-color: var(--emerald);
            box-shadow: 0 15px 35px var(--emerald-glow);
            color: var(--navy);
        }

        .enquiry-link::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(90deg, transparent, var(--emerald), transparent);
            opacity: 0.3;
            animation: enquiry-pulse 3s linear infinite;
        }

        @keyframes enquiry-pulse {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .enquiry-icon {
            width: 32px; height: 32px;
            background: var(--emerald);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px var(--emerald-glow);
        }

        /* Event Info Cards */
        .hero-right {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            min-width: 380px;
            flex-shrink: 0;
        }

        .info-card {
            background: var(--glass);
            backdrop-filter: blur(40px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 1.5rem 2.25rem;
            display: flex;
            align-items: center;
            gap: 1.75rem;
            transition: all 0.6s var(--ease);
            box-shadow: var(--shadow-soft), var(--shadow-deep);
            position: relative;
            overflow: hidden;
        }

        /* Floating Sheen Effect */
        .info-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(255,255,255,0.4) 50%, transparent 100%);
            transform: translateX(-100%);
            transition: transform 0.8s var(--ease);
            pointer-events: none;
        }

        .info-card:hover {
            transform: translateY(-8px) scale(1.02);
            border-color: var(--emerald);
            box-shadow: 0 30px 60px -20px rgba(26,122,60,0.15), var(--shadow-deep);
        }

        .info-card:hover::before { transform: translateX(100%); }

        .info-icon {
            width: 44px; height: 44px;
            background: var(--emerald-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--emerald);
            flex-shrink: 0;
        }

        .info-label {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: var(--text-sub);
            margin-bottom: 0.4rem;
        }

        .info-value {
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.01em;
        }

        /* Hero bottom bar - Integrated Glass Footer */
        .stat-bar {
            position: relative;
            z-index: 5;
            padding: 2rem 4%; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(0,0,0,0.05);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            width: 100%;
            margin: 2rem 0;
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
            color: var(--text-main);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.65rem;
            font-weight: 700;
            color: var(--text-sub);
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-top: 0.25rem;
        }

        @keyframes revealUp {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .scroll-hint {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-sub);
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

        /* Redesigned About Section */
        #about { padding: 8rem 0; overflow: hidden; }

        .about-header {
            max-width: 1200px;
            margin: 0 auto 5rem;
            text-align: center;
            padding: 0 2rem;
        }

        .about-header .section-desc { margin: 1.5rem auto 0; }

        .about-group-title {
            font-size: 0.9rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: var(--emerald);
            margin: 4rem 0 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .about-group-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, var(--emerald-light), transparent);
        }

        .about-grid {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .pillar-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
        }

        .pillar {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 2.25rem;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            overflow: hidden;
            box-shadow: 
                0 4px 6px -1px rgba(0, 0, 0, 0.05),
                0 10px 15px -3px rgba(0, 0, 0, 0.03);
        }

        .pillar::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(var(--pillar-color, var(--emerald)) 0.5px, transparent 0.5px);
            background-size: 15px 15px;
            opacity: 0.03;
            pointer-events: none;
        }

        .pillar:hover {
            transform: translateY(-8px) scale(1.02);
            background: white;
            border-color: var(--pillar-color, var(--emerald));
            box-shadow: 
                0 20px 40px -10px rgba(0, 0, 0, 0.1),
                0 0 20px -5px var(--pillar-color-light, rgba(0, 163, 108, 0.1));
        }

        .pillar-icon {
            width: 56px; height: 56px;
            background: var(--pillar-color-light, var(--emerald-light));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--pillar-color, var(--emerald));
            margin-bottom: 1.75rem;
            transition: transform 0.3s ease;
        }

        .pillar:hover .pillar-icon { transform: rotate(10deg) scale(1.1); }

        .pillar-title {
            font-weight: 850;
            color: var(--navy);
            font-size: 1.15rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .pillar-title::after {
            content: 'AREA';
            font-size: 0.55rem;
            padding: 2px 6px;
            background: var(--pillar-color-light, var(--emerald-light));
            border-radius: 4px;
            letter-spacing: 0.1em;
            opacity: 0.8;
        }

        .pillar-desc {
            font-size: 0.95rem;
            color: #475569;
            line-height: 1.7;
            font-weight: 450;
        }

        /* Scientific Color Themes */
        .pillar-bio { --pillar-color: #10b981; --pillar-color-light: #ecfdf5; }
        .pillar-health { --pillar-color: #0ea5e9; --pillar-color-light: #f0f9ff; }
        .pillar-tech { --pillar-color: #6366f1; --pillar-color-light: #eef2ff; }
        .pillar-engineering { --pillar-color: #f59e0b; --pillar-color-light: #fffbeb; }
        .pillar-env { --pillar-color: #84cc16; --pillar-color-light: #f7fee7; }

        /* Visual Cardio Section */
        .visual-section {
            padding: 6rem 2rem;
            background: #f8fafc;
            position: relative;
        }

        .visual-container {
            max-width: 1200px;
            margin: 0 auto;
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
        /* Vibrant Zenith Footer */
        .hero-footer {
            position: relative;
            z-index: 10;
            padding: 4rem 5rem;
            text-align: center;
            background: linear-gradient(135deg, #1a7a3c 0%, #0f172a 100%);
            border-top: 1px solid rgba(255,255,255,0.1);
            width: 100%;
            margin-top: auto;
            box-shadow: 0 -10px 40px rgba(0,0,0,0.1);
        }

        .hero-footer::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.02);
            pointer-events: none;
        }

        .footer-tiny {
            font-size: 0.95rem;
            color: rgba(255,255,255,0.6);
            font-weight: 500;
            letter-spacing: 0.02em;
            position: relative;
            z-index: 2;
        }
        .footer-tiny span { color: white; font-weight: 800; border-bottom: 2px solid var(--emerald); }

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

        @media (max-width: 768px) {
            .hero-nav { padding: 1.25rem 1.5rem; }
            .nav-brand { gap: 1rem; }
            .nav-logo-box { width: 80px; padding: 0.5rem; }
            .nav-title { gap: 1rem; }
            .nav-title::after { height: 24px; margin: 0; }
            .nav-title-main { font-size: 0.9rem; white-space: normal; line-height: 1.3; }
            .nav-title-sub { font-size: 0.7rem; letter-spacing: 0.1em; }

            .hero-body { padding: 4rem 1.5rem; }
            .hero-title { font-size: 3rem; letter-spacing: -0.04em; margin-bottom: 1.5rem; }
            .hero-subtitle { font-size: 1rem; margin-bottom: 2.5rem; }
            .hero-cta-group { flex-direction: column; gap: 1rem; width: 100%; }
            .cta-primary { width: 100%; justify-content: center; padding: 1rem 2rem; }
            
            .info-card { padding: 1.25rem 1.5rem; gap: 1rem; }
            .stat-row { flex-direction: column; gap: 2rem; }
            
            .section { padding: 4rem 1.5rem; }
            .section-title { font-size: 2.2rem; }
        }

        @media (max-width: 480px) {
            .nav-title::after { display: none; }
            .nav-title { flex-direction: column; align-items: flex-start; gap: 0.25rem; }
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
            <div class="orb orb-4"></div>
            <div class="orb orb-5"></div>
        </div>

        {{-- Nav --}}
        <nav class="hero-nav">
            <div class="nav-brand">
                <div class="nav-logo-box">
                    <x-logo width="100%" height="auto" />
                </div>
                <div class="nav-title">
                    <div class="nav-title-main">Bio and Emerging Technology Institute</div>
                    <div class="nav-title-sub">National Research Review 2026</div>
                </div>
            </div>
        </nav>

        <div class="hero-body">
            <div class="hero-left">
                <div class="hero-edition">8<sup>th</sup> National Research Review</div>
                <h1 class="hero-title">
                    BETin National Research Review on<br>
                    <span class="typewriter-container" style="color: var(--emerald); display: block; margin-top: 0.5rem; font-size: 0.75em;">
                        <span id="typewriter" class="typewrite"></span>
                    </span>
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
                <div class="info-card" style="animation: revealUp 0.8s var(--ease) 0.1s both;">
                    <div class="info-icon">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="info-label">Event Date</div>
                        <div class="info-value">March 11 – 13, 2026 · Addis Ababa, ICT Park</div>
                    </div>
                </div>

                <div class="info-card" style="animation: revealUp 0.8s var(--ease) 0.2s both;">
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

                <div class="info-card" style="animation: revealUp 0.8s var(--ease) 0.3s both;">
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
                <div class="info-card" style="animation: revealUp 0.8s var(--ease) 0.4s both;">
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

                <div class="registration-status-banner" style="animation: revealUp 0.8s var(--ease) 0.5s both;">
                    <div class="status-banner-main">
                        <div class="status-dot-large"></div>
                        <div class="status-text-prime">Registration Open</div>
                    </div>
                    @php
                        $deadline = \Carbon\Carbon::create(2026, 2, 27, 23, 59, 59);
                        $now = now();
                        $daysRemaining = $now->diffInDays($deadline, false);
                    @endphp
                    <div class="status-text-sub">
                        @if($daysRemaining > 0)
                            {{ (int)$daysRemaining }} DAYS REMAINING
                        @elseif($daysRemaining == 0)
                            CLOSING TODAY
                        @else
                            REGISTRATION CLOSED
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="stat-bar">
            <div class="stat-row">
                <div class="stat-item">
                    <div class="stat-num">200<sup>+</sup></div>
                    <div class="stat-label">Researchers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">20<sup>+</sup></div>
                    <div class="stat-label">Institutions</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">10<sup>+</sup></div>
                    <div class="stat-label">Subject Areas</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════ ABOUT ══════════ --}}
    <section class="section" id="about">
        <div class="about-header">
            <div class="section-tag">National Research Review Thematic Areas</div>
            <h2 class="section-title">Driving Innovation through <span class="em">Advanced Research</span></h2>
            <p class="section-desc">
                The Thematic Areas of the National Research Review represent specialized focuses of excellence dedicated to solving Ethiopia's most critical challenges through biotechnology and emerging sciences.
            </p>
        </div>

        <div class="about-grid">
            <div class="pillar-list">
                <div class="pillar pillar-bio">
                    <div class="pillar-icon">🌿</div>
                    <div>
                        <div class="pillar-title">Plant Biotechnology</div>
                        <div class="pillar-desc">Enhancing crop productivity and resilience through advanced breeding and genomic tools for food security.</div>
                    </div>
                </div>
                <div class="pillar pillar-bio">
                    <div class="pillar-icon">🐄</div>
                    <div>
                        <div class="pillar-title">Animal Biotechnology</div>
                        <div class="pillar-desc">Improving livestock health, breeding, and productivity using modern bio-techniques and genetic mapping.</div>
                    </div>
                </div>
                <div class="pillar pillar-health">
                    <div class="pillar-icon">🩺</div>
                    <div>
                        <div class="pillar-title">Health Biotechnology</div>
                        <div class="pillar-desc">Developing bio-innovations for precise disease diagnosis, treatment, and pioneering vaccine research.</div>
                    </div>
                </div>
                <div class="pillar pillar-bio">
                    <div class="pillar-icon">🏭</div>
                    <div>
                        <div class="pillar-title">Industrial Biotechnology</div>
                        <div class="pillar-desc">Advancing sustainable manufacturing through specialized bio-processing, fermentation, and enzyme tech.</div>
                    </div>
                </div>
                <div class="pillar pillar-env">
                    <div class="pillar-icon">🌍</div>
                    <div>
                        <div class="pillar-title">Environmental Biotechnology</div>
                        <div class="pillar-desc">Green interventions for efficient waste management, bioremediation, and natural resource conservation.</div>
                    </div>
                </div>
            </div>

            <div class="pillar-list" style="margin-top: 2rem;">
                <div class="pillar pillar-tech">
                    <div class="pillar-icon">🧬</div>
                    <div>
                        <div class="pillar-title">Bioinformatics and Genomics</div>
                        <div class="pillar-desc">Decoding complex biological data to drive insights across all life science fields via high-throughput sequencing.</div>
                    </div>
                </div>
                <div class="pillar pillar-tech">
                    <div class="pillar-icon">🔬</div>
                    <div>
                        <div class="pillar-title">Nanotechnology Research</div>
                        <div class="pillar-desc">Advancing materials and devices at the molecular scale for medicine, energy, and electronics.</div>
                    </div>
                </div>
                <div class="pillar pillar-engineering">
                    <div class="pillar-icon">💎</div>
                    <div>
                        <div class="pillar-title">Materials Science & Engineering</div>
                        <div class="pillar-desc">Engineering advanced materials for industrial applications, structural integrity, and technical innovation.</div>
                    </div>
                </div>
                <div class="pillar pillar-tech">
                    <div class="pillar-icon">🤖</div>
                    <div>
                        <div class="pillar-title">Computational Science and Intelligent Systems</div>
                        <div class="pillar-desc">Scaling research through AI, data science, and advanced computational modeling for predictive analysis.</div>
                    </div>
                </div>
                <div class="pillar pillar-engineering">
                    <div class="pillar-icon">⚙️</div>
                    <div>
                        <div class="pillar-title">Reverse Engineering</div>
                        <div class="pillar-desc">Replicating and improving existing technologies for sustainable local adaptation and self-reliance.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════ VISUAL STATUS ══════════ --}}
    <section class="visual-section">
        <div class="visual-container">
            <div class="visual-card">
                <div class="visual-card-content">
                    <div class="vc-label">Event Status</div>
                    <h3 class="vc-title">Shaping the <span>Future</span> of Research</h3>
                    <p class="vc-desc">
                        Register today to be part of Ethiopia's most influential scientific gathering. Call for papers is now active.
                    </p>
                    <div class="vc-stats">
                        <div class="vc-stat">
                            <div class="vc-stat-num">100<sup>+</sup></div>
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
            <div class="hero-cta-group" style="justify-content: center; margin-bottom: 2rem;">
                <a href="{{ route('event.register') }}" class="cta-primary">
                    Start Registration Now
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>

            <a href="mailto:nationalreview@betin.gov.et" class="enquiry-link" style="margin-top: 1rem;">
                <div class="enquiry-icon">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                Enquiries: nationalreview@betin.gov.et
            </a>
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

            if (this.isDeleting) { delta /= 2.5; }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = 2000;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 400;
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
                "Materials Science & Engineering",
                "Reverse Engineering",
                "Computational Science and Intelligent Systems",
                "Bioinformatics and Genomics"
            ];
            for (var i=0; i<elements.length; i++) {
                new TxtType(elements[i], toRotate, 2500);
            }
        }

        window.onload = function() {
            initTypewriter();
        };
    </script>
</body>
</html>
