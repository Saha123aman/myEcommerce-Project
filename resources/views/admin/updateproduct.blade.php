<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .sidebar a:hover, .sidebar .active {
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
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover {
            background-color: #495057;
        }
        .table-responsive {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        @include('layouts.adminSidebar')
    </div>

    <div id="content">
        @include('layouts.adminNavbar')
        <div class="container mt-5">
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <h2>update Product</h2>
            <form action="{{ route('admin.product.update',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col text-right">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>

                <!-- Product Name -->
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" value="{{ $product->name }}" class="form-control" id="name" name="name" placeholder="Enter Product Name">
                    {{-- @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Product Description">{{ $product->description }}</textarea>
                    {{-- @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" value="{{ $product->price }}" class="form-control" id="price" name="price" placeholder="Enter Product Price" step="0.01">
                    {{-- @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                </div>

                <!-- Product Availability -->
                <div class="form-group">
                  
                    <label for="product_availability">Product Availability</label>
                   
                    <select class="form-control" id="product_availability" name="product_availability">
                        <option value="">Select Stock</option>
                        <option value="In Stock" {{ $product->product_availability == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="Out of Stock" {{ $product->product_availability == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                        <option value="Pre-order" {{ $product->product_availability == 'Pre-order' ? 'selected' : '' }}>Pre-order</option>
                    </select>
                    @error('product_availability')
                    <span class="text-danger">{{ $message }}</span>

                @enderror
                    {{-- @error('product_availability')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                </div>

                <!-- Image URL -->
                <div class="form-group">
                    <label for="image_url">Image URL</label>
                    <div class="mb-3">
                        <img src="{{ asset('productimages/'.$product->image_url ?? 'default-profile.png') }}" alt="Product Image" class="img-fluid product-img" width="200px">
                    </div>
                    <input type="file" class="form-control" id="image_url" name="image_url">
                    <!-- Hidden input to store the existing image URL -->
                    <input type="hidden" name="existing_image_url" value="{{ $product->image_url }}">
                </div>

                <!-- Category ID -->
                <div class="form-group">
                    <label for="category_id">Category Name</label>
                    <select class="form-control" id="product_category_id" name="product_category_id">
                        <option value="">Select Category</option>
                        @foreach($productcategory as $pcat)
                        <option value="{{ $pcat->id }}" {{ $product->product_category_id == $pcat->id ? 'selected' : '' }}>{{ $pcat->name }}</option>
                        @endforeach
                    </select>
                    {{-- @error('product_category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarToggle').on('click', function () {
                $('.sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });
        });
    </script>
</body>
</html>
