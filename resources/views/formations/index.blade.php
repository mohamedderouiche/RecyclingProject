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

        /* Centre le contenu du tableau */
        .table-custom td,
        .table-custom th {
            text-align: center; /* Centre le texte dans toutes les cellules */
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    @include('admin.topbar')
                </nav>

                <div class="container">
                    <h1 class="my-4">Liste des Formations</h1>
                    <a href="{{ route('formations.create') }}" class="btn btn-sm mb-3" style="background-color: #28a745; color: white; border-color: #28a745;">Add Formation</a>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-striped table-custom">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Date de Formation</th>
                                        <th>Durée</th>
                                        <th>Lieu</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($formations as $formation)
                                        <tr>
                                            <td>
                                                <a href="{{ route('formations.show', $formation->id) }}">{{ $formation->name }}</a>
                                            </td>
                                            <td>{{ $formation->description }}</td>
                                            <td>{{ $formation->date_formation }}</td>
                                            <td>{{ $formation->duree }}</td>
                                            <td>{{ $formation->lieu }}</td>
                                            <td>
                                                @if($formation->image)
                                                    <img src="{{ asset('storage/' . $formation->image) }}" alt="Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Actions">
                                                    <a href="{{ route('formations.show', $formation->id) }}" class="btn btn-info btn-sm action-btn">
                                                        <i class="fas fa-eye fa-xs icon-spacing"></i>
                                                    </a>
                                                    <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-warning btn-sm action-btn">
                                                        <i class="fas fa-edit fa-xs icon-spacing"></i>
                                                    </a>
                                                    <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm action-btn" onclick="return confirm('Are you sure you want to delete this formation?');">
                                                            <i class="fas fa-trash fa-xs icon-spacing"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
