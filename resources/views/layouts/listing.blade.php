<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myntra Clone</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #ccc;
            position: relative;
            z-index: 1000;
        }

        .logo img {
            height: 40px;
        }

        nav {
            flex-grow: 1;
            margin: 0 20px;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px;
            display: block;
        }

        nav ul li a:hover {
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        .search-bar {
            flex-grow: 2;
            margin-left: 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .user-actions a {
            margin-left: 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px;
            display: inline-block;
        }

        .user-actions a:hover {
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        .dropdown-wrapper {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            display: none;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        nav ul li:hover .dropdown-wrapper {
            display: block;
        }

        .dropdown-menu {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            margin: 0;
            border-top: 1px solid #ccc;
        }

        .menu-column {
            width: 20%;
            padding: 10px;
        }

        .menu-column h3 {
            margin: 0 0 10px 0;
            font-size: 16px;
            color: #e74c3c;
            font-weight: bold;
        }

        .menu-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-column ul li {
            margin: 5px 0;
        }

        .menu-column ul li a {
            text-decoration: none;
            color: #333;
        }

        .menu-column ul li a:hover {
            color: #e74c3c;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
                align-items: flex-start;
                margin: 0;
            }

            nav ul li {
                margin: 5px 0;
            }

            .search-bar {
                margin-top: 10px;
            }

            .user-actions {
                margin-top: 10px;
                display: flex;
                flex-direction: column;
            }

            .user-actions a {
                margin: 5px 0;
            }

            .dropdown-menu {
                flex-direction: column;
            }

            .menu-column {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#">MEN</a>
                    <div class="dropdown-wrapper">
                        <div class="dropdown-menu">
                            <div class="menu-column">
                                <h3>Topwear</h3>
                                <ul>
                                    <li><a href="#">T-Shirts</a></li>
                                    <li><a href="#">Casual Shirts</a></li>
                                    <li><a href="#">Formal Shirts</a></li>
                                    <li><a href="#">Sweatshirts</a></li>
                                    <li><a href="#">Sweaters</a></li>
                                    <li><a href="#">Jackets</a></li>
                                    <li><a href="#">Blazers & Coats</a></li>
                                    <li><a href="#">Suits</a></li>
                                    <li><a href="#">Rain Jackets</a></li>
                                </ul>
                            </div>
                            <div class="menu-column">
                                <h3>Bottomwear</h3>
                                <ul>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Casual Trousers</a></li>
                                    <li><a href="#">Formal Trousers</a></li>
                                    <li><a href="#">Shorts</a></li>
                                    <li><a href="#">Track Pants & Joggers</a></li>
                                </ul>
                                <h3>Innerwear & Sleepwear</h3>
                                <ul>
                                    <li><a href="#">Briefs & Trunks</a></li>
                                    <li><a href="#">Boxers</a></li>
                                    <li><a href="#">Vests</a></li>
                                    <li><a href="#">Sleepwear & Loungewear</a></li>
                                    <li><a href="#">Thermals</a></li>
                                </ul>
                                <h3>Plus Size</h3>
                            </div>
                            <div class="menu-column">
                                <h3>Footwear</h3>
                                <ul>
                                    <li><a href="#">Casual Shoes</a></li>
                                    <li><a href="#">Sports Shoes</a></li>
                                    <li><a href="#">Formal Shoes</a></li>
                                    <li><a href="#">Sneakers</a></li>
                                    <li><a href="#">Sandals & Floaters</a></li>
                                    <li><a href="#">Flip Flops</a></li>
                                    <li><a href="#">Socks</a></li>
                                </ul>
                                <h3>Personal Care & Grooming</h3>
                                <ul>
                                    <li><a href="#">Sunglasses & Frames</a></li>
                                    <li><a href="#">Watches</a></li>
                                </ul>
                            </div>
                            <div class="menu-column">
                                <h3>Sports & Active Wear</h3>
                                <ul>
                                    <li><a href="#">Sports Shoes</a></li>
                                    <li><a href="#">Sports Sandals</a></li>
                                    <li><a href="#">Active T-Shirts</a></li>
                                    <li><a href="#">Track Pants & Shorts</a></li>
                                    <li><a href="#">Tracksuits</a></li>
                                    <li><a href="#">Jackets & Sweatshirts</a></li>
                                    <li><a href="#">Sports Accessories</a></li>
                                    <li><a href="#">Swimwear</a></li>
                                </ul>
                            </div>
                            <div class="menu-column">
                                <h3>Fashion Accessories</h3>
                                <ul>
                                    <li><a href="#">Wallets</a></li>
                                    <li><a href="#">Belts</a></li>
                                    <li><a href="#">Perfumes & Body Mists</a></li>
                                    <li><a href="#">Trimmers</a></li>
                                    <li><a href="#">Deodorants</a></li>
                                    <li><a href="#">Ties, Cufflinks & Pocket Squares</a></li>
                                    <li><a href="#">Accessory Gift Sets</a></li>
                                    <li><a href="#">Caps & Hats</a></li>
                                    <li><a href="#">Mufflers, Scarves & Gloves</a></li>
                                    <li><a href="#">Phone Cases</a></li>
                                    <li><a href="#">Rings & Wristwear</a></li>
                                    <li><a href="#">Helmets</a></li>
                                </ul>
                                <h3>Bags & Backpacks</h3>
                                <h3>Luggages & Trolleys</h3>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="#">WOMEN</a></li>
                <li><a href="#">KIDS</a></li>
                <li><a href="#">HOME & LIVING</a></li>
                <li><a href="#">BEAUTY</a></li>
                <li><a href="#">STUDIO</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search for products, brands and more">
        </div>
        <div class="user-actions">
            <a href="#">Profile</a>
            <a href="#">Wishlist</a>
            <a href="#">Bag</a>
        </div>
    </header>
    <main>
        <!-- Main content goes here -->
    </main>
</body>
</html>
