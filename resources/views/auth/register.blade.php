<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Melanin Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            background-color: #f3f3f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .user-form {
            background: #fff !important;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 1px 2px 2px 0 rgba(0, 0, 0, .16);
            margin: 0 auto;
            max-width: 500px;
            padding: 40px;
            text-align: center;
        }

        .logo {
            font-size: 32px;
            font-weight: 700;
            color: #6b00b6;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .logo img {
            width: 24px;
        }

        h2 {
            margin: 20px 0;
            font-size: 20px;
        }

        .form-group {
            margin: 15px 0;
            text-align: left;
        }

        .form-group label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px 10px 36px;
            border: 1px solid #ccc;
            border-radius: 6px;
            position: relative;
            font-size: 14px;
        }

        .form-icon {
            position: relative;
        }

        .form-icon i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #888;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
        }

        .form-footer a {
            color: #6b00b6;
            text-decoration: none;
        }

        button.submit-btn {
            background: #6b00b6;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: 600;
            cursor: pointer;
        }

        .register {
            margin-top: 15px;
            font-size: 14px;
        }

        .register a {
            color: #6b00b6;
            font-weight: 500;
            text-decoration: none;
        }

        .divider {
            margin: 15px 0;
            color: #888;
            font-size: 13px;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .facebook {
            background: #3b5998;
            color: white;
        }

        .google {
            background: #f1f5ff;
            color: #333;
            border: 1px solid #ccc;
        }

        .social-btn img {
            width: 20px;
            margin-right: 10px;
        }

        .privacy {
            font-size: 12px;
            margin-top: 10px;
            color: #555;
        }

        .privacy a {
            color: #6b00b6;
            text-decoration: none;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #444;
        }

        @media (max-width: 480px) {
            .container {
                margin: 20px;
            }
        }

        .loginbtn {
            display: flex;
            gap: 8%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="user-form">
            <div class="logo">
                <img src="{{asset('assets/image/logo/logo.png')}}" alt="logo" style="width:26% !important">
                
            </div>
            <h2>Welcome to Melanin</h2>

            <form method="POST" action="{{ route('register') }}">
            @csrf
                <div class="form-group form-icon">
                    <label>Name</label>
                    <i class="fas fa-envelope"></i>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Your Name">
                </div>
                <div class="form-group form-icon">
                    <label>Email</label>
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address">
                </div>
                <div class="form-group form-icon">
                    <label>Password</label>
                    <i class="fas fa-envelope"></i>
                    <input  id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                </div>

                <div class="form-group form-icon">
                    <label> Confirm Password</label>
                    <i class="fas fa-lock"></i>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <button type="submit" class="submit-btn">Submit</button>

                <div class="register">
                    Do have an account?
                    <a href="{{route('login')}}">SingIn Now</a>
                </div>

                <div class="divider">OR</div>
                <div class="loginbtn">


                    <button class="social-btn facebook">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/facebook-new.png" alt=""> Login with facebook
                    </button>

                    <button class="social-btn google">
                        <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt=""> Login with google
                    </button>
                </div>
                <div class="privacy">
                    By continuing, you agree to the <a href="#">Privacy policy</a>.
                </div>

                <div class="footer">
                    © 2025 - All rights reserved by Melanin
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>