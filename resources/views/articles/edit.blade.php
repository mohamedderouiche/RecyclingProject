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
                    <h1 class="h4 mb-4 text-gray-800">Edit article: {{ $article->name }}</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title input -->
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control form-control-sm" name="title" id="title" value="{{ old('title', $article->title) }}" required>
                        </div>

                        <!-- Contenu input -->
                        <div class="form-group">
                            <label for="contenu">Contenu:</label>
                            <textarea class="form-control form-control-sm" name="contenu" id="contenu" rows="3" required>{{ old('contenu', $article->contenu) }}</textarea>
                        </div>

                        <!-- Image input -->
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @if ($article->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 100px;">
                                    <p>Current Image</p>
                                </div>
                            @endif
                        </div>

                        <!-- PDF input -->
                        <div class="form-group">
                            <label for="pdf">PDF File:</label>
                            <input type="file" class="form-control-file" name="pdf" id="pdf">
                            @if ($article->pdf)
                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $article->pdf) }}" target="_blank" class="btn btn-sm btn-info">View Current PDF</a>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Update Article</button>
                        </div>

                        <!-- Cancel Button -->
                        <div class="text-center">
                            <a href="{{ route('articles.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>

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
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
