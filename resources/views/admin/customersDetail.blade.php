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
            border-radius: 20px !important;
            /* Rounded corners */
            padding: 0 !important;
            width: 50px;
            /* Adjust the width */
            height: 25px;
        }

        .toggle-on.btn-primary {
            background-color: #337ab7;
            /* Blue background for "On" */
            color: white;
            /* White text color for "On" */
        }

        .toggle-off.btn-secondary {
            background-color: white;
            /* White background for "Off" */
            color: black;
            /* Black text color for "Off" */
            border: 1px solid #ddd;
            /* Light border to distinguish the toggle */
        }


        .toggle-handle {
            border-radius: 20px !important;
            /* Rounded corners for handle */
        }

        .toggle .toggle-handle {
            background-color: white;
            /* White background for the handle */
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

                <div class="col">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">Customer List</h2>



                    </div>


                </div>


            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>is_customer</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer )
                            
                      
                        <tr>

                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>
                            <img src="{{ asset('profiles/' . $customer->image_path ?? 'default-profile.png') }}"
                            alt="Product Image" class="img-fluid product-img">
                            </td>
                             @if ($customer->is_customer)
                             <td>YES</td> 
                             @else
                             <td>NO</td> 
                             @endif
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script></script>


</body>

</html>
