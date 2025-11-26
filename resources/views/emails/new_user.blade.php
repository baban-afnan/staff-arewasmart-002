<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Arewa Smart</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            color: #333333;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .header {
            background-color: #0d6efd;
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .content {
            padding: 40px;
        }
        .welcome-text {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        .credentials-box {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 30px;
        }
        .credential-item {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .credential-label {
            font-weight: 600;
            color: #6c757d;
            display: inline-block;
            width: 80px;
        }
        .credential-value {
            font-family: monospace;
            font-weight: bold;
            color: #212529;
            font-size: 18px;
        }
        .btn {
            display: block;
            width: 100%;
            background-color: #0d6efd;
            color: #ffffff;
            text-align: center;
            padding: 15px 0;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            margin-top: 30px;
        }
        .btn:hover {
            background-color: #0b5ed7;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #6c757d;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Arewa Smart</h1>
        </div>
        <div class="content">
            <p class="welcome-text">Hello <strong>{{ $user->first_name }}</strong>,</p>
            <p style="color: #555; line-height: 1.6;">
                Your account has been successfully created. We are excited to have you on board! Below are your login credentials to get started.
            </p>
            
            <div class="credentials-box">
                <div class="credential-item">
                    <span class="credential-label">Email:</span>
                    <span class="credential-value">{{ $user->email }}</span>
                </div>
                <div class="credential-item" style="margin-bottom: 0;">
                    <span class="credential-label">Password:</span>
                    <span class="credential-value">{{ $password }}</span>
                </div>
            </div>

            <p style="font-size: 14px; color: #dc3545; margin-bottom: 30px;">
                <strong style="color: #dc3545;">Important:</strong> For security reasons, please change your password immediately after your first login.
            </p>

            <a href="{{ route('login') }}" class="btn">Login to Your Account</a>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Arewa Smart. All rights reserved.<br>
            If you did not request this account, please contact support immediately.
        </div>
    </div>
</body>
</html>
