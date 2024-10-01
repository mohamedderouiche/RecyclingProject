@extends('products.layoutProduct') <!-- Extending the front layout -->

@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Product Details Section -->
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body p-5">
                        <!-- Title -->
                        <h1 class="display-5 mb-4 text-center text-primary">{{ $product->name }}</h1> 
                        
                        <!-- Image -->
                        @if($product->image)
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="Product Image" style="max-width: 100%; height: auto; border-radius: 5px;">
                            </div>
                        @endif

                        <!-- Product Info -->
                        <div class="row g-3">
                            <!-- Description -->
                            <div class="col-12">
                                <h5 class="text-dark"><i class="fas fa-info-circle text-primary"></i> Description:</h5>
                                <p class="text-muted">{{ $product->description }}</p>
                            </div>

                            <!-- Price -->
                            <div class="col-12">
                                <h5 class="text-dark"><i class="fas fa-tag text-primary"></i> Price:</h5>
                                <p class="text-muted">{{ number_format($product->price, 2) }} TND</p>
                            </div>

                            <!-- Category -->
                            <div class="col-12">
                                <h5 class="text-dark"><i class="fas fa-tags text-primary"></i> Category:</h5>
                                <p class="text-muted">{{ $product->category->name ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
