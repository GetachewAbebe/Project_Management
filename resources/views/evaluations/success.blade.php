@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: #f1f5f9; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem;">
    <div style="max-width: 600px; width: 100%; text-align: center;">
        <div style="background: white; border-radius: 32px; padding: 4rem 3rem; box-shadow: 0 30px 60px rgba(0,0,0,0.05); border: 1px solid #f1f5f9;">
            <div style="width: 100px; height: 100px; background: #ecfdf5; color: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2.5rem; box-shadow: 0 15px 30px rgba(16, 185, 129, 0.1);">
                <svg width="60" height="60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            
            <h1 style="font-size: 2.5rem; font-weight: 950; color: #1e293b; margin-bottom: 1rem; letter-spacing: -0.02em;">Submission Successful</h1>
            <p style="color: #64748b; font-weight: 600; font-size: 1.15rem; line-height: 1.6; margin-bottom: 3rem;">Thank you for your scientific expertise. Your evaluation has been securely recorded in the Institutional Registry.</p>
            
            <div style="background: #f8fafc; border-radius: 16px; padding: 1.5rem; display: flex; align-items: center; justify-content: center; gap: 1rem; color: #475569; font-weight: 800; font-size: 0.9rem;">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                Session Secured & Encrypted
            </div>
        </div>
        
        <div style="margin-top: 3rem;">
             <p style="color: #94a3b8; font-size: 0.85rem; font-weight: 700;">© {{ date('Y') }} Bio and Emerging Technology Institute</p>
        </div>
    </div>
</div>
@endsection
