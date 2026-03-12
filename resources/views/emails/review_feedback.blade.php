<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Confirmation</title>
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #f8fafc; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f8fafc; padding: 40px 0; }
        .main { background-color: #ffffff; width: 100%; max-width: 600px; margin: 0 auto; border-radius: 24px; box-shadow: 0 20px 50px rgba(0,0,0,0.05); overflow: hidden; }
        
        /* Header Section */
        .header { background: linear-gradient(135deg, #003B5C 0%, #002d4a 100%); padding: 60px 40px; text-align: center; position: relative; }
        .logo-box { background: #ffffff; width: 120px; height: 120px; border-radius: 30px; margin: 0 auto 30px; display: flex; align-items: center; justify-content: center; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
        .badge-live { display: inline-block; background: rgba(16, 185, 129, 0.2); color: #10b981; padding: 6px 14px; border-radius: 12px; font-size: 11px; font-weight: 900; letter-spacing: 0.1em; text-transform: uppercase; border: 1px solid rgba(16, 185, 129, 0.3); }
        
        /* Content Section */
        .content { padding: 50px 40px; color: #1e293b; line-height: 1.6; }
        .title { font-size: 28px; font-weight: 800; color: #003B5C; margin-bottom: 15px; letter-spacing: -0.02em; }
        .intro { font-size: 16px; color: #64748b; margin-bottom: 40px; }
        
        /* Rating Card */
        .rating-grid { background: #f1f5f9; border-radius: 20px; padding: 30px; margin-bottom: 40px; border: 1px solid #e2e8f0; }
        .rating-item { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px dashed #cbd5e1; }
        .rating-item:last-child { margin-bottom: 0; padding-bottom: 0; border: none; }
        .rating-label { font-size: 13px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; }
        .rating-value { font-size: 16px; font-weight: 800; color: #00a36c; }
        
        /* Comments Box */
        .comments-label { font-size: 13px; font-weight: 900; color: #003B5C; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 10px; display: block; }
        .comments-box { background: #ffffff; border-left: 5px solid #00a36c; padding: 20px; border-radius: 0 16px 16px 0; color: #1e293b; font-style: italic; box-shadow: 0 4px 12px rgba(0,0,0,0.03); margin-bottom: 40px; }
        
        /* Button */
        .btn { display: inline-block; background: linear-gradient(135deg, #00a36c 0%, #059669 100%); color: #ffffff !important; padding: 18px 36px; border-radius: 16px; text-decoration: none; font-weight: 800; font-size: 15px; box-shadow: 0 10px 25px rgba(0, 163, 108, 0.3); transition: transform 0.3s ease; }
        
        /* Footer */
        .footer { background: #f8fafc; padding: 40px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer-logo { opacity: 0.5; margin-bottom: 20px; }
        .footer-text { font-size: 12px; color: #94a3b8; line-height: 1.8; }
        .motto { color: #00a36c; font-weight: 800; font-size: 13px; margin-top: 10px; text-transform: uppercase; letter-spacing: 0.05em; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main">
            <!-- Header -->
            <div class="header">
                <div class="logo-box">
                    <img src="{{ config('app.url') }}/logo.png" alt="BETin Logo" style="width: 80px; height: auto;">
                </div>
                <div class="badge-live">Scientific Contribution Logged</div>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="title">Recognition for Your Insight</div>
                <p class="intro">
                    Dear <strong>{{ $feedback['full_name'] }}</strong>,<br><br>
                    Your technical perspective on the 8th National Research Review has been officially synthesized. At BETin, we believe scientific excellence is a collaborative evolution.
                </p>

                <div class="rating-grid">
                    <div class="rating-item">
                        <span class="rating-label">Overall Event Rating</span>
                        <span class="rating-value">{{ $feedback['event_rating'] }}/5</span>
                    </div>
                    <div class="rating-item">
                        <span class="rating-label">Technical Discourse Scope</span>
                        <span class="rating-value">{{ $feedback['technical_rating'] }}/5</span>
                    </div>
                    <div class="rating-item">
                        <span class="rating-label">Operational Logistics</span>
                        <span class="rating-value">{{ $feedback['logistics_rating'] }}/5</span>
                    </div>
                </div>

                <div class="comments-label">Your Narrative Contribution</div>
                <div class="comments-box">
                    "{{ $feedback['comments'] ?? 'No additional remarks were provided in this entry.' }}"
                </div>

                <p style="text-align: center; margin-bottom: 20px;">
                    <a href="{{ config('app.url') }}/national-review-2026" class="btn">Explore Review Hub</a>
                </p>

                @if($feedback['future_attendance'] == 'Yes')
                <p style="text-align: center; font-size: 14px; color: #64748b; font-weight: 600;">
                    We look forward to your presence at the 9th National Research Review.
                </p>
                @endif
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="footer-text">
                    <strong>Bio and Emerging Technology Institute (BETIn)</strong><br>
                    © {{ date('Y') }} Project Management System. All Rights Reserved.<br>
                    Transforming biological and emerging technology landscapes in Ethiopia.
                    <div class="motto">Transforming Ideas into Impacts</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
