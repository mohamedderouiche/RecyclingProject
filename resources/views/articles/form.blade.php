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
                    @include('admin.topbar')
                </nav>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container mt-5">
                    <h1 class="mb-4 text-center">Upload New Article</h1>
                    <div class="row justify-content-center"> <!-- Center the form -->
                        <div class="col-md-6"> <!-- Set the width of the form -->
                            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Article Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter article title" value="{{ old('title', $article->title ?? '') }}" >
                                </div>

                                <!-- Content -->
                                <div class="form-group">
                                    <label for="contenu">Content</label>
                                    <textarea class="form-control" id="contenu" name="contenu" rows="5" placeholder="Write the article content" required>{{ old('contenu', $article->contenu ?? '') }}</textarea>
                                </div>

                                <!-- Image Upload -->
                                <div class="form-group">
                                    <label for="image">Article Image</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>

                             <!-- PDF Upload -->
                                <div class="form-group">
                                    <label for="pdf">Article PDF</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block">Upload Article</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->

                <!-- Footer -->
                @include('admin.footer')
                <!-- End of Footer -->
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
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
