@extends('layouts.app')

@section('title', 'Update Staff Profile')
@section('header_title', 'Update Staff Records')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto; border-top: 5px solid var(--primary-navy);">
    <div style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: flex-start;">
        <div>
            <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--primary-navy);">Refine Staff Profile</h3>
            <p style="font-size: 0.85rem; color: var(--text-muted);">Ensure all institutional credentials are current and accurate.</p>
        </div>
        @if($employee->user)
            <div style="background: #f0fdf4; color: #166534; font-size: 0.7rem; padding: 0.25rem 0.75rem; border-radius: 20px; font-weight: 700; border: 1px solid #bbf7d0;">
                System Account Active
            </div>
        @endif
    </div>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name', $employee->full_name) }}" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('full_name')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Professional Email</label>
                <input type="email" name="email" value="{{ old('email', $employee->email) }}" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('email')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Institutional ID</label>
                <input type="text" name="institutional_id" value="{{ old('institutional_id', $employee->institutional_id) }}" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('institutional_id')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Position / Title</label>
                <input type="text" name="position" value="{{ old('position', $employee->position) }}" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('position')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Assigned Directorate</label>
            <select name="directorate_id" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: white;">
                @foreach($directorates as $dir)
                    <option value="{{ $dir->id }}" {{ old('directorate_id', $employee->directorate_id) == $dir->id ? 'selected' : '' }}>{{ $dir->name }}</option>
                @endforeach
            </select>
            @error('directorate_id')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">System Access Level</label>
            <select name="system_role" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: white;">
                <option value="employee" {{ (old('system_role', $employee->system_role) == 'employee') ? 'selected' : '' }}>Registry Only (No Login)</option>
                <option value="director" {{ (old('system_role', $employee->system_role) == 'director') ? 'selected' : '' }}>Department Director (Management Access)</option>
            </select>
            @error('system_role')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="background: #f8fafc; border-radius: 12px; padding: 1.25rem; margin-top: 2rem; border: 1px solid var(--border-color); display: flex; gap: 1rem; align-items: flex-start;">
            <div style="color: var(--primary-navy);">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
            </div>
            <div>
                <div style="font-weight: 700; color: var(--primary-navy); font-size: 0.9rem;">Identity Sync Protocol</div>
                <p style="font-size: 0.8rem; color: var(--text-muted); line-height: 1.4; margin-top: 0.25rem;">Granting <strong>"Department Director"</strong> access will trigger a secure registration invitation if the staff member does not yet have an active system account.</p>
            </div>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2.5rem;">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">Save Changes</button>
            <a href="{{ route('employees.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main); padding: 0.8rem 2rem;">Cancel</a>
        </div>
    </form>
</div>
@endsection
