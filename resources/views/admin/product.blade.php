<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
    

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .toggle.btn {
    border-radius: 20px !important; /* Rounded corners */
    padding: 0 !important;
    width: 50px; /* Adjust the width */
        height: 25px;
}

.toggle-on.btn-primary {
    background-color: #337ab7; /* Blue background for "On" */
    color: white; /* White text color for "On" */
}

.toggle-off.btn-secondary {
    background-color: white; /* White background for "Off" */
    color: black; /* Black text color for "Off" */
    border: 1px solid #ddd; /* Light border to distinguish the toggle */
}


.toggle-handle {
    border-radius: 20px !important; /* Rounded corners for handle */
}

.toggle .toggle-handle {
    background-color: white; /* White background for the handle */
    box-shadow: none;
}


        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            transition: all 0.3s;
            z-index: 100;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover,
        .sidebar .active {
            background-color: #495057;
        }

        .sidebar h4 {
            padding: 1.5rem;
            margin-bottom: 0;
            font-size: 1.5rem;
            text-align: center;
        }

        #content {
            margin-left: 250px;
            transition: all 0.3s;
        }

        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.active {
                left: 0;
            }

            #content {
                margin-left: 0;
            }

            #content.active {
                margin-left: 250px;
            }
        }

        .navbar {
            background-color: #343a40;
            color: #fff;
            position: relative;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link:hover {
            background-color: #495057;
        }

        .table-responsive {
            margin-top: 2rem;
        }

        .alert-popup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1050;
        }

        .product-img {
            width: 100px;
            /* Adjust the width as needed */
            height: auto;
            /* Maintain aspect ratio */
        }

        .filter-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .filter-container label,
        .filter-container select {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        @include('layouts.adminSidebar')
    </div>

    <div id="content">
        @include('layouts.adminNavbar')
        <div class="container mt-4">
            <div class="row mb-3" id="deletemsg">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show alert-popup" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">Product List</h2>


                        <div class="filter-container ml-4 ">
                            <label for="filter-by">Filter by:</label>
                            <select id="filter-by" class="form-control">
                                <option>select option</option>
                                <option value="newest">newest added items</option>
                                <option value="oldest">earliest added items</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="filter-container ml-4 ">

                    <input type="search" id="search" placeholder="search here..." class="form-control">

                </div>
                <div class="col text-right">
                    <a href="{{ route('admin.addproduct') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
                        Product</a>
                </div>
            </div>
            <div class="product-increment font-weight-bold">number of searched product: <span></span></div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>showOnPage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products && $products->isNotEmpty())
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <img src="{{ asset('productimages/' . $product->image_url ?? 'default-profile.png') }}"
                                            alt="Product Image" class="img-fluid product-img">
                                    </td>
                                    <td>Rs: {{ $product->price }}</td>
                                  

                                        <td>
                                            <input type="checkbox" class="show-on-page-toggle" data-id="{{ $product->id }}"
                                                data-toggle="toggle" data-on="Y" data-off="N" data-onstyle="success" data-offstyle="danger"
                                                {{ $product->show_on_page === 'Y' ? 'checked' : '' }}>
                                        </td>
                                        
                                    
                                    <td>
                                        <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"><button
                                                class="badge badge-success">View</button></a>
                                        <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}"
                                            onclick="return confirm('Are you sure you want to delete this product?');">
                                            <button class="badge badge-danger">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5">No records!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script></script>

    <script>
        $(document).ready(function() {
            var deleteProductUrl;

            $('#sidebarToggle').on('click', function() {
                $('.sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            // Auto-hide success message after 3 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 3000);

            // Filter items
            $('#filter-by').on('change', function() {
                let filterValue = $('#filter-by').val();
                $.ajax({
                    url: '{{ route('admin.product') }}',
                    method: 'GET',
                    data: {
                        filtedata: filterValue
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            $('table tbody').empty();
                            if (response.data.length > 0) {
                                console.log(response.data.length);
                                response.data.forEach(product => {
                                    $('table tbody').append(`
                                        <tr>
                                            <td>${product.id}</td>
                                            <td>${product.name}</td>
                                            <td>
                                                <img src="{{ asset('productimages/') }}/${product.image_url ?? 'default-profile.png'}" 
                                                     alt="Product Image" class="img-fluid product-img">
                                            </td>
                                            <td>Rs: ${product.price}</td>
                                            <td>
                                                 <a href="{{ url('admin/product/edit') }}/${product.id}">
                                <button class="badge badge-success">View</button>
                            </a>
                                                <button class="badge badge-danger delete-product" data-id="${product.id}">Delete</button>
                                            </td>
                                        </tr>
                                    `);
                                });
                            } else {
                                $('table tbody').append(
                                    '<tr><td colspan="5" class="text-center">No products found</td></tr>'
                                );
                            }
                        } else {
                            console.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            });
            var productlength;
            // Search items
            $('#search').on('keyup', function() {
                let value = $('#search').val().trim();

                if (value.length > 0) {
                    $.ajax({
                        url: '{{ route('admin.product') }}',
                        method: 'GET',
                        data: {
                            data: value
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('table tbody').empty();
                                if (response.data.length > 0) {
                                    productlength = response.data.length;
                                    console.log(productlength);
                                    response.data.forEach(product => {
                                        $('table tbody').append(`
                                            <tr>
                                                <td>${product.id}</td>
                                                <td>${product.name}</td>
                                                <td>
                                                    <img src="{{ asset('productimages/') }}/${product.image_url ?? 'default-profile.png'}" 
                                                         alt="Product Image" class="img-fluid product-img">
                                                </td>
                                                <td>Rs: ${product.price}</td>
                                                <td>
                                                    <a href="{{ url('admin/product/edit') }}/${product.id}">
                                <button class="badge badge-success">View</button>
                            </a>
                                                    <button class="badge badge-danger delete-product" data-id="${product.id}">Delete</button>
                                                </td>
                                            </tr>
                                        `);
                                    });
                                    $('#content .product-increment span').text(productlength);
                                } else {
                                    $('table tbody').append(
                                        '<tr><td colspan="5" class="text-center">No products found</td></tr>'
                                    );
                                    $('#content .product-increment span').text('0');
                                }
                            } else {
                                console.error(response.message);
                            }
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                } else {
                    $.ajax({
                        url: '{{ route('admin.product') }}',
                        method: 'GET',
                        data: {
                            data: ''
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('table tbody').empty();
                                response.data.forEach(product => {
                                    $('table tbody').append(`
                                        <tr>
                                            <td>${product.id}</td>
                                            <td>${product.name}</td>
                                            <td>
                                                <img src="{{ asset('productimages/') }}/${product.image_url ?? 'default-profile.png'}" 
                                                     alt="Product Image" class="img-fluid product-img">
                                            </td>
                                            <td>Rs: ${product.price}</td>
                                            <td>
                                                <a href="{{ url('admin/product/edit') }}/${product.id}">
                                <button class="badge badge-success">View</button>
                            </a>
                                              
                                                <button class="badge badge-danger delete-product" data-id="${product.id}">Delete</button>
                                            </td>
                                        </tr>
                                    `);
                                });
                            } else {
                                console.error(response.message);
                            }
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                }
            });

            // Handle delete product request
            $(document).on('click', '.delete-product', function(e) {
                e.preventDefault();

                var button = $(this);
                var productId = button.data('id');
                console.log(productId);


                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        url: 'product/delete/' + productId,
                        type: 'get',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                button.closest('tr').remove();
                                alert('Product deleted successfully');
                            } else {
                                console.log('Error deleting product');
                            }
                        },
                        error: function(xhr) {
                            alert('Error deleting product');
                        }
                    });
                }
            });
        });
    </script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>

</html>
