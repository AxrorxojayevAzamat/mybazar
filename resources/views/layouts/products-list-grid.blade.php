<div class="all-filtered-items">
    @foreach($products as $product)
        @include('layouts.product-item-list')
    @endforeach
    <div class="catalog-banner"></div>
</div>

@include('pages.rating-js', ['products' =>$ratings, 'type' => '"P"'])
