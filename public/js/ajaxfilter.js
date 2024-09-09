$(document).ready(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var selectedCategoryId = null; // Variable to store the selected category ID

    // Set up global AJAX settings to include CSRF token in headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    // Handle sorting by price
    $('#sortform').on('change', 'input[name="sortprice"]', function(){
        let sort = $("input[name='sortprice']:checked").val();
        console.log(sort);
       
        $.ajax({
            url: productFilterUrl,
            method: 'get',
            data: {
                sort: sort,
                catid: selectedCategoryId // Include selected category ID in the request
            },
            dataType: 'JSON',

            success: function(response){
                if(response.success){
                    console.log(response);
             
                    $('#product-list').empty();

                    response.products.forEach(product => {
                        let availabilityColor = product.product_Availability === 'In Stock' ? 'rgb(67, 197, 106)' : 'rgb(215, 46, 28)';
                        const productHTML = `
                        <div class="col-md-3 col-6 mb-4">
                        <div class="product-card">

                        <img 
                        src="${product.image_url ? '/productimages/' + product.image_url : '/productimages/default-profile.png'}"
                        style="max-height: 200px;" 
                        class="img-fluid product-img" 
                        alt="Product Image"
                        onclick="window.location.href='${product.details_url}'">
                            
                            <div class="card-body">
                                <h4 class="card-title">${product.name}</h4>
                                <div class="product-rating">
                                    <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
                                </div>
                                <p class="card-text">Rs: ${product.price}</p>
                                <h6 style="color:${availabilityColor}">${product.product_Availability}</h6>
                               
                              
                            </div>
                        </div>
                    </div>`;
                        $('#product-list').append(productHTML);
                    });
                } else {
                    console.log(response);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Print response text for more details
            }
        });
    });

    // Handle category selection
    $('.subcategories li').on('click', function(){
       selectedCategoryId = $(this).data('id'); // Store the selected category ID

    //    console.log(selectedCategoryId);

       $.ajax({
        url: ajaxfilter,
        method: 'get',
        data: {
            catid: selectedCategoryId
        },
        dataType: 'JSON',
        success: function(response){
            if(response.success){
                $('#product-list').empty();
                
                response.data.forEach(item => {
                    let product = item.product;
                    // console.log(product);
                    let detailsUrl = item.details_url;
                    let availabilityColor = product.product_Availability === 'In Stock' ? 'rgb(67, 197, 106)' : 'rgb(215, 46, 28)';

                    const products = `
                        <div class="col-md-3 col-6 mb-4">
                        <div class="card product-card">

                        <img 
                        src="${product.image_url ? '/productimages/' + product.image_url : '/productimages/default-profile.png'}"
                        style="max-height: 200px;" 
                        class="img-fluid product-img" 
                        alt="Product Image"
                        onclick="window.location.href='${detailsUrl}'">

                            <div class="card-body">
                                <h2 class="card-title" style="font-size:15px;"> ${product.name }</h2>
                                <div class="product-rating">
                                    <i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9733;</i><i>&#9734;</i>
                                </div>
                                <p class="card-text" style="font-size:15px;">&#8377;  ${product.price }</p>
                                <h6 style="color:${availabilityColor}">${product.product_Availability}</h6>
                            </div>
                        </div>
                    </div>`;
                    
                    $('#product-list').append(products);
                });
            } else {
                console.log('No products found.');
                $('#product-list').html('<p>No products found for this category.</p>');
            }
        }, 
        error: function() {
            console.log('AJAX request failed.');
            $('#product-list').html('<p>An error occurred while fetching products.</p>');
        }
       });
    });
});


