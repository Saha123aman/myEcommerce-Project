<!DOCTYPE html>
<html>
<head>
    <title>update Category</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            {{-- @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif --}}
            <h1>update Category</h1>
            <form action="{{ route('admin.productcategory.update',['id'=>$procat->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" value="{{ $procat->name }}" name="name" required>
                   @error('name') 
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <div class="mb-3">
                            <img src="{{ asset('categoryimages/'.$procat->category_image ?? 'default-profile.png') }}" alt="Product Image" class="img-fluid product-img" width="200px">
                        </div>
                        @error('category_image') 
                        <span class="text-danger">{{$message}}</span>
                         @enderror
                        <input type="file" class="form-control" id="category_image" name="category_image">
                        <!-- Hidden input to store the existing image URL -->
                        <input type="hidden" name="existing_image_url" value="{{ $procat->category_image }}">
                    </div>
                <div class="form-group">
                    <label for="discount">startingprice_or_discount:</label>
                    <input type="text" name="startingprice_or_discount" value="{{$procat->startingprice_or_discount}}" class="form-control" required>
                   
                </div>
                <div class="form-group">
                    <label for="category"> category:</label>

                    <input type="text" class="form-control" value="{{ $category->name }}" disabled>
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                   {{-- <select name="category_id" class="form-control" required> --}}
                 
                    {{-- <option >select category</option>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>

                    @endforeach --}}
                    {{-- @foreach($categories as $cat)
                    <option type="disabled" value="{{ $cat->id }}" {{ $procat->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                   </select> --}}
                   {{-- @error('category_id') 
                   <span class="text-danger">{{$message}}</span>
                    @enderror --}}
                </div>
                <button type="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies (optional) -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
