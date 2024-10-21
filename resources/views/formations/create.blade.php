<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Green Recycle - Dashboard</title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    @include('admin.topbar')
                </nav>

                <div class="container mt-5">
                    <h1 class="mb-4 text-center">Create New Training</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ route('formations.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Training Name -->
                                <div class="form-group">
                                    <label for="name">Training Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter training name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="2" placeholder="Enter training description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <label for="date_formation">Date</label>
                                    <input type="date" class="form-control" id="date_formation" name="date_formation" value="{{ old('date_formation') }}">
                                    @error('date_formation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Duration -->
                                <div class="form-group">
                                    <label for="duree">Duration (in hours)</label>
                                    <input type="number" class="form-control" id="duree" name="duree" placeholder="Enter duration in hours" value="{{ old('duree') }}">
                                    @error('duree')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div class="form-group">
                                    <label for="lieu">Location</label>
                                    <input type="text" class="form-control" id="lieu" name="lieu" placeholder="Enter location" value="{{ old('lieu') }}">
                                    @error('lieu')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="form-group">
                                    <label for="image">Training Image (PDF, PNG, JPG)</label>
                                    <input type="file" class="form-control-file" id="image" name="image" accept=".pdf,image/*">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block">Create Training</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('admin.logout')
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
