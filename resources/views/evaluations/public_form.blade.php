@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: #f1f5f9; min-height: 100vh; padding: 2rem 0;">
    <div style="max-width: 1000px; margin: 0 auto; padding: 0 1rem;">
        
        <!-- Private Access Flag -->
        <div style="background: #eef2ff; border-radius: 12px; padding: 1rem 1.5rem; margin-bottom: 2rem; border: 1px solid #c7d2fe; display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 10px; height: 10px; background: #6366f1; border-radius: 50%;"></div>
                <span style="font-weight: 800; color: #4338ca; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Authorized Expert Review Channel</span>
            </div>
            <div style="font-size: 0.75rem; color: #6366f1; font-weight: 700;">Secure Token Access Verified</div>
        </div>

        <!-- Premium Header Area -->
        <div class="premium-header-shared" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); padding: 3rem; border-radius: 24px; color: white; margin-bottom: 2rem; position: relative; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.15);">
            <div style="position: relative; z-index: 2;">
                <h1 style="font-size: 2.25rem; font-weight: 950; margin-bottom: 1rem; letter-spacing: -0.02em; line-height: 1.1;">{{ $project->research_title }}</h1>
                <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.1); padding: 0.5rem 1rem; border-radius: 100px; font-weight: 700; font-size: 0.9rem; border: 1px solid rgba(255,255,255,0.1);">
                        <span style="color: #94a3b8;">Ref:</span> {{ $project->project_code ?? 'INST-REQ-'.$project->id }}
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.1); padding: 0.5rem 1rem; border-radius: 100px; font-weight: 700; font-size: 0.9rem; border: 1px solid rgba(255,255,255,0.1);">
                        <span style="color: #94a3b8;">PI:</span> {{ $project->pi->full_name }}
                    </div>
                </div>
            </div>
            <!-- Decorative Elements -->
            <div style="position: absolute; right: -50px; top: -50px; width: 200px; height: 200px; background: rgba(99, 102, 241, 0.1); border-radius: 50%; blur: 80px;"></div>
        </div>

        <!-- Main Form Wrapper -->
        <div style="background: white; border-radius: 24px; padding: 2.5rem; box-shadow: 0 4px 30px rgba(0,0,0,0.03); border: 1px solid #f1f5f9;">
            <form action="{{ route('evaluate.public.submit', $assignment->token) }}" method="POST">
                @csrf
                
                <!-- Evaluator Info Card -->
                <div style="background: #f8fafc; border-radius: 16px; padding: 1.5rem; border: 1px solid #e2e8f0; margin-bottom: 2.5rem; display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 1.25rem;">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: 950; font-size: 1.25rem; box-shadow: 0 8px 15px rgba(99, 102, 241, 0.2);">
                            {{ substr($employee->full_name, 0, 1) }}
                        </div>
                        <div>
                            <div style="color: #94a3b8; font-weight: 800; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.2rem;">Expert Evaluator</div>
                            <div style="font-weight: 850; color: #1e293b; font-size: 1.15rem;">{{ $employee->full_name }}</div>
                        </div>
                    </div>
                </div>

                <!-- Scoring Section -->
                <div style="margin-bottom: 3rem;">
                    <h3 style="font-size: 1.2rem; font-weight: 900; color: #1e293b; margin-bottom: 2rem; display: flex; align-items: center; gap: 0.75rem;">
                        <span style="width: 32px; height: 2px; background: #6366f1;"></span>
                        Technical Metrics & Assessment
                    </h3>

                    @php
                        $metrics = [
                            'thematic_area_mark' => 'Thematic Integrity',
                            'relevance_mark' => 'Scientific Relevance',
                            'methodology_mark' => 'Methodological Excellence',
                            'feasibility_mark' => 'Operational Feasibility',
                            'overall_proposal_mark' => 'Strategic Alignment'
                        ];
                    @endphp

                    @foreach($metrics as $name => $label)
                    <div style="margin-bottom: 2.5rem; padding-bottom: 2rem; border-bottom: 1px dashed #f1f5f9;">
                        <label style="display: block; font-weight: 800; color: #334155; margin-bottom: 1rem; font-size: 1.05rem;">{{ $label }}</label>
                        <div style="display: flex; gap: 1rem;">
                            @for($i = 1; $i <= 5; $i++)
                            <label style="flex: 1; border: 2px solid #f1f5f9; border-radius: 14px; padding: 1.25rem; text-align: center; cursor: pointer; transition: all 0.2s ease; position: relative;" class="rating-box">
                                <input type="radio" name="{{ $name }}" value="{{ $i }}" required style="display: none;">
                                <div style="font-weight: 950; font-size: 1.5rem; color: #1e293b;">{{ $i }}</div>
                                <div style="font-size: 0.65rem; font-weight: 800; color: #94a3b8; text-transform: uppercase;">
                                    @if($i == 1) Poor @elseif($i == 3) Adequate @elseif($i == 5) Excellent @endif
                                </div>
                            </label>
                            @endfor
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Qualitative Feedback -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="font-size: 1.2rem; font-weight: 900; color: #1e293b; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
                        <span style="width: 32px; height: 2px; background: #6366f1;"></span>
                        Qualitative Assessment & Remarks
                    </h3>
                    <textarea name="comments" rows="6" placeholder="Provide detailed scientific critique, suggestions, or concerns regarding this project..." style="width: 100%; border-radius: 16px; border: 2px solid #f1f5f9; padding: 1.5rem; font-family: 'Outfit', sans-serif; font-size: 1rem; font-weight: 500; color: #1e293b; line-height: 1.6; resize: none;"></textarea>
                </div>

                <div style="background: #f8fafc; border-radius: 16px; padding: 2rem; text-align: center;">
                    <p style="color: #64748b; font-weight: 600; font-size: 0.9rem; margin-bottom: 1.5rem;">By submitting this evaluation, you certify that this assessment is based on scientific merit and institutional standards.</p>
                    <button type="submit" style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 1.25rem 3rem; border-radius: 15px; font-weight: 950; font-size: 1.1rem; border: none; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 10px 25px rgba(16, 185, 129, 0.25);">
                        Authorize & Finalize Evaluation
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div style="text-align: center; margin-top: 3rem; padding-bottom: 4rem;">
            <p style="color: #94a3b8; font-size: 0.85rem; font-weight: 700;">© {{ date('Y') }} Bio and Emerging Technology Institute | Research Management System</p>
        </div>
    </div>
</div>

<style>
    .rating-box:hover {
        border-color: #cbd5e1 !important;
        background: #f8fafc;
    }
    input[type="radio"]:checked + div,
    input[type="radio"]:checked + div + div {
        color: white !important;
    }
    .rating-box:has(input:checked) {
        background: #1e293b !important;
        border-color: #1e293b !important;
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
    textarea:focus {
        outline: none;
        border-color: #6366f1 !important;
        background: #fcfdfe;
    }
</style>
@endsection
