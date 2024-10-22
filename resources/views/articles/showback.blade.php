<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Green Recycle - Article Details</title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <style>
        .content-title {
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 20px;
            text-align: center;
            color: #2c3e50;
        }
        .article-content {
            text-align: center;
        }
        .article-image {
            margin-bottom: 20px;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .btn-back:hover {
            background-color: #218838;
        }
        .card-body {
            max-width: 700px;
            margin: 0 auto;
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
                <nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    @include('admin.topbar')
                    <!-- End of Topbar -->
                </nav>

                <!-- Page Content -->
                <div class="container-fluid">
                    <h1 class="content-title">Article Details</h1>

                    <div class="card-body article-content">
                        @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Image" width="300" height="250" style="object-fit: cover;">
                    @endif


                        <p><strong>Content:</strong> {{ $article->contenu }}</p>

                        <!-- Display PDF if available -->
                        @if ($article->pdf)
                        <div class="mt-4">
                            <p><strong>Download Article PDF:</strong></p>
                            <a href="{{ asset('storage/' . $article->pdf) }}" target="_blank" class="btn btn-secondary">View PDF</a>
                        </div>
                        @endif

                        <!-- Back to Articles Button -->
                        <a href="{{ route('articles.index') }}" class="btn btn-back">Back to Articles</a>
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

        <!-- Bootstrap core JavaScript-->
        <script src="admin/vendor/jquery/jquery.min.js"></script>
        <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="admin/js/sb-admin-2.min.js"></script>

    </body>
</html>
