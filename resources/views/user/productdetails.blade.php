{{-- @dump($) --}}
{{-- @dump($alreadyInCart) --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product Details</title>
    <link rel="stylesheet" href="{{ asset('css/frontend/productdetails.css') }}">
</head>

<body>
    @include('layouts.navbar')

    <main>
        <div class="product-details">
            <div class="image-gallery">
                <img id="main-image" src="{{ asset('productimages/' . $product->image_url ?? 'default-profile.png') }}"
                    alt="Product Image">
            </div>
            <div class="product-info">
                <h1>{{ $product->name }}</h1>
                <p class="price">Rs: {{ $product->price }}</p>
                <div class="size-selector">
                    <label for="size">Size:</label>
                    <select id="size">
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                    </select>
                </div>
                <div class="color-options">
                    <label>Color:</label>
                    <button style="background-color: red;" onclick="selectColor('red')"></button>
                    <button style="background-color: blue;" onclick="selectColor('blue')"></button>
                    <button style="background-color: green;" onclick="selectColor('green')"></button>
                </div>
                <div class="quantity-selector">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" value="1" min="1">
                </div>
                <button value="{{ $product->id }}" class="add-to-cart"
                    data-already-in-cart="{{ $alreadyInCart ? 'true' : 'false' }}">
                    {{ $alreadyInCart ? 'Go to Cart' : 'Add to Cart' }}
                </button>

                <button value="{{ $product->id }}" class="buy-now">Buy Now</button>
            </div>
        </div>

        <section class="product-description">
            <h2>Description</h2>
            <p>{{ $product->description }}</p>
        </section>

        <section class="customer-reviews">
            <h2>Customer Reviews</h2>
            <div class="review-summary">
                <p>4.5 stars based on 20 reviews</p>
            </div>
            <div class="write-review">
                <button>Write a Review</button>
            </div>
        </section>

        <section class="related-products">
            <h2>Related Products</h2>
            <div class="product-grid">
                @foreach ($similarProducts as $similarproduct)
                    <div class="product-item">
                        <img src="{{ asset('productimages/' . $similarproduct->image_url ?? 'default-profile.png') }}"
                            style="max-height: 200px;" class="img-fluid product-img" alt="Product Image"
                            onclick="window.location.href='{{ route('front.details', ['id' => $similarproduct->id]) }}'">
                        <p>{{ $similarproduct->name }}</p>
                        <p>Rs: {{ $similarproduct->price }}</p>
                        @if ($product->product_Availability === 'In Stock')
                            <h6 style="color:rgb(67, 197, 106)">{{ $product->product_Availability }}</h6>
                        @else
                            <h6 style="color:rgb(215, 46, 28)">{{ $product->product_Availability }}</h6>
                        @endif
                        {{-- <div class="product-actions">
                        <a href="{{ route('front.details', ['id' => $similarproduct->id]) }}" class="btn btn-outline-success btn-sm">Details</a>
                        <a href="#" class="btn btn-success btn-sm">Cart</a>
                    </div> --}}

                    </div>
                @endforeach
            </div>


        </section>
    </main>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  
    <script>
       $(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Set up global AJAX settings to include CSRF token in headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $('.add-to-cart').on('click', function() {
        let productid = $(this).val();
    //   console.log(productid);
        $.ajax({
            url: '/addtocart/' + productid,
            method: 'post',
            dataType: 'JSON',

            success: function(response) {
                if (response.success) {
                    $('.cart-badge').text(response.newCartCount);

                    if (response.alreadyInCart) {
                        // Update the button text and change the onclick event
                        $('.add-to-cart').text('Go to Cart').off('click').on('click', function() {
                            window.location.href = '/cart/view';
                        });
                    } else {
                        Swal.fire({
                            title: "Added to Cart!",
                            showClass: {
                                popup: 'animate__animated animate__fadeInUp animate__faster'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutDown animate__faster'
                            },
                            customClass: {
                                popup: 'small-swal-popup' // Custom class to style the popup
                            }
                        });

                        // Update the button text and change the onclick event
                        $('.add-to-cart').text('Go to Cart').off('click').on('click', function() {
                            window.location.href = '/cart/view';
                        });
                    }
                } else {
                    console.log(response.message);
                }
            },
            error: function(xhr, status, error) {
        if (xhr.status === 401) {
            Swal.fire({
                title: 'Unauthorized',
                text: 'Please log in to add items to the cart.',
                icon: 'error',
                confirmButtonText: 'Log In',
                preConfirm: () => {
                    window.location.href = '/login';
                }
            });
        } else {
            console.log('AJAX Error:', {
                xhr: xhr,
                status: status,
                error: error,
                responseText: xhr.responseText
            });
        }
    }
        })
    });


     // Handle Main Image click to display it in a SweetAlert2 modal
     $('#main-image').on('click', function () {
                Swal.fire({
                    imageUrl: $(this).attr('src'),
                    imageAlt: 'Product Image',
                    showCloseButton: true,
                    showConfirmButton: false,
                    width: 'auto', // Adjust width to fit the image
                    padding: '1rem',
                    background: '#fff',
                    // backdrop: `
                    //     rgba(0,0,0,0.7)
                    //     url("https://sweetalert2.github.io/images/nyan-cat.gif")
                    //     left top
                    //     no-repeat
                    // `
                });
            });
});

    </script>


</body>

</html>
@include('layouts.userfooter')
