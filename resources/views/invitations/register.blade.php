@extends('layouts.app')

@section('title', 'Secure Registration')

@section('content')
<div style="min-height: calc(100vh - 200px); display: flex; align-items: center; justify-content: center; background: #f8fafc;">
    <div class="card" style="max-width: 450px; width: 100%; border-top: 5px solid var(--accent-green);">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="width: 60px; height: 60px; background: #ecfdf5; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--accent-green); margin: 0 auto 1.5rem;">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="32"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-4.94-5.703a3.36 3.36 0 001.942 2.127 6.992 6.992 0 011.838 1.258m2.954-5.454c1.137-.832 2.83-1.25 5.01-1.25m-7.052-4.433L11 3m0 0l2 2m-2-2l-2 2M3 8h1m10 0h1m-7 7l1 1m4-4l1 1m1-10l-1 1m-4-4l-1 1" /></svg>
            </div>
            <h2 style="font-size: 1.5rem; font-weight: 800; color: var(--primary-navy);">Complete Secure Registration</h2>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.5rem;">
                Welcome, <strong>{{ $invitation->employee->full_name }}</strong>.<br>
                Please establish your private institutional password.
            </p>
        </div>

        <form action="{{ route('register.invited.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $invitation->token }}">

            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Professional Email</label>
                <input type="text" value="{{ $invitation->email }}" disabled style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: #f1f5f9; color: #64748b;">
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Create Password</label>
                <input type="password" name="password" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('password')<span style="color: #ef4444; font-size: 0.75rem;">{{ $message }}</span>@enderror
            </div>

            <div style="margin-bottom: 2rem;">
                <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Confirm Password</label>
                <input type="password" name="password_confirmation" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; justify-content: center; font-size: 1rem;">
                Establish Institutional Account
            </button>
        </form>

        <div style="margin-top: 1.5rem; text-align: center; border-top: 1px solid var(--border-color); padding-top: 1.5rem;">
            <p style="font-size: 0.75rem; color: var(--text-muted); line-height: 1.4;">
                This registration link is unique to you and will expire in 48 hours. 
                Keep your credentials confidential.
            </p>
        </div>
    </div>
</div>
@endsection
