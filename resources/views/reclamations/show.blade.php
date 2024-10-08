@extends('reclamations.layout') <!-- Extending the admin layout -->

@section('content')

                <div class="container-fluid text-center">
                    <h1 class="h3 mb-4 text-gray-800">Reclamation #{{ $reclamation->id }}</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Details of the Reclamation</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <!-- Reclamation Image -->
                                @if($reclamation->image)
                                    <img src="{{ asset('storage/' . $reclamation->image) }}" class="img-fluid" alt="Reclamation Image" width="400" style="border-radius: 15px;" />
                                @endif
                            </div>
                            <p><strong>Description:</strong> {{ $reclamation->description }}</p>

                            <!-- Submitted by and Submitted at Information -->
                            <p><strong>Submitted by:</strong> {{ $reclamation->user->name }}</p>
                            <p><strong>Submitted at:</strong> {{ $reclamation->created_at->format('d-m-Y H:i') }}</p>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Type of Reclamation:</strong> {{ $reclamation->typeReclamation->name }}</li>
                            </ul>

                            <div class="mt-4">
                                <a href="{{ url('/reclamationsadmin') }}" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                
@endsection
