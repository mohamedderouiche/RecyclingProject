<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <title>Green Recycle </title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
   @include('topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('navbar')
    <!-- Navbar End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Article Details Section -->
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-5">
                            <!-- Title -->
                            <h1 class="display-5 mb-4 text-center text-primary">{{ $article->title }}</h1>

                            <!-- Image -->
                            @if($article->image)
                                <div class="text-center mb-4">
                                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded" alt="{{ $article->title }}" style="max-width: 100%; height: auto; border-radius: 5px;">
                                </div>
                            @endif

                            <!-- Article Info -->
                            <div class="row g-3">
                                <!-- Content -->
                                <div class="col-12">
                                    <h5 class="text-dark"><i class="fas fa-info-circle text-primary"></i> Content:</h5>
                                    <p class="text-muted">{{ $article->contenu }}</p>
                                </div>

                                <!-- Published Date -->
                                <div class="col-12">
                                    <h5 class="text-dark"><i class="fas fa-calendar-alt text-primary"></i> Published On:</h5>
                                    <p class="text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('d M, Y') }}</p>
                                </div>

                                <!-- Author -->
                                <div class="col-12">
                                    <h5 class="text-dark"><i class="fas fa-user text-primary"></i> Author:</h5>
                                    <p class="text-muted">{{ $article->author }}</p>
                                </div>
                            </div>

                            <!-- Google Map (if needed) -->
                            <div class="mt-4 text-center">
                                <h5 class="text-dark mb-3"><i class="fas fa-map text-primary"></i> Location (if relevant):</h5>
                                <div class="position-relative rounded overflow-hidden">
                                    <iframe class="position-relative w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2585276.229368108!2d7.167816000000001!3d33.886917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1251e7206ed8e0ff%3A0x6e9e98287bf271b0!2sTunisia!5e0!3m2!1sen!2s!4v1696067213716!5m2!1sen!2s" frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    @include('footer')
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
