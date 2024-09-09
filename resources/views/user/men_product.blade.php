<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #fff;
            color: #333;
            padding: 20px 0;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .header h1 {
            margin: 0;
        }

        .nav {
            background-color: #333;
            overflow: hidden;
        }

        .nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .search-bar {
            margin: 20px 0;
            text-align: center;
        }

        .search-bar input {
            padding: 10px;
            width: 80%;
            max-width: 600px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .section {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            width: 180px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .section:hover {
            transform: scale(1.05);
        }

        .section img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .section h2 {
            font-size: 1.2em;
            margin: 0 0 10px;
        }

        .section p {
            color: #777;
            font-size: 0.9em;
            margin: 0 0 10px;
        }

        .section a {
            display: inline-block;
            padding: 8px 12px; /* Reduced padding for smaller screens */
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 0.9em; /* Reduced font size */
        }

        .section a:hover {
            background-color: #1b642b;
            text-decoration: none;
            color: white;
        }

        @media (max-width: 768px) {
            .container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Responsive columns */
                gap: 10px; /* Space between items */
            }

            .section a {
                padding: 8px 12px; /* Ensure button size is smaller */
                font-size: 0.9em; /* Ensure text size is smaller */
            }

            .search-bar input {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            .nav a {
                float: none;
                display: block;
                text-align: left;
            }

            .search-bar input {
                width: 100%;
                font-size: 16px;
            }

            .section {
                width: 100%; /* Full width for each item on very small screens */
                max-width: 100%; /* Ensure items don't overflow */
            }

            .section h2 {
                font-size: 1em; /* Reduce font size */
            }

            .section p {
                font-size: 0.8em; /* Reduce font size */
            }

            .section a {
                padding: 6px 10px; /* Further reduce padding */
                font-size: 0.8em; /* Further reduce font size */
            }
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
        @foreach($products as $product)
        <div class="section">
            <img src="{{ asset('categoryimages/'.$product->category_image) }}" alt="{{ $product->name }}">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->startingprice_or_discount }}</p>
            <a href="{{ route('front.men.getcategory', ['id' => $product->id]) }}">Shop Now</a>
        </div>
        @endforeach
    </div>
</body>
</html>
@include('layouts.userfooter')