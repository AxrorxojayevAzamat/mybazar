<section>
    <div class="similar-products">
        <div class="h4-title similar-products">
            <h4 class="title">@lang('frontend.product.similar_products')</h4>
        </div>
        <div class="outter-products">
            <div class="similar-p owl-carousel owl-theme">
                @foreach($similarProducts as $product)
                    <div class="item" >
                        <div class="product-img">
                            @if ($product->main_photo_id)
                                <a href="{{ route('products.show', $product) }}">
                                    <img src="{{ $product->mainPhoto->fileThumbnail }}" alt="">
                                </a>
                            @endif
                        </div>
                        <div class="description">
                            <h6 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
                            <p class="sub-title">{{ $product->mainCategory->name }}</p>
                            <div class="rate">
                                <div id="rateYo_S{{ $loop->index }}"></div>
{{--                                <div class="rating stars">--}}
{{--                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>--}}
{{--                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>--}}
{{--                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>--}}
{{--                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>--}}
{{--                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>--}}
{{--                                </div>--}}
                                <div class="comment">
                                    <i class="mbcomment"></i>
                                    <span>{{ $product->number_of_reviews }}</span>
                                </div>
                            </div>
                            <div class="current-old-price horizontal">
                                <h5 class="price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h5>
                            </div>
                            <div class="item-action-icons">
                                <div class="cart" data-name="{{ $product->name }}" data-price="{{ $product->price_uzs }}" data-url="{{asset('images/popular1.png')}}"><i class="mbcart"></i></div>
                                <div class="libra"  data-name="{{ $product->name }}" data-price="{{ $product->price_uzs }}" data-url="{{asset('images/popular1.png')}}"><i class="mbtocompare"></i></div>
                                <div class="like"><i class="mbfavorite"></i></div>
                            </div>
                            <p class="sub-title bottom">{{ $product->store->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('pages.rating-js', ['products' => $similarProducts, 'type' => '"S"'])
