<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body, html {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: #f4f4f9;
            color: #333;
        }
        .navbar {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        /* .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            color: #4f565d;
        }
        .order-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .order-card-header {
            background: #76808a;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-card-header h2 {
            margin: 0;
            font-size: 1.2em;
        }
        .order-card-header .order-status {
            background: #fff;
            color: #63676b;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .order-card-body {
            padding: 15px;
        }
        .order-details {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        .order-details span {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .order-details p {
            margin: 0;
            color: #666;
        }
        .order-items {
            border-top: 1px solid #ddd;
            margin-top: 15px;
            padding-top: 15px;
        }
        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-items th, .order-items td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .order-items th {
            background: #f4f4f4;
        }
        .order-items td {
            text-align: center;
        }
        .order-items .total {
            font-weight: bold;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                font-size: 14px;
            }
            .order-card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .order-card-header h2 {
                font-size: 1em;
            }
            .order-items th, .order-items td {
                font-size: 0.9em;
                padding: 8px;
            }
            .order-details span {
                font-size: 0.9em;
            }
            .order-details p {
                font-size: 0.8em;
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    {{-- <div class="navbar">
        <a href="/">Home</a>
        <a href="{{ route('user.account') }}">My Account</a>
        <a href="{{ route('user.orders') }}">Orders</a>
        <a href="#">Settings</a>
    </div> --}}

    <div class="container">
        <div class="header">
            <h1>Your Order History</h1>
        </div>

        <!-- Example of an order card -->
        {{-- @foreach ($orders as $order) --}}
            <div class="order-card">
                <div class="order-card-header">
                    <h2>Order #</h2>
                    <span class="order-status"></span>
                </div>
                <div class="order-card-body">
                    <div class="order-details">
                        <span>Order Date:</span>
                        <p></p>
                    </div>
                    <div class="order-details">
                        <span>Total Amount:</span>
                        <p>$</p>
                    </div>
                    <div class="order-items">
                        <h3>Order Items</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($order->items as $item)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach --}}
                                <tr>
                                    <td colspan="3" class="total">Grand Total:</td>
                                    <td class="total"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        {{-- @endforeach --}}
    </div>
   
</body>
</html>
@include('layouts.userfooter')