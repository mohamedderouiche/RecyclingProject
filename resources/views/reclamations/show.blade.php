@extends('reclamations.layout') <!-- Extending the admin layout -->

@section('content')
<div class="container-fluid text-center">
    <h1 class="h3 mb-4 text-gray-800">Reclamation Details</h1>

    <div class="card shadow mb-4" style="border-radius: 15px; max-width: 800px; margin: auto; height: auto;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Reclamation #{{ $reclamation->id }}</h6>
        </div>
        <div class="card-body">
            <div class="text-center mb-3">
                @if($reclamation->image)
                    <img src="{{ asset('storage/' . $reclamation->image) }}" class="img-fluid" alt="Reclamation Image" style="max-width: 100%; height: 400px; object-fit: cover;" />
                @endif
            </div>
            <p><strong>Description:</strong> {{ $reclamation->description }}</p>

            <!-- Submitted by and Submitted at Information -->
            <p><strong>Submitted by:</strong> {{ $reclamation->user->name }}</p>
            <p><strong>Submitted at:</strong> {{ $reclamation->created_at->format('d-m-Y H:i') }}</p>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Type of Reclamation:</strong> {{ $reclamation->typeReclamation->name }}</li>
            </ul>
        </div>

        <!-- Card Footer -->
        <div class="card-body d-flex justify-content-center align-items-center" style="padding: 15px;">
            <a href="{{ url('/reclamationsadmin') }}" class="btn btn-primary ">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
</div>
@endsection
