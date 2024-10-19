
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Our Events</p>
            <h1 class="display-5 mb-5">Discover Engaging Events Tailored For You</h1>
        </div>
<div class="row g-4">
        <div class="row">
            @foreach($typeEvents as $typeEvent)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100 shadow-sm">
                        <div class="service-img rounded">
                            @if($typeEvent->image)
                                <img class="img-fluid" src="{{ asset('storage/' . $typeEvent->image) }}" alt="Event Image" style="width:100%; height:200px;">
                            @else
                                <img class="img-fluid" src="{{ asset('path/to/default/image.jpg') }}" alt="No Image" style="width:100%; height:200px;">
                            @endif
                        </div>
                        <div class="service-text rounded p-5">
                            <a href="{{ route('events.events', $typeEvent->id) }}">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/event.png" alt="Icon">
                            </div>
                            </a>
                            <h4 class="mb-3">{{ $typeEvent->title }}</h4>
                            <p class="mb-4">{{ $typeEvent->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
    </div>
</div>  