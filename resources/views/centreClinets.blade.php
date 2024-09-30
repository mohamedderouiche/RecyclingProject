<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Our Centers</p>
            <h1 class="display-5 mb-5">Notre centre de recyclages</h1>
        </div>
        <div class="row g-4">
            @foreach($data as $centre)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index * 2 + 1 }}s">
                <div class="team-item rounded">
                    <!-- Link to the show page -->
                    <a href="{{ route('centres.show', $centre->id) }}">
                        <img class="img-fluid" src="/centreImages/{{ $centre->image }}" alt="{{ $centre->nom }}">
                    </a>
                    <div class="team-text">
                        <h4 class="mb-0">{{ $centre->nom }}</h4>
                        <p class="text-primary">{{ $centre->adresse }}</p>
                        <div class="team-social d-flex">
                            <a class="btn btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square rounded-circle me-2" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        </div>
    </div>
</div>
