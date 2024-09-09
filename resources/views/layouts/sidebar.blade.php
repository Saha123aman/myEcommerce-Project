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

        .logout-btn2 {
            display: none;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: -350px; /* Adjusted value for the new width */
            width: 320px; /* New width for the sidebar */
            height: 100%;
            background-color: #e1e8ed;
            transition: left 0.3s ease-in-out;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar .account {
            background-color: #6d7e94;
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ccc;
            color: #fff;
            height: 80px;
        }

        .sidebar .account .sidebar-close {
            font-size: 28px;
            cursor: pointer;
            color: #fff;
            float: right;
        }

        .sidebar .account a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .sidebar .account .icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .sidebar .account .username {
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .cart-badge {
            background-color: #ff3b3b;
            border-radius: 50%;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            position: absolute;
            top: -10px;
            right: -10px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px;
            text-align: left;
        }

        .sidebar ul li a {
            color: #333;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #575757;
            color: #fff;
        }

        .men-options,
        .women-options,
        .kids-options {
            max-height: 0;
            overflow: hidden;
            list-style-type: none;
            padding-left: 20px;
            transition: max-height 0.5s ease-out, padding 0.5s ease-out;
        }

        .men-options li,
        .women-options li,
        .kids-options li {
            padding: 10px 0;
        }

        .men.active .men-options,
        .women.active .women-options,
        .kids.active .kids-options {
            max-height: 900px;
            padding-left: 20px;
            transition: max-height 0.5s ease-in, padding 0.5s ease-in;
        }

        .men-btn::after,
        .women-btn::after,
        .kids-btn::after {
            content: '+';
            float: right;
            font-weight: bold;
        }

        .men.active .men-btn::after,
        .women.active .women-btn::after,
        .kids.active .kids-btn::after {
            content: '-';
        }

        .sidebar .additional-links {
            margin-top: 20px;
            padding: 0 15px;
        }

        .sidebar .additional-links ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar .additional-links ul li {
            padding: 10px 0;
        }

        /* Add this CSS rule for underlining the "Orders" link */
        .sidebar .additional-links ul li.orders-link::before {
            content: '';
            display: block;
            width: 100%;
            height: 1px;
            background-color: #ccc;
            margin-bottom: 10px;
        }

        /* Media Queries for Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 450px; /* Adjusted width for medium screens */
                left: -350px; /* Adjust this value for the new width */
            }

            .sidebar .account {
                padding: 15px;
            }

            .sidebar .account .icon {
                font-size: 20px;
            }

            .sidebar .account .username {
                font-size: 16px;
            }

            .cart-badge {
                font-size: 10px;
                padding: 4px 8px;
                top: -8px;
                right: -8px;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 250px; /* Adjusted width for smaller screens */
                left: -250px; /* Adjust this value for the new width */
            }

            .sidebar .account {
                padding: 10px;
            }

            .sidebar .account .icon {
                font-size: 18px;
            }

            .sidebar .account .username {
                font-size: 14px;
            }

            .cart-badge {
                font-size: 8px;
                padding: 3px 6px;
                top: -6px;
                right: -6px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="account">
            <span class="sidebar-close" onclick="toggleSidebar()">×</span>
            @auth('custom')
                <a href="{{ route('user.account') }}">
                    <span class="icon">👤</span>
                    <div class="username">
                        {{ Auth::guard('custom')->user()->name }}
                    </div>
                </a>
            @else
                <a href="{{ route('user.login') }}">
                    <span class="icon">👤</span> Sign In
                </a>
            @endauth
        </div>
        <div>
            <ul>
                <li class="men">
                    <a href="#" class="men-btn">Men</a>
                    <ul class="men-options">
                        @foreach($menproductcategories as $mencat)
                            <li data-id="{{ $mencat->id }}">
                                <a href="{{ route('front.men.getcategory', ['id' => $mencat->id]) }}">
                                    {{ $mencat->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="women">
                    <a href="#" class="women-btn">Women</a>
                    <ul class="women-options">
                        @foreach($womenproductcategories as $womencat)
                            <li data-id="{{ $womencat->id }}">
                                <a href="{{ route('front.men.getcategory', ['id' => $womencat->id]) }}">
                                    {{ $womencat->name }}
                                </a>
                            </li>
                        @endforeach
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
        </div>
        <div class="additional-links">
            @auth('custom')
                <a href="{{ route('front.cart') }}" class="nav-item" style="position: relative;color:rgb(51, 44, 44);"> 
                    <label>Cart</label>
                    <span class="icon mx-4">🛒</span>
                    <span class="cart-badge mx-4">{{ $cartCount }}</span>
                </a>
            @endauth
            <ul>
                <li> <a href="{{ route('front.products') }}">products</a></li>
                <li class="orders-link"><a href="{{ route('user.orders') }}">Orders</a></li>
                <li><a href="{{ route('front.contact') }}">Contact Us</a></li>
                
                <li><a href="{{ route('front.home') }}">home</a></li>
                    
            </ul>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const menBtn = document.querySelector('.men-btn');
            const womenBtn = document.querySelector('.women-btn');
            const kidsBtn = document.querySelector('.kids-btn');

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
