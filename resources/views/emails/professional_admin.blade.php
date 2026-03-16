<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Professional Registration</title>
</head>

<body style="background:#fbf5ec; padding:40px; font-family:Arial; color:#000;">

    <div style="max-width:600px; margin:auto; background:#fff; padding:30px; border-radius:6px;">

        <h2 style="margin-top:0;">New Professional Registration</h2>

        <p>A new professional has registered on the website.</p>

        <hr>

        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <p>Please login to the admin panel to review and approve this professional account.</p>

        <br>

        <p style="font-size:13px; color:#666;">
            This is an automated notification from your website.
        </p>

    </div>

</body>

</html>
