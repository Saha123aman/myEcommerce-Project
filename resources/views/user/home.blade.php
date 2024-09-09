{{-- @dump($tshirtcategory->all()); --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Clothing Store</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">

 
</head>
<body>
  @include('layouts.navbar')

  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/image1.jpg') }}" class="d-block w-100" alt="Carousel Image">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/image2.jpg') }}" class="d-block w-100" alt="Carousel Image">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/image3.jpg') }}" class="d-block w-100" alt="Carousel Image">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Hero Section -->
  <div class="hero-section">
    <h1>Discover Our Latest Collections</h1>
    <p>Find your perfect style with our new arrivals and seasonal offers.</p>
    <a href="{{route('front.products')}}" class="btn btn-primary">Shop Now</a>
</div>
<div class="banner">Wardrobe Add-ons For The Win</div>





<!-- Featured Products -->
{{-- <div class="container featured-products">
    <h2>Featured Products</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="product-card">
                <img src="https://via.placeholder.com/300" alt="Product Image">
                <div class="product-card-body">
                    <h5>Product Name 1</h5>
                    <p>$19.99</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-card">
                <img src="https://via.placeholder.com/300" alt="Product Image">
                <div class="product-card-body">
                    <h5>Product Name 2</h5>
                    <p>$29.99</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="product-card">
                <img src="https://via.placeholder.com/300" alt="Product Image">
                <div class="product-card-body">
                    <h5>Product Name 3</h5>
                    <p>$39.99</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div id="productCarousel" class="carousel slide product-section" data-ride="carousel" data-interval="3000">
  <div class="carousel-inner">
      <div class="carousel-item active">
          <div class="row">
              <div class="col-md-4">
                  <div class="product-item">
                      <img src="https://via.placeholder.com/300x400" alt="Trends Collection">
                      <h5 class="product-title">Trends Collection</h5>
                      <p class="product-offer">40-60% OFF</p>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="product-item">
                      <img src="https://via.placeholder.com/300x400" alt="Winter Collection">
                      <h5 class="product-title">Winter Collection</h5>
                      <p class="product-offer">Starting ₹499</p>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="product-item">
                      <img src="https://via.placeholder.com/300x400" alt="AZORTE Collection">
                      <h5 class="product-title">AZORTE Collection</h5>
                      <p class="product-offer">Flat 50% OFF</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="carousel-item">
          <div class="row">
              <div class="col-md-4">
                  <div class="product-item">
                      <img src="https://via.placeholder.com/300x400" alt="Footwear Collection">
                      <h5 class="product-title">Footwear Collection</h5>
                      <p class="product-offer">Up to 50% OFF</p>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="product-item">
                      <img src="https://via.placeholder.com/300x400" alt="Accessories Collection">
                      <h5 class="product-title">Accessories Collection</h5>
                      <p class="product-offer">Starting ₹299</p>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="product-item">
                      <img src="https://via.placeholder.com/300x400" alt="Gadgets Collection">
                      <h5 class="product-title">Gadgets Collection</h5>
                      <p class="product-offer">Flat 40% OFF</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
</div>
{{-- 
<div class="container mt-4">
  <div class="row">
    @foreach ($products as $product)
      <div class="col-lg-3 col-md-6 mb-4">
      
          <div class="card">
            <a href="{{ route('front.men.getcategory', ['id' => $product->id]) }}"><img src="{{ asset('productimages/' . $product->image_url ?? 'default-profile.png') }}"></a>
              <div class="card-body text-center">
                  <h5 class="card-title">Sports Shoes</h5>
                  <p class="card-text">MIN. 35% OFF</p>
              </div>
          </div>
         
      </div>
      @endforeach
      <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
              <img src="sneakers.jpg" class="card-img-top" alt="Sneakers">
              <div class="card-body text-center">
                  <h5 class="card-title">Sneakers</h5>
                  <p class="card-text">MIN. 40% OFF</p>
              </div>
          </div>
      </div>
      {{-- <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
              <img src="flip-flops.jpg" class="card-img-top" alt="Flip Flops">
              <div class="card-body text-center">
                  <h5 class="card-title">Flip Flops & Slippers</h5>
                  <p class="card-text">MIN. 30% OFF</p>
              </div>
          </div>
      </div> --}}
      {{-- <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
              <img src="casual-shoes.jpg" class="card-img-top" alt="Casual Shoes">
              <div class="card-body text-center">
                  <h5 class="card-title">Casual Shoes</h5>
                  <p class="card-text">MIN. 30% OFF</p>
              </div>
          </div>
      </div>
  </div>
  
</div> --}}
<div class="banner">
  Wardrobe Add-ons For The Win
</div>

<!-- Categories Section -->
{{-- <div class="container">
  <div class="categories">
      <div class="category">
        <img src="{{ asset('images/tshirt3.jpg') }}" alt="T-Shirts">
          <div data-id="{{ $tshirtcategory->id }}" class="title">T-Shirt</div>
          <div class="offer">MIN. 50% OFF</div>
      </div>
      <div class="category">
        <img src="{{ asset('images/shirtcat1.jpg') }}" alt="Shirts">
          <div class="title">Shirts</div>
          <div class="offer">FLAT 50% OFF</div>
      </div>
      <div class="category">
        <img src="{{ asset('images/mentrackpantscat1.jpg') }}" alt="Trousers & Pants">
          <div class="title">Trousers & Pants</div>
          <div class="offer">40-70% OFF</div>
      </div>
      <div class="category">
        <img src="{{ asset('images/jeanscat3.jpg') }}" alt="Jeans">
          <div class="title">Jeans</div>
          <div class="offer">MIN. 40% OFF</div>
      </div>
  </div>
</div> --}}
@include('layouts.home.categorysection')

<!-- Call to Action Section -->
<div class="cta-section">
    <h2>Join Us Today</h2>
    <p>Be the first to know about our latest arrivals and exclusive offers.</p>
    <a href="#" class="btn btn-primary">Sign Up</a>
</div>

  <!-- Header Section -->
  {{-- <div class="jumbotron">
    <h1 class="display-4">Welcome to Our Ecommerce Store</h1>
    <p class="lead">Discover the latest trends in clothing.</p>
    <a class="btn btn-dark btn-lg" href="#" role="button">Shop Now</a>
  </div>

  <!-- Product Listing -->
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product Image">
          <div class="card-body">
            <h5 class="card-title">Product Name</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
      <!-- Add more product cards as needed -->
    </div>
  </div> --}}
  {{-- <footer class="bg-light py-4">
    {{-- <div class="container text-center">
        <p>&copy; 2024 My eCommerce Store. All rights reserved.</p>
    </div> --}}
    
{{-- </footer> --}}
  <!-- Bootstrap JS, Popper.js, and jQuery -->
  @include('layouts.userfooter')
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> --}}
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
