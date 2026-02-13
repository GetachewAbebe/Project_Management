@extends('layouts.app')

@section('title', 'Secure Login - BETIn')

@section('content')
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); position: relative; font-family: 'Outfit', sans-serif; overflow: hidden;">
    
    <!-- Animated gradient orbs -->
    <div style="position: absolute; top: 10%; left: 5%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0, 139, 75, 0.08) 0%, transparent 70%); border-radius: 50%; filter: blur(60px); animation: float 8s ease-in-out infinite;"></div>
    <div style="position: absolute; bottom: 10%; right: 5%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(0, 59, 92, 0.06) 0%, transparent 70%); border-radius: 50%; filter: blur(80px); animation: float 10s ease-in-out infinite reverse;"></div>
    
    <!-- Subtle institutional pattern -->
    <div style="position: absolute; inset: 0; background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(0, 59, 92, 0.015) 35px, rgba(0, 59, 92, 0.015) 70px); opacity: 0.6;"></div>
    
    <div class="login-container" style="width: 90%; max-width: 1000px; display: flex; background: white; border-radius: 28px; overflow: hidden; box-shadow: 0 25px 70px rgba(0, 59, 92, 0.15); z-index: 10; border: 1px solid rgba(226, 232, 240, 0.8); animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);">
        
        <!-- Institutional Branding Panel -->
        <div style="flex: 1; padding: 4rem 3rem; background: linear-gradient(165deg, var(--brand-blue) 0%, #001f35 100%); display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">
            
            <!-- Decorative elements -->
            <div style="position: absolute; top: -100px; right: -100px; width: 300px; height: 300px; border: 40px solid rgba(0, 139, 75, 0.08); border-radius: 50%;"></div>
            <div style="position: absolute; bottom: -80px; left: -80px; width: 250px; height: 250px; background: rgba(0, 139, 75, 0.05); border-radius: 50%;"></div>
            
            <!-- Official Seal/Logo -->
            <div class="logo-card" style="background: white; border-radius: 20px; padding: 2rem; margin-bottom: 2.5rem; box-shadow: 0 15px 40px rgba(0,0,0,0.2); position: relative; z-index: 2; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                <x-logo width="240" height="auto" />
            </div>
            
            <!-- Official Title -->
            <div style="position: relative; z-index: 2;">
                <h1 style="font-size: 2rem; color: white; font-weight: 950; line-height: 1.2; letter-spacing: -0.02em; margin-bottom: 1.25rem;">
                    Bio and Emerging<br/>Technology Institute
                </h1>
                <div style="width: 50px; height: 4px; background: var(--brand-green); margin-bottom: 1.25rem; border-radius: 2px; box-shadow: 0 0 20px rgba(0, 139, 75, 0.4);"></div>
                <p style="color: rgba(255,255,255,0.8); font-size: 0.95rem; line-height: 1.6; font-weight: 600;">
                    Transforming Ideas into Impacts!
                </p>
            </div>
            
            <!-- Official Footer -->
            <div style="border-top: 1px solid rgba(255,255,255,0.15); padding-top: 1.5rem; margin-top: 2.5rem; position: relative; z-index: 2;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 8px; height: 8px; background: var(--brand-green); border-radius: 50%; box-shadow: 0 0 12px rgba(0, 139, 75, 0.6); animation: pulse 2s ease-in-out infinite;"></div>
                    <p style="color: rgba(255,255,255,0.6); font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;">
                        Authorized Personnel Only
                    </p>
                </div>
            </div>
        </div>

        <!-- Login Form Panel -->
        <div style="flex: 1.2; background: #ffffff; padding: 4rem 3.5rem; display: flex; flex-direction: column; justify-content: center;">
            
            <!-- Form Header -->
            <div style="margin-bottom: 2.5rem;">
                <div style="width: 40px; height: 4px; background: var(--brand-green); margin-bottom: 1rem; border-radius: 2px;"></div>
                <h2 style="font-size: 2.25rem; font-weight: 950; color: var(--brand-blue); margin: 0; letter-spacing: -0.03em;">Login</h2>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-box" style="background: #fef2f2; color: #991b1b; padding: 1.25rem 1.5rem; border-radius: 16px; margin-bottom: 2.5rem; font-size: 0.95rem; font-weight: 700; border-left: 4px solid #dc2626; animation: shake 0.5s cubic-bezier(.36,.07,.19,.97);">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach ($errors->all() as $error)
                            <li style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem;">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 900; font-size: 0.8rem; color: var(--brand-blue); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.75rem;">Email Address</label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           placeholder="username@betin.gov.et"
                           class="form-input interactive-input"
                           style="padding: 1.1rem 1.5rem; font-size: 1rem; border-radius: 14px; border: 2px solid #e2e8f0; width: 100%; transition: all 0.3s ease;">
                </div>

                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 900; font-size: 0.8rem; color: var(--brand-blue); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.75rem;">Password</label>
                    <input type="password" 
                           name="password" 
                           required
                           placeholder="Enter your password"
                           class="form-input interactive-input"
                           style="padding: 1.1rem 1.5rem; font-size: 1rem; border-radius: 14px; border: 2px solid #e2e8f0; width: 100%; transition: all 0.3s ease;">
                </div>

                <div style="display: flex; align-items: center; margin-bottom: 3rem;">
                    <label class="checkbox-label" style="display: flex; align-items: center; cursor: pointer; font-size: 0.95rem; font-weight: 700; color: #475569; user-select: none; transition: color 0.2s ease;">
                        <input type="checkbox" 
                               name="remember" 
                               style="margin-right: 0.75rem; width: 1.25rem; height: 1.25rem; accent-color: var(--brand-green); cursor: pointer;">
                        Remember this device
                    </label>
                </div>

                <button type="submit" 
                        class="btn-primary submit-btn" 
                        style="width: 100%; padding: 1.35rem; font-size: 1.05rem; border-radius: 14px; justify-content: center; font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em; position: relative; overflow: hidden; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);">
                    <span style="position: relative; z-index: 2;">Sign In</span>
                </button>
            </form>
            
            <!-- Official Footer -->
            <div style="margin-top: 3.5rem; padding: 2rem 0; border-top: 2px solid #e2e8f0; text-align: center; background: linear-gradient(to bottom, transparent, #f8fafc); border-radius: 0 0 16px 16px;">
                <p style="color: #475569; font-size: 0.95rem; font-weight: 800; line-height: 1.6; margin: 0;">
                    &copy; {{ date('Y') }} Bio and Emerging Technology Institute<br/>
                    <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.15em; color: #64748b; font-weight: 900; margin-top: 0.5rem; display: inline-block;">All Rights Reserved</span>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Smooth entrance animation */
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Floating orbs */
    @keyframes float {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(20px, -20px) scale(1.05); }
    }

    /* Pulsing indicator */
    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(0.95); }
    }

    /* Error shake */
    @keyframes shake {
        10%, 90% { transform: translate3d(-1px, 0, 0); }
        20%, 80% { transform: translate3d(2px, 0, 0); }
        30%, 50%, 70% { transform: translate3d(-3px, 0, 0); }
        40%, 60% { transform: translate3d(3px, 0, 0); }
    }

    /* Interactive input focus */
    .interactive-input:focus {
        outline: none;
        border-color: var(--brand-green) !important;
        box-shadow: 0 0 0 4px rgba(0, 139, 75, 0.1), 0 8px 20px rgba(0, 139, 75, 0.15);
        transform: translateY(-2px);
    }

    .interactive-input:hover {
        border-color: #cbd5e1;
    }

    /* Logo card hover */
    .logo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    }

    /* Submit button effects */
    .submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 139, 75, 0.35);
    }

    .submit-btn:active {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(0, 139, 75, 0.25);
    }

    /* Checkbox label hover */
    .checkbox-label:hover {
        color: var(--brand-blue);
    }

    /* Container shadow on hover */
    .login-container:hover {
        box-shadow: 0 30px 80px rgba(0, 59, 92, 0.2);
    }
</style>
@endsection
