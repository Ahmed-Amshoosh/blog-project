<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
            text-align: center;
        }
        .container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        h1 {
            font-size: 80px;
            color: #e74c3c;
            margin-bottom: 20px;
        }
        p {
            font-size: 20px;
            color: #555;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #2980b9;
        }
        .author-section {
            margin-top: 30px;
            font-size: 16px;
            color: #333;
        }
        .author-section h2 {
            margin: 10px 0;
            font-size: 24px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>404</h1>
    <p>@lang('home.page_does_not_exist')</p>
    <a href="{{ url('/') }}">@lang('home.return_to_home')</a>


</div>
</body>
</html>
