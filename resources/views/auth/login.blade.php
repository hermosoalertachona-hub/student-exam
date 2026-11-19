<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff1f5;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: #be5b83;
            color: white;
            padding: 20px 7%;
        }

        header h1 {
            margin: 0;
            font-size: 23px;
            letter-spacing: 1px;
        }

        header p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #ffe1eb;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            background: white;
            border: 1px solid #f0cbd9;
            border-radius: 8px;
            padding: 35px;
            box-shadow: 0 4px 15px rgba(190, 91, 131, 0.08);
        }

        .login-header {
            margin-bottom: 28px;
        }

        .login-header h2 {
            margin: 0 0 8px;
            font-size: 25px;
            color: #a83f6c;
        }

        .login-header p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #e5c3d1;
            border-radius: 5px;
            font-size: 14px;
            background: #fff;
        }

        input:focus {
            outline: none;
            border-color: #d66b96;
            box-shadow: 0 0 0 2px rgba(214, 107, 150, 0.12);
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: #d66b96;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        button:hover {
            background: #b94f7b;
        }

        .register-link {
            text-align: center;
            margin-top: 23px;
            font-size: 14px;
            color: #666;
        }

        .register-link a {
            color: #be5b83;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #fff0f0;
            border: 1px solid #f0caca;
            color: #a52a2a;
            padding: 10px 14px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 13px;
        }

        .error-message p {
            margin: 4px 0;
        }

        footer {
            text-align: center;
            padding: 18px;
            border-top: 1px solid #f0cbd9;
            color: #a83f6c;
            font-size: 12px;
        }

        @media (max-width: 500px) {
            header {
                text-align: center;
            }

            .login-container {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>STUDENT PORTAL</h1>
        <p>STUDENT REGISTRATION SYSTEM</p>
    </header>

    <main>

        <div class="login-container">

            <div class="login-header">
                <h2>Welcome Back!</h2>
                <p>Please enter your account details to continue.</p>
            </div>

            <div class="login-form">

                @if ($errors->any())
                    <div class="error-message">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter your email" required autocomplete="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required
                            autocomplete="current-password">
                    </div>

                    <button type="submit">Login</button>
                </form>

                <div class="register-link">
                    Don't have an account?
                    <a href="/register">Create an account</a>
                </div>

            </div>

        </div>

    </main>

    <footer>
        Student Registration System &copy; 2026
    </footer>

</body>

</html>