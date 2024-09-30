<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Green Recycle</title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">

    <!-- Custom fonts and styles -->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <style>
        /* Styles for image upload section */
        .image-upload-wrapper {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        .image-upload-wrapper:hover {
            background-color: #e0e0e0;
        }

        .image-upload-preview {
            max-width: 100%;
            margin-top: 10px;
        }

        .image-upload-icon {
            font-size: 3rem;
            color: #4e73df;
        }

        .custom-file-label::after {
            content: "Browse";
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">
        @include('admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.topbar')

                <div class="container mt-5">
                    <h1 class="mb-4 text-center">Create New Type Event</h1>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            {{-- Affichage des erreurs de validation --}}
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- Formulaire pour créer un nouveau TypeEvent --}}
                            <form action="{{ route('type_events.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
                                </div>

                                <!-- Design section for uploading image -->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="image-upload-wrapper" onclick="document.getElementById('image').click();">
                                        <i class="fas fa-cloud-upload-alt image-upload-icon"></i>
                                        <p>Click to upload an image</p>
                                        <input type="file" id="image" name="image" class="form-control-file d-none" accept="image/*" onchange="previewImage(event)" required />
                                        <img id="image-preview" class="image-upload-preview d-none" alt="Image Preview">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                                </div>
                            </form>

                            <a href="{{ route('type_events.index') }}" class="btn btn-danger btn-block">Back to List</a>
                        </div>
                    </div>
                </div>

                @include('admin.footer')
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.logout')

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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
