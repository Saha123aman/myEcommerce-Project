


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Filter and Sort Modal</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #f4f4f4;
        }
       
.small-swal-popup {
    width: 300px !important; /* Adjust the width */
    padding: 15px !important; /* Adjust the padding */
    font-size: 14px !important; /* Adjust the font size */
}


        .filter-dropdown {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #f8f9fa; /* Light gray background */
            border-top: 1px solid #e6e6e6;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            display: flex;
            justify-content: space-around;
            padding: 10px;
            box-sizing: border-box;
        }

        .filter-select {
            width: 40%;
            max-width: 180px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 6px;
            font-size: 14px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .filter-select:hover {
            border-color: #007bff;
        }

        .filter-select::after {
            content: '▼';
            font-size: 10px;
            color: #007bff;
            margin-left: auto;
        }

        /* Fullscreen modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1050; /* On top of everything */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
            transition: all 0.3s ease-in-out;
        }

        .modal-content {
            background-color: #fff;
            margin: 0;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            position: absolute;
            bottom: -100%; /* Start off-screen */
            left: 0;
            right: 0;
            transition: bottom 0.3s ease-in-out; /* Animate from the bottom */
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e6e6e6;
            padding-bottom: 10px;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 18px;
        }

        .modal-header .close {
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal-body {
            padding-top: 10px;
        }

        /* Main Categories */
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul > li {
            margin-bottom: 10px;
        }

        .modal-body > ul > li > a {
            display: block;
            padding: 8px 10px;
            background-color: #4a5868;
            color: #fff;
            border-radius: 3px;
            font-size: 16px;
            width: 90%;
            max-width: 400px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin: 0 auto;
        }

        .modal-body > ul > li > a:hover {
            background-color: #4f5e6e;
        }

        /* Subcategories */
        .subcategories {
            display: none;
            padding-left: 20px;
            font-size: 14px;
            color: #555;
            margin-top: 5px;
            max-height: 150px;
            overflow-y: auto;
            width: 90%;
            max-width: 400px;
            margin: 0 auto;
        }

        .subcategories li {
            margin-bottom: 5px;
        }

        .subcategories a {
            display: block;
            padding: 6px 8px;
            background-color: #e9ecef;
            color: #333;
            border-radius: 3px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .subcategories a:hover {
            background-color: #d6d8db;
        }

        .modal.show {
            display: block;
        }

        .modal.show .modal-content {
            bottom: 0; /* Slide up from the bottom */
        }
        /* Align radio buttons and labels vertically */
#sortform {
    display: flex;
    flex-direction: column;
    gap: 10px; /* Add some space between the labels */
}

#sortform label {
    display: flex;
    align-items: center;
    font-size: 16px;
    cursor: pointer;
}

#sortform input[type="radio"] {
    margin-right: 10px; /* Space between radio button and label text */
}

    </style>
</head>

<body>
<main>
    <div class="filter-dropdown">
        <div class="filter-select" onclick="openModal('sortModal')">
            <span>Sort By</span>
        </div>
        <div class="filter-select" onclick="openModal('filterModal')">
            <span>Filter by Category</span>
        </div>
    </div>

    <!-- Sort By Modal -->
    <div id="sortModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Sort By</h2>
                <span class="close" onclick="closeModal('sortModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="sortform">
                    <label>
                        <input type="radio" name="sortprice" value="lowest">
                        Price (Lowest First)
                    </label>
                    <label>
                        <input type="radio" name="sortprice" value="highest">
                        Price (Highest First)
                    </label>
                    <label>
                        <input type="radio" name="sortprice" value="new">
                        What's New
                    </label>
                </form>
            </div>
        </div>
    </div>

    <!-- Filter by Category Modal -->
    <div id="filterModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Filter by Category</h2>
                <span class="close" onclick="closeModal('filterModal')">&times;</span>
            </div>
            <div class="modal-body">
                <ul>
                    <li class="men">
                        <a href="#" class="men-btn" onclick="toggleSubcategories('men-options')">Men</a>
                        <ul class="subcategories" id="men-options">
                            @foreach($menproductcategories as $mencat)
                            <li data-id="{{ $mencat->id }}" style="cursor:pointer">
                                {{-- <a href="{{ route('front.men.getcategory', ['id' => $mencat->id]) }}"> --}}
                                    {{ $mencat->name }}
                                {{-- </a> --}}
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="women">
                        <a href="#" class="women-btn" onclick="toggleSubcategories('women-options')">Women</a>
                        <ul class="subcategories" id="women-options">
                            @foreach($womenproductcategories as $womencat)
                            <li data-id="{{ $womencat->id }}" style="cursor:pointer">
                                {{-- <a href="{{ route('front.men.getcategory', ['id' => $womencat->id]) }}"> --}}
                                    {{ $womencat->name }}
                                {{-- </a> --}}
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="kids">
                        <a href="#" class="kids-btn" onclick="toggleSubcategories('kids-options')">Kids</a>
                        <ul class="subcategories" id="kids-options">
                            <li><a href="#">Toys</a></li>
                            <li><a href="#">Clothing</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var productFilterUrl = '{{ route("front.productfilter") }}';
        var ajaxfilter='{{ route("front.ajaxfilter") }}';
        
    </script>
    <script src="{{ asset('js/ajaxfilter.js') }}"></script>
    
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.add("show");

            // Add click event to close the modal when clicking outside of it
            window.addEventListener('click', function(event) {
                if (event.target.classList.contains('modal')) {
                    closeModal(modalId);
                }
            });
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove("show");
        }

        function toggleSubcategories(subcategoryId) {
            var subcategory = document.getElementById(subcategoryId);
            subcategory.style.display = subcategory.style.display === "block" ? "none" : "block";
        }
    </script>
   
</body>

</html>
