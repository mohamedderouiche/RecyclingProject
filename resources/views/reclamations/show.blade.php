@extends('reclamations.layout')  <!-- Extending the admin layout -->

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Reclamation Details</h1>

    <div class="card" style="width: 30rem; margin: auto; border-radius: 15px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
        <!-- Reclamation Image -->
        @if($reclamation->image)
            <img class="card-img-top" src="{{ asset('storage/' . $reclamation->image) }}" alt="Reclamation Image" style="height: 300px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
        @endif

        <div class="card-body">
            <h5 class="card-title text-center" style="font-weight: bold; font-size: 1.5rem;">Reclamation #{{ $reclamation->id }}</h5>
            <p class="card-text" style="font-size: 1.1rem;">{{ $reclamation->description }}</p>

            <!-- Submitted by and Submitted at Information -->
            <div class="mb-3">
                <p class="mb-1"><strong>Submitted by:</strong> {{ $reclamation->user->name }}</p>
                <p class="mb-1"><strong>Submitted at:</strong> {{ $reclamation->created_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Type of Reclamation:</strong> {{ $reclamation->typeReclamation->name }}</li>
   
        </ul>

        <div class="card-body d-flex justify-content-between align-items-center">
            <a href="{{ url('/reclamationsadmin') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
</div>
@endsection
