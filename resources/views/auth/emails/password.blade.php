<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e7f1ff;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        p {
            color: #34495e;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 15px 30px;
            margin: 20px 0;
            color: #ffffff;
            background-color: #3498db;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #2980b9;
        }
        footer {
            margin-top: 30px;
            font-size: 12px;
            color: #7f8c8d;
        }
        .divider {
            height: 2px;
            background-color: #3498db;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Reset Your Password</h2>
    <div class="divider"></div>
    <p>Hello, {{ $user->name }}</p>
    <p>We received a request to reset your password. Please click the button below to set a new password:</p>
    <a href="{{ route('password.reset', [ $user->remember_token]) }}" class="button">Reset Password</a>
    <p>If you did not request this, please ignore this email.</p>
    <footer>
        <p>Thank you for being part of our community!</p>
    </footer>
</div>
</body>
</html>
{{--<h3>Hi ,{{$user->name}}</h3>--}}
{{--<p>Click the link below to reset your password:</p>--}}
{{--<a href="{{ route('password.reset', [ $user->remember_token]) }}">Reset Password</a>--}}
