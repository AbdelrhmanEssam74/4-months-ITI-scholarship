<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 | Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .error-container {
            text-align: center;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 700;
            color: #dc3545;
            animation: pop 0.8s ease-in-out;
        }

        .error-message {
            font-size: 1.5rem;
            color: #6c757d;
        }

        .btn-home {
            margin-top: 20px;
        }

        @keyframes pop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<div class="error-container">
    <div class="error-code">404</div>
    <div class="error-message">Oops! The page you're looking for doesn't exist.</div>
    <a href="{{ url('/') }}" class="btn btn-outline-primary btn-home">Go to Homepage</a>
</div>
</body>
</html>
