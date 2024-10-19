@extends('reclamations.layoutFront')  <!-- Extending the admin layout -->

@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">

                <h1 class="display-5 mb-5">Update Your Reclamation</h1>
                <form action="{{ route('reclamations.updateuser', $reclamation->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Method spoofing to simulate POST for update -->
                    <div class="row g-3">
                        <!-- Type of Reclamation -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control" id="typeReclamation" name="type_reclamation_id" required
                                    style="width: 100%; height: 58px; background-color: #ffffff; color: #6c757d; border: 1px solid #ced4da; padding: 12px;">
                                    <option value="" disabled>Select Type of Reclamation</option>
                                    @foreach($typeReclamations as $type)
                                        <option value="{{ $type->id }}" {{ $reclamation->type_reclamation_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" id="description" name="description" placeholder="Describe the issue" style="height: 100px" required>{{ $reclamation->description }}</textarea>
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

                                <!-- Show existing image if available -->
                                @if($reclamation->image)
                                    <img id="image-preview" class="image-upload-preview" src="{{ asset('storage/' . $reclamation->image) }}" alt="Image Preview" style="margin-top: 10px; max-width: 100%; height: auto; border-radius: 10px;" />
                                @else
                                    <img id="image-preview" class="image-upload-preview d-none" alt="Image Preview" style="margin-top: 10px; max-width: 100%; height: auto; border-radius: 10px;" />
                                @endif
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
                                position: relative;
                            }

                            .image-upload-icon {
                                font-size: 40px;
                                color: #6c757d;
                            }

                            .image-upload-preview {
                                width: 100%;
                                height: auto;
                                object-fit: cover;
                            }
                        </style>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-4" type="submit">Update Now</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Google Map -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                <div class="position-relative rounded overflow-hidden h-100">
                    <iframe class="position-relative w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- JavaScript for previewing image -->
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
