@if($product)
    @foreach($product as $item)
        @include('pages.rating-js', ['products' => $product, 'type' => $rate_for['js']])
        <?php
        if ($item->classFavorite($item->id)) {
            $favoriteClass = "selected_like";
        } else {
            $favoriteClass = '';
        }

        if ($item->classCart($item->id)) {
            $cartClass = "selected_cart";
        } else {
            $cartClass = '';
        }
        ?>
        <div class="item">
            <div class="product-img">
                <a href="{{ route('products.show',['product' => $item->id]) }}"><img src="{{ $item->mainPhoto->fileThumbnail ?? '' }}" alt=""></a>
            </div>
            <div class="description ">
                <h6 class="title">
                    <a href="{{ route('products.show',['product' => $item->id]) }}">{!! $item->name !!}</a>
                </h6>
                <p class="sub-title">{!! $item->maincategory->name !!}</p>
                <div class="rate">
                    <div id="rateYo_{{$rate_for['html']}}{{ $loop->index }}"></div>
                    <div class="comment">
                        <i class="mbcomment"></i>
                        <span>{{ $item->number_of_reviews }}</span>
                    </div>
                </div>
                <div class="list-full-des">
                    {!! $item->description !!}
                </div>
                <div class="current-old-price horizontal">
                    <h5 class="price">@lang('frontend.product.price', ['price' => $item->currentPriceUzs])</h5>
                    <h6 class="old-price">@lang('frontend.product.price', ['price' => $item->price_uzs])</h6>
                </div>
                <div class="item-action-icons">
                    <div class="cart <?php echo $cartClass ?>" id="cartActive{{ $item->id }}"
                         data-id="c{{ $item->id }}">
                        <i class="mbcart"></i>
                    </div>
                    <div class="libra" onclick="addToCompare({{ $item->id }})"
                         data-id="l{{ $item->id }}">
                        <i class="mbtocompare"></i>
                    </div>
                    <div class="like <?php echo $favoriteClass ?>" onclick="addToFavorite({{ $item->id }})">
                        <i class="mbfavorite"></i>
                    </div>
                </div>
                <div class="delivery-options">
                    <div><i class="mbdelievery"></i> @lang('frontend.cart.delivery_in_day')</div>
                    <div><i class="mbbox"></i>@lang('frontend.cart.callback_until_8_april')</div>
                </div>
                <p class="sub-title bottom">{!! $item->store->name !!}</p>
            </div>
            <script>
                localStorage.getItem('compare_product').split(',').forEach(el => {
                    if (el === "{{$item->id}}") {
                        $(`[data-id="l${el}"]`).addClass('selected_libra');
                    }
                })
                @guest
                JSON.parse(localStorage.getItem('product_id')).forEach(el => {
                    console.log(el)
                    if (el.product_id === "{{$item->id}}") {
                        console.log(el)
                        $(`[data-id="c${el.product_id}"]`).addClass('selected_cart');
                    }
                })
                @endguest
            </script>
        </div>

    @endforeach
    <nav class="products-pagination" aria-label="Page navigation example">
        <ul class="pagination">
            {!! $product->links() !!}
        </ul>
    </nav>
@endif
