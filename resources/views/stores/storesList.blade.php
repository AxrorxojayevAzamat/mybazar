<?php
use App\Services\Manage\StoreService;
?>
<div class="shops-fr owl-carousel owl-theme">
    @foreach($stores as $store)
        <div class="item ">
            <div class="shop-name-logo">
                <a href="#"><img src="{{ $store->logoOriginal }}" alt=""></a>
                <div>
                    <h6 class="title"><a href="{{ route('stores.view',['id' => $store->id]) }}">{!! $store->name !!}</a></h6>
                </div>
            </div>
            <div class="product-images">
                <div class="big-img">
                    <img src="{{ $store->mainPhoto }}" alt="">
                </div>
                <div class="small-img">
                    <?php $products = StoreService::fourProduct($store->id);?>
                    @foreach($products as $product)
                        <a href="{{ url('products/show/'.$product->id) }}"><img
                                src="{{ $product->main_photo_thumbnail }}" alt=""></a>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
