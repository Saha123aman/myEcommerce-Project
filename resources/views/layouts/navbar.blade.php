<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce Store</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/usernavbar.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
        integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
        <style>
            .navbar {
    position: sticky;
    top: 0; /* Ensure it sticks to the top */
    z-index: 1000; /* Ensure it stays on top of other content */
    background-color: rgb(181, 191, 207); /* Ensure background color is set for visibility */
}

        </style>
</head>

<body>
    <header>
        <nav class="navbar ">
            <div class="hamburger-menu" onclick="toggleSidebar()">☰</div>
            <div class="logo">
                <a href="#"></a>
            </div>
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search products...">
                <button id="searchbutton">🔍</button>
                <ul id="result"
                    style="position: absolute; z-index: 1000; background: white; max-height: 200px; overflow-y: auto; border: 1px solid #e6e6e6; top: 100%; width: calc(100% - 40px);">
                </ul>
            </div>
            <div class="nav-links">
                @auth('custom')
                    <a href="{{ route('user.account') }}" class="nav-item">
                        <span class="icon">👤</span>
                        {{ Auth::guard('custom')->user()->name }}
                    </a>
                   
                @else
                    <a href="{{ route('user.login') }}" class="nav-item ">
                        <span class="icon">👤</span>
                        Sign In
                    </a>
                @endauth
                <a href="{{ route('front.cart') }}" class="nav-item"  style="position: relative;">
                    <span class="icon mx-4">🛒</span>
                    <span class="cart-badge mx-4">{{ $cartCount }}</span>
                </a>
            </div>

        </nav>
    </header>

    {{-- @if (session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif --}}

    <ul class="categories" style="list-style: none; margin: 0 15px;">
       
      
        <ul class="nav-menu">
            <li> <a href="{{ route('front.home') }}">
                HOME
             </a></li>
            <li ><a href="{{ route('front.men.category', ['value' => 'men']) }}">MEN</a>
                <ul class="dropdown-menu">
                  {{-- getting from service provider --}}
                    @foreach($menproductcategories as $mencat)
                    <li data-id="{{ $mencat->id }}">
                        <a href="{{ route('front.men.getcategory', ['id' => $mencat->id]) }}">
                            {{ $mencat->name }}
                        </a>
                    </li>
                @endforeach
                  
                </ul>
            </li>
        </ul>
        <ul class="nav-menu">
        <li value="women"><a href="{{ route('front.women.category', ['value' => 'women']) }}">WOMEN</a>
            <ul class="dropdown-menu">
                  {{-- getting from service provider --}}

                @foreach($womenproductcategories as $womencat)
                <li data-id="{{ $womencat->id }}">
                    <a href="{{ route('front.men.getcategory', ['id' => $womencat->id]) }}">
                        {{ $womencat->name }}
                    </a>
                </li>
            @endforeach
            
              
            </ul>
        
        </li>
    </ul>
        <li value="kids"><a href="">KIDS</a></li>
        <li> <a href="{{ route('front.products') }}">PRODUCTS</a></li>
        <li> <a href="{{ route('user.orders') }}">ORDERS </a></li>

        <li><a href="">BACK TO SCHOOL</a></li>
        <li><a href="">COLLEGE ESSENTIALS</a></li>
        <li><a href="">SUMMER GAMES</a></li>
        {{-- <a href="#">Electronics</a> --}}


    </ul>
    {{-- <script>
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
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    <script>
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Item added to the cart',
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    popup: 'custom-alert-1',
                    title: 'custom-alert-1',
                    content: 'custom-alert-1',
                    actions: 'custom-alert-1'
                }
            });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
                showConfirmButton: true,
                customClass: {
                    popup: 'custom-alert-1',
                    title: 'custom-alert-1',
                    content: 'custom-alert-1',
                    actions: 'custom-alert-1'
                }
            });
    </script>
@endif

@include('layouts.sidebar')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#search').on('keyup', function() {
                var value = $(this).val();
                //console.log(value);// Get the value of the search input

                if (value.length === 0) {
                    $('#result').empty().hide(); // Clear results if input is empty and hide
                    return;
                }

                $.ajax({
                    url: '{{ route('productsget') }}', // Ensure this matches your route
                    method: 'GET',
                    data: {
                        value: value
                    }, // Send the 'value' as a key-value pair
                    dataType: 'json',
                    success: function(response) {

                        $('#result').empty(); // Clear previous results

                        if (response.data.length > 0) {
                            //console.log(response);
                            // Create a list for results
                            $.each(response.data, function(index, product) {
                                // Create a list item for each product
                                var listItem = $('<li>').text(product.name).css(
                                    'padding', '10px').css('cursor',
                                    'pointer'); // Added styles
                                listItem.on('click', function() {

                                    $('#search').val(product.name);
                                    window.location.href =
                                        '{{ url('details') }}/' + product
                                        .id; // Set input value on click
                                    $('#result').empty()
                                        .hide(); // Clear results and hide
                                });
                                $('#result').append(listItem);
                            });
                            $('#result').show(); // Show results
                        } else {
                            // Display 'No results' message
                            $('#result').append($('<li>').text('No results found.').css(
                                'padding', '10px'));
                            $('#result').show();
                        }

                        // Adjust the width of the results container
                        adjustResultWidth();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX request error:', textStatus, errorThrown);
                    }
                });
            });



            function adjustResultWidth() {
                var searchBarWidth = $('.search-bar').outerWidth(); // Get the width of the search bar
                $('#result').css('width', searchBarWidth + 'px'); // Set the width of the result container
            }

            $(window).on('resize', function() {
                adjustResultWidth(); // Adjust the width on window resize
            });

            adjustResultWidth(); // Initial adjustment


            // Function to perform the search operation
            function performSearch() {
                var value = $('#search').val(); // Get the value of the search input
                // console.log(value);
                $.ajax({
                    url: '{{ route('front.showproducts') }}',
                    method: 'GET',
                    data: {
                        search: value
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) { //not true
                            console.log(response);
                            window.location.href = "{{ route('front.searchproducts') }}?search=" +
                                encodeURIComponent(value);
                        } else { //if true
                            window.location.href = "{{ route('front.searchproducts') }}?search=" +
                                encodeURIComponent(value);

                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX request error:', textStatus, errorThrown);
                    }
                });
            }

            // Click event for the search button
            $('#searchbutton').on('click', function() {

                performSearch();
            });

            // Keydown event for the search input field
            $('#search').on('keydown', function(event) {
                // Check if Enter key is pressed
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent form submission if it's inside a form
                    performSearch();
                }
            });


        });
    </script>




    <script>
       function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    
    // Toggle the active class for both the sidebar and the hamburger menu
    sidebar.classList.toggle('active');
    hamburgerMenu.classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 5000);
    }
});

    </script>
</body>

</html>
