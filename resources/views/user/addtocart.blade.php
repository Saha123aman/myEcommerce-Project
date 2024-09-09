<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/frontend/addtocart.css') }}">
    </style>
</head>

<body>
    <!-- Header & Navigation -->
    @include('layouts.navbar')

    <!-- Cart Summary Section -->
    <main class="container my-5">
        <h1 class="mb-4">Shopping Cart</h1>
        <div class="row g-4">
            <div class="col-md-8">
                @php
                    $total = 0;
                @endphp
                @forelse($cartItems as $item)
                    @php
                        $quantity = $item->quantity; // Quantity from the cart item
                        $productTotal = $item->product->price * $quantity;
                        $total += $productTotal;
                    @endphp
                    <div class="card mb-3">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <a href="{{ route('front.details', ['id' => $item->product->id]) }}">
                                    <img src="{{ asset('productimages/'.$item->product->image_url) }}" id="imageclick" class="img-fluid rounded-start" alt="Product Image">
                                </a>
                            </div>

                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->product->name }}</h5>
                                    <p class="card-text">Description of the product...</p>
                                    <div class="d-flex align-items-center">
                                        <span class="me-2 product-price" data-price="{{ $item->product->price }}">
                                            ${{ $item->product->price }}
                                        </span>
                                        <div class="input-group input-group-sm">
                                            <button class="btn btn-outline-secondary quantity-btn" type="button" data-action="decrease">-</button>
                                            <input type="number" class="form-control quantity-input" value="{{ $quantity }}" min="1">
                                            <button class="btn btn-outline-secondary quantity-btn" type="button" data-action="increase">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <div>
                                    <h5 class="mb-0 item-total">${{ $productTotal }}</h5>
                                    <button class="btn btn-outline-danger mt-2 removebtn" data-item-id="{{ $item->id }}">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Your cart is empty.</p>
                @endforelse
            </div>

            <!-- Order Summary -->
            <div class="col-md-4">
                <div class="card p-3">
                    <h4>Order Summary</h4>
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span id="subtotal">${{ $total }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span id="shipping">$5.00</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tax</span>
                        <span id="tax">${{ number_format($total * 0.05, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Total</span>
                        <strong id="total">${{ number_format($total + 5.00 + ($total * 0.05), 2) }}</strong>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">Proceed to Checkout</button>
                </div>
                <div class="mt-3">
                    <input type="text" class="form-control" placeholder="Enter promo code">
                    <button class="btn btn-outline-secondary mt-2 w-100">Apply Promo Code</button>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    @include('layouts.userfooter')
</body>

</html>
