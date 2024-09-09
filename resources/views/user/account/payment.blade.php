<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - eCommerce Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .navbar {
            background-color: #333;
            padding: 15px;
            color: white;
            text-align: center;
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            text-align: center;
            color: #333;
        }

        .order-summary, .payment, .shipping {
            margin-bottom: 30px;
        }

        h2 {
            font-size: 24px;
            color: #555;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .product {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .product img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-details {
            margin-left: 20px;
            flex-grow: 1;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }

        .product-price, .product-quantity, .product-subtotal {
            font-size: 16px;
            color: #888;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #218838;
        }

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            .product img {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">Shop</a>
        <a href="#">Cart</a>
        <a href="#">My Account</a>
    </div>

    <!-- Container -->
    <div class="container">

        <header>
            <h1>Checkout</h1>
        </header>

        <!-- Order Summary -->
        <section class="order-summary">
            <h2>Order Summary</h2>
            <div class="product">
                <img src="product-image.jpg" alt="Product Image">
                <div class="product-details">
                    <p class="product-name">Product Name</p>
                    <p class="product-quantity">Quantity: 1</p>
                    <p class="product-price">Price: $99.99</p>
                    <p class="product-subtotal">Subtotal: $99.99</p>
                </div>
            </div>
            <hr>
            <div class="total">
                <p><strong>Total: $99.99</strong></p>
            </div>
        </section>

        <!-- Shipping Details -->
        <section class="shipping">
            <h2>Shipping Information</h2>
            <form>
                <div class="form-group">
                    <label for="full-name">Full Name</label>
                    <input type="text" id="full-name" name="full_name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="zip">ZIP Code</label>
                    <input type="text" id="zip" name="zip" required>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" required>
                </div>
            </form>
        </section>

        <!-- Payment Details -->
        <section class="payment">
            <h2>Payment Details</h2>
            <form action="confirm.html" method="POST">
                <div class="form-group">
                    <label for="payment-method">Payment Method</label>
                    <select id="payment-method" name="payment_method" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="net_banking">Net Banking</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="card-name">Cardholder's Name</label>
                    <input type="text" id="card-name" name="card_name" required>
                </div>
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="expiry-date">Expiry Date</label>
                    <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required>
                </div>
                <button type="submit" class="btn">Confirm Purchase</button>
            </form>
        </section>

    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2024 eCommerce Website. All rights reserved.
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Purchase Confirmed!');
            // Here, you would typically redirect the user to a confirmation page or perform some further actions.
        });
    </script>
</body>
</html>
