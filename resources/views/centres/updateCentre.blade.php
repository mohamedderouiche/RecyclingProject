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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
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
                    <!-- End of Topbar -->

                </nav>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container mt-5">
                    <h1 class="mb-4 text-center">Update Centre de Recyclage</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{url('/update', $centre->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Image Upload -->
                                <div>
                                    <label for="">Old Image</label>
                                    <img style="height: 100px; width:100px" src="{{ asset('centreImages/'.$centre->image) }}">
                                </div>

                                <div>
                                    <label for="">New Image</label>
                                    <input style="color: blue;" type="file" name="image" >
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <!-- Centre Name -->
                                <div class="form-group">
                                    <label for="nom">Nom du Centre</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $centre->nom }}" >
                                    @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <!-- Address -->
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $centre->adresse }}" >
                                    @error('adresse')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="2">{{ $centre->description }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <!-- Opening Hours -->
                                <div class="form-group">
                                    <label for="horaire_ouverture">Horaire d'ouverture</label>
                                    <input type="text" class="form-control" id="horaire_ouverture" name="horaire_ouverture" value="{{ $centre->horaire_ouverture }}" >
                                    @error('horaire_ouverture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <!-- Contact -->
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact" value="{{ $centre->contact }}" >
                                    @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block">Update Centre</button>
                            </form>
                        </div>
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
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
</body>
