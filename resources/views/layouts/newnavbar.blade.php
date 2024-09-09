<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header with Rectangular Dropdown Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            padding: 10px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .nav-menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .nav-menu li {
            position: relative;
            margin: 0 20px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-weight: bold;
            border-radius: 4px;
        }

        .nav-menu a:hover {
            background: linear-gradient(45deg, #ff6b6b, #f06595);
            color: #fff;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #444;
            list-style: none;
            margin: 0;
            padding: 10px;
            width: 220px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            z-index: 1000;
        }

        .dropdown-menu li {
            margin: 5px 0;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu a {
            padding: 10px;
            display: block;
            color: white;
            background-color: #444; /* Ensures the item background is consistent */
            border-radius: 4px;
            font-weight: normal;
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }

        .dropdown-menu a:hover {
            background-color: #555;
            border: 1px solid #666; /* Adds a border to emphasize the rectangular shape */
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul class="nav-menu">
                <li><a href="#">Home</a></li>
                <li class="dropdown">
                    <a href="#">Men</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">T-Shirts</a></li>
                        <li><a href="#">Jeans</a></li>
                        <li><a href="#">Shorts & 3/4ths</a></li>
                        <li><a href="#">Shirts</a></li>
                        <li><a href="#">Trackpants</a></li>
                        <li><a href="#">Trousers & Pants</a></li>
                        <li><a href="#">Flip-Flops & Slippers</a></li>
                        <li><a href="#">Jackets & Coats</a></li>
                        <li><a href="#">Innerwear</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Women</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Tops</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Shoes</a></li>
                    </ul>
                </li>
                <li><a href="#">Product</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
