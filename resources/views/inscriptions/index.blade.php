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

    <style>
        .table-custom {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead {
            background-color: #10442C;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f2f2f2;
        }
        .table td, .table th {
            text-align: center; /* Centre le texte par défaut */
            vertical-align: middle; /* Centre verticalement le contenu des cellules */
        }
        .icon-spacing {
            margin-right: 5px;
        }
        .action-btn {
            margin-right: 5px;
        }
        .btn-group .btn {
            display: inline-flex;
            align-items: center;
        }
        .form-select-status {
            border: none;
            background: none;
            cursor: pointer;
        }
        .form-select-status:focus {
            outline: none;
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

            <!-- Main Content -->
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

                <!-- Content -->
                <div class="container">
    <h1 class="my-4">Liste des Inscriptions</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de recherche -->
    <form method="GET" action="{{ route('inscriptions.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Rechercher par nom, prénom, email ou formation">
            <button class="btn btn-primary" type="submit">Rechercher</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-custom">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Formation</th>
                    <th>Date d'Inscription</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        <td>{{ $inscription->nom }}</td>
                        <td>{{ $inscription->prenom }}</td>
                        <td>{{ $inscription->email }}</td>
                        <td>{{ $inscription->formation->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($inscription->date_inscription)->format('d M, Y') }}</td>
                        <td>
                            <form action="{{ route('inscriptions.updateStatus', $inscription->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="statut" class="form-select-status" onchange="this.form.submit()">
                                    <option value="en cours" {{ $inscription->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="acceptée" {{ $inscription->statut == 'acceptée' ? 'selected' : '' }}>Acceptée</option>
                                    <option value="refusée" {{ $inscription->statut == 'refusée' ? 'selected' : '' }}>Refusée</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <a href="{{ route('inscriptions.show', $inscription->id) }}" class="btn btn-info btn-sm action-btn">
                                    <i class="fas fa-eye fa-xs icon-spacing"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    {{ $inscriptions->links('vendor.pagination.bootstrap-4') }}
</div>

                <!-- End Content -->

            </div>
            <!-- End Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
