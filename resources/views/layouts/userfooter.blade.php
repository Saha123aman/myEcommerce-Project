<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Design Example</title>

    <!-- SweetAlert2 -->

<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom Footer CSS */
        .footer {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 20px 0; /* Reduced padding for a smaller height */
        }
        .footer-logo img {
            max-width: 100%;
            height: auto;
        }
        .footer .social-icons a {
            color: #f8f9fa;
            margin: 0 8px; /* Reduced margin */
            font-size: 20px; /* Slightly smaller font size */
            transition: color 0.3s ease;
        }
        .footer .social-icons a:hover {
            color: #28a745;
        }
        .footer-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .footer-links .link-group {
            flex: 1;
            min-width: 150px; /* Reduced minimum width */
            margin-bottom: 15px; /* Reduced margin bottom */
        }
        .footer-links h5 {
            border-bottom: 2px solid #28a745;
            padding-bottom: 5px; /* Reduced padding bottom */
            margin-bottom: 10px; /* Reduced margin bottom */
            font-size: 16px; /* Slightly smaller font size */
        }
        .footer-links a {
            color: #f8f9fa;
            text-decoration: none;
            display: block;
            margin: 3px 0; /* Reduced margin */
            transition: color 0.3s ease;
        }
        .footer-links a:hover {
            color: #28a745;
        }
        .footer-newsletter {
            background-color: #495057;
            padding: 15px; /* Reduced padding */
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            margin-top: 15px; /* Reduced margin top */
        }
        .footer-newsletter h5 {
            font-size: 16px; /* Slightly smaller font size */
            margin-bottom: 10px; /* Reduced margin bottom */
        }
        .footer-newsletter form {
            display: flex;
            flex-direction: column;
        }
        .footer-newsletter form input {
            border-radius: 20px;
            padding: 8px; /* Reduced padding */
            border: none;
            margin-bottom: 8px; /* Reduced margin bottom */
        }
        .footer-newsletter form button {
            border-radius: 20px;
            padding: 8px; /* Reduced padding */
            border: none;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .footer-newsletter form button:hover {
            background-color: #218838;
        }
        .footer-bottom {
            text-align: center;
            border-top: 1px solid #28a745;
            padding: 10px 0; /* Reduced padding */
        }
        .footer-bottom p {
            margin: 0;
            font-size: 14px; /* Smaller font size */
        }

        @media (max-width: 767px) {
            .footer-links {
                flex-direction: column;
            }
            .footer-links .link-group {
                margin-bottom: 15px;
            }
            .footer-newsletter {
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-md-3 col-12 footer-logo">
                    <img src="https://via.placeholder.com/150x50" alt="Logo">
                </div>

                <!-- Links -->
                <div class="col-md-6 col-12 footer-links">
                    <div class="row">
                        <div class="col-md-4 col-12 link-group">
                            <h5>About Us</h5>
                            <a href="{{route('front.about')}}">Company Info</a>
                            <a href="#">Careers</a>
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms of Service</a>
                        </div>
                        <div class="col-md-4 col-12 link-group">
                            <h5>Customer Service</h5>
                            <a href="#">Help Center</a>
                            <a href="#">Returns</a>
                            <a href="#">Shipping Info</a>
                            <a href="#">Track Order</a>
                        </div>
                        <div class="col-md-4 col-12 link-group">
                            <h5>Contact Us</h5>
                            <a href="{{route('front.contact')}}">Contact Form</a>
                            <a href="#">Live Chat</a>
                            <a href="#">Support</a>
                        </div>
                        <div class="col-md-4 col-12 link-group">
                            <h5>Follow Us</h5>
                            <div class="social-icons">
                                <a href="#" class="fab fa-facebook-f"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-instagram"></a>
                                <a href="#" class="fab fa-linkedin-in"></a>
                            </div>
                        </div>
                    </div>
                </div>

               
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                {{-- error and success message display --}}
                @if(session('successSubcribe'))
                <script>
                    Swal.fire({
                        title: "{{ session('successSubcribe') }}",
                        icon: "success",
                        showClass: {
                            popup: `
                              animate__animated
                              animate__fadeInUp
                              animate__faster
                            `
                        },
                        hideClass: {
                            popup: `
                              animate__animated
                              animate__fadeOutDown
                              animate__faster
                            `
                        }
                    });
                </script>
            @endif
            
            @if($errors->any())
            <script>
                Swal.fire({
                    title: "There were errors with your submission",
                    html: `
                        <ul style="text-align: left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    `,
                    icon: "error",
                    showClass: {
                        popup: `
                          animate__animated
                          animate__fadeInUp
                          animate__faster
                        `
                    },
                    hideClass: {
                        popup: `
                          animate__animated
                          animate__fadeOutDown
                          animate__faster
                        `
                    }
                });
            </script>
        @endif
        
        @if(session('NotaCustomer'))
        <script>
            Swal.fire({
                title: "{{ session('NotaCustomer') }}",
                icon: "error",
                showClass: {
                    popup: `
                      animate__animated
                      animate__fadeInUp
                      animate__faster
                    `
                },
                hideClass: {
                    popup: `
                      animate__animated
                      animate__fadeOutDown
                      animate__faster
                    `
                }
            });
        </script>
    @endif
    
        

                 <!-- Newsletter Signup -->
                <div class="col-md-3 col-12 footer-newsletter">
                    <h5>Newsletter Signup</h5>
                    <form action="{{ route('front.newsletter.store') }}" method="POST">
                        @csrf
                        <input type="email"  name="email" value="{{ old('email') }}" placeholder="Your email address" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="footer-bottom">
            <p>&copy; 2024 My eCommerce Store. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
