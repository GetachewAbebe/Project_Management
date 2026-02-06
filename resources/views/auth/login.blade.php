@extends('layouts.app')

@section('title', 'Secure Access')

@section('content')
<div style="max-width: 450px; margin: -3.5rem auto 4rem auto; position: relative; z-index: 10; animation: fadeIn 0.5s ease-out;">
    <div class="card" style="border-radius: 24px; box-shadow: 0 15px 35px rgba(0,0,0,0.06); padding: 3rem; border-top: 5px solid var(--primary-navy);">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <h2 style="font-size: 1.75rem; font-weight: 800; color: var(--primary-navy);">Login</h2>
        </div>

        @if ($errors->any())
            <div style="background: #fef2f2; color: #dc2626; padding: 1.25rem; border-radius: 12px; margin-bottom: 2.5rem; font-size: 0.85rem; font-weight: 600; border-left: 4px solid #dc2626;">
                <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div style="margin-bottom: 2rem;">
                <label style="display: block; font-weight: 700; font-size: 0.85rem; color: var(--primary-navy); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.6rem;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                       style="width: 100%; padding: 1rem 1.25rem; border-radius: 12px; border: 2px solid #e2e8f0; font-family: inherit; font-size: 1rem; transition: all 0.2s;"
                       onfocus="this.style.borderColor='var(--primary-navy)'; this.style.outline='none'; this.style.boxShadow='0 0 0 4px rgba(0,59,92,0.1)';"
                       onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none';">
            </div>

            <div style="margin-bottom: 2rem;">
                <label style="display: block; font-weight: 700; font-size: 0.85rem; color: var(--primary-navy); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.6rem;">Password</label>
                <input type="password" name="password" required
                       style="width: 100%; padding: 1rem 1.25rem; border-radius: 12px; border: 2px solid #e2e8f0; font-family: inherit; font-size: 1rem; transition: all 0.2s;"
                       onfocus="this.style.borderColor='var(--primary-navy)'; this.style.outline='none'; this.style.boxShadow='0 0 0 4px rgba(0,59,92,0.1)';"
                       onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none';">
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2.5rem;">
                <label style="display: flex; align-items: center; cursor: pointer; font-size: 0.95rem; color: var(--text-muted);">
                    <input type="checkbox" name="remember" style="margin-right: 0.75rem; width: 1.2rem; height: 1.2rem; accent-color: var(--primary-navy);">
                    Keep me logged in
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 1.1rem; font-size: 1.1rem; border-radius: 14px;">
                Login
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20" style="margin-left: 0.6rem;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
            </button>
        </form>
    </div>
</div>
@endsection
