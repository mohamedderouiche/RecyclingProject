
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
                                        @error('type_reclamation_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                        <label for="typeReclamation">Type of Reclamation</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-light border-0" id="description" name="description" placeholder="Leave a message here"   style="height: 100px" rows="4" ></textarea>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                        <label for="description">Message</label>
                                    </div>
                                </div>

                      <!-- Upload Image -->

                      <div class="form-group">
                        <label for="image">Image (optional)</label>
                        <div class="image-upload-wrapper" onclick="document.getElementById('image').click();">
                            <i class="fas fa-cloud-upload-alt image-upload-icon"></i>
                            <p id="upload-text">Click to upload an image</p>
                            <input type="file" id="image" name="image" class="form-control-file d-none" accept="image/*" onchange="previewImage(event)" />
                            @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            <img id="image-preview" class="image-upload-preview d-none" alt="Image Preview" style="margin-top: 10px; max-width: 100%; height: auto; border-radius: 10px;" />
                        </div>
                        <small class="form-text text-muted mt-2">
                            Please upload an image related to your reclamation, such as issues with event organization, recycling center, or formation of recycled products, articles, or other waste related to recycling of waste.
                        </small>
                    </div>


                    <style>
                        .image-upload-wrapper {
                            border: 2px dashed #ced4da;
                            padding: 20px;
                            text-align: center;
                            cursor: pointer;
                            margin-top: 10px;
                            border-radius: 5px;
                            position: relative; /* Ensure proper positioning */
                        }

                        .image-upload-icon {
                            font-size: 40px;
                            color: #6c757d;
                        }

                        .image-upload-preview {
                            width: 100%;
                            height: auto;
                            object-fit: cover; /* Ensure the image covers the area without stretching */
                        }
                    </style>



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
    <script>
        function previewImage(event) {
            const preview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
