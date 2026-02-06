@extends('layouts.app')

@section('title', 'Register Project')
@section('header_title', 'New Research Project')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Research Title</label>
            <input type="text" name="research_title" value="{{ old('research_title') }}" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
            @error('research_title')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Principal Investigator (PI)</label>
                <select name="pi_id" id="pi_id" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">Select Employee</option>
                    @foreach($employees as $emp)
                        <option value="{{ $emp->id }}" 
                                data-directorate="{{ $emp->directorate->name }}"
                                {{ old('pi_id') == $emp->id ? 'selected' : '' }}>
                            {{ $emp->full_name }}
                        </option>
                    @endforeach
                </select>
                @error('pi_id')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Directorate</label>
                <input type="text" id="directorate_display" readonly placeholder="Select PI first..." 
                       style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem; background: #f8fafc; color: #64748b;">
            </div>
        </div>

        <script>
            document.getElementById('pi_id').addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                const directorate = selected.getAttribute('data-directorate');
                document.getElementById('directorate_display').value = directorate || '';
            });

            // Trigger on load if there's an old value
            window.addEventListener('DOMContentLoaded', () => {
                const piSelect = document.getElementById('pi_id');
                if (piSelect.value) {
                    piSelect.dispatchEvent(new Event('change'));
                }
            });
        </script>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Objective</label>
            <textarea name="objective" rows="4" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">{{ old('objective') }}</textarea>
            @error('objective')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Start Year</label>
                <input type="number" name="start_year" value="{{ old('start_year', date('Y')) }}" required min="1900" max="2100" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('start_year')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">End Year</label>
                <input type="number" name="end_year" value="{{ old('end_year') }}" min="1900" max="2100" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('end_year')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
            <div>
                <label style="display: block; font-size: 0.8rem; font-weight: 700; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase;">Project Code</label>
                <input type="text" name="project_code" value="{{ old('project_code') }}" placeholder="e.g. BETin/SAD/..." style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-size: 1rem;">
                @error('project_code')<span style="color: #b91c1c; font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Register Project</button>
            <a href="{{ route('projects.index') }}" class="btn" style="background: #f1f5f9; color: var(--text-main);">Cancel</a>
        </div>
    </form>
</div>
@endsection
