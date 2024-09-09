<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
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
<body>
    <div class="sidebar">
        @include('layouts.adminSidebar')
     </div>
     <div id="content">
        @include('layouts.adminNavbar')
         <div class="container mt-5">
        <h1>Categories</h1>
        <div class="mb-3">
            <a href="{{route('admin.categoryindex')}}" class="btn btn-primary">Add Category</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($categories->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">No records!</td>
                    </tr>
                @else
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <!-- Add action buttons here if needed -->
                            <a href="#" class="btn btn-sm btn-info">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    </div>
    
    <!-- Bootstrap JS and dependencies (optional) -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> --}}
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
