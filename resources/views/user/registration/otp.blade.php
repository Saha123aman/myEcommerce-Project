<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send OTP Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Send OTP</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.sendotp') }}" method="POST">
                            @csrf
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="phone">Enter Phone Number:</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Send </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.userfooter')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
