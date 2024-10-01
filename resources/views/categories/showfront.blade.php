
<div class="container">
    <h1>Products in this Category</h1>

    @if($products->isEmpty())
        <p>No products found in this category.</p>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded">
                        {{-- Si le produit a une image, affichez-la --}}
                      

                        <div class="team-text">
                            <h4 class="mb-0">{{ $product->name }}</h4>
                            <p class="text-primary">{{ $product->description }}</p>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
