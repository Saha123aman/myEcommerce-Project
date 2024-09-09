<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/userregister.css') }}">
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
        <div class="registration-form">
            <div class="header">
                <img src="logo.png" alt="eCommerce Logo" class="logo">
                <h1>Join Our Community</h1>
                <p>Create your account and start shopping today!</p>
            </div>
            <form id="ajaxform" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    <span class="error-message" style="color: red;"></span>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    <span class="error-message" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <span class="error-message" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="password_confirmation" required>
                    <span class="error-message" style="color: red;"></span>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                    <span class="error-message" style="color: red;"></span>
                </div> 

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}">
                    <span class="error-message" style="color: red;"></span>
                </div>
                
                <div class="form-group">
                    <label for="profile">Profile picture</label>
                    <input type="file" id="profile" name="profile" >
                    <span class="error-message" style="color: red;"></span>
                </div>

                <button type="submit" class="btn btn-primary">Create Account</button>
            </form>

            <div class="social-signup">
                <p>Or sign up with</p>
                <div class="social-buttons">
                    <a href="#" class="btn-google">Google</a>
                    <a href="#" class="btn-facebook">Facebook</a>
                </div>
            </div>

            <div class="footer">
                <p>Already have an account? <a href="{{ route('user.login') }}">Log in</a></p>
                <p><a href="/privacy-policy">Privacy Policy</a> | <a href="/terms">Terms of Service</a></p>
            </div>
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <script>
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

        // Clear previous errors
        $('.error-message').html('');

        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('user.store') }}",
            method: 'POST',
            data: formData,
            contentType: false, // Important for file uploads
            processData: false, // Important for file uploads
            success: function(response) {
                console.log(response);
                if (response.success) {
                    Swal.fire({
                        title: 'Registration Successful',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = response.redirect_url;
                        }
                    });
                } else if (response.errors) {
                    $.each(response.errors, function(key, messages) {
                        var input = $('[name="' + key + '"]');
                        input.next('.error-message').text(messages[0]);
                    });
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, messages) {
                        var input = $('[name="' + key + '"]');
                        input.next('.error-message').text(messages[0]);
                    });
                    $('#password, #confirm-password').val('');
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'There was an error processing your request.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
});
    </script>
</body>
</html>
