<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EMS') — Bio & Emerging Tech Institute</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }

        /* ── Topbar ─────────────────────────────────────────────────── */
        .topbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 72px;
            background: linear-gradient(135deg, #001828 0%, #002540 55%, #003356 100%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            z-index: 1001;
            box-shadow: 0 4px 32px rgba(0,0,0,0.45);
        }

        .topbar::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, rgba(0,212,122,0.25) 15%, rgba(0,212,122,0.65) 50%, rgba(0,212,122,0.25) 85%, transparent 100%);
        }

        .topbar-logo {
            background: white;
            padding: 6px 10px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 12px rgba(0,0,0,0.25), 0 0 0 1px rgba(255,255,255,0.12);
            flex-shrink: 0;
        }

        .topbar-center {
            flex: 1;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .topbar-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: rgba(255,255,255,0.92);
            letter-spacing: 0.01em;
            white-space: nowrap;
        }

        .topbar-divider {
            width: 1px;
            height: 18px;
            background: rgba(255,255,255,0.15);
        }

        .topbar-subtitle {
            font-size: 0.78rem;
            font-weight: 700;
            color: rgba(0,212,122,0.88);
            white-space: nowrap;
            letter-spacing: 0.04em;
        }

        .topbar-pulse {
            width: 7px; height: 7px;
            background: #00d47a;
            border-radius: 50%;
            box-shadow: 0 0 12px rgba(0,212,122,0.9), 0 0 24px rgba(0,212,122,0.4);
            animation: pulse 2s infinite;
            flex-shrink: 0;
        }

        /* ── Sidebar ─────────────────────────────────────────────────── */
        .sidebar {
            position: fixed;
            left: 0;
            top: 72px;
            width: 260px;
            height: calc(100vh - 72px);
            background: linear-gradient(180deg, #091a2e 0%, #0b2040 50%, #091b30 100%);
            border-right: 1px solid rgba(255,255,255,0.05);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            box-shadow: 4px 0 32px rgba(0,0,0,0.35);
            overflow: hidden;
        }

        .sidebar::after {
            content: '';
            position: absolute;
            top: 0; right: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(180deg, transparent 0%, rgba(0,139,75,0.4) 35%, rgba(0,139,75,0.25) 65%, transparent 100%);
            pointer-events: none;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1.5rem 1rem;
            overflow-y: auto;
        }

        .sidebar-nav::-webkit-scrollbar { width: 3px; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 2px; }

        .nav-section-label {
            padding: 0 0.75rem 0.5rem;
            font-size: 0.6rem;
            font-weight: 900;
            color: rgba(255,255,255,0.2);
            text-transform: uppercase;
            letter-spacing: 0.2em;
            margin-bottom: 0.25rem;
        }

        .nav-section { margin-bottom: 1.75rem; }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 0.75rem;
            margin-bottom: 2px;
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.87rem;
            border-radius: 10px;
            transition: all 0.18s ease;
            position: relative;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.88);
        }

        .nav-item.active {
            background: linear-gradient(135deg, rgba(0,168,88,0.2) 0%, rgba(0,100,50,0.12) 100%);
            color: #4ade80;
            font-weight: 800;
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 18%; bottom: 18%;
            width: 3px;
            background: #4ade80;
            border-radius: 0 3px 3px 0;
            box-shadow: 0 0 10px rgba(74,222,128,0.8), 0 0 22px rgba(74,222,128,0.35);
        }

        .nav-icon-box {
            width: 34px; height: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.38);
            transition: all 0.18s ease;
        }

        .nav-item.active .nav-icon-box {
            background: rgba(0,168,88,0.25);
            color: #4ade80;
            box-shadow: 0 0 16px rgba(0,168,88,0.25);
        }

        .nav-item:hover .nav-icon-box {
            background: rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.7);
        }

        /* ── Sidebar footer / user card ──────────────────────────────── */
        .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid rgba(255,255,255,0.06);
            background: rgba(0,0,0,0.2);
        }

        /* ── Main content ────────────────────────────────────────────── */
        .main-content {
            @auth
                margin-left: 260px;
                margin-top: 72px;
                padding: 2.5rem 2.5rem 0;
                min-height: calc(100vh - 72px);
                display: flex;
                flex-direction: column;
                background-color: #bfcfdf;
                background-image:
                    radial-gradient(ellipse 140% 90% at 100% -5%, rgba(0,168,88,0.13) 0%, transparent 52%),
                    radial-gradient(ellipse 140% 90% at -5%  110%, rgba(0,50,90,0.14)  0%, transparent 52%),
                    radial-gradient(circle, rgba(0,59,92,0.07) 1.5px, transparent 1.5px);
                background-size: auto, auto, 22px 22px;
            @else
                margin: 0 !important;
                padding: 0 !important;
                min-height: 100vh;
            @endauth
        }

        /* ── Footer ──────────────────────────────────────────────────── */
        .app-footer {
            margin-top: auto;
            padding: 1.25rem 0;
            border-top: 1px solid rgba(0,59,92,0.09);
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(12px);
            width: 100vw;
            position: relative;
            left: calc(-260px - 2.5rem);
        }

        .footer-inner {
            padding-left: 260px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-copy {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
        }

        .footer-motto {
            font-size: 0.75rem;
            font-weight: 800;
            color: var(--brand-green);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding-left: 1.5rem;
            border-left: 1px solid rgba(0,59,92,0.1);
        }

        /* ── Toast ───────────────────────────────────────────────────── */
        .toast-container {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 1rem 1.25rem;
            border-radius: 14px;
            min-width: 300px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15), 0 1px 3px rgba(0,0,0,0.08);
        }

        .toast-success { background: white; color: var(--text-primary); border: 1px solid #bbf7d0; }
        .toast-error   { background: white; color: var(--text-primary); border: 1px solid #fecaca; }

        .toast-icon-wrap {
            width: 34px; height: 34px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .toast-success .toast-icon-wrap { background: #dcfce7; color: #15803d; }
        .toast-error   .toast-icon-wrap { background: #fee2e2; color: #dc2626; }

        .toast-title   { font-weight: 900; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.06em; }
        .toast-success .toast-title { color: #15803d; }
        .toast-error   .toast-title { color: #dc2626; }
        .toast-message { font-size: 0.85rem; font-weight: 500; color: var(--text-secondary); margin-top: 1px; }

        .toast-close {
            background: none; border: none;
            color: var(--text-muted); opacity: 0.7;
            cursor: pointer; padding: 4px;
            border-radius: 6px; transition: all 0.15s;
        }

        .toast-close:hover { opacity: 1; background: var(--bg-surface); }

        /* ── Pending badge ───────────────────────────────────────────── */
        .nav-pending-badge {
            background: rgba(251,191,36,0.15);
            color: #fcd34d;
            border: 1px solid rgba(251,191,36,0.28);
            padding: 0.2rem 0.55rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 900;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.9); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes glow {
            0%, 100% { box-shadow: 0 0 8px rgba(0,212,122,0.5); }
            50%       { box-shadow: 0 0 18px rgba(0,212,122,0.9), 0 0 32px rgba(0,212,122,0.4); }
        }

        @media (max-width: 1024px) {
            .sidebar { width: 220px; }
            .main-content { margin-left: 220px; padding: 2rem; }
            .app-footer { left: calc(-220px - 2rem); }
            .footer-inner { padding-left: 220px; }
        }
    </style>
</head>
<body>

@auth

<!-- Topbar -->
<header class="topbar">

    <!-- Logo -->
    <div class="topbar-logo" style="width: 48px; height: 48px; padding: 6px; justify-content: center; flex-shrink: 0;">
        <x-logo width="100%" height="auto" />
    </div>

    <!-- Title -->
    <div style="flex: 1; display: flex; align-items: center; justify-content: center;">
        <span style="font-size: 1rem; font-weight: 800; color: rgba(255,255,255,0.95); letter-spacing: 0.01em; white-space: nowrap;">
            Bio &amp; Emerging Technology Institute
            <span style="color: rgba(0,212,122,0.7); font-weight: 400; margin: 0 0.4rem;">—</span>
            Project Management System
        </span>
    </div>

    <!-- Logo (right) -->
    <div class="topbar-logo" style="width: 48px; height: 48px; padding: 6px; justify-content: center; flex-shrink: 0; transform: scaleX(-1);">
        <x-logo width="100%" height="auto" />
    </div>

</header>

<!-- Sidebar -->
<aside class="sidebar">
    <nav class="sidebar-nav">

        <!-- Main -->
        <div class="nav-section">
            <div class="nav-section-label">Main</div>
            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                <div class="nav-icon-box">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <span>Dashboard</span>
            </a>
        </div>

        @if(auth()->user()->isAdmin())
        <!-- Management -->
        <div class="nav-section">
            <div class="nav-section-label">Management</div>

            <a href="{{ route('directorates.index') }}" class="nav-item {{ request()->routeIs('directorates.*') ? 'active' : '' }}">
                <div class="nav-icon-box">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <span>Directorates</span>
            </a>

            <a href="{{ route('employees.index') }}" class="nav-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                <div class="nav-icon-box">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <span>Staff Registry</span>
            </a>

            <a href="{{ route('backups.index') }}" class="nav-item {{ request()->routeIs('backups.*') ? 'active' : '' }}">
                <div class="nav-icon-box">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                </div>
                <span>System Backups</span>
            </a>
        </div>
        @endif

        <!-- Research -->
        <div class="nav-section">
            <div class="nav-section-label">Research</div>

            <a href="{{ route('projects.index') }}" class="nav-item {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                <div class="nav-icon-box">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <span style="flex: 1;">Projects</span>
            </a>

            <a href="{{ route('evaluations.summary') }}" class="nav-item {{ request()->routeIs('evaluations.summary') ? 'active' : '' }}">
                <div class="nav-icon-box">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 17v-2m3 2v-4m3 2v-6m-8 13h11a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <span>Summary Report</span>
            </a>

            <a href="{{ route('evaluations.index') }}" class="nav-item {{ request()->routeIs('evaluations.index') ? 'active' : '' }}">
                <div class="nav-icon-box">
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <span style="flex: 1;">Evaluations</span>
                @php
                    $pendingCount = \App\Models\Project::where('status', 'REGISTERED')->whereDoesntHave('evaluations')->count();
                @endphp
                @if($pendingCount > 0)
                    <span class="nav-pending-badge">{{ $pendingCount }}</span>
                @endif
            </a>
        </div>

    </nav>

    <!-- User section -->
    <div class="sidebar-footer" x-data="{ open: false }">
        <div @click="open = !open"
             style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem; border-radius: 12px; cursor: pointer; transition: all 0.15s ease; border: 1px solid transparent;"
             :style="open ? 'background:rgba(255,255,255,0.09);border-color:rgba(255,255,255,0.12)' : 'background:transparent'">
            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #00c96e, #007840); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 950; font-size: 0.95rem; flex-shrink: 0; box-shadow: 0 2px 12px rgba(0,139,75,0.45);">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div style="flex: 1; min-width: 0;">
                <div style="font-size: 0.85rem; font-weight: 800; color: rgba(255,255,255,0.88); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ auth()->user()->name }}</div>
                <div style="font-size: 0.68rem; font-weight: 800; color: #4ade80; text-transform: uppercase; letter-spacing: 0.08em; margin-top: 1px;">{{ auth()->user()->role }}</div>
            </div>
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: rgba(255,255,255,0.3); transition: transform 0.2s; flex-shrink: 0;" :style="open ? 'transform:rotate(180deg)' : ''">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>

        <div x-show="open"
             x-cloak
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="margin-top: 0.5rem; padding: 0.5rem; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 10px; display: flex; flex-direction: column; gap: 2px; box-shadow: 0 6px 20px rgba(0,0,0,0.35);">
            <a href="{{ route('profile.edit') }}" style="display: flex; align-items: center; gap: 0.6rem; padding: 0.55rem 0.75rem; border-radius: 8px; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.83rem; font-weight: 600; transition: all 0.15s;" onmouseover="this.style.background='rgba(255,255,255,0.09)';this.style.color='rgba(255,255,255,0.9)'" onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,0.6)'">
                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Profile Settings
            </a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="width: 100%; display: flex; align-items: center; gap: 0.6rem; padding: 0.55rem 0.75rem; border-radius: 8px; color: #f87171; background: none; border: none; font-size: 0.83rem; font-weight: 600; cursor: pointer; transition: all 0.15s; text-align: left; font-family: 'Outfit', sans-serif;" onmouseover="this.style.background='rgba(239,68,68,0.12)'" onmouseout="this.style.background='transparent'">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Sign Out
                </button>
            </form>
        </div>
    </div>
</aside>

@endauth

<!-- Main content -->
<main class="main-content">

    @if(session('success'))
    <div style="background: #f0fdf4; color: #15803d; padding: 0.9rem 1.25rem; border-radius: 12px; border: 1px solid #bbf7d0; margin-bottom: 1.75rem; display: flex; align-items: center; gap: 0.75rem; box-shadow: 0 1px 4px rgba(0,139,75,0.08); animation: slideInUp 0.3s ease-out;">
        <div style="width: 28px; height: 28px; background: #dcfce7; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
        </div>
        <span style="font-weight: 700; font-size: 0.88rem;">{{ session('success') }}</span>
    </div>
    @endif

    @yield('content')
    {{ $slot ?? '' }}

    @auth
    <footer class="app-footer">
        <div class="footer-inner">
            <span class="footer-copy">&copy; {{ date('Y') }} Bio and Emerging Technology Institute. All rights reserved.</span>
            <span class="footer-motto">Transforming Ideas into Impacts</span>
        </div>
    </footer>
    @endauth
</main>

<!-- Toast -->
<div x-data="{
        show: false,
        message: '',
        type: 'success',
        init() {
            @if(session('success')) this.showToast('{{ addslashes(session('success')) }}', 'success'); @endif
            @if(session('error'))   this.showToast('{{ addslashes(session('error')) }}',   'error');   @endif
        },
        showToast(msg, t) { this.message = msg; this.type = t; this.show = true; setTimeout(() => this.show = false, 5000); }
     }"
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0 translate-y-2"
     style="position: fixed; bottom: 1.75rem; right: 1.75rem; z-index: 9999; display: none;"
     @notify.window="showToast($event.detail.message, $event.detail.type || 'success')">
    <div :class="'toast-container toast-' + type">
        <div class="toast-icon-wrap">
            <template x-if="type === 'success'">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            </template>
            <template x-if="type === 'error'">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </template>
        </div>
        <div style="flex: 1;">
            <div class="toast-title" x-text="type === 'success' ? 'Success' : 'Attention'"></div>
            <div class="toast-message" x-text="message"></div>
        </div>
        <button @click="show = false" class="toast-close">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
</div>

</body>
</html>
