    <!-- resources/views/reclamations/index.blade.php -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reclamations</title>

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

            <!-- Add Button -->
            <a href="{{ route('reclamations.create') }}" class="btn btn-primary mb-3">Add New Reclamation</a>

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
                        <th>Actions</th>
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
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $reclamation->id }}">Edit</button>

                        <!-- Delete Form -->
    <form method="POST" action="{{ route('reclamations.destroy', $reclamation->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reclamation?')">Delete</button>
    </form>


                                <!-- Modal for Edit -->
                                <div class="modal fade" id="editModal{{ $reclamation->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $reclamation->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">
                                            @csrf
                                            @method('PUT') <!-- This indicates that this is an update request -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $reclamation->id }}">Update Reclamation Status</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select name="status_reclamation_id" id="status" class="form-select" required>
                                                            @foreach($statuses as $status)
                                                                <option value="{{ $status->id }}"
                                                                    {{ $reclamation->status_reclamations_id == $status->id ? 'selected' : '' }}>
                                                                    {{ $status->status_reclamation }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
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
