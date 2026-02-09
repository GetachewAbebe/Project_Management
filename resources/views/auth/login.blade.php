@extends('layouts.app')

@section('title', 'Institutional Secure Login')

@section('content')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #000c14; margin: -3.5rem -5rem -8rem -5rem; position: relative; overflow: hidden; font-family: 'Outfit', sans-serif;">
    
    <!-- Ultra-Premium Background layer -->
    <div style="position: absolute; inset: 0; background: radial-gradient(circle at 10% 20%, rgba(0, 139, 75, 0.12) 0%, transparent 40%), radial-gradient(circle at 90% 80%, rgba(0, 59, 92, 0.25) 0%, transparent 40%);"></div>
    
    <!-- Moving light streaks -->
    <div style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: conic-gradient(from 0deg at 50% 50%, transparent 0deg, rgba(132, 204, 22, 0.05) 120deg, transparent 240deg); animation: rotate 20s linear infinite;"></div>
    
    <!-- Animated particle grid decor -->
    <div style="position: absolute; inset: 0; background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 50px 50px; opacity: 0.6;"></div>

    <div style="width: 100%; max-width: 1300px; min-height: 800px; display: flex; background: rgba(255, 255, 255, 0.01); border-radius: 50px; border: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(40px); overflow: hidden; box-shadow: 0 100px 150px -40px rgba(0,0,0,0.8); z-index: 10; animation: scaleIn 0.8s cubic-bezier(0.16, 1, 0.3, 1);">
        
        <!-- Branding Showcase Column -->
        <div style="flex: 1.4; padding: 7rem; background: linear-gradient(165deg, var(--brand-blue) 0%, #001a2a 100%); display: flex; flex-direction: column; justify-content: center; position: relative; border-right: 1px solid rgba(255,255,255,0.05);">
            <div style="position: relative; z-index: 2;">
                <div style="background: white; border-radius: 40px; display: inline-flex; align-items: center; justify-content: center; padding: 3rem; margin-bottom: 5rem; box-shadow: 0 40px 80px rgba(0,0,0,0.5); transform: translateY(-20px); animation: float 6s ease-in-out infinite;">
                    <x-logo width="380" height="auto" />
                </div>
                <h1 style="color: white; font-size: 3.75rem; font-weight: 950; line-height: 1; letter-spacing: -0.05em; margin-bottom: 2.5rem;">
                    The Future of <br/><span style="color: var(--brand-green);">Bio-Tech Governance</span>
                </h1>
                <p style="color: rgba(255,255,255,0.45); font-size: 1.4rem; line-height: 1.6; max-width: 520px; font-weight: 500;">
                    Secure Institutional Access for Project Registry, Strategic Intelligence, and Advanced Performance Analytics.
                </p>
            </div>
            
            <!-- Dynamic Geometric Background Decor -->
            <div style="position: absolute; bottom: -80px; left: -80px; width: 450px; height: 450px; border: 60px solid var(--brand-green); opacity: 0.03; border-radius: 50%; filter: blur(2px);"></div>
        </div>

        <!-- Secure Form Column -->
        <div style="flex: 1; background: #ffffff; padding: 7rem; display: flex; flex-direction: column; justify-content: center; position: relative;">
            <div style="margin-bottom: 5rem;">
                <div style="width: 50px; height: 4px; background: var(--brand-green); margin-bottom: 1.5rem; border-radius: 2px;"></div>
                <h2 style="font-size: 2.75rem; font-weight: 950; color: var(--brand-blue); margin-bottom: 1.25rem; letter-spacing: -0.04em; line-height: 1;">Secure Entry</h2>
                <p style="color: #64748b; font-weight: 700; font-size: 1.25rem;">Validated institutional credentials required.</p>
            </div>

            @if ($errors->any())
                <div style="background: #fff5f5; color: #c53030; padding: 1.75rem; border-radius: 24px; margin-bottom: 3.5rem; font-size: 1rem; font-weight: 800; border: 2px solid rgba(197, 48, 48, 0.05); animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach ($errors->all() as $error)
                            <li style="display: flex; align-items: center; gap: 1rem;">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div style="margin-bottom: 3rem;">
                    <label style="display: block; font-weight: 900; font-size: 0.85rem; color: var(--brand-blue); text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: 1.25rem;">Institutional Identity (Email)</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                           placeholder="name@betin.gov.et"
                           class="form-input"
                           style="padding: 1.5rem 1.75rem; font-size: 1.15rem; border-radius: 24px;">
                </div>

                <div style="margin-bottom: 3.5rem;">
                    <label style="display: block; font-weight: 900; font-size: 0.85rem; color: var(--brand-blue); text-transform: uppercase; letter-spacing: 0.2em; margin-bottom: 1.25rem;">Security Key (Password)</label>
                    <input type="password" name="password" required
                           placeholder="••••••••••••"
                           class="form-input"
                           style="padding: 1.5rem 1.75rem; font-size: 1.15rem; border-radius: 24px;">
                </div>

                <div style="display: flex; align-items: center; margin-bottom: 4.5rem;">
                    <label style="display: flex; align-items: center; cursor: pointer; font-size: 1.25rem; font-weight: 800; color: #475569; user-select: none;">
                        <input type="checkbox" name="remember" style="margin-right: 1.25rem; width: 1.75rem; height: 1.75rem; accent-color: var(--brand-green); cursor: pointer;">
                        Remember this workstation
                    </label>
                </div>

                <button type="submit" class="btn-primary" style="width: 100%; padding: 1.75rem; font-size: 1.4rem; border-radius: 28px; justify-content: center; gap: 1.5rem;">
                    Authorize Entry
                    <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M11 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                </button>
            </form>
            
            <div style="margin-top: auto; text-align: center; padding-top: 4rem;">
                 <p style="color: #cbd5e1; font-size: 1rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.25em;">Institutional Assets Protected &copy; {{ date('Y') }}</p>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes rotate { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    @keyframes float { 0%, 100% { transform: translateY(-20px); } 50% { transform: translateY(-35px); } }
    @keyframes scaleIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
    @keyframes shake { 10%, 90% { transform: translate3d(-1px, 0, 0); } 20%, 80% { transform: translate3d(2px, 0, 0); } 30%, 50%, 70% { transform: translate3d(-4px, 0, 0); } 40%, 60% { transform: translate3d(4px, 0, 0); } }
</style>
@endsection
