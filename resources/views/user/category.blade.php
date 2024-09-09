<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .category-header {
            background-image: url('your-category-banner.jpg'); /* Replace with your banner image */
            background-size: cover;
            background-position: center;
            padding: 50px 0;
            color: white;
            text-align: center;
        }
        .category-header h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }
        .filters {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-image {
            position: relative;
        }
        .product-image img {
            width: 100%;
            border-bottom: 1px solid #eee;
        }
        .product-info {
            padding: 15px;
        }
        .product-info h5 {
            margin: 0;
            font-size: 1.2em;
            color: #333;
        }
        .product-info p {
            margin: 5px 0;
            color: #777;
        }
        .product-info .price {
            font-size: 1.1em;
            color: #333;
            font-weight: bold;
        }
        .product-info .old-price {
            font-size: 0.9em;
            color: #999;
            text-decoration: line-through;
            margin-left: 10px;
        }
        .product-card-footer {
            display: flex;
            justify-content: space-between;
            padding: 10px 15px;
            background: #f8f9fa;
        }
        .btn-cart {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-cart:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
            text-align: center;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="category-header">
        <h1>Men's Clothing</h1>
        <p>Discover the latest trends in men's fashion</p>
    </div>

    <div class="container my-4">
        <div class="filters row mb-4">
            <div class="col-md-4">
                <h5>Filter by Price</h5>
                <input type="range" class="form-range" min="0" max="1000" step="10">
            </div>
            <div class="col-md-4">
                <h5>Categories</h5>
                <select class="form-select">
                    <option>All</option>
                    <option>T-Shirts</option>
                    <option>Jackets</option>
                    <option>Pants</option>
                    <option>Shoes</option>
                </select>
            </div>
            <div class="col-md-4">
                <h5>Sort by</h5>
                <select class="form-select">
                    <option>Popularity</option>
                    <option>Newest</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                </select>
            </div>
        </div>

        <div class="row g-4">
            <!-- Example Product Card -->
            <div class="col-md-3">
                <div class="card product-card">
                    <div class="product-image">
                        <img src="product1.jpg" alt="Product 1"> <!-- Replace with your image -->
                    </div>
                    <div class="product-info">
                        <h5>Product Name</h5>
                        <p>Category</p>
                        <div class="d-flex align-items-center">
                            <span class="price">$49.99</span>
                            <span class="old-price">$69.99</span>
                        </div>
                    </div>
                    <div class="product-card-footer">
                        <a href="#" class="btn btn-sm btn-cart">Add to Cart</a>
                        <a href="#" class="text-muted"><i class="bi bi-heart"></i></a>
                    </div>
                </div>
            </div>
            <!-- Repeat Product Cards as Needed -->
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Your Brand. All rights reserved.</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
