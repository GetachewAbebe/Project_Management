<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Institutional Review Request</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #334155; margin: 0; padding: 0; background-color: #f8fafc; }
        .wrapper { max-width: 600px; margin: 40px auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; }
        .header { background: linear-gradient(135deg, #003B5C 0%, #002d4a 100%); color: white; padding: 40px 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 800; letter-spacing: -0.5px; }
        .content { padding: 40px 30px; }
        .greeting { font-size: 18px; font-weight: 700; color: #1e293b; margin-bottom: 20px; }
        .project-box { background: #f1f5f9; border-radius: 12px; padding: 20px; border-left: 4px solid #008B4B; margin: 20px 0; }
        .project-title { font-weight: 800; color: #1e293b; font-size: 16px; margin-bottom: 5px; }
        .project-meta { font-size: 14px; color: #64748b; font-weight: 600; }
        .cta-button { display: inline-block; background: #008B4B; color: white !important; padding: 16px 32px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 16px; margin: 30px 0; box-shadow: 0 10px 15px rgba(0, 139, 75, 0.2); }
        .footer { background: #f8fafc; padding: 30px; text-align: center; border-top: 1px solid #e2e8f0; font-size: 13px; color: #94a3b8; font-weight: 600; }
        .legal { margin-top: 15px; font-size: 11px; opacity: 0.8; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Bio & Emerging Technology Institute</h1>
            <div style="font-size: 14px; opacity: 0.8; margin-top: 8px; font-weight: 500;">Research Management System</div>
        </div>
        <div class="content">
            <div class="greeting">Dear {{ $assignment->evaluator->full_name }},</div>
            
            <p>You have been selected as an expert evaluator for the following institutional research project:</p>
            
            <div class="project-box">
                <div class="project-title">{{ $assignment->project->research_title }}</div>
                <div class="project-meta">Project Code: {{ $assignment->project->project_code ?? 'REG-'.$assignment->project->id }}</div>
            </div>

            <p>Please use the secure link below to access the evaluation form and provide your technical assessment. This link is unique and has been authorized for your use only.</p>

            <div style="text-align: center;">
                <a href="{{ $url }}" class="cta-button">Access Evaluation Form</a>
            </div>

            @if($assignment->expires_at)
                <p style="font-size: 14px; color: #e11d48; text-align: center; font-weight: 700;">
                    Note: This authorization link expires on {{ $assignment->expires_at->format('F d, Y') }}.
                </p>
            @endif

            <p style="margin-top: 40px;">Thank you for your scientific contribution to our institute.</p>
        </div>
        <div class="footer">
            <div>© {{ date('Y') }} Bio and Emerging Technology Institute</div>
            <div>Federal Democratic Republic of Ethiopia</div>
            <div class="legal">This is an automated institutional message. Please do not reply directly to this email.</div>
        </div>
    </div>
</body>
</html>
