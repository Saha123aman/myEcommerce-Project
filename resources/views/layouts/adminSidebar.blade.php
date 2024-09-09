<html>
    <head>


<h4>Admin Panel</h4>
</head>
<body>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.chart') }}"><i class="fas fa-chart-line mr-2"></i>Charts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product')}}"><i class="fas fa-box-open mr-2"></i>Products</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.categorylist')}}"><i class="fas fa-box-open mr-2"></i>Category</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.productcategory.view')}}"><i class="fas fa-box-open mr-2"></i>ProductCategory</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.getcustomers') }}"><i class="fas fa-users mr-2"></i>Customers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.tablelist') }}"><i class="fas fa-table mr-2"></i>Tables</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
    </li>
</ul>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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