<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men's T-Shirts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .header {
            background-color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .header .title {
            font-size: 20px;
            font-weight: bold;
        }
        .header .icons {
            display: flex;
            align-items: center;
        }
        .header .icons div {
            margin-left: 15px;
        }
        .container {
            padding: 70px 15px 15px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .offer {
            background-color: #e91e63;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .product {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(50% - 15px);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .product img {
            width: 100%;
            border-radius: 5px;
        }
        .product .info {
            text-align: center;
            margin-top: 10px;
        }
        .product .info .name {
            font-size: 16px;
            font-weight: bold;
        }
        .product .info .price {
            color: #e91e63;
            margin-top: 5px;
        }
        .product .info .old-price {
            text-decoration: line-through;
            color: #888;
            margin-left: 5px;
        }
        .product .info .discount {
            color: #4caf50;
        }
        .footer {
            background-color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .footer button {
            padding: 10px 20px;
            background-color: #e91e63;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Men's T-Shirts</div>
        <div class="icons">
            <div><img src="https://img.icons8.com/material-outlined/24/000000/sort.png" alt="Sort Icon"></div>
            <div><img src="https://img.icons8.com/material-outlined/24/000000/filter.png" alt="Filter Icon"></div>
        </div>
    </div>

    <div class="container">
        <div class="offer">FLAT 300 OFF MYNTRA300</div>
        <div class="products">
            <div class="product">
                <img src="https://via.placeholder.com/300x400" alt="Product 1">
                <div class="info">
                    <div class="name">Roadster</div>
                    <div>Solid Scoop Neck T-shirt</div>
                    <div class="price">₹184 <span class="old-price">₹499</span> <span class="discount">(63% OFF)</span></div>
                    <div class="best-price">Best Price ₹165 with coupon</div>
                </div>
            </div>
            <div class="product">
                <img src="https://via.placeholder.com/300x400" alt="Product 2">
                <div class="info">
                    <div class="name">Roadster</div>
                    <div>Relaxed Fit Pure Cotton</div>
                    <div class="price">₹699</div>
                </div>
            </div>
            <!-- Add more products as needed -->
        </div>
    </div>

    <div class="footer">
        <button>SORT</button>
        <button>FILTER</button>
    </div>
</body>
</html>
