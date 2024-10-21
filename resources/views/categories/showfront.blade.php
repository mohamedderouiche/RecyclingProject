<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <title>Green Recycle</title>
    <link rel="icon" href="{{ asset('img/logo/recycling.ico') }}" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        /* Styles pour la barre de recherche */
        .filter-bar {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-bar input[type="text"],
        .filter-bar input[type="number"] {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            border: 1px solid #036931;
            border-radius: 5px;
            margin-bottom: 10px;
            margin-right: 10px;
            transition: border-color 0.3s ease;
        }

        .filter-bar input[type="text"]:focus,
        .filter-bar input[type="number"]:focus {
            border-color: #0056b3;
            outline: none;
        }

        .price-inputs {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 400px;
        }

        .price-inputs input {
            width: 48%; /* 48% pour deux champs avec un espace */
        }

        .filter-bar .btn-filter {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-bar .btn-filter:hover {
            background-color: #0056b3;
        }

        /* Styles pour les alertes */
        .alert {
            margin-bottom: 20px;
        }

        /* Styles pour les produits */
        .portfolio-item {
            transition: transform 0.3s ease;
        }

        .portfolio-item:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    @include('topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('navbar')
    <!-- Navbar End -->

    <div class="container my-5">
        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Affichage des catégories -->
        <div class="container ">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="fs-5 fw-bold text-primary">Nos Catégories</p>
                    <h1 class="display-5 mb-5">Découvrez nos Catégories</h1>
                </div>
                <div class="row wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        <!-- Liste des catégories en ligne (horizontale) -->
                        <ul class="list-inline mb-5" style="padding: 0; display: flex; justify-content: center; flex-wrap: wrap;">
                            @foreach($categories as $category)
                                <li class="list-inline-item mx-3" style="font-size: 18px;">
                                    <a href="{{ route('categories.products', $category->id) }}" class="text-decoration-none text-primary fw-bold" style="transition: color 0.3s;">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Affichage des produits avec barre de filtrage -->
        <div class="container">
            <!-- Barre de filtrage -->
            <div class="filter-bar">
                <input type="text" id="filterInput" class="form-control" placeholder="Rechercher des produits..." onkeyup="filterProducts()">
                <div class="price-inputs">
                    <input type="number" id="minPriceInput" class="form-control" placeholder="Prix minimum" onkeyup="filterProducts()">
                    <input type="number" id="maxPriceInput" class="form-control" placeholder="Prix maximum" onkeyup="filterProducts()">
                </div>
                <button class="btn-filter" 
                style="background-color: rgba(9, 146, 27, 0.2); 
                       color: rgba(19, 46, 3, 0.767); 
                       border: 1px solid rgba(1, 131, 1, 0.5); 
                       padding: 10px; 
                       border-radius: 5px; 
                       backdrop-filter: blur(5px);" 
                onclick="filterProducts()">
            Filtrer
        </button>
        
            </div>
            <div class="row g-4 portfolio-container" id="productList">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $product->status == 'available' ? 'available' : 'unavailable' }} wow fadeInUp" data-wow-delay="0.1s" data-price="{{ $product->price }}">
                        <div class="portfolio-inner rounded">
                            <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="Image de {{ $product->name }}">
                            <div class="portfolio-text">
                                <h4 class="text-white mb-4">{{ $product->name }}</h4>
                                <p class="text-white">Prix: {{ $product->price }}€</p> <!-- Affichage du prix -->
                                <div class="d-flex mb-4">
                                    <a class="btn btn-lg-square rounded-circle mx-2" href="{{ route('products.detailfront', $product->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                                <a class="btn btn-sm" href=""><i class="fa text-primary me-2"></i>Ajouter au Panier</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                    &copy; <a class="border-bottom" href="#">Your Site Name</a>, Tous droits réservés.
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
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Inline JavaScript pour effet de survol -->
    <script>
        // Fonction pour filtrer les produits
        function filterProducts() {
            const filterInput = document.getElementById("filterInput").value.toLowerCase();
            const minPrice = parseFloat(document.getElementById("minPriceInput").value) || 0;
            const maxPrice = parseFloat(document.getElementById("maxPriceInput").value) || Infinity;
            const productList = document.getElementById("productList");
            const products = productList.getElementsByClassName("portfolio-item");

            for (let i = 0; i < products.length; i++) {
                const product = products[i];
                const productName = product.querySelector(".portfolio-text h4").textContent.toLowerCase();
                const productPrice = parseFloat(product.getAttribute("data-price"));

                // Vérifie si le produit correspond au filtre
                if (
                    productName.includes(filterInput) &&
                    productPrice >= minPrice &&
                    productPrice <= maxPrice
                ) {
                    product.style.display = "block"; // Affiche le produit
                } else {
                    product.style.display = "none"; // Masque le produit
                }
            }
        }
    </script>
</body>

</html>