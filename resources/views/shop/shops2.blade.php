<div class="shops-2r">
    @if($shops2)
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
                                <input type="radio" id="star5" name="rating" value="5"/><label for="star5" title="Meh">5
                                    stars</label>
                                <input type="radio" id="star4" name="rating" value="4"/><label for="star4"
                                                                                               title="Kinda bad">4
                                    stars</label>
                                <input type="radio" id="star3" name="rating" value="3"/><label for="star3"
                                                                                               title="Kinda bad">3
                                    stars</label>
                                <input type="radio" id="star2" name="rating" value="2"/><label for="star2"
                                                                                               title="Sucks big tim">2
                                    stars</label>
                                <input type="radio" id="star1" name="rating" value="1"/><label for="star1"
                                                                                               title="Sucks big time">1
                                    star</label>
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
