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
            --navbar-height: 100px;
            --brand-blue: #003B5C;
            --brand-green: #008B4B;
        }

        .top-navbar {
            height: var(--navbar-height);
            background: white;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 0 4rem;
            box-shadow: 0 4px 30px rgba(0,0,0,0.05);
            border-bottom: 1px solid #f1f5f9;
        }

        .nav-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .main-wrapper {
            margin-top: var(--navbar-height);
            padding: 4rem;
            max-width: 1600px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .brand-logo-top {
            display: flex;
            align-items: center;
            padding-right: 3rem;
            border-right: 1px solid #f1f5f9;
            height: 50px;
        }

        .profile-badge {
            background: #f8fafc;
            padding: 0.5rem 1.25rem;
            border-radius: 16px;
            border: 1px solid #eef2f6;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logout-pill {
            background: #fff1f2;
            color: #ef4444;
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-pill:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-2px);
        }

        /* Responsive refinement */
        @media (max-width: 1200px) {
            .top-navbar { padding: 0 2rem; }
            .main-wrapper { padding: 2rem; }
            .nav-link { padding: 0.5rem 0.75rem; font-size: 0.9rem; }
        }
    </style>
</head>
<body class="animate-up">
    @auth
    <header class="top-navbar">
        <div class="brand-logo-top">
            <x-logo width="180" height="auto" />
        </div>

        <nav class="nav-container">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            @if(auth()->user()->isAdmin())
            <a href="{{ route('directorates.index') }}" class="nav-link {{ request()->routeIs('directorates.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Directorates
            </a>
            <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Staff Registry
            </a>
            @endif

            <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                Projects
            </a>
            <a href="{{ route('evaluations.index') }}" class="nav-link {{ request()->routeIs('evaluations.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Evaluations
            </a>
        </nav>

        <div class="user-actions">
            <div class="profile-badge">
                <div style="text-align: right;">
                    <div style="font-weight: 900; color: var(--brand-blue); font-size: 0.95rem; line-height: 1;">{{ auth()->user()->name }}</div>
                    <div style="font-size: 0.7rem; font-weight: 800; color: var(--brand-green); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 2px;">{{ auth()->user()->role }}</div>
                </div>
                <div style="width: 36px; height: 36px; background: var(--brand-blue); color: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1rem;">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-pill">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </header>
    @endauth

    <div class="main-wrapper">
        @if(session('success'))
            <div style="background: #ecfdf5; color: #047857; padding: 1.25rem 2rem; border-radius: 20px; border: 1px solid #d1fae5; margin-bottom: 3rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 4px 12px rgba(4, 120, 87, 0.05);">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                <div style="font-weight: 800;">{{ session('success') }}</div>
            </div>
        @endif

        <div style="margin-bottom: 4rem;">
            <h1 style="font-size: 2.5rem; font-weight: 950; color: var(--brand-blue); letter-spacing: -0.05em; margin: 0;">@yield('header_title', 'System Management')</h1>
            <p style="color: #64748b; font-weight: 700; font-size: 1.1rem; margin-top: 0.5rem;">{{ now()->format('l, F j, Y') }} — Bio and Emerging Technology Institute</p>
        </div>

        @yield('content')
        {{ $slot ?? '' }}

        @auth
        <footer style="margin-top: 8rem; padding: 4rem 0; border-top: 1px solid #e2e8f0; text-align: center; color: #94a3b8; font-size: 0.95rem; font-weight: 700; letter-spacing: 0.05em;">
            <p>&copy; {{ date('Y') }} Bio and Emerging Technology Institute. All Rights Reserved.</p>
        </footer>
        @endauth
    </div>
</body>
</html>
