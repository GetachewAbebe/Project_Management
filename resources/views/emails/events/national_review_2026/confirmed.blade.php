<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmed</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #001f31; margin: 0; padding: 0; line-height: 1.6; }
        .wrapper { width: 100%; padding: 40px 0; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.05); }
        .header { background: #001f31; padding: 40px; text-align: center; color: #ffffff; }
        .logo { margin-bottom: 20px; font-weight: 900; font-size: 24px; letter-spacing: -1px; }
        .status-badge { display: inline-block; background: #00a36c; color: white; padding: 6px 16px; border-radius: 100px; font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 20px; }
        .content { padding: 50px 40px; }
        .title { font-size: 28px; font-weight: 900; line-height: 1.2; margin-bottom: 20px; color: #001f31; }
        .text { font-size: 16px; color: #64748b; margin-bottom: 30px; }
        .reference-box { background: #f1f5f9; padding: 25px; border-radius: 16px; text-align: center; margin-bottom: 40px; }
        .reference-label { font-size: 11px; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 8px; }
        .reference-code { font-size: 32px; font-weight: 950; color: #00a36c; letter-spacing: 2px; }
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 40px; }
        .details-table td { padding: 12px 0; border-bottom: 1px solid #f1f5f9; font-size: 14px; }
        .label { font-weight: 800; color: #94a3b8; text-transform: uppercase; font-size: 10px; letter-spacing: 1px; }
        .value { text-align: right; font-weight: 700; color: #001f31; }
        .footer { background: #f8fafc; padding: 40px; text-align: center; font-size: 12px; color: #94a3b8; }
        .button { display: inline-block; background: #001f31; color: #ffffff; padding: 18px 35px; border-radius: 12px; text-decoration: none; font-weight: 800; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; transition: all 0.3s; }
        .button:hover { background: #00a36c; }
        .update-box { border: 2px dashed #e2e8f0; padding: 30px; border-radius: 20px; text-align: center; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <div class="logo">BETin <span style="color: #00a36c;">Annual Review</span></div>
                <div class="status-badge">Official Confirmation</div>
            </div>
            
            <div class="content">
                <h1 class="title">Registration Confirmed</h1>
                <p class="text">Dear {{ $registration->full_name }},<br><br>Your registration for the 8<sup>th</sup> Annual Review has been successfully processed. We are excited to have you join our premier scientific event.</p>
                
                
                
                <table class="details-table">
                    <tr>
                        <td class="label">Event</td>
                        <td class="value">8<sup>th</sup> Annual Review 2026</td>
                    </tr>
                    <tr>
                        <td class="label">Duration</td>
                        <td class="value">March 11 – 13, 2026</td>
                    </tr>
                    <tr>
                        <td class="label">Organizer</td>
                        <td class="value">BETin</td>
                    </tr>
                    <tr>
                        <td class="label">Venue</td>
                        <td class="value">Addis Ababa, Ethiopia</td>
                    </tr>
                </table>

                <div class="update-box">
                    <p style="font-size: 14px; font-weight: 700; color: #001f31; margin-bottom: 15px;">You can Edit your application at any time!</p>
                    <p style="font-size: 12px; color: #64748b; margin-bottom: 25px;">We understand you may need to refine your research data or upload documents later. Use the secure link below to access your personal portal and **update your submission** (including Institutional Support Letter and PPT) before the event deadline.</p>
                    <a href="{{ route('event.registration.edit', $registration->reference_code) }}" class="button">Access Update Portal</a>
                </div>
            </div>
            
            <div class="footer">
                &copy; {{ date('Y') }} Bio and Emerging Technology Institute (BETin).<br>
                Empowering Innovation through Biotechnology.
            </div>
        </div>
    </div>
</body>
</html>
