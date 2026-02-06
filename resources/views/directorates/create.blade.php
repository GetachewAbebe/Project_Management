@extends('layouts.app')

@section('title', 'Register Directorate')
@section('header_title', 'New Directorate')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('directorates.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Directorate Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;" placeholder="e.g. CSIS Directorate">
            @error('name')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Save Directorate</button>
            <a href="{{ route('directorates.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main);">Cancel</a>
        </div>
    </form>
</div>
@endsection
