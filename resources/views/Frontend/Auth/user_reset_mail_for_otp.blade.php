<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <h1>{{ $data['title'] }}</h1>
    <p>{{ $data['body'] }}</p>
    <h2>Your OTP Code: {{ $data['token'] }}</h2>
    <p>If you did not request this, please ignore this email.</p>
</body>
</html>
