@extends('formations.layoutFront') <!-- Extending the front layout -->

@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Training Details Section -->
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body p-5">
                        <!-- Title -->
                        <h1 class="display-5 mb-4 text-center text-primary">{{ $formation->name }}</h1> 
                        
                        <!-- Image -->
                        @if($formation->image)
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/' . $formation->image) }}" class="img-fluid rounded" alt="Training Image" style="max-width: 100%; height: auto; border-radius: 5px;">
                            </div>
                        @endif

                        <!-- Training Info -->
                        <div class="row g-3">
                            <!-- Description -->
                            <div class="col-12">
                                <h5 class="text-dark"><i class="fas fa-info-circle text-primary"></i> Description:</h5>
                                <p class="text-muted">{{ $formation->description }}</p>
                            </div>

                            <!-- Date -->
                            <div class="col-12">
                                <h5 class="text-dark"><i class="fas fa-calendar-alt text-primary"></i> Date:</h5>
                                <p class="text-muted">{{ \Carbon\Carbon::parse($formation->date_formation)->format('d M, Y') }}</p>
                            </div>

                            <!-- Duration -->
                            <div class="col-12">
                                <h5 class="text-dark"><i class="fas fa-clock text-primary"></i> Duration:</h5>
                                <p class="text-muted">{{ $formation->duree }} hours</p>
                            </div>

                            <!-- Location -->
                            <div class="col-12">
                                <h5 class="text-dark"><i class="fas fa-map-marker-alt text-primary"></i> Location:</h5>
                                <p class="text-muted">{{ $formation->lieu }}</p>
                            </div>
                        </div>

                        <!-- Google Map -->
                        <div class="mt-4 text-center">
                            <h5 class="text-dark mb-3"><i class="fas fa-map text-primary"></i> Your Map</h5>
                            <div class="position-relative rounded overflow-hidden">
                            <iframe class="position-relative w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2585276.229368108!2d7.167816000000001!3d33.886917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1251e7206ed8e0ff%3A0x6e9e98287bf271b0!2sTunisia!5e0!3m2!1sen!2s!4v1696067213716!5m2!1sen!2s" frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
