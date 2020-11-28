@include('pages.rating-js', ['products' => $product, 'type' => '"one"'])
<section>
    <div class="outter-single-product-with-des">
        <h4 class="title">{{ $product->name }}</h4>
        <div class="inner-single-product-with-des">
            <div class="images">
                @if ($product->mainPhoto)
                    <div class="big-image">
                        <img src="{{ $product->mainPhoto->fileOriginal }}" style="width:100%">
                    </div>
                @endif

                @foreach($product->photos as $photo)
                    <div class="big-image">
                        <img src="{{ $photo->fileOriginal }}" style="width:100%">
                    </div>
                @endforeach

                <div class="several-images owl-theme owl-carousel">
                    @php($currentSlide = 1)
                    @if ($product->mainPhoto)
                        <img class="demo cursor" src="{{ $product->mainPhoto->fileOriginal }}" style="width:100%"
                             onclick="currentSlide({{ $currentSlide }})">
                        @php($currentSlide++)
                    @endif
{{--                    {{dd($product)}}--}}
                    @foreach($product->photos as $photo)
                        <img class="demo cursor" src="{{ $photo->photoOriginal }}" style="width:100%"
                             onclick="currentSlide({{ $currentSlide }})">
                        @php($currentSlide++)
                    @endforeach
                </div>
            </div>
            <div class="description">
                <div class="text-description">
                    <div class="rate">
                        <div id="rateYo_one0"></div>
{{--                        <div class="rating stars">--}}
{{--                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>--}}
{{--                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>--}}
{{--                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>--}}
{{--                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>--}}
{{--                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>--}}
{{--                        </div>--}}
                        <div class="comment">
                            <i class="mbcomment"></i>
                            <span>{{ $product->number_of_reviews }} {{ trans('frontend.product.comments') }}</span>
                        </div>
                    </div>

{{--                    <p>ID товара: <span> 1666559495</span></p>--}}
                    <p class="title">@lang('frontend.product.characteristics')</p>
                    @foreach($product->mainValues as $value)
                        <p>{{ $value->characteristic->name }}: <span>{{ $value->value }}</span></p>
                    @endforeach
                    <a href="#pills-characteristics">@lang('frontend.product.all_characteristics')</a>
                </div>
                <div class="color-delivery-des">
                    <form action="#">
                        @php($valueModifications = $product->valueModifications)
                        @foreach($valueModifications as $modification)
                            <p>{{ $modification->name }}: <span>{{ $modification->value }}</span></p>
                            <div class="pr-des-radio-buttons">
                                <div class="value-modification" id="value-modification"
                                     data-actual-price="{{ trans('frontend.product.price', ['price' => $modification->price_uzs]) }}"
                                     data-final-price="{{ trans('frontend.product.price', ['price' => $modification->currentPriceUzs]) }}">
                                    {{ $modification->value }}
                                </div>
                            </div>
                        @endforeach
                        @if ($product->colorModifications()->exists())
                            @php($colorModifications = $product->colorModifications)
                            <p>@lang('frontend.color'): <span id="color-modification-name">{{ $colorModifications[0]->name }}</span></p>
                            <div class="colors pr-des-radio-buttons3">
                                @foreach($colorModifications as $modification)
                                    <div class="color color-modification" id="color-modification">
                                        <div style="background-color: {{ $modification->color }}"
                                             data-name="{{ $modification->name }}"
                                             data-actual-price="{{ trans('frontend.product.price', ['price' => $modification->price_uzs]) }}"
                                             data-final-price="{{ trans('frontend.product.price', ['price' => $modification->currentPriceUzs]) }}"
                                        ></div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </form>
                    <div class="current-old-price horizontal">
                        <h5 class="price" id="final-product-price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
                        <h6 class="old-price" id="actual-product-price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h6>
                    </div>
                    <div class="item-action-icons">
                        <div class="cart" id="cart-button"
                             data-name="{{ $product->name }}"
                             data-url="{{ $product->mainPhoto ? $product->mainPhoto->fileOriginal : asset('images/tv6.png') }}"
                             data-price="{{ $product->currentPriceUzs }}" >
                            <i class="mbcart"></i>@lang('frontend.product.to_cart')
                        </div>
                        <div class="libra" data-name="{{ $product->name }}"
                             data-url="{{ $product->mainPhoto ? $product->mainPhoto->fileOriginal : asset('images/tv6.png') }}"
                             data-price="{{ $product->currentPriceUzs }}"
                        >
                            <i class="mbtocompare"></i>
                        </div>
                        <div class="like"><i class="mbfavorite"></i></div>
                    </div>
                    <div class="delivery-options">
                        <div><i class="mbdelievery"></i>@lang('frontend.product.delivery_time')</div>
                        <div><i class="mbbox"></i>@lang('frontend.product.pickup_time', ['date' => '8 апреля'])</div>
                    </div>
                    <div class="first-item">
                        <div class="shop-name-logo">
                            <a href="{{ route('shops.show',['store' => $product->store]) }}"><img src="{{ $product->store->fileThumbnail ?? null }}" alt=""></a>
                            <div>
                                <p class="sub-title">{!! $product->name !!}</p>
                                <b class="title"><a href="{{ route('categories.show', products_path($product->mainCategory)) }}">{!! $product->mainCategory->name !!}</a></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

