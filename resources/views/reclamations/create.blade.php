
<body id="page-top">

    <div class="container-fluid quote my-5 py-5" data-parallax="scroll" data-image-src="img/carousel-2.jpg">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white rounded p-4 p-sm-5 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="display-5 text-center mb-5">Create a New Reclamation</h1>
                        <form action="{{ route('reclamations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-control bg-light border-0" id="typeReclamation" name="type_reclamation_id" required>
                                            <option value="">Select Type</option>
                                            @foreach($typeReclamations as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="typeReclamation">Type of Reclamation</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-light border-0" id="description" name="description" placeholder="Leave a message here"   style="height: 100px" rows="4" required></textarea>
                                        <label for="description">Message</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="image" class="text-muted">Upload Image (optional)</label>

                                        <input type="file" class="form-control bg-light border-0 rounded-3"  style="height: 50" id="image" name="image">


                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn btn-primary py-3 px-4" type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
