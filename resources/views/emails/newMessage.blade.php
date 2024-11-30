<!DOCTYPE html>
<html>
<head>
    <title>New Message Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        h1 {
            color: #333333;
        }
        p {
            color: #555555;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>You have received a new message</h1>
        <p>{{ $message->content }}</p>
        <p>From: {{ $message->user->name }}</p>
    </div>
</body>
</html>