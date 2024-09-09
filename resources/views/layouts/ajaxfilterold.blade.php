<html>
<head>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
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

        .modal-body label {
            display: block;
            padding: 10px;
            border-bottom: 1px solid #e6e6e6;
            cursor: pointer;
            font-size: 16px;
        }

        .modal-body label:last-child {
            border-bottom: none;
        }

        .modal-body input[type="radio"],
        .modal-body input[type="checkbox"] {
            margin-right: 10px;
        }

        /* Show modal */
        .modal.show {
            display: block;
        }

        .modal.show .modal-content {
            bottom: 0; /* Slide up from the bottom */
        }
    </style>
</head>
<body>
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
                <form id="categoryform">


                    <ul id="category">
                       <li></li>
                    </ul>
{{--                     
                <label>
                    <input type="radio" name="category" value="men">
                    Men
                </label>
                <label>
                    <input type="radio" name="category" value="women">
                    Women
                </label>
                <label>
                    <input type="radio" name="category" value="kids">
                    Kids
                </label> --}}
            </form>
            </div>
        </div>
    </div>

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
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#category').on('click', function() {
          alert('click');
    
            // Make an AJAX request to fetch filtered products based on the selected categories
            // $.ajax({
            //     url: '{{ route('front.productfilter') }}',
            //     type: 'get',
            //     data: {
            //         categories: category // Update this parameter based on your needs
            //     },
            //     dataType: 'JSON',
            //     success: function(response) {
            //         console.log(response);
            //         if (response.success) {
            //             // Clear the current product list
            //             $('#product-list').empty();
    
            //             // Generate HTML for each product and append it to #product-list
            //             response.products.forEach(product => {
            //                 const productHTML = `
            //                     <div class="col-md-3 col-6 mb-4">
            //                         <div class="card product-card">
            //                             <img src="${product.image_url ? '/productimages/' + product.image_url : '/productimages/default-profile.png'}"
            //                                 alt="Product Image" class="img-fluid product-img" style="max-height: 200px;">
            //                             <div class="card-body">
            //                                 <h4 class="card-title">${product.name}</h4>
            //                                 <div class="product-rating">
            //                                     <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
            //                                 </div>
            //                                 <p class="card-text">Rs: ${product.price}</p>
            //                                 <!-- Desktop Buttons -->
            //                                 <div class="d-none d-md-flex justify-content-between desktopbtn">
            //                                     <a href="${product.details_url}" class="btn btn-outline-success btn-sm">View Details</a>
            //                                     <form action="${product.add_to_cart_url}" method="POST">
            //                                         @csrf
            //                                         <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
            //                                     </form>
            //                                 </div>
            //                                 <!-- Mobile Buttons -->
            //                                 <div class="d-md-none d-flex mobilebtn">
            //                                     <a href="${product.details_url}" class="btn btn-outline-success btn-sm">Details</a>
            //                                     <form action="${product.add_to_cart_url}" method="POST">
            //                                         @csrf
            //                                         <button type="submit" class="btn btn-success btn-sm">Cart</button>
            //                                     </form>
            //                                 </div>
            //                             </div>
            //                         </div>
            //                     </div>
            //                 `;
            //                 $('#product-list').append(productHTML);
            //             });
            //         } else {
            //             console.log(response.message);
            //         }
            //     },
            //     error: function(response) {
            //         console.log(response);
            //     }
            // });
        });
    
        $('#sortform').on('change', 'input[name="sortprice"]', function() {
            let sort = $('input[name="sortprice"]:checked').val();
    
            console.log(sort);
            $.ajax({
                url: '{{ route('front.productfilter') }}',
                type: 'get',
                data: {
                    data: sort
                },
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        // Clear the current product list
                        $('#product-list').empty();
    
                        // Generate HTML for each product and append it to #product-list
                        response.products.forEach(product => {
                            const productHTML = `
                                 <div class="col-md-3 col-6 mb-4">
                                    <div class="product-card">
                                        <img src="${product.image_url ? '/productimages/' + product.image_url : '/productimages/default-profile.png'}"
                                            alt="Product Image" class="img-fluid product-img" style="max-height: 200px;">
                                        <div class="card-body">
                                            <h4 class="card-title">${product.name}</h4>
                                            <div class="product-rating">
                                                <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
                                            </div>
                                            <p class="card-text">Rs: ${product.price}</p>
                                            <!-- Desktop Buttons -->
                                            <div class="d-none d-md-flex justify-content-between desktopbtn">
                                                <a href="${product.details_url}" class="btn btn-outline-success btn-sm">View Details</a>
                                                <form action="${product.add_to_cart_url}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                                                </form>
                                            </div>
                                            <!-- Mobile Buttons -->
                                            <div class="d-md-none d-flex mobilebtn">
                                                <a href="${product.details_url}" class="btn btn-outline-success btn-sm">Details</a>
                                                <form action="${product.add_to_cart_url}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $('#product-list').append(productHTML);
                        });
                    } else {
                        console.log(response.message);
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
    </script>
</body>
</html>
