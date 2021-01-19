<section>
    <div class="similar-products">
        <div class="h4-title similar-products">
            <h4 class="title">@lang('frontend.product.similar_products')</h4>
        </div>
        <div class="outter-products">
            <div class="similar-p owl-carousel owl-theme">
                @foreach($similarProducts as $product)
                    <?php
                    if ($product->classFavorite($product->id)) {
                        $favoriteClass = "selected_like";
                    } else {
                        $favoriteClass = '';
                    }

                    if ($product->classCart($product->id)) {
                        $cartClass = "selected_cart";
                    } else {
                        $cartClass = '';
                    }
                    ?>
                    <div class="item">
                        <div class="product-item" onclick="location.href = '{{ route('products.show', $product) }}'">
                            <div class="product-img">
                                @if ($product->main_photo_id)
                                    <a href="{{ route('products.show', $product) }}">
                                        <img src="{{ $product->mainPhoto->fileThumbnail }}" alt="">
                                    </a>
                                @endif
                            </div>
                            <div class="description">
                                <h6 class="title"><a
                                        href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
                                <p class="sub-title">{{ $product->mainCategory->name }}</p>
                                <div class="rate">
                                    <div id="rateYo_S{{ $loop->index }}"></div>
                                    <div class="comment">
                                        <i class="mbcomment"></i>
                                        <span>{{ $product->number_of_reviews }}</span>
                                    </div>
                                </div>
                                <div class="current-old-price horizontal">
                                    <h5 class="price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h5>
                                </div>

                                <p class="sub-title bottom">{{ $product->store->name }}</p>
                            </div>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart <?php echo $cartClass ?>" id="cartActive{{ $product->id }}"
                                 data-id="c{{ $product->id }}" data-name="{{ $product->name }}"
                                 data-price="{{ $product->price_uzs }}" data-url="{{asset('images/popular1.png')}}"><i
                                    class="mbcart"></i></div>
                            <div class="libra" data-id="l{{ $product->id }}" data-name="{{ $product->name }}"
                                 data-price="{{ $product->price_uzs }}" data-url="{{asset('images/popular1.png')}}"><i
                                    class="mbtocompare"></i></div>
                            <div class="like <?php echo $favoriteClass ?>"><i class="mbfavorite"></i></div>
                        </div>
                        <script>
                            localStorage.getItem('compare_product').split(',').forEach(el => {
                                if (el === "{{$product->id}}") {
                                    $(`[data-id="l${el}"].libra`).addClass('selected_libra');
                                }
                            })
                            @guest
                            JSON.parse(localStorage.getItem('product_id')).forEach(el => {
                                if (el.product_id === "{{$product->id}}") {
                                    $(`[data-id="c${el.product_id}"]`).addClass('selected_cart');
                                }
                            })
                            @endguest
                        </script>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('pages.rating-js', ['products' => $similarProducts, 'type' => '"S"'])
