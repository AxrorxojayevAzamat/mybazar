<?php
use App\Services\Manage\StoreService;
?>
<div class="all-filtered-shops">
    @foreach($stores as $store)
        <div class="item">
            <div class="shop-name-logo">
                <img src="{{ $store->logoThumbnail }}" alt="">
                <div>
                    <h6 class="title"><a href="{{ route('stores.view',$store) }}">{!! $store->name !!}</a></h6>
                </div>
            </div>
            <div class="product-images">
                <?php $products = StoreService::fourProduct($store->id);?>
                @foreach($products as $product)
                    <a href="{{ route('products.show',$product) }}"><img src="{{ $product->mainPhoto->fileThumbnail ?? '' }}" alt=""></a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
