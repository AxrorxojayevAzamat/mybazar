<section>
    <div class="carousel-products">
        <div class="h4-title">
            <h4 class="title">{{$title}}</h4>
        </div>
        <div class="outter-products">
            <div class="products owl-carousel owl-theme">
                @foreach ($products as $product)
                    @include('layouts.product-item')
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('pages.rating-js', ['products' => $products, 'type' => $rate_for['js']])
