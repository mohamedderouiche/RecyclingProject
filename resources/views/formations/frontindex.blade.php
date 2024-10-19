<div class="container">
    <!-- Header Section -->
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <p class="fs-5 fw-bold text-primary">Nos Formations</p>
        <h1 class="display-5 mb-5">Découvrez nos Formations</h1>
    </div>

    <!-- Filter Buttons -->
    <div class="row wow fadeInUp" data-wow-delay="0.3s">
        <div class="col-12 text-center">
            <ul class="list-inline rounded mb-5" id="portfolio-flters">
                <li class="mx-2 active btn btn-outline-primary" data-filter="*">Toutes</li>
                <li class="mx-2 btn btn-outline-primary" data-filter=".completed">Formations Complétées</li>
                <li class="mx-2 btn btn-outline-primary" data-filter=".ongoing">Formations en Cours</li>
            </ul>
        </div>
    </div>

    <!-- Formations Grid -->
    <div class="row g-4 portfolio-container">
        @foreach($formations as $formation)
            <div class="col-lg-4 col-md-6 portfolio-item {{ $formation->status == 'completed' ? 'completed' : 'ongoing' }} wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-inner rounded shadow-sm border">
                    <!-- Formation Image -->
                    <div class="position-relative overflow-hidden rounded-top">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $formation->image) }}" alt="Image de la formation {{ $formation->name }}" style="max-height: 220px; object-fit: cover;">
                        <!-- Overlay for Hover -->
                        <div class="portfolio-text position-absolute top-50 start-50 translate-middle text-center opacity-0 bg-dark bg-opacity-75 w-100 h-100 d-flex flex-column justify-content-center align-items-center rounded-top transition">
                            <h4 class="text-white mb-2">{{ $formation->name }}</h4>
                            <p class="text-white">{{ $formation->lieu }}</p>
                            <!-- Eye Icon Link -->
                            <a class="btn btn-lg-square rounded-circle mx-2 text-white bg-primary" href="{{ route('formations.frontdetails', $formation->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Formation Information -->
                    <div class="p-3 text-center">
                        <h5 class="text-dark">{{ $formation->name }}</h5>
                        <p class="text-muted mb-3">{{ $formation->lieu }}</p>
                        <!-- Registration Button -->
                        <a class="btn btn-sm btn-primary" href="{{ route('formations.frontdetails', $formation->id) }}">
                            <i class="fa fa-sign-in-alt text-white me-2"></i>S'inscrire
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Custom CSS for Hover Effect -->
<style>
    .portfolio-item:hover .portfolio-text {
        opacity: 1;
    }
    .portfolio-text {
        transition: opacity 0.3s ease;
    }
</style>
