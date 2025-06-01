<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Redirect</title>
</head>
<body>
    <h1>Welcome Admin!</h1>
    <p>Click the button below to go to the admin dashboard.</p>

    <a href="{{ url('/admin') }}">
        <button style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">Go to Admin Panel</button>
    </a>
</body>
</html>
