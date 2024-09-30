

    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Nos Formations</p>
            <h1 class="display-5 mb-5">Découvrez nos Formations</h1>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline rounded mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">Toutes</li>
                    <li class="mx-2" data-filter=".completed">Formations Complétées</li>
                    <li class="mx-2" data-filter=".ongoing">Formations en Cours</li>
                </ul>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline rounded mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">Toutes</li>
                        <li class="mx-2" data-filter=".completed">Formations Complétées</li>
                        <li class="mx-2" data-filter=".ongoing">Formations en Cours</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                @foreach($formations as $formation)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $formation->status == 'completed' ? 'completed' : 'ongoing' }} wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-inner rounded">
                            <img class="img-fluid" src="{{ asset('storage/' . $formation->image) }}" alt="Image de la formation {{ $formation->name }}">
                            <div class="portfolio-text">
                                <h4 class="text-white mb-4">{{ $formation->name }}</h4>
                                <p class="text-white mb-4">{{ $formation->lieu }}</p>
                                <div class="d-flex mb-4">
                                    <a class="btn btn-lg-square rounded-circle mx-2" href="{{ route('formations.frontdetails', $formation->id) }}"><i class="fa fa-eye"></i></a>
                                </div>
                                <a class="btn btn-sm" href="{{ route('formations.frontdetails', $formation->id) }}"><i class="fa text-primary me-2"></i>S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
