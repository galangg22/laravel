<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f7f9; font-family: 'Poppins', 'Helvetica Neue', Arial, sans-serif;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 30px auto;">
        <!-- HEADER -->
        <tr>
            <td align="center" bgcolor="#5b21b6" style="padding: 40px 0; border-radius: 12px 12px 0 0; background: linear-gradient(135deg, #6d28d9, #5b21b6);">
                <img src="https://cdn-icons-png.flaticon.com/512/893/893257.png" alt="Email Verification Icon" width="90" height="90" style="display: block; margin-bottom: 10px; filter: drop-shadow(0 3px 6px rgba(0,0,0,0.3));">
                <h1 style="margin: 0; color: white; font-size: 30px; font-weight: 700; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">Welcome Aboard!</h1>
            </td>
        </tr>

        <!-- CONTENT -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 35px 30px; border-radius: 0 0 12px 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <h2 style="margin: 0; color: #2d3748; font-size: 24px; font-weight: 600;">Hi {{ $user->name }},</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 25px; color: #4a5568; line-height: 1.7; font-size: 16px;">
                            <p style="margin: 0 0 10px 0;">Thank you for joining our community! We're thrilled to have you with us.</p>
                            <p style="margin: 0;">To activate your account and start exploring, please verify your email address by clicking the button below:</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px 0 30px 0;">
                            <a href="{{ $url }}" style="display: inline-block; padding: 16px 35px; background-color: #6d28d9; background: linear-gradient(135deg, #6d28d9, #5b21b6); color: white; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 16px; box-shadow: 0 4px 12px rgba(107, 33, 217, 0.4); transition: transform 0.2s ease, box-shadow 0.2s ease;">Verify Email Now</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px; color: #4a5568; line-height: 1.7; font-size: 15px;">
                            <p style="margin: 0 0 8px 0;">If the button doesn't work, you can copy and paste this link into your browser:</p>
                            <p style="margin: 0; word-break: break-all; color: #6d28d9; font-size: 14px;">{{ $url }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f8fafc; padding: 18px; border-radius: 8px; border-left: 5px solid #6d28d9; margin-bottom: 20px;">
                            <p style="margin: 0; color: #4a5568; font-size: 14px; line-height: 1.5;">
                                <strong>Important:</strong> This verification link is valid for 24 hours. Please verify your email within this time frame to secure your account.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- FOOTER -->
        <tr>
            <td align="center" style="padding: 25px 0;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" style="padding-bottom: 15px; color: #718096; font-size: 14px; line-height: 1.6;">
                            <p style="margin: 0;">Didn't sign up? No worries, you can safely ignore this email.</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-bottom: 20px;">
                            <a href="#" style="display: inline-block; width: 40px; height: 40px; margin: 0 8px; background-color: #3b82f6; border-radius: 50%; text-align: center; line-height: 40px; color: white; text-decoration: none; font-size: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">f</a>
                            <a href="#" style="display: inline-block; width: 40px; height: 40px; margin: 0 8px; background-color: #1da1f2; border-radius: 50%; text-align: center; line-height: 40px; color: white; text-decoration: none; font-size: 20px;">t</a>
                            <a href="#" style="display: inline-block; width: 40px; height: 40px; margin: 0 8px; background-color: #e1306c; border-radius: 50%; text-align: center; line-height: 40px; color: white; text-decoration: none; font-size: 20px;">i</a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="color: #a0aec0; font-size: 13px; line-height: 1.5;">
                            <p style="margin: 0;">&copy; 2023 Your Brand. All Rights Reserved.</p>
                            <p style="margin: 5px 0 0;">Crafted with <span style="color: #e53e3e;">♥</span> in Our City</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>


