<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BETTER CALL US - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
        /* Ensures that the footer stays at the bottom of the page */
        html, body {
            height: 100%;
        }

        #content-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #content {
            flex-grow: 1;
        }

        /* Table Styling */
        .table th, .table td {
            vertical-align: middle;
        }

        .table img {
            width: 100px; /* Set image size */
            height: auto;
        }
        .table td {
            color: black; /* Black text for readability */
            font-weight: 500; /* Slightly bold for clarity */
            font-size: 14px; /* Adjust font size for readability */
            text-align: left; /* Left-align the text */
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    @include('admin.topbar')
                </nav>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container mt-5">
                    <h1 class="mb-4">Centres List</h1>
                    <a href="{{ route('addCentre') }}" class="btn btn-success mb-3">Add new center</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead style="background-color: rgb(81, 141, 168); color: white;">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Adresse</th>
                                    <th>Contact</th>
                                    <th>Horaire Ouverture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $centre)
                                    <tr>
                                        <td><img style="height: 100px; width: 100px;" src="/centreImages/{{$centre->image}}"></td>
                                        <td>{{ $centre->nom }}</td>
                                        <td>{{ $centre->adresse }}</td>
                                        <td>{{ $centre->contact }}</td>
                                        <td>{{ $centre->horaire_ouverture }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ url('/updatecentre', $centre->id) }}" class="btn btn-info btn-sm">Edit</a>
                            
                                            <!-- Delete Form -->
                                            <form action="{{ route('centres.destroy', $centre->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this center?');">Delete Center</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->

            <!-- Footer -->
                @include('admin.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin.logout')

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js
