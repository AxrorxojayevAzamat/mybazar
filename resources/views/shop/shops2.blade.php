<div class="shops-2r">
    @if($shops2)
        @include('pages.rating-js', ['products' => $shops2ThreeItems, 'type' => $rate_for['js']])
        @foreach($shops2 as $shop)
            <div class="first-item">
                <div class="shop-name-logo">
                    <img src="{{ $shop->store->logoOriginal }}" alt="">
                    <div>
                        <h6 class="title">{!! $shop->store->name !!}"</h6>
                        <p class="sub-title"><a href="{{ route('categories.show', products_path($shop->mainCategory)) }}">{!! $shop->maincategory->name !!}</a></p>
                    </div>
                </div>
                <div class="single-img">
                    <img src="{{ $shop->mainPhoto }}" alt="">
                </div>
            </div>
        @endforeach
    @endif
    @if($shops2ThreeItems)
        <div class="shops-2r-inner owl-carousel owl-theme">
            @foreach($shops2ThreeItems as $shops2ThreeItem)
                <div class="palette-items">
                    <div class="product-img">
                        <img src="{{ $shop->mainPhoto }}" alt="">
                        <span class="sale small">
                    <span class="number">-29</span>
                    % СКИДКА
                </span>
                    </div>
                    <div class="description">
                        <h6 class="title"><a href="{{ route('products.show', $shop) }}">{!! $shops2ThreeItem->name !!}</a></h6>
                        <div class="rate">
                            <div class="rating stars">
                                <div id="rateYo_{{$rate_for['html']}}{{ $loop->index }}"></div>
                            </div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>75</span>
                            </div>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">{{ $shops2ThreeItem->price_uzs }} <span>сум</span></h5>
                        </div>
                        <div class="item-action-icons">
                            <div class="libra"><i class="mbtocompare"></i></div>
                            <div class="cart"><i class="mbcart"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
@endif

