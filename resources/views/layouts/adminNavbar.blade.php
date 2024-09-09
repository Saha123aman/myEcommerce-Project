<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    /* Sidebar */
    
    
    /* Main content */
    .main-content {
      margin-left: 250px;
      padding: 20px;
    }
    
    /* Navbar */
    .navbar {
      background-color: #343a40;
      color: #fff;
      padding: 14px 20px;
    }
    .navbar-brand {
      font-size: 1.5rem;
      color: #fff;
    }
    .navbar-nav .nav-item .nav-link {
      color: #fff;
      padding: 10px 15px;
    }
    .navbar-nav .nav-item .nav-link:hover {
      background-color: #495057;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="btn btn-dark mr-4" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-user-circle mr-2"></i>Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-bell mr-2"></i>Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.logout')}}"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>

</body>
</html>