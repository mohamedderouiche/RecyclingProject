@extends('reclamations.layoutFront')


@section('content')

<div class="container mt-5">
    <h1>My Reclamations</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Image</th>
                <th>update</th>
                <th>details</th><!-- New Actions Column -->
                <th>cancel </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reclamations as $reclamation)
                <tr>
                    <td>{{ $reclamation->typeReclamation->name ?? 'N/A' }}</td>
                    <td>{{ $reclamation->description }}</td>
                    <td>
                        @php
                            // Default gray for 'En Attente'
                            $statusColor = 'background-color: #6c757d; color: white;';

                            // Assign custom colors for each status
                            if (optional($reclamation->statusReclamation)->status_reclamation === 'Résolus') {
                                $statusColor = 'background-color: #28a745; color: white;'; // Green for Resolved
                            } elseif (optional($reclamation->statusReclamation)->status_reclamation === 'En Cours') {
                                $statusColor = 'background-color: #ffc107; color: black;'; // Yellow for In Progress
                            } elseif (optional($reclamation->statusReclamation)->status_reclamation === 'En Attente') {
                                $statusColor = 'background-color: #dc3545; color: white;'; // Red for Rejected
                            }
                        @endphp

                        <!-- Custom Badge with Dynamic Color -->
                        <span class="badge" style="{{ $statusColor }}">
                            {{ optional($reclamation->statusReclamation)->status_reclamation ?? 'En Attente' }}
                        </span>
                    </td>
                    <td>{{ $reclamation->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        @if($reclamation->image)
                            <img src="{{ asset('storage/' . $reclamation->image) }}" alt="Image" style="width: 100px; height: auto;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <!-- Update Button with Icon -->
                        <a href="{{ route('reclamations.edit', $reclamation->id) }}" class="btn btn-link action-btn" title="Update">
                            <i class="fas fa-edit text-warning"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('reclamations.details', $reclamation->id) }}" class="btn btn-link" title="View Details">
                            <i class="fas fa-eye text-primary"></i> <!-- Eye icon for viewing details -->
                        </a>
                    </td>

                    <td> <!-- New Actions Column -->

                        <!-- Cancel Button with Icon -->
                        <form action="{{ route('reclamations.cancel', $reclamation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST') <!-- Use DELETE if following RESTful standards -->
                            <button type="submit" class="btn btn-link action-btn" title="Cancel" onclick="return confirm('Are you sure you want to cancel this reclamation?')">
                                <i class="fas fa-times text-danger"></i>
                            </button>
                        </form>
                    </td>




                </tr>
            @endforeach
        </tbody>
    </table>



</div>
@endsection
