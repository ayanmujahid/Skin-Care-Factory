<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Professional Registration Received</title>
</head>

<body style="background:#fbf5ec; padding:40px; font-family:Arial; color:#000;">

    <div style="max-width:600px; margin:auto; background:#fff; padding:30px; border-radius:6px;">

        <h2 style="margin-top:0;">Thank You for Registering</h2>

        <p>Hello {{ $user->name }},</p>

        <p>
            Thank you for signing up as a professional on our platform.
        </p>

        <p>
            Your account has been successfully submitted and is currently <strong>pending approval</strong> from our
            admin team.
        </p>

        <p>
            Once your professional credentials are verified, you will receive another email confirming your account
            activation.
        </p>

        <br>

        <p>We appreciate your patience.</p>

        <p>Best Regards,<br>
            Website Team</p>

    </div>

</body>

</html>
