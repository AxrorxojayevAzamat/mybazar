<section>
    <div class="recommended">
        <div class="h4-title">
            <h4 class="title">@lang('frontend.recommend')</h4>
        </div>
        <div class="outter-products">
            <div class="products row owl-carousel owl-theme">
                @foreach($newProducts as $product)
                <div class="item">
                    <div class="product-img">
                        @if ($product->mainPhoto)
                            <img src="{{ $product->mainPhoto->fileOriginal }}" alt="">
                        @endif
                    </div>
                    <div class="description">
                        <h6 class="title">{{$product->name}}</h6>
                        <p class="sub-title">
                            @foreach($product->categories as $category)
                                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a><br>
                            @endforeach
                        </p>
                        <div class="rate">
                            <div id="rateYo_R{{ $loop->index }}"></div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>{{$product->number_of_reviews}}</span>
                            </div>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
                        </div>
                        <div class="item-action-icons">
                            <div class="libra" data-name="{{ $product->name }}" data-price="{{ $product->price_uzs }}"  data-url="{{asset('images/recomended1.png')}}"><i class="mbtocompare"></i></div>
                            <div class="cart" data-name="{{ $product->name }}" data-price="{{ $product->price_uzs }}"  data-url="{{asset('images/recomended1.png')}}"><i class="mbcart"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                        <p class="sub-title bottom">{{ $product->mainCategory->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('pages.rating-js', ['products' => $newProducts, 'type' => '"R"'])
