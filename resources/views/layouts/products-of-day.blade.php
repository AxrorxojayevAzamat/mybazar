<section>
    <div id="products-of-day" class=" products-of-day owl-carousel owl-theme">
        @foreach($dayProducts as $product)
            <div class="product-item" >
                <div class="top">
                    <h5 class="bold title">@lang('frontend.product.day_product')</h5>
                    <div class="time">
                        @php($discountExpireDate = $product->discountExpiresAt)
                        <span class="day">{{ date('d', $discountExpireDate) }}</span>
                        <span class="hour">{{ date('H', $discountExpireDate) }}</span>
                        <span class="minute">{{ date('i', $discountExpireDate) }}</span>{{-- TODO: fix timing --}}
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-image">
                        @if ($product->mainPhoto)
                            <a href="{{ route('products.show', $product) }}"><img src="{{ $product->mainPhoto->fileOriginal }}" alt=""></a>
                        @endif
                        <span class="sale big">
                            <span class="number">-{{ $product->discount * 100 }}% @lang('frontend.discount_upper')</span>
                        </span>
                    </div>
                    <div class="description">
                        <h6 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
                        <div class="rate">
                            <div class="rating stars">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>{{ $product->number_of_reviews }}</span>
                            </div>
                        </div>
                        <div class="current-old-price vertical">
                            <h5 class="price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
                            <h6 class="old-price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="{{ $product->name }}" data-price="{{ $product->currentPriceUzs }}" data-url="{{asset('images/laptop.png')}}"><i class="mbcart"></i></div>
                            <div class="libra" data-name="{{ $product->name }}" data-price="{{ $product->currentPriceUzs }}" data-url="{{asset('images/laptop.png')}}"><i class="mbtocompare"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
