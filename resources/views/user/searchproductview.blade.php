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
    <link rel="stylesheet" href="{{ asset('css/frontend/searchproductview.css') }}">
    <style>

@media (max-width: 768px) {
    .filters{
        display: none;
    }
}
    </style>
</head>

<body>
    @include('layouts.navbar')

    {{-- <div class="filter-dropdown">
        <div class="filter-select" onclick="openModal('sortModal')">
            <span>Sort By</span>
        </div>
        <div class="filter-select" onclick="openModal('filterModal')">
            <span>Filter by Category</span>
        </div>
    </div>

    <!-- Sort By Modal -->
    <div id="sortModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Sort By</h2>
                <span class="close" onclick="closeModal('sortModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="sortform">
                    <label>
                        <input type="radio" name="sortprice" value="lowest">
                        Price (Lowest First)
                    </label>
                    <label>
                        <input type="radio" name="sortprice" value="highest">
                        Price (Highest First)
                    </label>
                    <label>
                        <input type="radio" name="sortprice" value="new">
                        What's New
                    </label>
                </form>
            </div>
        </div>
    </div>
  --}}
 
    <!-- Filters and Product List Section -->
    <main class="py-5">
        
      
        <div class="container-fluid">
            <div class="row">
                <!-- Filters Section (Desktop Only) -->
                {{-- <div class="col-md-3 d-none d-md-block">
                    @include('layouts.filter')
                </div> --}}
                <aside class="filters">
                    <h3 style="text-align:center;">FILTERS</h3>
                 <div id="price-filter" data-category-name="{{ $categoryName }}" class="my-4">
                        <h5>Price</h5>
                        <label>
                            <input type="radio" name="price" value="low-to-high">
                            Low to High<br>
                            <input type="radio" name="price" value="high-to-low">
                            High to Low
                        </label><br>
                    </div>
            
                    <div id="color-filter" class="my-4">
                        <h5>Color</h5>
                        <label>
                            <input type="checkbox" name="color[]" value="red">
                            <span class="color-swatch" style="background-color: red;"></span>
                            Red <br>
            
                            <input type="checkbox" name="color[]" value="blue">
                            <span class="color-swatch" style="background-color: blue;"></span>
                            Blue <br>
            
                            <input type="checkbox" name="color[]" value="green">
                            <span class="color-swatch" style="background-color: green;"></span>
                            Green
                        </label><br>
                    </div>
            
                </aside>
                {{-- @include('layouts.menproductfilter') --}}
                <!-- Product List -->
                <div class="col-md-9">
                   
                    <div class="row" id="product-list">
                        @if(isset($error))
                        <div class="alert alert-warning">{{$error}}</div>
                        @else
                        @foreach ($products as $product)
                            <div class="col-md-3 col-6 mb-4">
                                <div class="card product-card">
                                    <img src="{{ asset('productimages/' . $product->image_url ?? 'default-profile.png') }}"
                                        style="max-height: 200px;" class="img-fluid product-img" alt="Product Image"
                                        onclick="window.location.href='{{ route('front.details', ['id' => $product->id]) }}'">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $product->name }}</h4>
                                        <div class="product-rating">
                                            <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
                                        </div>
                                        <p class="card-text" style="font-size:15px;">&#8377; {{ $product->price }}</p>
                                        @if($product->product_Availability==='In Stock')
                                        <h6 style="color:rgb(67, 197, 106)">{{ $product->product_Availability}}</h6>
                                        @else
                                        <h6 style="color:rgb(215, 46, 28)">{{ $product->product_Availability}}</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                  
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('layouts.scrollbutton')
    @include('layouts.userfooter')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JS for AJAX Filtering -->
    <script>
        $(document).ready(function() {
            function fetchProducts() {
                const categoryName = $('#price-filter').data('category-name');
                const priceOrder = $('input[name="price"]:checked').val();

                console.log('Category:', categoryName);
                console.log('Price Order:', priceOrder);

                const data = {
                    price: priceOrder,
                    categoryName: categoryName
                };

                $.ajax({
                    url: '{{ route('front.menproductfilter') }}',
                    method: 'GET',
                    dataType: 'JSON',
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            console.log('Response Products:', response.products);
                           
                            $('#product-list').empty(); // Clear previous products

                            if (response.products.length > 0) {
                                response.products.forEach(item => {
                                    let product = item.product;
                                    let detailsUrl = item.details_url;

                                    var productHtml = `
                                    <div class="col-md-3 col-6 mb-4">
                                <div class="card product-card">
                                    <img 
                        src="${product.image_url ? '/productimages/' + product.image_url : '/productimages/default-profile.png'}"
                        style="max-height: 200px;" 
                        class="img-fluid product-img" 
                        alt="Product Image"
                        onclick="window.location.href='${detailsUrl}'">
                            
                            
                                    <h3 style="font-size:0.8em;">${product.name}</h3>
                                    <div class="product-rating">
                                        <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
                                    </div>
                                    <p>Rs: ${product.price}</p>
                                    <h6 style="color:${product.product_Availability === 'In Stock' ? 'rgb(67, 197, 106)' : 'rgb(215, 46, 28)'}">${product.product_Availability}</h6>
                                </div>
                                </div>
                            `;

                                    $('#product-list').append(productHtml);
                                });
                            } else {
                                $('#product-list').html('<p>No products found!</p>');
                            }

                        } else {
                            console.error('Error:', response.message);
                            $('#product-list').html('<p>Error: ' + response.message + '</p>');
                        }
                    },
                    error: function(xhr) {
                        console.error('An error occurred:', xhr.responseText);
                        $('#product-list').html('<p>An error occurred. Please try again later.</p>');
                    }
                });
            }

            // Bind the fetchProducts function to the change event of radio inputs for price
            $('input[name="price"]').on('change', function() {
                fetchProducts();
            });

            // Optionally, fetch products initially on page load
            // fetchProducts();
        });
    </script>

</body>

</html>



  <!-- Desktop Buttons -->
                                        {{-- <div class="d-none d-md-flex justify-content-between desktopbtn">
                                            <a href="{{ route('front.details', ['id' => $product->id]) }}"
                                                class="btn btn-outline-success btn-sm">View Details</a>
                                                <form action="{{ route('front.addtocart', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                                                </form>
                                        </div> --}}
                                        <!-- Mobile Buttons -->
                                        {{-- <div class="d-md-none d-flex justify-content-between mobilebtn">
                                            <a href="{{ route('front.details', ['id' => $product->id]) }}"
                                                class="btn btn-outline-success btn-sm">Details</a>
                                            <a href="#" class="btn btn-success btn-sm">Cart</a>
                                        </div> --}}