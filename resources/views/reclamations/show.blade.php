    <!-- resources/views/admin/show.blade.php -->

    @extends('reclamations.layout')  <!-- Extending the admin layout -->

    @section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Reclamation Details</h1>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Reclamation #{{ $reclamation->id }}</h5>
            </div>
            <div class="card-body">
                <!-- Reclamation Details -->
                <p><strong>Type of Reclamation:</strong> {{ $reclamation->typeReclamation->name }}</p>
                <p><strong>Description:</strong> {{ $reclamation->description }}</p>
                <p><strong>Status:</strong> {{ $reclamation->statusReclamation->name }}</p>
                <p><strong>Submitted by:</strong> {{ $reclamation->user->name }}</p>
                <p><strong>Submitted at:</strong> {{ $reclamation->created_at->format('d-m-Y H:i') }}</p>

                <!-- Reclamation Image -->
                @if($reclamation->image)
                    <p><strong>Attached Image:</strong></p>
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $reclamation->image) }}" alt="Reclamation Image" class="img-fluid rounded" style="max-height: 400px;">
                    </div>
                @endif

                <!-- Back to List Button -->
                <a href="{{ url('/reclamationsadmin') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>

    @endsection
