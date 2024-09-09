<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List - My eCommerce Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/frontend/productlist.css') }}">
   
</head>

<body>
    @include('layouts.navbar')

    

    <!-- Filters and Product List Section -->
    <main class="py-5">
        <div class="container-fluid">
            <div class="row">
                <!-- Filters Section (Desktop Only) -->
                <div class="col-md-3 d-none d-md-block filter">
                    @include('layouts.newfilter')
                </div>

                <!-- Product List and Selected Categories -->
                <div class="col-md-9">
                    <!-- Selected Categories Display -->
                    <div class="selected-categories">
                        <span id="selected-categories"></span>
                    </div>

                    <!-- Product List -->
                    <div class="row" id="product-list">
                        @foreach ($products as $product)
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card product-card">
                                <img src="{{ asset('productimages/' . $product->image_url ?? 'default-profile.png') }}"
                                    style="max-height: 200px;" class="img-fluid product-img" alt="Product Image"
                                    onclick="window.location.href='{{ route('front.details', ['id' => $product->id]) }}'">

                                <div class="card-body">
                                    <h2 class="card-title" style="font-size:13px;">{{ $product->name }}</h2>
                                    <div class="product-rating">
                                        <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
                                    </div>
                                    <p class="card-text" style="font-size:15px; ">&#8377; {{ $product->price }}</p>
                                    @if ($product->product_Availability === 'In Stock')
                                    <h6 style="color:rgb(67, 197, 106)">{{ $product->product_Availability }}</h6>
                                    @else
                                    <h6 style="color:rgb(215, 46, 28)">{{ $product->product_Availability }}</h6>
                                    @endif
                                    {{-- <!-- Desktop Buttons -->
                                        <div class="d-none d-md-flex justify-content-between desktopbtn">
                                            <a href="{{ route('front.details', ['id' => $product->id]) }}"
                                                class="btn btn-outline-success btn-sm">View Details</a>
                                            <form action="{{ route('front.addtocart', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                                            </form>
                                        </div> --}}
                                    <!-- Mobile Buttons -->
                                    {{-- <div class="d-md-none d-flex mobilebtn">
                                            <a href="{{ route('front.details', ['id' => $product->id]) }}"
                                                class="btn btn-outline-success btn-sm">Details</a>
                                            <form action="{{ route('front.addtocart', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Cart</button>
                                            </form>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    {{-- <nav>
                        <ul class="pagination">
                            {{ $products->links() }}
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </main>
    <div class="ajaxfilter">
    @include('layouts.ajaxfilter')
</div>
    <!-- Footer -->
    @include('layouts.scrollbutton')
    @include('layouts.userfooter')

    <!-- Bootstrap JS and dependencies -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JS for AJAX Filtering -->
</body>

</html>
