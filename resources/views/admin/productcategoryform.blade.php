<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
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
            <h1>Create Category</h1>
            <form action="{{ route('admin.productcategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" required>
                   @error('name') 
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                <div class="form-group">
                    <label for="image">categoryImage:</label>
                    <input type="file" name="category_image" class="form-control">
                    @error('category_image') 
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="discount">startingprice_or_discount:</label>
                    <input type="text" name="startingprice_or_discount" value="{{old('startingprice_or_discount')}}" class="form-control">
                   
                </div>
                <div class="form-group">
                    <label for="image"> category:</label>
                   <select name="category_id" class="form-control" required>
                 
                    <option >select category</option>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>

                    @endforeach
                   </select>
                   @error('category_id') 
                   <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
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
