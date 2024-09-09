@foreach ($products as $product)
    <div class="product-card">
        <img src="{{ asset('productimages/' . $product->image_url ?? 'default-profile.png') }}" style="max-height: 200px;"
            class="img-fluid product-img" alt="Product Image"
            onclick="window.location.href='{{ route('front.details', ['id' => $product->id]) }}'">
        <h3>{{ $product->name }}</h3>
        <div class="product-rating">
            <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
        </div>
        <p>Rs: {{ $product->price }}</p>
        @if ($product->product_Availability === 'In Stock')
        <h6 style="color:rgb(67, 197, 106)">{{ $product->product_Availability }}
        </h6>
    @else
        <h6 style="color:rgb(215, 46, 28)">{{ $product->product_Availability }}</h6>
    @endif
        {{-- <div class="product-buttons">
            <a href="{{ route('front.details', ['id' => $product->id]) }}" class="view-details-btn">View Details</a>
            <a href="#" class="add-to-cart-btn">Add to Cart</a>
        </div> --}}
    </div>
@endforeach
