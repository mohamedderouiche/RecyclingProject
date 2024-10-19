<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Green Recycle - Edit Product</title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>


<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-light topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    @include('admin.topbar')
                </nav>
                <!-- End of Topbar -->


                <!-- Page Content -->
                <div class="container mt-5">
                    <h1 class="mb-4 text-center">Edit Product</h1>
                    <div class="row justify-content-center"> <!-- Center the form -->
                        <div class="col-md-6"> <!-- Set the width of the form -->
                            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" >
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>


                                <!-- Product Description -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="2" >{{ $product->description }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>


                                <!-- Product Price -->
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" >
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>


                                <!-- Image Upload -->
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                    <img src="{{ asset('storage/' . $product->image) }}" width="100" alt="{{ $product->name }}" class="mt-3">
                                </div>


                                <!-- Category Selection -->
                                <div class="form-group">
                                    <label for="categories_id">Category</label>
                                    <select name="categories_id" id="categories_id" class="form-control" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->categories_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categories_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>


                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block">Update Product</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            @include('admin.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    @include('admin.logout')


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>


    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>


    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>


</body>


</html>



