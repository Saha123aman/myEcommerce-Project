<html>

<head>

</head>

<body>
    <aside class="filters">
        <h3 style="text-align:center;">FILTERS</h3>
     <div id="price-filter" data-category-name="{{ $categoryName }}" class="my-4">
            <h5>Price</h5>
            <label>
                <input type="radio" name="price" value="low-to-high">
                Low to High<br>
                <input type="radio" name="price" value="high-to-low">
                High to Low
            </label><br>
        </div>

        <div id="color-filter" class="my-4">
            <h5>Color</h5>
            <label>
                <input type="checkbox" name="color[]" value="red">
                <span class="color-swatch" style="background-color: red;"></span>
                Red <br>

                <input type="checkbox" name="color[]" value="blue">
                <span class="color-swatch" style="background-color: blue;"></span>
                Blue <br>

                <input type="checkbox" name="color[]" value="green">
                <span class="color-swatch" style="background-color: green;"></span>
                Green
            </label><br>
        </div>

    </aside>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script>
        $(document).ready(function() {
            function fetchProducts() {
                const categoryName = $('#price-filter').data('category-name');
                const priceOrder = $('input[name="price"]:checked').val();

                console.log('Category:', categoryName);
                console.log('Price Order:', priceOrder);

                const data = {
                    price: priceOrder,
                    categoryName: categoryName
                };

                $.ajax({
                    url: '{{ route('front.menproductfilter') }}',
                    method: 'GET',
                    dataType: 'JSON',
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            console.log('Response Products:', response.products);
                           
                            $('#product-list').empty(); // Clear previous products

                            if (response.products.length > 0) {
                                response.products.forEach(item => {
                                    let product = item.product;
                                    let detailsUrl = item.details_url;

                                    var productHtml = `
                                <div class="card product-card">
                                    <img 
                        src="${product.image_url ? '/productimages/' + product.image_url : '/productimages/default-profile.png'}"
                        style="max-height: 200px;" 
                        class="img-fluid product-img" 
                        alt="Product Image"
                        onclick="window.location.href='${detailsUrl}'">
                            
                            
                                    <h3>${product.name}</h3>
                                    <div class="product-rating">
                                        <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
                                    </div>
                                    <p>Rs: ${product.price}</p>
                                    <h6 style="color:${product.product_Availability === 'In Stock' ? 'rgb(67, 197, 106)' : 'rgb(215, 46, 28)'}">${product.product_Availability}</h6>
                                </div>
                            `;

                                    $('#product-list').append(productHtml);
                                });
                            } else {
                                $('#product-list').html('<p>No products found!</p>');
                            }

                        } else {
                            console.error('Error:', response.message);
                            $('#product-list').html('<p>Error: ' + response.message + '</p>');
                        }
                    },
                    error: function(xhr) {
                        console.error('An error occurred:', xhr.responseText);
                        $('#product-list').html('<p>An error occurred. Please try again later.</p>');
                    }
                });
            }

            // Bind the fetchProducts function to the change event of radio inputs for price
            $('input[name="price"]').on('change', function() {
                fetchProducts();
            });

            // Optionally, fetch products initially on page load
            // fetchProducts();
        });
    </script>
</body>

</html>
