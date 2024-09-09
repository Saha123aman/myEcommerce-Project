<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">


    <title>Customer Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            background: url('/images/login-background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        .login-box img {
            max-width: 100px;
            margin-bottom: 20px;
        }
        .login-box h2 {
            margin-bottom: 10px;
            color: #007bff;
            font-weight: 500;
        }
        .login-box p {
            margin-bottom: 20px;
            font-size: 0.9em;
            color: #666;
        }
        .login-box input[type="email"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .login-box button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-box button:hover {
            background-color: #0056b3;
        }
        .login-box .footer {
            margin-top: 20px;
        }
        .login-box .footer p {
            margin: 10px 0;
            font-size: 0.8em;
        }
        .login-box .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .login-box .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    {{-- @include('layouts.navbar') --}}

    
    <div class="login-container">
{{--       
         @if(Session::has('error'))
     <div class="alert-danger">{{ Session::get('error') }}</div>
         @endif --}}
        <div class="login-box">
            <div id="responseMessage"></div>
            {{-- @include('errors.error') --}}
            <img src="/images/logo.png" alt="eCommerce Logo" class="logo">
            <h2>Reset Password</h2>
            <p> Enter your email address and we will send you instructions to reset your password</p>
            <form id="ajaxform">
                @csrf
                <div>
                    <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span style="color: red;"></span>
                    @enderror
                </div>
              
                <button type="submit">Reset</button>
            </form>
            {{-- <div class="footer">
                <p>Don't have an account? <a href="{{ route('signup') }}">Sign up</a></p>
                <p><a href="{{ route('user.otp') }}">log in by otp?</a></p>
                <p><a href="/password/reset">Forgot Password?</a></p>
                <p><a href="/privacy-policy">Privacy Policy</a> | <a href="/terms">Terms of Service</a></p>
            </div> --}}
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    {{-- <script>
    $(document).ready(function() {
    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle form submission
    $('#ajaxform').on('submit', function(e) {
        e.preventDefault();

        // Clear previous error messages
        $('.error-message').remove();

        $.ajax({
            url: "{{ route('user.loggedin') }}",
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Login Successful',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = response.redirect_url;
                        }
                    });
                } else {
                    $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, messages) {
                        var input = $('[name="' + key + '"]');
                        input.after('<span class="error-message" style="color: red;">' + messages[0] + '</span>');
                    });
                    $('#password, #confirm-password').val('');
                } else if (xhr.status === 401 || xhr.status === 403) {
                    $('#responseMessage').html('<div class="alert alert-danger">' + xhr.responseJSON.message + '</div>');
                } else {
                    $('#responseMessage').html('<div class="alert alert-danger">There was an error processing your request.</div>');
                }
            }
        });
    });
}); --}}



    {{-- </script> --}}
</body>
</html>
