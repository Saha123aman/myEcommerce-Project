<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's T-Shirts Store</title>
    <link href="{{ asset('css/userproductlist.css') }}" rel="stylesheet">
    <style>
        /* Mobile Screens */
@media (max-width: 767.98px) {
    .product-card {
        width: 100%;
        margin-bottom: 15px;
        /* Reduce margin */
        padding: 10px;
        /* Add padding to make it look better on mobile */
    }

    .product-card img {
        max-height: 120px;
        /* Reduce image height */
        width: 100%;
        /* Ensure the image takes the full width */
    }

    .product-card h3 {
        font-size: 14px;
        /* Smaller font size for product name */
        margin-top: 10px;
        /* Reduce the space above the product name */
    }

    .product-rating i {
        font-size: 12px;
        /* Smaller font size for stars */
    }

    .product-card p {
        font-size: 14px;
        /* Smaller font size for price */
    }

    .product-card h6 {
        font-size: 12px;
        /* Smaller font size for availability */
    }

    .product-grid {
        grid-template-columns: repeat(2, 1fr);
        /* Show two products per row on mobile */
        gap: 10px;
        /* Smaller gap between products */
    }

    .product-buttons a,
    .product-buttons button {
        font-size: 12px;
        /* Smaller font size for buttons */
        padding: 5px 10px;
        /* Adjust padding */
    }
}

    </style>
</head>
<body>
    @include('layouts.navbar')

    <main>
        <div class="main-content">
          
            <div class="menpro">
            @include('layouts.menproductfilter')
        </div>
           
            <section class="products">
                <h2>{{$categoryName}} collections</h2>
                <div class="product-grid" id="product-list">
                    @foreach($products as $product)
                   
                    <div class=" card product-card">
                        <img src="{{ asset('productimages/' . $product->image_url ?? 'default-profile.png') }}"
                        style="max-height: 200px;" class="img-fluid product-img" alt="Product Image"
                        onclick="window.location.href='{{ route('front.details', ['id' => $product->id]) }}'">
                        <h3>{{$product->name}}</h3>
                        <div class="product-rating">
                            <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
                        </div>
                        <p>Rs: {{$product->price}}</p>
                        @if ($product->product_Availability === 'In Stock')
                        <h6 style="color:rgb(67, 197, 106)">{{ $product->product_Availability }}
                        </h6>
                    @else
                        <h6 style="color:rgb(215, 46, 28)">{{ $product->product_Availability }}</h6>
                    @endif
                        {{-- <div class="product-buttons  d-md-flex justify-content-between">
                            <a href="{{ route('front.details', ['id' => $product->id]) }}" class="view-details-btn">View Details</a>
                            <form action="{{ route('front.addtocart', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                            </form>
                        </div> --}}
                    
                </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
   @include('layouts.scrollbutton')
  
   {{-- @include('layouts.ajaxfilter') --}}
</body>
</html>
@include('layouts.userfooter')