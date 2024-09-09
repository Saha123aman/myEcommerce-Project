{{-- @dump($ProductCategories)
@die(); --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
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
            <div class="row mb-3">
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
                        <h2 class="mb-0">Product category</h2>

                    </div>


                </div>
                <div class="filter-container ml-4 ">

                    <select id="search" class="form-control">
                        <option>select category</option>
                        @foreach ($categoriesname as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select><button id="reset" class="btn btn-secondary">Reset</button>
                </div>
                <div class="col text-right">
                    <a href="{{ route('admin.productcategory') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Add Product</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>startingprice_or_discount</th>
                            <th>categoryName</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($ProductCategories && $ProductCategories->isNotEmpty())
                            @foreach ($ProductCategories as $ProductCategory)
                                {{-- <tr>                                                    //startingprice_or_discount --}}
                                <td>{{ $ProductCategory->id }}</td>
                                <td>{{ $ProductCategory->name }}</td>
                                <td>
                                    <img src="{{ asset('categoryimages/' . $ProductCategory->category_image ?? 'default-profile.png') }}"
                                        alt="Product Image" class="img-fluid product-img">
                                </td>

                                <td>{{ $ProductCategory->startingprice_or_discount }}</td>
                                <td>{{ $ProductCategory->categoryname }}</td>

                                <td>
                                    <a href="{{ route('admin.productcategory.edit', ['id' => $ProductCategory->id]) }}">
                                        <button class="badge badge-success">View</button></a>
                                    <a href="{{ route('admin.productcategory.delete', ['id' => $ProductCategory->id]) }}"
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

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarToggle').on('click', function() {
                $('.sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            // Auto-hide success message after 3 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 3000);


            // $('#filter-by').on('change',function(){
            //    alert('keyup');
            // });

            $('#search').on('change', function() {
                let searchdata = $(this).val();
                console.log(searchdata);

                $.ajax({
                    url: '{{ route('admin.productcategory.view') }}',
                    method: 'GET',
                    data: {
                        searchdata: searchdata
                    },
                    dataType: 'JSON',

                    success: function(response) {
                        if (response.success) {
                            console.log(response.data);
                            $('table tbody').empty();
                            if (response.data.length > 0) {

                                response.data.forEach(product => {
                                    $('table tbody').append(`<tr>
                                    <td>${product.id}</td>
                                    <td>${product.name}</td>
                                    <td>
                                    <img src="{{ asset('categoryimages/') }}/${product.category_image ?? 'default-profile.png'}" 
                                         alt="Product Image" class="img-fluid product-img">
                                </td>
                                    <td>${product.startingprice_or_discount}</td>
                                    <td>${product.categoryname}</td>
                                    <td>
                                        <button class="badge badge-success">View</button>
                                        <button class="badge badge-danger">Delete</button>
                                    </td>
                                    </tr>`)
                                });
                            } else {
                                $('table tbody').append(
                                    '<tr><td colspan="5" class="text-center">No category found</td></tr>'
                                );
                            }
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });

            });

            $('#reset').on('click', function() {
                location.reload();
            })
        });
    </script>
</body>

</html>
