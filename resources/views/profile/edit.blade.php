@extends('layouts.app')

@section('title', 'Profile Settings')
@section('header_title', 'Account Management')

@section('content')
<div style="max-width: 1200px; margin: 0 auto;">
    <!-- Page Header -->
    <div style="margin-bottom: 3rem; animation: slideDown 0.5s ease-out;">
        <h1 style="font-size: 2.5rem; font-weight: 950; color: var(--brand-blue); margin-bottom: 0.5rem; letter-spacing: -0.03em;">
            Profile Settings
        </h1>
        <p style="color: #64748b; font-size: 1.1rem; max-width: 600px;">
            Manage your account information, security preferences, and authenticated sessions.
        </p>
    </div>

    <!-- Unified Form Wrapper -->
    <form method="post" action="{{ route('profile.update') }}" class="profile-grid">
        @csrf
        @method('patch')

        <!-- Left Column: Unified Settings -->
        <div style="display: flex; flex-direction: column; gap: 2rem;">
            
            <!-- Personal Information Section -->
            <div class="premium-card">
                <div class="card-header">
                    <div class="icon-wrapper blue">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div>
                        <h3>Personal Information</h3>
                        <p>Update your account's profile details and email.</p>
                    </div>
                </div>

                <div class="form-content">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <div class="input-wrapper">
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                        @if($errors->get('name'))
                            <span class="error-msg">{{ $errors->get('name')[0] }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                        </div>
                        @if($errors->get('email'))
                            <span class="error-msg">{{ $errors->get('email')[0] }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Security Section -->
            <div class="premium-card">
                <div class="card-header">
                    <div class="icon-wrapper green">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div>
                        <h3>Security Settings</h3>
                        <p>Change your password (leave blank to keep current).</p>
                    </div>
                </div>

                <div class="form-content">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" autocomplete="new-password" placeholder="Leave blank to keep unchanged" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                        </div>
                        @if($errors->get('password'))
                            <span class="error-msg">{{ $errors->get('password')[0] }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Confirm new password" />
                            <div class="input-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" x-data="{ show: false }" x-show="document.getElementById('password').value.length > 0" x-transition.opacity>
                        <label for="current_password" style="color: var(--brand-blue);">Current Password (Required to save password changes)</label>
                        <div class="input-wrapper">
                            <input type="password" id="current_password" name="current_password" autocomplete="current-password" placeholder="Enter current password to confirm" />
                            <div class="input-icon" style="color: var(--brand-blue);">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </div>
                        </div>
                        @if($errors->get('current_password'))
                            <span class="error-msg">{{ $errors->get('current_password')[0] }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Unified Save Button -->
            <div style="display: flex; align-items: center; justify-content: flex-end; gap: 1rem; padding-top: 1rem; border-top: 2px solid #e2e8f0;">
                @if (session('status') === 'profile-updated')
                    <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" style="color: var(--brand-green); font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        All changes saved successfully.
                    </span>
                @endif
                
                <button type="submit" class="btn-primary" style="min-width: 200px;">
                    Save All Changes
                </button>
            </div>
        </div>

        <!-- Right Column: Visual & Danger Zone -->
        <div style="display: flex; flex-direction: column; gap: 2rem;">
            
            <!-- Avatar Card -->
            <div class="premium-card center-content" style="text-align: center;">
                <div style="width: 120px; height: 120px; background: linear-gradient(135deg, var(--brand-blue), var(--brand-green)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem; font-weight: 900; box-shadow: 0 10px 25px rgba(0, 59, 92, 0.2); margin: 0 auto 1.5rem;">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <h2 style="font-size: 1.5rem; font-weight: 900; color: var(--brand-blue); margin-bottom: 0.25rem;">{{ $user->name }}</h2>
                <div style="display: inline-block; background: #ecfdf5; color: var(--brand-green); padding: 0.25rem 1rem; border-radius: 99px; font-weight: 700; font-size: 0.85rem; border: 1px solid rgba(0, 139, 75, 0.2);">
                    {{ $user->role }}
                </div>
            </div>

            <!-- Delete Account Card -->
            <!-- Note: This form must be separate because it acts on a different route/method -->
        </div>

    </form>
    
    <!-- Delete Account Section (Separate Form) -->
    <div style="grid-column: 2; margin-top: 2rem;"> <!-- Positioned in right column grid flow via CSS if needed, or just append -->
        <!-- Actually, we can just put this div inside the grid container directly -->
    </div>

</div>

<!-- Correct Structure: We need to close the form before the delete section, highlighting that Delete is separate -->
<!-- Re-opening the structure to fix the layout nesting -->

<script>
    // Simple script to show/hide current password field based on new password input
    document.getElementById('password').addEventListener('input', function(e) {
        const currentPassField = document.getElementById('current-password-group');
        if (this.value.length > 0) {
            currentPassField.style.display = 'flex';
            currentPassField.style.opacity = '1';
        } else {
            currentPassField.style.display = 'none';
            currentPassField.style.opacity = '0';
        }
    });
</script>

<!-- Rewriting Content properly with closed tags -->
@endsection
