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
                    <h1 class="mb-4 text-center">Upload New Centre de Recyclage</h1>
                    <div class="row justify-content-center"> <!-- Center the form -->
                        <div class="col-md-6"> <!-- Set the width of the form -->
                            <form action="{{ route('centres.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            
                                <!-- Image Upload -->
                                <div class="form-group">
                                    <label for="image">Centre Image</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                            
                                <!-- Centre Name -->
                                <div class="form-group">
                                    <label for="nom">Nom du Centre</label>
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du centre" required>
                                </div>
                            
                                <!-- Address -->
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse du centre" required>
                                </div>
                            
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="2" placeholder="Description du centre"></textarea>
                                </div>
                            
                                <!-- Opening Hours -->
                                <div class="form-group">
                                    <label for="horaire_ouverture">Horaire d'ouverture</label>
                                    <input type="text" class="form-control" id="horaire_ouverture" name="horaire_ouverture" placeholder="Horaire d'ouverture" required>
                                </div>
                            
                                <!-- Contact -->
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required>
                                </div>
                            
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block">Upload Centre</button>
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
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js
