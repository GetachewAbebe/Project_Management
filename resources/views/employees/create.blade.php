@extends('layouts.app')

@section('title', 'Staff Enrollment')
@section('header_title', 'Institutional Staff Enrollment')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto; border-top: 5px solid var(--primary-navy);">
    <div style="margin-bottom: 2rem;">
        <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--primary-navy);">Personal & Professional Profile</h3>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Please provide the formal credentials for the staff member. Roles will be automatically assigned based on the position.</p>
    </div>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required placeholder="e.g. Dr. Abebe Kebede" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('full_name')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Professional Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="name@betin.gov.et" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('email')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Institutional ID</label>
                <input type="text" name="institutional_id" value="{{ old('institutional_id') }}" placeholder="BET/STAFF/000" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('institutional_id')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Position / Title</label>
                <input type="text" name="position" value="{{ old('position') }}" required placeholder="e.g. Director, Lead Scientist" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('position')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Assigned Directorate</label>
            <select name="directorate_id" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: white;">
                <option value="">Select Department</option>
                @foreach($directorates as $dir)
                    <option value="{{ $dir->id }}" {{ old('directorate_id') == $dir->id ? 'selected' : '' }}>{{ $dir->name }}</option>
                @endforeach
            </select>
            @error('directorate_id')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">System Access Level</label>
            <select name="system_role" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: white;">
                <option value="employee">Registry Only (No Login)</option>
                <option value="director">Department Director (Management Access)</option>
                <option value="evaluator">Evaluator (New Project Reviewer)</option>
            </select>
            @error('system_role')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="background: #eff6ff; border-radius: 12px; padding: 1.25rem; margin-top: 2rem; border: 1px solid #dbeafe; display: flex; gap: 1rem; align-items: flex-start;">
            <div style="color: #3b82f6;">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <div style="font-weight: 700; color: #1e40af; font-size: 0.9rem;">Identity Provisioning Protocol</div>
                <p style="font-size: 0.8rem; color: #1e40af; opacity: 0.8; line-height: 1.4; margin-top: 0.25rem;">Selecting <strong>"Department Director"</strong> or <strong>"Evaluator"</strong> will trigger a secure registration invitation to the staff member's formal email address.</p>
            </div>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2.5rem;">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">Complete Enrollment</button>
            <a href="{{ route('employees.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main); padding: 0.8rem 2rem;">Cancel</a>
        </div>
    </form>
</div>
@endsection
