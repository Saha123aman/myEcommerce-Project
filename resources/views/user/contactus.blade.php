<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - My eCommerce Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom CSS */
        .hero-section {
            background: url('https://via.placeholder.com/1920x600') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.25rem;
        }
        .hero-image {
            width: 100%; /* Make image responsive */
            height: auto; /* Maintain aspect ratio */
            max-width: 800px; /* Optional: limit max width */
            display: block;
            margin: 0 auto; /* Center the image */
            margin-bottom: 20px; /* Space between image and text */
        }
        .contact-form {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .contact-form h2 {
            margin-bottom: 20px;
        }
        .contact-form .form-control {
            border-radius: 5px;
        }
        .contact-form .btn-primary {
            background-color: #28a745;
            border: none;
            border-radius: 5px;
        }
        .contact-info {
            background-color: #404f43;
            color: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
        }
        .contact-info h2 {
            margin-bottom: 20px;
        }
        .contact-info p {
            margin-bottom: 10px;
        }
        .map-section {
            position: relative;
            padding-bottom: 50%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            margin-top: 30px; /* Space between sections */
        }
        .map-section iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('layouts.navbar')
    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/image.png') }}" width="50" height="40" class="d-inline-block align-top" alt="" loading="lazy">
            My eCommerce Store
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.home')}}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.home')}}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.home')}}">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mx-auto search-form">
                <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 search-button" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </button>
                </li>
            </ul>
        </div>
    </nav> --}}

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <img src="" alt="Hero Image" class="hero-image">
            {{-- <h1>Contact Us</h1> --}}
            <p>We're here to help you</p>
        </div>
    </section>

    <!-- Contact Form and Info Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-4">
                    <div class="contact-info">
                        <h2>Contact Information</h2>
                        <p><i class="fas fa-map-marker-alt"></i> 222/1 Piyarabagan, Howrah, West Bengal</p>
                        <p><i class="fas fa-phone-alt"></i> +91 7384525877</p>
                        <p><i class="fas fa-envelope"></i> sahaamantran981@gmail.com</p>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-md-8">
                    <div class="contact-form">
                        @if (Session::has('successmail'))
                        <script>
                        Swal.fire({
                            title: "thank you!",
                            text: "mail has been sent!",
                            icon: "success"
                          });
                          </script>
                        
                        @endif
                        @if (Session::has('failmail'))
                        <script>
                            Swal.fire({
                                title: "thank you!",
                                text: "mail has been sent!",
                                icon: "success"
                              });
                              </script>
                        
                        @endif
                        <h2>Get in Touch</h2>
                        <form action="{{ route('contact.send') }}" method="post"> 
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d945194.3167391481!2d86.87764778467673!3d22.996586065581566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02752b40b0de67%3A0x726d6b5f239e9f5e!2sWest%20Bengal!5e0!3m2!1sen!2sin!4v1690109186492!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
    
   
    <!-- Bootstrap JS and dependencies -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@include('layouts.userfooter')
