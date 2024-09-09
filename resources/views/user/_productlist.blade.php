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
                <p class="card-text" style="font-size:15px; ">&#8377; {{ $product->price }}</p>
                @if ($product->product_Availability === 'In Stock')
                    <h6 style="color:rgb(67, 197, 106)">{{ $product->product_Availability }}</h6>
                @else
                    <h6 style="color:rgb(215, 46, 28)">{{ $product->product_Availability }}</h6>
                @endif
                <!-- Desktop Buttons -->
                {{-- <div class="d-none d-md-flex justify-content-between desktopbtn">
                            <a href="{{ route('front.details', ['id' => $product->id]) }}"
                                class="btn btn-outline-success btn-sm">View Details</a>
                            <a href="#" class="btn btn-success btn-sm">Add to Cart</a>
                        </div> --}}
                <!-- Mobile Buttons -->
                <div class="d-md-none d-flex justify-content-between mobilebtn">
                    <a href="{{ route('front.details', ['id' => $product->id]) }}"
                        class="btn btn-outline-success btn-sm">Details</a>
                    <a href="#" class="btn btn-success btn-sm">Cart</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
