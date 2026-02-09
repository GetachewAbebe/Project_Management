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
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">Dashboard</a>

            @if(auth()->user()->isAdmin())
            <a href="{{ route('directorates.index') }}" class="nav-link {{ request()->routeIs('directorates.*') ? 'active' : '' }}">Directorates</a>
            <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">Staff Registry</a>
            @endif

            <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('evaluations.index') }}" class="nav-link {{ request()->routeIs('evaluations.*') ? 'active' : '' }}">Evaluations</a>
        </nav>

        <div class="user-actions">
            <div class="profile-badge">
                <div style="text-align: right;">
                    <div style="font-weight: 950; color: var(--brand-blue); font-size: 0.95rem; line-height: 1;">{{ auth()->user()->name }}</div>
                    <div style="font-size: 0.72rem; font-weight: 900; color: var(--brand-green); text-transform: uppercase; letter-spacing: 0.08em; margin-top: 4px;">{{ auth()->user()->role }}</div>
                </div>
                <div style="width: 38px; height: 38px; background: linear-gradient(135deg, var(--brand-blue) 0%, #002d4a 100%); color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.1rem; box-shadow: 0 4px 10px rgba(0, 59, 92, 0.2);">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-pill" style="padding: 0.75rem 1.4rem; border: 1px solid rgba(239, 68, 68, 0.15);">
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

        <div class="header-titles">
            <h1>@yield('header_title', 'System Management')</h1>
            <p>
                <span style="width: 8px; height: 8px; background: var(--brand-green); border-radius: 50%;"></span>
                {{ now()->format('l, F j, Y') }} — Bio and Emerging Technology Institute
            </p>
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
