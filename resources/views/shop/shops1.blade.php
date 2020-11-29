@if($shops1)
    <div class="shops-fr owl-carousel owl-theme">
        @foreach($shops1 as $shop)
            <?php
            $products = \App\Helpers\ProductHelper::getTwoProduct($shop->main_category_id);
            ?>
            <div class="item ">
                <div class="shop-name-logo">
                    <a href="#"><img src="{{ $shop->store->logoThumbnail }}" alt=""></a>
                    <div>
                        <h6 class="title"><a href="#">{!! $shop->store->name !!}</a></h6>
                        <p class="sub-title"><a href="#">{!! $shop->maincategory->name !!}</a></p>
                    </div>
                </div>
                <div class="product-images">
                    <div class="big-img">
                        <a href="#"><img src="{{ $shop->mainPhoto }}" alt=""></a>
                    </div>
                    <div class="small-img">
                        @foreach($products as $product)
                            <a href="{{ route('products.show',$product) }}"><img src="{{ $product->mainPhoto }}" alt=""></a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
