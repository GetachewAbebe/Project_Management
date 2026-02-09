@extends('layouts.app')

@section('title', 'Register Project')
@section('header_title', 'Initiative Registration')

@section('content')
<div style="max-width: 900px; margin: 0 auto; animation: slideIn 0.4s ease-out;">
    <div style="margin-bottom: 2.5rem;">
        <h3 style="font-size: 1.5rem; font-weight: 900; color: #002d4a; letter-spacing: -0.01em;">Portfolio <span style="color: var(--primary-green);">Onboarding</span></h3>
        <p style="color: var(--text-muted); font-weight: 600; font-size: 0.9rem;">Register a new research project into the institutional database.</p>
    </div>

    <x-card>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            
            <x-form-group label="Research Initiative Title" name="research_title" required>
                <x-input name="research_title" :value="old('research_title')" required placeholder="Enter the full scientific title of the research..." />
            </x-form-group>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <x-form-group label="Principal Investigator (PI)" name="pi_id" required>
                    <select name="pi_id" id="pi_id" required class="form-input" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23002d4a%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.4-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 0.65rem; appearance: none;">
                        <option value="">Select Professional</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" 
                                    data-directorate="{{ $emp->directorate->name }}"
                                    {{ old('pi_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->full_name }}
                            </option>
                        @endforeach
                    </select>
                </x-form-group>

                <x-form-group label="Assigned Directorate" name="directorate_display">
                    <x-input id="directorate_display" disabled placeholder="Pending PI selection..." />
                </x-form-group>
            </div>

            <x-form-group label="Research Core Objectives" name="objective" required>
                <textarea name="objective" rows="5" required class="form-input" placeholder="Outline the primary goals and intended impact of this research...">{{ old('objective') }}</textarea>
            </x-form-group>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 2rem;">
                <x-form-group label="Schedule: Start Year" name="start_year" required>
                    <x-input type="number" name="start_year" :value="old('start_year', date('Y'))" required min="1900" max="2100" />
                </x-form-group>
                
                <x-form-group label="Schedule: End Year" name="end_year">
                    <x-input type="number" name="end_year" :value="old('end_year')" min="1900" max="2100" />
                </x-form-group>

                <x-form-group label="Institutional Reference" name="project_code">
                    <x-input name="project_code" :value="old('project_code')" placeholder="e.g. BETIn/SAD/24/001" />
                </x-form-group>
            </div>
            
            <div style="display: flex; gap: 1.5rem; margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #f1f5f9;">
                <button type="submit" class="btn-primary" style="padding: 1rem 2.5rem; font-size: 1rem;">
                    Confirm & Register Initiative
                </button>
                <a href="{{ route('projects.index') }}" class="btn-secondary" style="padding: 1rem 2rem; font-size: 1rem; text-decoration: none; display: flex; align-items: center; justify-content: center;">
                    Discard
                </a>
            </div>
        </form>
    </x-card>
</div>

<script>
    document.getElementById('pi_id').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const directorate = selected.getAttribute('data-directorate');
        document.getElementById('directorate_display').value = directorate || '';
    });

    window.addEventListener('DOMContentLoaded', () => {
        const piSelect = document.getElementById('pi_id');
        if (piSelect && piSelect.value) {
            piSelect.dispatchEvent(new Event('change'));
        }
    });
</script>
@endsection
