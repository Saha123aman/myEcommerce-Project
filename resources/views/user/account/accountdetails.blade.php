<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
    <style>
        body,
        html {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: #f4f4f9;
            color: #333;
        }

        /* .logout-btn2 {
            display: none;
        } */

        /* Base styles for the logout button */
        .logout-btn {
            background-color: #443c3c;
            /* Bright red color for emphasis */
            color: #fff;
            /* White text for contrast */
            padding: 10px 20px;
            /* Padding for a larger clickable area */
            border-radius: 5px;
            /* Rounded corners for a modern look */
            text-decoration: none;
            /* Remove underline from the link */
            font-size: 0.8rem;
            /* Larger font size for readability */
            font-weight: bold;
            /* Bold text for emphasis */
            display: flex;
            /* Flexbox for alignment */
            align-items: center;
            /* Center icon and text vertically */
            transition: background-color 0.3s, transform 0.2s;
            /* Smooth transitions for hover effects */
            margin-left: 10px;
            /* Margin for spacing */
            margin-top: 10px;
            /* Add some margin at the top to prevent overlap */
        }

        /* Styles for the icon inside the button */
        .logout-btn .icon {
            margin-right: 8px;
            /* Space between icon and text */
        }

        /* Hover state styles */
        .logout-btn:hover {
            background-color: #e60000;
            /* Darker red on hover for better visibility */
            transform: scale(1.05);
            /* Slightly enlarge the button on hover */
        }

        /* Active state styles */
        .logout-btn:active {
            background-color: #743333;
            /* Even darker red when clicked */
        }

        .navbar {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
           
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: inline-block;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .containers {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .profile-header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .profile-header h2 {
            margin: 0;
            color: #007bff;
            font-size: 1.5em;
        }

        .profile-header p {
            margin: 5px 0;
            color: #666;
            font-size: 0.9em;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h3 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 15px;
            color: #007bff;
        }

        .order-list {
            list-style: none;
            padding: 0;
        }

        .order-list li {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .order-list .order-status {
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            align-self: flex-end;
        }

        .account-settings form {
            display: flex;
            flex-direction: column;
        }

        .account-settings label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .account-settings input[type="text"],
        .account-settings input[type="email"],
        .account-settings input[type="password"],
        .account-settings button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .account-settings button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .account-settings button:hover {
            background: #0056b3;
        }

        /* Error message styling */
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                padding: 10px;
            }
/* 
            .logout-btn2 {
                display: block;
            } */

            .navbar a {
                display: block;
                padding: 8px;
            }

            .container {
                padding: 10px;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-header img {
                width: 80px;
                height: 80px;
            }

            .profile-header h2 {
                font-size: 1.2em;
            }

            .logout-btn {
                width: 100%;
                justify-content: center;
                margin: 10px 0;
                padding: 12px 15px;
            }

            .order-list li {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .navbar a {
                padding: 6px;
            }

            .container {
                padding: 5px;
            }

            .logout-btn2 {
                display: block;
            }

            .profile-header h2 {
                font-size: 1em;
            }

            .profile-header p {
                font-size: 0.8em;
            }

            .account-settings input,
            .account-settings button {
                padding: 8px;
            }

            .logout-btn {
                font-size: 0.9rem;
                padding: 10px;
                margin: 8px 0;
            }
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    {{-- <div class="navbar">
        <a href="/">Home</a>
        <a href="{{ route('user.account') }}">My Account</a>
        <a href="{{ route('user.orders') }}">Orders</a>
        <a href="#">Settings</a>
    </div> --}}

    <div class="containers">
        <div class="profile-header">
            <img src="{{ asset('profiles/' . $user->image_path ?? 'default-profile.png') }}" alt="Profile Picture">
            <div>
                <h2>Your Name: {{ $user->name }}</h2>
                <h5>Your email: {{ $user->email }}</h5>
                <p>Member since: {{ $user->created_at->format('F Y') }}</p>
            </div>


            @auth('custom')
                <a href="{{ route('user.logout') }}" class="logout-btn">
                  Logout
                </a>
            @endauth
{{--             
            @auth('custom')
                <button><a href="{{ route('user.logout') }}" class="logout-btn2 ">
                 
                </a>  Logout</button>
            @endauth --}}
        </div>

        <div class="section">
            <h3>Order History</h3>
            <ul class="order-list">
                {{-- @foreach ($orders as $order)
                    <li>
                        <div>
                            <strong>Order #{{ $order->id }}</strong><br>
                            {{ $order->created_at->format('F d, Y') }}
                        </div>
                        <span class="order-status">{{ $order->status }}</span>
                    </li>
                @endforeach --}}
            </ul>
        </div>

        <div class="section account-settings">
            <h3>Account Settings</h3>
            <form id="account-update-form" enctype="multipart/form-data">
                @csrf
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @if ($errors->has('name'))
                    <span class="error-message">{{ $errors->first('name') }}</span>
                @endif

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @if ($errors->has('email'))
                    <span class="error-message">{{ $errors->first('email') }}</span>
                @endif

                <label for="password">New Password</label>
                <input type="password" id="password" name="password"
                    placeholder="Leave blank to keep current password">
                @if ($errors->has('password'))
                    <span class="error-message">{{ $errors->first('password') }}</span>
                @endif

                <div class="form-group">
                    <label for="profile">Profile picture</label>
                    <div id="current-picture">
                        <img src="{{ asset('profiles/' . ($user->image_path ?? 'default-profile.png')) }}"
                            alt="Current Profile Picture"
                            style="max-width: 150px; max-height: 150px; border-radius: 50%;">
                    </div>
                    <input type="file" id="profile" name="profile">
                    @if ($errors->has('profile'))
                        <span class="error-message">{{ $errors->first('profile') }}</span>
                    @endif
                </div>
                <button type="submit">Update Account</button>
            </form>
        </div>
    </div>

    @include('layouts.userfooter')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#account-update-form').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('user.update') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Account Updated',
                            text: response.message,
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location
                            .reload(); // Reload the page after the user clicks "Okay"
                            }
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: xhr.responseJSON.message,
                            confirmButtonText: 'Try Again'
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>
