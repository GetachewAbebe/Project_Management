@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: #f8fafc; min-height: 92vh; padding: 2rem;">
    <div class="max-w-4xl mx-auto">
        <div class="card-header-flex" style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1 style="font-size: 2rem; font-weight: 950; color: #1e293b; letter-spacing: -0.025em;">Generate Evaluation Link</h1>
                <p style="color: #64748b; font-weight: 600;">Assign expert evaluators to institutional projects.</p>
            </div>
            <a href="{{ route('evaluation-assignments.index') }}" class="btn-secondary-shared" style="text-decoration: none; padding: 0.75rem 1.5rem; background: white; border: 1px solid #e2e8f0; border-radius: 10px; color: #475569; font-weight: 700; display: flex; align-items: center; gap: 0.5rem;">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Links
            </a>
        </div>

        <div class="premium-card-shared" style="background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.04); border: 1px solid #f1f5f9; padding: 2.5rem;">
            <form action="{{ route('evaluation-assignments.store') }}" method="POST">
                @csrf
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <!-- Project Selection -->
                    <div>
                        <label style="display: block; font-weight: 800; color: #334155; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Target Project</label>
                        <select name="project_id" class="form-input-shared" required style="width: 100%; padding: 1rem; border-radius: 12px; border: 2px solid #f1f5f9; background: #f8fafc; font-weight: 600; font-size: 1rem; color: #1e293b; appearance: none;">
                            <option value="">Select a project...</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ (isset($selected_project_id) && $selected_project_id == $project->id) ? 'selected' : '' }}>{{ $project->research_title }}</option>
                            @endforeach
                        </select>
                        @error('project_id') <p style="color: #ef4444; font-size: 0.8rem; margin-top: 0.5rem; font-weight: 600;">{{ $message }}</p> @enderror
                    </div>

                    <!-- Evaluator Selection -->
                    <div>
                        <label style="display: block; font-weight: 800; color: #334155; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Expert Evaluator</label>
                        <select name="evaluator_id" class="form-input-shared" required style="width: 100%; padding: 1rem; border-radius: 12px; border: 2px solid #f1f5f9; background: #f8fafc; font-weight: 600; font-size: 1rem; color: #1e293b; appearance: none;">
                            <option value="">Select an expert...</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->full_name }} — {{ $employee->email }} ({{ $employee->directorate->name ?? 'N/A' }})</option>
                            @endforeach
                        </select>
                        @error('evaluator_id') <p style="color: #ef4444; font-size: 0.8rem; margin-top: 0.5rem; font-weight: 600;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div style="margin-bottom: 2.5rem;">
                    <label style="display: block; font-weight: 800; color: #334155; margin-bottom: 0.75rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;">Expiration Date (Optional)</label>
                    <input type="date" name="expires_at" class="form-input-shared" style="width: 48%; padding: 1rem; border-radius: 12px; border: 2px solid #f1f5f9; background: #f8fafc; font-weight: 600; font-size: 1rem; color: #1e293b;">
                    <p style="color: #64748b; font-size: 0.8rem; margin-top: 0.75rem; font-weight: 600;">The link will be invalid after this date.</p>
                </div>

                <button type="submit" class="btn-primary-shared" style="width: 100%; background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; padding: 1.25rem; border-radius: 15px; font-weight: 900; font-size: 1.1rem; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 0.75rem; box-shadow: 0 10px 25px rgba(99, 102, 241, 0.25);">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    Generate & Authorize Evaluation Link
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    .form-input-shared:focus {
        outline: none;
        border-color: #6366f1 !important;
        background: white !important;
    }
</style>
@endsection
