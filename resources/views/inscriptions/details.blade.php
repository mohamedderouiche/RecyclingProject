<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Green Recycle - Détails Inscription</title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
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

                <div class="container-fluid text-center">
                    <h1 class="h3 mb-4 text-gray-800">Détails de l'inscription</h1>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informations d'inscription</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <!-- You can add an image if relevant, similar to the formation details -->
                            </div>
                            <p><strong>Nom:</strong> {{ $inscription->nom }} {{ $inscription->prenom }}</p>
                            <p><strong>Email:</strong> {{ $inscription->email }}</p>
                            <p><strong>Date d'inscription:</strong> {{ \Carbon\Carbon::parse($inscription->date_inscription)->format('d M, Y') }}</p>
                            <p><strong>Statut:</strong> {{ $inscription->statut }}</p>

                            <h5 class="card-title mt-4">Formation Associée</h5>
                            @if($inscription->formation)
                            {{-- <div class="text-center mb-3">
                                <img src="{{ asset('storage/' . $formation->image) }}" class="img-fluid" alt="Image de la formation" width="400" />
                            </div> --}}
                                <p><strong>Nom de la formation:</strong> {{ $inscription->formation->name }}</p>
                                <p><strong>Description:</strong> {{ $inscription->formation->description }}</p>
                                <p><strong>Date de formation:</strong> {{ \Carbon\Carbon::parse($inscription->formation->date_formation)->format('d M, Y') }}</p>
                                <p><strong>Durée:</strong> {{ $inscription->formation->duree }} heures</p>
                                <p><strong>Lieu:</strong> {{ $inscription->formation->lieu }}</p>
                            @else
                                <p>Aucune formation associée.</p>
                            @endif

                            <a href="{{ route('inscriptions.index') }}" class="btn btn-primary mt-3">Retourner à la liste des inscriptions</a>

                        </div>
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

    </body>
</html>
