<?php
use App\Services\Manage\StoreService;
?>
<div class="shops-fr owl-carousel owl-theme">
    @foreach($stores as $shop)
        <div class="item ">
            <div class="shop-name-logo">
                <a href="#"><img src="{{ $shop->logoOriginal }}" alt=""></a>
                <div>
                    <h6 class="title">{!! $shop->name !!}</h6>
                </div>
            </div>
            <div class="product-images">
                <div class="big-img">
                    <img src="{{ $shop->mainPhoto }}" alt="">
                </div>
                <div class="small-img">
                    <?php $products = StoreService::fourProduct($shop->id);;?>
                    @foreach($products as $product)
                            <a href="{{ url('products/show/'.$product->id) }}"><img src="{{ $product->main_photo_thumbnail }}" alt=""></a>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
