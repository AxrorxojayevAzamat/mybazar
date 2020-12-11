<section>
    <div class="popular-products">
        <div class="h4-title">
            <h4 class="title">@lang('frontend.popular')</h4>
        </div>
        <div class="outter-products">
            <div class="products owl-carousel owl-theme">
                @foreach ($bestsellerProducts as $product)
                <div class="item">
                    <div class="product-img">
                        @if ($product->mainPhoto)
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ $product->mainPhoto->fileThumbnail }}" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="description">
                        <h6 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
                        <p class="sub-title">
{{--                            @foreach($product->categories as $category)--}}
{{--                                <a href="{{ route('categories.show', products_path($category)) }}">{{ $category->name }}</a><br>--}}
{{--                            @endforeach--}}
                            <a href="{{ route('categories.show', products_path($product->mainCategory)) }}">{{ $product->mainCategory->name }}</a><br>
                        </p>
                        <div class="rate">
                            <div id="rateYo_B{{ $loop->index }}"></div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>{{ $product->number_of_reviews }}</span>
                            </div>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
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

@include('pages.rating-js', ['products' => $bestsellerProducts, 'type' => '"B"'])
