
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table style="width: 100%; max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; border-collapse: collapse;">
        <tr>
            <td style="padding: 20px; background-color: #FFCB08; text-align: center;">
                <h1>Mail OTP for Reset Password</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; background-color: #ffffff;">
                <p>Dear {{ $user->name }}</p>
                <p>{{$otp}} is your OTP to verify your email for account password changes.</p>
                <p>OTP valid for 5 mins</p>
                <p>never share the OTP.</p>

            </td>
        </tr>
        <tr>
            <td style="padding: 20px; background-color: #FFCB08; text-align: center;">
                <p>&copy; SFL CC SUPPORT APP. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
