<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EMS') - Bio & Emerging Tech Institute</title>
    
    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --sidebar-width: 300px;
            --institutional-header-height: 96px;
            --topbar-height: 0px;
            --brand-blue: #003B5C;
            --brand-green: #008B4B;
        }

        body {
            margin: 0;
            padding: 0;
        }

        /* Full-Width Institutional Header */
        .institutional-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--institutional-header-height);
            background: linear-gradient(135deg, var(--brand-blue) 0%, #002d4a 100%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            z-index: 1001;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .header-content-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            margin-right: 180px; /* Offset for logo width to ensure true center */
        }

        .institutional-header h1 {
            font-size: 1.55rem;
            font-weight: 800;
            color: white;
            margin: 0;
            letter-spacing: -0.01em;
            white-space: nowrap;
        }

        /* Left Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: var(--institutional-header-height);
            width: var(--sidebar-width);
            height: calc(100vh - var(--institutional-header-height));
            background: linear-gradient(180deg, var(--brand-blue) 0%, #002d4a 100%);
            padding: 2rem 0;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.1);
        }

        .sidebar-logo {
            padding: 0 2rem 2rem 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 2rem;
        }

        .sidebar-nav {
            flex: 1;
            padding: 0 1rem;
            overflow-y: auto;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.9rem 1.25rem;
            margin-bottom: 0.5rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-weight: 800;
            font-size: 0.95rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.08);
            color: white;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: var(--brand-green);
            color: white;
            box-shadow: 0 8px 20px rgba(0, 139, 75, 0.3);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: -1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 60%;
            background: white;
            border-radius: 0 2px 2px 0;
        }

        .nav-icon {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }

        /* Top Bar */
        .topbar {
            position: fixed;
            left: var(--sidebar-width);
            top: var(--institutional-header-height);
            right: 0;
            height: var(--topbar-height);
            background: white;
            border-bottom: 2px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 3rem;
            z-index: 999;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.04);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        /* Main Content Area */
        .main-content {
            @auth
                margin-left: var(--sidebar-width);
                margin-top: calc(var(--institutional-header-height) + var(--topbar-height));
                padding: 3rem 3rem 0 3rem;
                min-height: calc(100vh - var(--institutional-header-height) - var(--topbar-height));
                display: flex;
                flex-direction: column;
            @else
                margin: 0 !important;
                padding: 0 !important;
                min-height: 100vh;
                max-width: none !important;
            @endauth
        }

        /* User Profile Badge */
        .user-badge {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.6rem 1.25rem;
            background: linear-gradient(135deg, #f8fafc, white);
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .user-badge:hover {
            border-color: var(--brand-green);
            box-shadow: 0 4px 15px rgba(0, 139, 75, 0.15);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--brand-blue), var(--brand-green));
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 950;
            font-size: 1.05rem;
            box-shadow: 0 4px 12px rgba(0, 59, 92, 0.25);
        }

        .sidebar-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.9rem;
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 12px;
            font-weight: 900;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            font-weight: 700;
            color: #64748b;
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb-separator {
            color: #cbd5e1;
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }
            .main-content {
                margin-left: 240px;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    @auth
    <!-- Full-Width Institutional Header -->
    <header class="institutional-header">
        <!-- Logo Left -->
        <div style="background: white; padding: 0.5rem; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 140px; display: flex; justify-content: center;">
            <x-logo width="100%" height="auto" />
        </div>

        <!-- Centered Text Content -->
        <div class="header-content-wrapper">
            <h1>
                <span style="font-weight: 800; letter-spacing: -0.01em;">Bio and Emerging Technology Institute</span>
                <span style="margin: 0 1.25rem; color: rgba(255,255,255,0.3); font-weight: 300;">|</span>
                <span style="font-style: italic; font-weight: 500; color: var(--brand-green); font-size: 0.95em; letter-spacing: 0.02em; text-shadow: 0 0 20px rgba(0, 139, 75, 0.4);">Project Management System</span>
            </h1>
        </div>
    </header>

    <!-- Left Sidebar -->
    <aside class="sidebar">
        <!-- Logo removed from here -->

        <nav class="sidebar-nav">
            <!-- Main Section -->
            <div style="margin-bottom: 2rem;">
                <div style="padding: 0 1.25rem 0.75rem; font-size: 0.7rem; font-weight: 900; color: rgba(255, 255, 255, 0.4); text-transform: uppercase; letter-spacing: 0.15em;">Main</div>
                
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                    <div style="width: 40px; height: 40px; background: {{ request()->routeIs('dashboard*') ? 'rgba(255, 255, 255, 0.15)' : 'rgba(255, 255, 255, 0.08)' }}; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <span style="flex: 1;">Dashboard</span>
                </a>
            </div>

            @if(auth()->user()->isAdmin())
            <!-- Management Section -->
            <div style="margin-bottom: 2rem;">
                <div style="padding: 0 1.25rem 0.75rem; font-size: 0.7rem; font-weight: 900; color: rgba(255, 255, 255, 0.4); text-transform: uppercase; letter-spacing: 0.15em;">Management</div>
                
                <a href="{{ route('directorates.index') }}" class="nav-item {{ request()->routeIs('directorates.*') ? 'active' : '' }}">
                    <div style="width: 40px; height: 40px; background: {{ request()->routeIs('directorates.*') ? 'rgba(255, 255, 255, 0.15)' : 'rgba(255, 255, 255, 0.08)' }}; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <span style="flex: 1;">Directorates</span>
                </a>

                <a href="{{ route('employees.index') }}" class="nav-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <div style="width: 40px; height: 40px; background: {{ request()->routeIs('employees.*') ? 'rgba(255, 255, 255, 0.15)' : 'rgba(255, 255, 255, 0.08)' }}; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <span style="flex: 1;">Staff Registry</span>
                </a>
            </div>
            @endif

            <!-- Research Section -->
            <div style="margin-bottom: 2rem;">
                <div style="padding: 0 1.25rem 0.75rem; font-size: 0.7rem; font-weight: 900; color: rgba(255, 255, 255, 0.4); text-transform: uppercase; letter-spacing: 0.15em;">Research</div>
                
                <a href="{{ route('projects.index') }}" class="nav-item {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                    <div style="width: 40px; height: 40px; background: {{ request()->routeIs('projects.*') ? 'rgba(255, 255, 255, 0.15)' : 'rgba(255, 255, 255, 0.08)' }}; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <span style="flex: 1;">Projects</span>
                </a>

                <a href="{{ route('evaluations.index') }}" class="nav-item {{ request()->routeIs('evaluations.index') ? 'active' : '' }}">
                    <div style="width: 40px; height: 40px; background: {{ request()->routeIs('evaluations.index') ? 'rgba(255, 255, 255, 0.15)' : 'rgba(255, 255, 255, 0.08)' }}; border-radius: 10px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <span style="flex: 1;">Evaluations</span>
                    @php
                        $pendingCount = \App\Models\Project::where('status', 'REGISTERED')->whereDoesntHave('evaluations')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <div style="background: rgba(245, 158, 11, 0.2); color: #f59e0b; padding: 0.25rem 0.65rem; border-radius: 6px; font-size: 0.75rem; font-weight: 900; border: 1px solid rgba(245, 158, 11, 0.3); animation: pulse 2s ease-in-out infinite;">{{ $pendingCount }}</div>
                    @endif
                </a>
            </div>
        </nav>

        <div class="sidebar-footer" x-data="{ open: false }">
            <div @click="open = !open" style="background: rgba(255, 255, 255, 0.05); border-radius: 12px; padding: 1rem; border: 1px solid rgba(255, 255, 255, 0.1); cursor: pointer; transition: all 0.2s ease;" :style="open ? 'background: rgba(255, 255, 255, 0.1); border-color: rgba(255, 255, 255, 0.2);' : ''">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 32px; height: 32px; background: linear-gradient(135deg, var(--brand-green), #006d3d); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 950; font-size: 0.9rem; box-shadow: 0 4px 12px rgba(0, 139, 75, 0.3);">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div style="flex: 1; min-width: 0;">
                        <div style="font-size: 0.85rem; font-weight: 900; color: white; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ auth()->user()->name }}</div>
                        <div style="font-size: 0.7rem; font-weight: 800; color: rgba(0, 139, 75, 1); text-transform: uppercase; letter-spacing: 0.05em;">{{ auth()->user()->role }}</div>
                    </div>
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: rgba(255,255,255,0.5); transition: transform 0.3s ease;" :style="open ? 'transform: rotate(180deg)' : ''">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                
                <!-- Dropdown Menu -->
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity: 0; transform: translateY(-10px)"
                     x-transition:enter-end="opacity: 1; transform: translateY(0)"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity: 1; transform: translateY(0)"
                     x-transition:leave-end="opacity: 0; transform: translateY(-10px)"
                     style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; flex-direction: column; gap: 0.5rem;"
                     style="display: none;">
                    
                    <a href="{{ route('profile.edit') }}" style="display: flex; align-items: center; gap: 0.75rem; color: rgba(255, 255, 255, 0.8); text-decoration: none; font-size: 0.85rem; font-weight: 600; padding: 0.5rem; border-radius: 8px; transition: background 0.2s ease;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='transparent'">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Profile Settings
                    </a>

                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" style="width: 100%; display: flex; align-items: center; gap: 0.75rem; color: #ef4444; background: none; border: none; font-size: 0.85rem; font-weight: 600; padding: 0.5rem; border-radius: 8px; cursor: pointer; transition: background 0.2s ease; text-align: left;" onmouseover="this.style.background='rgba(239, 68, 68, 0.1)'" onmouseout="this.style.background='transparent'">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    @endauth

    <!-- Main Content -->
    <main class="main-content">
        @if(session('success'))
            <div style="background: #ecfdf5; color: #047857; padding: 1.25rem 2.25rem; border-radius: 16px; border: 2px solid #d1fae5; margin-bottom: 2.5rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 8px 20px rgba(4, 120, 87, 0.08); animation: slideInUp 0.4s ease-out;">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                <div style="font-weight: 900; font-size: 1rem;">{{ session('success') }}</div>
            </div>
        @endif

        @yield('content')
        {{ $slot ?? '' }}

        @auth
        <footer class="app-footer">
            <div class="footer-container">
                <div class="footer-content">
                    <span class="copyright-text">&copy; {{ date('Y') }} <span class="inst-name">Bio and Emerging Technology Institute.</span></span>
                    <span class="motto-accent">Transforming Ideas into Impacts</span>
                </div>
            </div>
        </footer>

        <style>
            .app-footer {
                margin-top: auto;
                padding: 1.75rem 0;
                background: linear-gradient(135deg, var(--brand-blue) 0%, #002d4a 100%);
                width: 100vw;
                position: relative;
                left: calc(-1 * var(--sidebar-width) - 3rem);
                box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
            }
            .footer-container {
                width: 100%;
                max-width: none;
                text-align: center;
                padding-left: var(--sidebar-width); /* Align content properly relative to the sidebar */
            }
            .footer-content {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 1.25rem;
                flex-wrap: wrap;
            }
            .copyright-text {
                font-size: 0.9rem;
                font-weight: 700;
                color: rgba(255, 255, 255, 0.7);
            }
            .inst-name {
                color: white;
                font-weight: 800;
            }
            .motto-accent {
                font-size: 0.85rem;
                font-weight: 850;
                color: var(--brand-green);
                text-transform: uppercase;
                letter-spacing: 0.05em;
                padding-left: 1.25rem;
                border-left: 2px solid rgba(255, 255, 255, 0.15);
            }
            @media (max-width: 1024px) {
                .app-footer { left: calc(-1 * 240px - 2rem); }
                .footer-container { padding-left: 240px; }
            }
            @media (max-width: 768px) {
                .footer-content { flex-direction: column; gap: 0.5rem; }
                .motto-accent { border-left: none; padding-left: 0; }
            }
        </style>
        @endauth
    </main>

    <style>
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.95); }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>
</html>
