<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - My eCommerce Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom CSS */
      /* Custom CSS */
.hero-section {
    background: url('{{ asset('images/aboutus3.jpg') }}') no-repeat center center;
    background-size: cover;
    color: white;
    padding: 100px 0;
    text-align: center;
    min-height: 400px; 
}

.hero-section h1 {
    font-size: 3rem;
    font-weight: bold;
}

.hero-section p {
    font-size: 1.25rem;
}

.section-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 1.5rem;
    text-align: center;
}

.team-member img {
    border-radius: 50%;
}

.team-member {
    text-align: center;
    margin-bottom: 2rem; /* Space between team members */
}

/* Responsive styles */
@media (max-width: 767.98px) {
    .hero-section {
        background-size: contain;
        padding: 50px 0;
        min-height: 300px; 
    }

    .hero-section h1 {
        font-size: 2rem;
    }

    .hero-section p {
        font-size: 1rem;
    }
}


    </style>
</head>
<body>
    @include('layouts.navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1></h1>
            <p></p>
        </div>
    </section>

    <!-- Company History Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Our History</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </section>

    <!-- Mission Statement Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="section-title">Our Mission</h2>
            <p>Our mission is to provide high-quality products at affordable prices, ensuring customer satisfaction through exceptional service and a seamless shopping experience.</p>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Meet Our Team</h2>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Team Member 1" class="img-fluid">
                        <h5>John Doe</h5>
                        <p>CEO</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Team Member 2" class="img-fluid">
                        <h5>Jane Smith</h5>
                        <p>CTO</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Team Member 3" class="img-fluid">
                        <h5>Emily Johnson</h5>
                        <p>COO</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
   
        @include('layouts.userfooter')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
