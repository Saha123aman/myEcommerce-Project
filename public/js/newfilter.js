$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var selectedCategoryIds = [];
    var selectedCategoryNames = [];

    // Set up global AJAX settings to include CSRF token in headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $('.filter-category .filter-sort').on('change', 'input[name="price-sort"]', function() {
        var $this = $(this);
        
        // Uncheck all other checkboxes
        $('input[name="price-sort"]').not($this).prop('checked', false);

        var sortval = $("input[name='price-sort']:checked").val();
        console.log(sortval);

        $.ajax({
            url: newajaxsort_url,
            method: 'get',
            data: {
                sort: sortval,
                catid: selectedCategoryIds 
            },
            dataType: 'JSON',
            success: function(response) {
                if(response.success) {
                    console.log(response);

                    $('#product-list').empty();

                    response.data.forEach(item => {
                        let product = item.product;
                    // console.log(product);
                    let detailsUrl = item.details_url;
                    let availabilityColor = product.product_Availability === 'In Stock' ? 'rgb(67, 197, 106)' : 'rgb(215, 46, 28)';
                        const productHTML = `
                        <div class="col-md-3 col-6 mb-4">
                        <div class="product-card">

                        <img 
                        src="${product.image_url ? '/productimages/' + product.image_url : '/productimages/default-profile.png'}"
                        style="max-height: 200px;" 
                        class="img-fluid product-img" 
                        alt="Product Image"
                        onclick="window.location.href='${detailsUrl}'">
                            
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
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });

    // Event listener for checkbox clicks
    $('.filter-category .filter-categories input[type="checkbox"]').on('click', function() {
        var $checkbox = $(this);
        var catid = $checkbox.closest('li').data('id');
        var categoryName = $checkbox.closest('li').data('name');

        if ($checkbox.is(':checked')) {
            if (!selectedCategoryIds.includes(catid)) {
                selectedCategoryIds.push(catid);
                selectedCategoryNames.push(categoryName);
            }
        } else {
            var index = selectedCategoryIds.indexOf(catid);
            if (index !== -1) {
                selectedCategoryIds.splice(index, 1);
                selectedCategoryNames.splice(index, 1);
            }
        }

        // Update the selected categories display
        updateSelectedCategories();

        // Make AJAX request to fetch filtered products
        $.ajax({
            url: newajaxfilter_url, // Define the URL for AJAX request
            method: 'get',
            data: {
                categories: selectedCategoryIds // Send selected categories as array
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#product-list').empty();

                    response.data.forEach(item => {
                        let product = item.product;
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

    // Function to update selected categories display
    function updateSelectedCategories() {
        var $selectedCategories = $('#selected-categories');
        $selectedCategories.empty(); // Clear the previous content

        selectedCategoryNames.forEach(function(name, index) {
            // Create a span element for each selected category
            var categorySpan = $('<span>')
                .addClass('badge badge-secondary mr-2')
                .text(name)
                .append(
                    $('<i>')
                        .addClass('fas fa-times ml-1')
                        .css('cursor', 'pointer')
                        .click(function() {
                            // On clicking the 'x' icon, remove the category
                            var catid = selectedCategoryIds[index];
                            removeCategory(catid, name);
                        })
                );

            $selectedCategories.append(categorySpan);
        });

        // if (selectedCategoryNames.length === 0) {
        //     $selectedCategories.text('No categories selected.');
        // }
    }

    // Function to remove a category
    function removeCategory(catid, name) {
        var index = selectedCategoryIds.indexOf(catid);
        if (index !== -1) {
            selectedCategoryIds.splice(index, 1);
            selectedCategoryNames.splice(index, 1);
        }
        // Uncheck the checkbox
        $('.filter-category .filter-categories input[data-id="' + catid + '"]').prop('checked', false);

        // Update the selected categories display
        updateSelectedCategories();

        // Make AJAX request to update the product list
        $.ajax({
            url: newajaxfilter_url,
            method: 'get',
            data: {
                categories: selectedCategoryIds
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#product-list').empty();
                    
                    response.data.forEach(item => {
                        let product = item.product;
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
    }
});
