<!-- resources/views/reclamations/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamations</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
</head>
<body>
    <div class="container mt-5">
        <h1>My Reclamations</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th> <!-- Added Actions column -->
                </tr>
            </thead>
            <tbody>
                @foreach ($reclamations as $reclamation)
                    <tr>
                        <td>{{ $reclamation->description }}</td>
                        <td>{{ $reclamation->typeReclamation->name ?? 'N/A' }}</td>
                        <td>
                            @if($reclamation->image)
                                <img src="{{ asset('storage/' . $reclamation->image) }}" alt="Image" style="width: 100px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ optional($reclamation->statusReclamation)->status_reclamation ?? 'En Attente' }}</td>
                        <td>{{ $reclamation->user->name ?? 'N/A' }}</td>
                        <td>{{ $reclamation->user->email ?? 'N/A' }}</td>
                        <td>{{ $reclamation->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $reclamation->updated_at->format('Y-m-d H:i') }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
