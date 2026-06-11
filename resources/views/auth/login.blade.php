@extends('layouts.app')

@section('title', 'Sign In — BETin PMS')

@section('content')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #eef2f7 0%, #e2ecf6 100%); padding: 2rem; position: relative; overflow: hidden;">

    <!-- Background decoration -->
    <div style="position: absolute; top: -120px; right: -120px; width: 500px; height: 500px; background: radial-gradient(circle, rgba(0,139,75,0.06) 0%, transparent 65%); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -80px; left: -80px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0,59,92,0.07) 0%, transparent 65%); pointer-events: none;"></div>

    <div style="width: 100%; max-width: 960px; display: flex; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,59,92,0.14), 0 4px 16px rgba(0,0,0,0.06); animation: fadeInUp 0.45s ease-out;">

        <!-- Left: Brand Panel -->
        <div style="flex: 1; background: linear-gradient(160deg, #003B5C 0%, #001e35 100%); padding: 3.5rem; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">

            <!-- Decorative circles -->
            <div style="position: absolute; top: -60px; right: -60px; width: 240px; height: 240px; border: 2px solid rgba(0,139,75,0.12); border-radius: 50%; pointer-events: none;"></div>
            <div style="position: absolute; top: -30px; right: -30px; width: 140px; height: 140px; background: rgba(0,139,75,0.05); border-radius: 50%; pointer-events: none;"></div>
            <div style="position: absolute; bottom: -80px; left: -80px; width: 280px; height: 280px; border: 2px solid rgba(255,255,255,0.04); border-radius: 50%; pointer-events: none;"></div>

            <!-- Logo + Decade badge -->
            <div>
                <div style="display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 2rem; gap: 1rem;">
                    <div style="background: white; border-radius: 14px; padding: 0.85rem 1.25rem; display: inline-flex; align-items: center; box-shadow: 0 8px 24px rgba(0,0,0,0.2);">
                        <x-logo width="140" height="auto" />
                    </div>
                    <!-- 10-year milestone badge -->
                    <div style="background: linear-gradient(135deg, rgba(0,139,75,0.25), rgba(0,139,75,0.12)); border: 1px solid rgba(0,139,75,0.4); border-radius: 12px; padding: 0.6rem 0.9rem; text-align: center; flex-shrink: 0;">
                        <div style="font-size: 1.25rem; font-weight: 950; color: #00d47a; line-height: 1; letter-spacing: -0.03em;">10</div>
                        <div style="font-size: 0.55rem; font-weight: 900; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 0.1em; margin-top: 1px;">Years</div>
                        <div style="font-size: 0.6rem; font-weight: 800; color: rgba(0,212,122,0.8); margin-top: 2px;">2016 – 2026</div>
                    </div>
                </div>

                <h1 style="font-size: 1.85rem; color: white; font-weight: 950; line-height: 1.2; letter-spacing: -0.03em; margin: 0 0 0.85rem;">
                    Bio and Emerging<br>Technology Institute
                </h1>

                <div style="width: 36px; height: 3px; background: var(--brand-green); border-radius: 2px; margin-bottom: 0.85rem;"></div>

                <p style="color: rgba(255,255,255,0.5); font-size: 0.83rem; line-height: 1.7; font-weight: 500; margin: 0;">
                    Research Project Management System for<br>institutional research oversight &amp; evaluation.
                </p>
            </div>

            <!-- Research center stats -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin: 1.75rem 0;">
                <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; padding: 0.85rem 1rem;">
                    <div style="font-size: 1.4rem; font-weight: 950; color: white; line-height: 1; letter-spacing: -0.02em;">200+</div>
                    <div style="font-size: 0.68rem; font-weight: 700; color: rgba(255,255,255,0.45); margin-top: 3px; line-height: 1.3;">Active Research<br>Projects</div>
                </div>
                <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; padding: 0.85rem 1rem;">
                    <div style="font-size: 1.4rem; font-weight: 950; color: white; line-height: 1; letter-spacing: -0.02em;">10</div>
                    <div style="font-size: 0.68rem; font-weight: 700; color: rgba(255,255,255,0.45); margin-top: 3px; line-height: 1.3;">Directorates across<br>2 Research Centers</div>
                </div>
            </div>

            <!-- Feature list -->
            <div style="display: flex; flex-direction: column; gap: 0.65rem;">
                @foreach([
                    'Biotechnology & Emerging Technology Research',
                    'Annual Peer Evaluation Cycle',
                    'Directorate Performance Analytics',
                ] as $feat)
                <div style="display: flex; align-items: center; gap: 0.7rem;">
                    <div style="width: 18px; height: 18px; background: rgba(0,168,88,0.2); border: 1px solid rgba(0,168,88,0.4); border-radius: 5px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="10" height="10" fill="none" stroke="#00d47a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span style="color: rgba(255,255,255,0.6); font-size: 0.8rem; font-weight: 600;">{{ $feat }}</span>
                </div>
                @endforeach
            </div>

            <!-- Footer badge -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 1.75rem; padding-top: 1.25rem; border-top: 1px solid rgba(255,255,255,0.08);">
                <div style="display: flex; align-items: center; gap: 0.6rem;">
                    <div style="width: 6px; height: 6px; background: #00d47a; border-radius: 50%; box-shadow: 0 0 8px rgba(0,212,122,0.8); animation: pulse 2s infinite;"></div>
                    <span style="font-size: 0.65rem; font-weight: 900; color: rgba(255,255,255,0.35); text-transform: uppercase; letter-spacing: 0.14em;">Authorized Personnel</span>
                </div>
                <span style="font-size: 0.65rem; font-weight: 700; color: rgba(255,255,255,0.3); letter-spacing: 0.06em;">betin.gov.et</span>
            </div>
        </div>

        <!-- Right: Login Form -->
        <div style="flex: 1.15; background: white; padding: 4rem 3.5rem; display: flex; flex-direction: column; justify-content: center;">

            <div style="margin-bottom: 2.25rem;">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 0.3rem 0.85rem; margin-bottom: 1.25rem;">
                    <div style="width: 6px; height: 6px; background: var(--brand-green); border-radius: 50%;"></div>
                    <span style="font-size: 0.68rem; font-weight: 900; color: #15803d; text-transform: uppercase; letter-spacing: 0.14em;">Secure Access</span>
                </div>
                <h2 style="font-size: 2rem; font-weight: 950; color: var(--brand-blue); margin: 0 0 0.5rem; letter-spacing: -0.03em;">Welcome back</h2>
                <p style="color: var(--text-secondary); font-size: 0.88rem; font-weight: 600; margin: 0;">Enter your institutional credentials to continue</p>
            </div>

            @if(session('status'))
            <div style="background: #f0fdf4; color: #15803d; padding: 0.9rem 1.1rem; border-radius: 10px; margin-bottom: 1.5rem; font-size: 0.88rem; font-weight: 700; border: 1px solid #bbf7d0;">
                {{ session('status') }}
            </div>
            @endif

            @if($errors->any())
            <div style="background: #fef2f2; color: #dc2626; padding: 0.9rem 1.1rem; border-radius: 10px; margin-bottom: 1.5rem; font-size: 0.88rem; font-weight: 700; border: 1px solid #fecaca;">
                @foreach($errors->all() as $error)
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $error }}
                </div>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div style="margin-bottom: 1.25rem;">
                    <label style="display: block; font-weight: 800; font-size: 0.72rem; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem;">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="you@betin.gov.et"
                           style="width: 100%; padding: 0.85rem 1rem; background: #f8fafc; border: 1.5px solid #dce6f0; border-radius: 11px; color: var(--text-primary); font-family: 'Outfit', sans-serif; font-size: 0.92rem; font-weight: 600; transition: all 0.2s ease; box-sizing: border-box;"
                           onfocus="this.style.borderColor='rgba(0,139,75,0.5)';this.style.background='white';this.style.boxShadow='0 0 0 3px rgba(0,139,75,0.08)'"
                           onblur="this.style.borderColor='#dce6f0';this.style.background='#f8fafc';this.style.boxShadow='none'">
                </div>

                <!-- Password -->
                <div style="margin-bottom: 1.75rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <label style="font-weight: 800; font-size: 0.72rem; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.1em;">Password</label>
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="font-size: 0.78rem; color: var(--brand-green); font-weight: 700; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Forgot password?</a>
                        @endif
                    </div>
                    <input type="password" name="password" required
                           placeholder="••••••••••••"
                           style="width: 100%; padding: 0.85rem 1rem; background: #f8fafc; border: 1.5px solid #dce6f0; border-radius: 11px; color: var(--text-primary); font-family: 'Outfit', sans-serif; font-size: 0.92rem; font-weight: 600; transition: all 0.2s ease; box-sizing: border-box;"
                           onfocus="this.style.borderColor='rgba(0,139,75,0.5)';this.style.background='white';this.style.boxShadow='0 0 0 3px rgba(0,139,75,0.08)'"
                           onblur="this.style.borderColor='#dce6f0';this.style.background='#f8fafc';this.style.boxShadow='none'">
                </div>

                <!-- Remember -->
                <div style="display: flex; align-items: center; gap: 0.6rem; margin-bottom: 1.75rem;">
                    <input type="checkbox" name="remember" id="remember" style="width: 15px; height: 15px; accent-color: var(--brand-green); cursor: pointer;">
                    <label for="remember" style="font-size: 0.85rem; font-weight: 600; color: var(--text-secondary); cursor: pointer;">Keep me signed in</label>
                </div>

                <button type="submit"
                        style="width: 100%; padding: 1rem; background: linear-gradient(135deg, var(--brand-green) 0%, #006d3d 100%); color: white; border: none; border-radius: 12px; font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 1rem; letter-spacing: 0.02em; cursor: pointer; box-shadow: 0 4px 14px rgba(0,139,75,0.3), 0 1px 3px rgba(0,0,0,0.1); transition: all 0.2s ease;"
                        onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 8px 24px rgba(0,139,75,0.4)'"
                        onmouseout="this.style.transform='';this.style.boxShadow='0 4px 14px rgba(0,139,75,0.3),0 1px 3px rgba(0,0,0,0.1)'">
                    Sign In to Portal
                </button>
            </form>

            <div style="margin-top: 2.5rem; padding-top: 1.5rem; border-top: 1px solid #f1f5f9; text-align: center;">
                <p style="color: var(--text-muted); font-size: 0.78rem; font-weight: 700; margin: 0;">
                    &copy; {{ date('Y') }} Bio and Emerging Technology Institute
                    <span style="display: block; margin-top: 0.2rem; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em;">All Rights Reserved</span>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50%       { opacity: 0.4; }
}
</style>
@endsection
