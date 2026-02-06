<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BETin EMS') - Bio and Emerging Technology Institute</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #008B4B;
            --primary-navy: #003B5C;
            --accent-green: #4ade80;
            --sidebar-width: 280px;
            --bg-body: #f8fafc;
            --white: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --success: #16a34a;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Ultra-Compact Institutional Header */
        .institutional-header {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-navy) 0%, #001f30 100%);
            padding: 1.25rem 2rem; /* Reduced from 2rem */
            color: white;
            text-align: center;
            position: relative;
            border-bottom: 3px solid var(--primary-green);
        }

        .institutional-header::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 20% 30%, rgba(0, 139, 75, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 80% 70%, rgba(0, 59, 92, 0.2) 0%, transparent 50%);
            pointer-events: none;
        }

        .brand-subtitle {
            font-size: 0.8rem; /* Reduced from 0.95rem */
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4em;
            color: var(--accent-green);
            margin-bottom: 0.5rem; /* Reduced from 1rem */
            opacity: 0.9;
        }

        .header-title {
            font-size: 1.4rem;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.01em;
            text-shadow: 0 2px 8px rgba(0,0,0,0.2);
            display: inline-block;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .header-title:hover {
            transform: translateY(-2px);
            text-shadow: 0 4px 15px rgba(74, 222, 128, 0.3);
            letter-spacing: 0.01em;
        }

        .header-title span {
            transition: all 0.3s ease;
        }

        .header-title:hover .brand-name {
            color: var(--accent-green);
        }

        .header-title:hover .system-name {
            color: white;
            opacity: 1;
        }

        /* Institutional Footer */
        .institutional-footer {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-navy) 0%, #001f30 100%);
            padding: 1.5rem 2rem;
            color: white;
            text-align: center;
            position: relative;
            border-top: 3px solid var(--primary-green);
            margin-top: 4rem;
        }

        .institutional-footer::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 80% 30%, rgba(0, 139, 75, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .footer-text {
            font-size: 0.9rem;
            font-weight: 500;
            opacity: 0.8;
            letter-spacing: 0.02em;
        }

        /* App Layout Structure */
        .app-container {
            display: flex;
            flex-grow: 1;
            max-width: 1600px;
            margin: 0 auto;
            width: 100%;
            padding: 2rem 0;
        }

        /* Clean Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            padding: 1rem 2rem;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            padding: 0.85rem 1.5rem;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 0.5rem;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            font-size: 0.95rem;
            height: 52px;
        }

        .nav-link:hover {
            background: #f1f5f9;
            color: var(--primary-navy);
        }

        .nav-link.active {
            background: var(--primary-navy);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 59, 92, 0.15);
        }

        .nav-link .menu-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .nav-link .menu-icon svg {
            width: 20px;
            height: 20px;
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid var(--border-color);
            padding-top: 1.5rem;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary-navy);
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            padding: 1rem 4rem 4rem 4rem;
            animation: fadeIn 0.4s ease-out;
        }

        .content-header {
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 2.5rem;
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: var(--primary-navy);
            color: white;
        }

        .btn-danger {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,59,92,0.2);
        }

        .alert {
            padding: 1.25rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            background: #f0fdf4;
            color: #166534;
            font-weight: 600;
            border-left: 5px solid var(--success);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 1.25rem 1rem;
            background: #f8fafc;
            color: var(--text-muted);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        td {
            padding: 1.25rem 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        /* Submenu Styles */
        .nav-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            margin-left: 1rem;
        }

        .nav-submenu.open {
            max-height: 200px;
        }

        .nav-link.has-submenu {
            cursor: pointer;
        }

        .nav-link.has-submenu::after {
            content: '';
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid currentColor;
            margin-left: auto;
            transition: transform 0.3s ease;
        }

        .nav-link.has-submenu.open::after {
            transform: rotate(180deg);
        }

        .nav-submenu .nav-link {
            padding: 0.65rem 1.5rem;
            font-size: 0.85rem;
            margin-bottom: 0.25rem;
        }
    </style>
</head>
<body>
    <header class="institutional-header">
        <a href="{{ route('dashboard') }}" class="header-title">
            <span class="brand-name" style="color: var(--accent-green);">Bio and Emerging Technology Institute</span>
            <span style="opacity: 0.5; margin: 0 0.5rem;">-</span>
            <span class="system-name">Project Management System</span>
        </a>
    </header>

    <div class="app-container">
        @auth
        <aside class="sidebar">
            <nav>
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                    </div>
                    Dashboard
                </a>
                <a href="{{ route('directorates.index') }}" class="nav-link {{ request()->routeIs('directorates.*') ? 'active' : '' }}">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    Directorates
                </a>
                <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <div class="menu-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    Staff
                </a>
                
                <div>
                    <a href="javascript:void(0)" class="nav-link has-submenu {{ request()->routeIs('projects.*') || request()->routeIs('evaluations.*') ? 'active open' : '' }}" onclick="toggleSubmenu(this)">
                        <div class="menu-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        </div>
                        Projects
                    </a>
                    <div class="nav-submenu {{ request()->routeIs('projects.*') || request()->routeIs('evaluations.*') ? 'open' : '' }}">
                        <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.index') || request()->routeIs('projects.create') || request()->routeIs('projects.edit') ? 'active' : '' }}">
                            <div class="menu-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            </div>
                            Project Registry
                        </a>
                        <a href="{{ route('evaluations.index') }}" class="nav-link {{ request()->routeIs('evaluations.*') ? 'active' : '' }}">
                            <div class="menu-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                            </div>
                            Evaluations
                        </a>
                    </div>
                </div>
            </nav>

            <div class="sidebar-footer">
                <div class="user-pill">
                    <div class="user-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    <div style="flex-grow: 1; overflow: hidden;">
                        <div style="font-weight: 700; font-size: 0.9rem; color: var(--primary-navy); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ auth()->user()->name }}</div>
                        <div style="font-size: 0.65rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.2rem;">
                            {{ auth()->user()->role }} @if(auth()->user()->directorate) • {{ auth()->user()->directorate->name }} @endif
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="width: 100%; justify-content: center; font-size: 0.8rem; padding: 0.6rem;">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16" style="margin-right: 0.5rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        Secure Logout
                    </button>
                </form>
            </div>
        </aside>
        @endauth

        <main class="main-content" style="{{ !auth()->check() ? 'padding: 4rem; max-width: 800px; margin: 0 auto;' : '' }}">
            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            @auth
            <div class="content-header">
                <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--primary-navy);">@yield('header_title', 'Overview')</h2>
                <div style="font-size: 0.9rem; color: var(--text-muted); font-weight: 700; background: #fff; padding: 0.5rem 1rem; border-radius: 8px; border: 1px solid var(--border-color);">
                    {{ now()->format('l, F d, Y') }}
                </div>
            </div>
            @endauth

            @yield('content')
            {{ $slot ?? '' }}
        </main>
    </div>

    <footer class="institutional-footer">
        <div class="footer-text">
            &copy; {{ date('Y') }} Bio and Emerging Technology Institute. All Rights Reserved.
        </div>
    </footer>

    <script>
        function toggleSubmenu(element) {
            element.classList.toggle('open');
            const submenu = element.nextElementSibling;
            if (submenu && submenu.classList.contains('nav-submenu')) {
                submenu.classList.toggle('open');
            }
        }
    </script>
</body>
</html>
