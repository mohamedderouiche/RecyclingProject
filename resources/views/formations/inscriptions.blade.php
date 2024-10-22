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
                    <!-- End of Topbar -->
                </nav>


<div class="container-fluid text-center">
    <h1 class="h3 mb-4 text-gray-800">Inscriptions à la formation : {{ $formation->name }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste des inscriptions</h6>
        </div>
        <div class="card-body">
            @if($inscriptions->isEmpty())
                <p>Aucune inscription pour cette formation.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscriptions as $inscription)
                        <tr>
                            <td>{{ $inscription->nom }}</td>
                            <td>{{ $inscription->prenom }}</td>
                            <td>{{ $inscription->email }}</td>
                            <td>{{ $inscription->date_inscription }}</td>
                            <td>{{ $inscription->statut }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

