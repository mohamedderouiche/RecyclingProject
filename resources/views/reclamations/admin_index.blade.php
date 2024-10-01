


@extends('reclamations.layout')



@section('content')

<div class="container mt-5">
    <h1>Reclamations List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Type Reclamation</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reclamations as $reclamation)
                    <tr>
                        <td>{{ $reclamation->user->name ?? 'N/A' }}</td>
                        <td>{{ $reclamation->user->email ?? 'N/A' }}</td>
                        <td>{{ $reclamation->typeReclamation->name ?? 'N/A' }}</td>
                        <td>{{ $reclamation->description }}</td>
                        <td>{{ optional($reclamation->statusReclamation)->status_reclamation ?? 'En Attente' }}</td>
                        <td>{{ $reclamation->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            @if($reclamation->image)
                                <img src="{{ asset('storage/' . $reclamation->image) }}" alt="Image" style="width: 100px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <!-- Edit Button -->
                                <button class="btn btn-link action-btn" data-toggle="modal" data-target="#editModal{{ $reclamation->id }}" title="Edit">
                                    <i class="fas fa-edit text-warning"></i>
                                </button>

                                <!-- Details Button -->
                                <a href="{{ route('reclamations.show', $reclamation->id) }}" class="btn btn-link action-btn" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Delete Form -->
                                <form method="POST" action="{{ route('reclamations.destroy', $reclamation->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link action-btn" title="Delete" onclick="return confirm('Are you sure you want to delete this reclamation?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Modal for Edit -->
                            <div class="modal fade" id="editModal{{ $reclamation->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $reclamation->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
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
                                                            <option value="{{ $status->id }}" {{ $reclamation->status_reclamations_id == $status->id ? 'selected' : '' }}>
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

</div>

@endsection <!-- This ends the content section -->
<script>
    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
