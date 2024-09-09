<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.navbar')
      @if (Session::has('fail'))
      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
          
      @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Verify OTP</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.verifyOTP') }}" method="POST">
                            @csrf
                            @method('POST')
                            @error('otp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="otp">Enter OTP:</label>
                                <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter your OTP" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Verify OTP</button>
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
