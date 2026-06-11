<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Institutional Access Invitation — BETin PMS</title>
</head>
<body style="margin:0;padding:0;background-color:#f0f4f8;font-family:'Segoe UI',Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0f4f8;padding:40px 16px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

                    {{-- Header --}}
                    <tr>
                        <td style="background:linear-gradient(135deg,#001828 0%,#002540 60%,#003356 100%);border-radius:16px 16px 0 0;padding:36px 40px 28px;text-align:center;position:relative;">
                            <div style="display:inline-block;background:rgba(0,212,122,0.12);border:1px solid rgba(0,212,122,0.3);border-radius:8px;padding:4px 14px;margin-bottom:16px;">
                                <span style="font-size:11px;font-weight:700;color:#00d47a;text-transform:uppercase;letter-spacing:2px;">Secure Invitation</span>
                            </div>
                            <div style="font-size:26px;font-weight:900;color:#ffffff;letter-spacing:-0.5px;line-height:1.2;margin-bottom:6px;">
                                BETin <span style="color:#00d47a;">PMS</span>
                            </div>
                            <div style="font-size:12px;font-weight:600;color:rgba(255,255,255,0.45);letter-spacing:1.5px;text-transform:uppercase;">
                                Bio &amp; Emerging Technology Institute
                            </div>
                            <div style="margin-top:20px;width:48px;height:2px;background:linear-gradient(90deg,transparent,#00d47a,transparent);margin-left:auto;margin-right:auto;"></div>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="background:#ffffff;padding:40px 40px 32px;">

                            <p style="font-size:15px;font-weight:700;color:#001828;margin:0 0 6px;">Dear <span style="color:#00564a;">{{ $invitation->employee->full_name }}</span>,</p>

                            <p style="font-size:14px;color:#475569;line-height:1.7;margin:16px 0;">
                                As part of our commitment to institutional research excellence and digital governance,
                                you have been enrolled as a <strong style="color:#001828;">Director</strong> in the
                                <strong style="color:#001828;">BETin Project Management System</strong>.
                            </p>

                            <p style="font-size:14px;color:#475569;line-height:1.7;margin:0 0 28px;">
                                To manage your directorate's research portfolio and projects, please complete your
                                secure account registration by establishing your private institutional password.
                            </p>

                            {{-- CTA Button --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding-bottom:32px;">
                                        <a href="{{ route('register.invited', ['token' => $invitation->token]) }}"
                                           style="display:inline-block;background:linear-gradient(135deg,#00c96e,#008B4B);color:#ffffff;font-size:15px;font-weight:800;text-decoration:none;padding:14px 36px;border-radius:10px;letter-spacing:0.3px;box-shadow:0 4px 16px rgba(0,139,75,0.4);">
                                            Establish Secure Credentials
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            {{-- Notice box --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background:#fffbeb;border:1px solid #fcd34d;border-left:4px solid #f59e0b;border-radius:8px;padding:14px 18px;">
                                        <p style="margin:0;font-size:13px;color:#92400e;line-height:1.6;">
                                            <strong>⚠ Important:</strong> This registration link is unique to you and will expire in
                                            <strong>48 hours</strong>. Please keep your credentials confidential.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size:13px;color:#94a3b8;margin:24px 0 0;line-height:1.6;">
                                If you did not expect this invitation, please contact the CSIS Department immediately.
                            </p>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background:#f8fafc;border-top:1px solid #e2e8f0;border-radius:0 0 16px 16px;padding:24px 40px;text-align:center;">
                            <p style="margin:0 0 4px;font-size:13px;font-weight:700;color:#334155;">Institutional Regards</p>
                            <p style="margin:0 0 4px;font-size:13px;font-weight:800;color:#001828;">The CSIS Team</p>
                            <p style="margin:0;font-size:12px;color:#94a3b8;letter-spacing:0.5px;">BETin Project Management System &nbsp;·&nbsp; betin.gov.et</p>
                            <div style="margin-top:16px;width:40px;height:2px;background:linear-gradient(90deg,#008B4B,#00d47a);margin-left:auto;margin-right:auto;border-radius:2px;"></div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
