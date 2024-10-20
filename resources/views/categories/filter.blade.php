<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Filtrer les Produits</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    @include('topbar')
    @include('navbar')

    <div class="container my-5">
        <h2>Filtrer les Produits par Prix</h2>
        <form action="{{ route('categories.filter', $categoryId) }}" method="GET" class="mb-5">
            <div class="row">
                <div class="col-md-4">
                    <input type="number" name="min_price" class="form-control" placeholder="Prix Min" step="0.01">
                </div>
                <div class="col-md-4">
                    <input type="number" name="max_price" class="form-control" placeholder="Prix Max" step="0.01">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Prix: {{ number_format($product->price, 2) }} €</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir Détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
