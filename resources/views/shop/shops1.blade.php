@if($shops1)
    <div class="shops-fr owl-carousel owl-theme">
        @foreach($shops1 as $shop)
            <?php
            $products = \App\Helpers\ProductHelper::getTwoProduct($shop->main_category_id);
            ?>
            <div class="item ">
                <div class="shop-name-logo">
                    <a href="{{ route('stores.view',['store'=>$shop->store]) }}"><img src="{{ $shop->store->logoThumbnail }}" alt=""></a>
                    <div>
                        <h6 class="title"><a href="{{ route('stores.view',['store'=>$shop->store]) }}">{!! $shop->store->name !!}</a></h6>
                        <p class="sub-title"><a href="#">{!! $shop->maincategory->name !!}</a></p>
                    </div>
                </div>
                <div class="product-images">
                    <div class="big-img">
                        <a href="{{ route('products.show',['product' => $shop]) }}">
                            @if ($shop->mainPhoto)
                                <div class="big-image">
                                    <img src="{{ $shop->mainPhoto->fileOriginal }}" style="width:100%">
                                </div>
                            @endif</a>
                        </a>
                    </div>
                    <div class="small-img">
                        @foreach($products as $product)
                            <a href="{{ route('products.show',$product) }}">
                                @if ($product->mainPhoto)
                                    <div class="big-image">
                                        <img src="{{ $product->mainPhoto->fileOriginal }}" style="width:100%">
                                    </div>
                                @endif</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
