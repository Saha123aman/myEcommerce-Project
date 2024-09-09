<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Design</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
            text-align: left;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #575757;
        }

        .product-options, .men-options, .women-options, .kids-options {
            max-height: 0;
            overflow: hidden;
            list-style-type: none;
            padding-left: 20px;
            transition: max-height 0.5s ease-out, padding 0.5s ease-out;
        }

        .product-options li, .men-options li, .women-options li, .kids-options li {
            padding: 10px 0;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .product.active .product-options,
        .men.active .men-options,
        .women.active .women-options,
        .kids.active .kids-options {
            max-height: 500px; /* Adjust based on content size */
            padding-left: 20px;
            transition: max-height 0.5s ease-in, padding 0.5s ease-in;
        }

        .product-btn::after,
        .men-btn::after,
        .women-btn::after,
        .kids-btn::after {
            content: '+';
            float: right;
            font-weight: bold;
        }

        .product.active .product-btn::after,
        .men.active .men-btn::after,
        .women.active .women-btn::after,
        .kids.active .kids-btn::after {
            content: '-';
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <ul>
            <li><a href="#">Home</a></li>
            <li class="product">
                <a href="#" class="product-btn">Product</a>
                <ul class="product-options">
                    <li class="men">
                        <a href="#" class="men-btn">Men</a>
                        <ul class="men-options">
                            <li><a href="#">Shirts</a></li>
                            <li><a href="#">Pants</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </li>
                    <li class="women">
                        <a href="#" class="women-btn">Women</a>
                        <ul class="women-options">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </li>
                    <li class="kids">
                        <a href="#" class="kids-btn">Kids</a>
                        <ul class="kids-options">
                            <li><a href="#">Toys</a></li>
                            <li><a href="#">Clothing</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
      
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productBtn = document.querySelector('.product-btn');
            const menBtn = document.querySelector('.men-btn');
            const womenBtn = document.querySelector('.women-btn');
            const kidsBtn = document.querySelector('.kids-btn');

            productBtn.addEventListener('click', function (e) {
                e.preventDefault();
                this.parentElement.classList.toggle('active');
            });

            menBtn.addEventListener('click', function (e) {
                e.preventDefault();
                this.parentElement.classList.toggle('active');
            });

            womenBtn.addEventListener('click', function (e) {
                e.preventDefault();
                this.parentElement.classList.toggle('active');
            });

            kidsBtn.addEventListener('click', function (e) {
                e.preventDefault();
                this.parentElement.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
