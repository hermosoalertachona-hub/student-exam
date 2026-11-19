<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Register</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff1f5;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #be5b83;
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 23px;
            letter-spacing: 1px;
        }

        header p {
            margin: 0;
            font-size: 12px;
            letter-spacing: 1px;
            color: #ffe1eb;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .register-container {
            width: 100%;
            max-width: 500px;
            border: 1px solid #f0cbd9;
            border-radius: 8px;
            background-color: white;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(190, 91, 131, 0.08);
        }

        .register-header {
            background-color: #be5b83;
            color: white;
            padding: 25px 30px;
        }

        .register-header h2 {
            margin: 0 0 10px;
            font-size: 25px;
        }

        .register-header p {
            margin: 0;
            color: #ffe1eb;
            font-size: 14px;
        }

        .register-form {
            padding: 30px;
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
            background-color: white;
        }

        input:focus {
            outline: none;
            border-color: #d66b96;
            box-shadow: 0 0 0 2px rgba(214, 107, 150, 0.12);
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 5px;
            background-color: #d66b96;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        button:hover {
            background-color: #b94f7b;
        }

        .login-link {
            text-align: center;
            margin-top: 23px;
            font-size: 14px;
            color: #666;
        }

        .login-link a {
            color: #be5b83;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background-color: #fff0f0;
            border: 1px solid #f0caca;
            border-left: 4px solid #c62828;
            color: #a00000;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 13px;
        }

        .error-message p {
            margin: 4px 0;
        }

        footer {
            border-top: 1px solid #f0cbd9;
            padding: 18px;
            text-align: center;
            color: #a83f6c;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                gap: 8px;
                text-align: center;
            }

            .register-header h2 {
                font-size: 23px;
            }

            .register-form {
                padding: 22px;
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
        <div class="register-container">

            <div class="register-header">
                <h2>CREATE ACCOUNT</h2>
                <p>Register to access the Student Registration System.</p>
            </div>

            <div class="register-form">

                @if ($errors->any())
                    <div class="error-message">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="/register" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter your full name" required autocomplete="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter your email" required autocomplete="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="At least 8 characters"
                            required minlength="8" autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Re-enter your password" required minlength="8" autocomplete="new-password">
                    </div>

                    <button type="submit">CREATE ACCOUNT</button>
                </form>

                <div class="login-link">
                    Already have an account?
                    <a href="/login">Sign in here</a>
                </div>

            </div>
        </div>
    </main>

    <footer>
        STUDENT REGISTRATION SYSTEM · 2026
    </footer>

</body>

</html>