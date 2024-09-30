<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Green Recycle</title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                <nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    @include('admin.topbar')
                </nav>
                <!-- End of Topbar -->

                <div class="container">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="card-text">{{ $product->description }}</p>
                            <h4>Price: ${{ $product->price }}</h4>

                            @if ($product->image && \Storage::disk('public')->exists($product->image))
                                <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: auto; object-fit: cover;">
                            @else
                                <p class="text-danger">Image non disponible</p>
                            @endif
                        </div>
                    </div>

                    <!-- Button to return to the product list -->
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
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
        <script src="admin/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="admin/js/demo/chart-area-demo.js"></script>
        <script src="admin/js/demo/chart-pie-demo.js"></script>

    </div>
</body>
</html>