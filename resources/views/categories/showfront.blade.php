<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products in {{ $category->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Products in {{ $category->name }}</h1>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-4">Back to Categories</a>

    <div class="row">
        @if($products->isEmpty())
            <p>No products found in this category.</p>
        @else
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>${{ $product->price }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
</body>
</html>
