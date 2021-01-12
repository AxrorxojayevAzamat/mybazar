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
            @if ($product->mainPhoto)
                <a href="{{ route('products.show', $product) }}">
                    <img src="{{ $product->mainPhoto->fileThumbnail }}" alt="">
                </a>
            @endif
            @if ($product->new)
                <span class="new-product">@lang('frontend.novelty_upper')</span>
            @endif
        </div>
        <div class="description">
            <h6 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
            <p class="sub-title">
                <a href="{{ route('categories.show', products_path($product->mainCategory)) }}">{{ $product->mainCategory->name }}</a><br>
            </p>
            <div class="rate">
                <div id="rateYo_{{$rate_for['html']}}{{ $loop->index }}"></div>
                <div class="comment">
                    <i class="mbcomment"></i>
                    <span>{{ $product->number_of_reviews }}</span>
                </div>
            </div>
            <div class="current-old-price horizontal">
                <h5 class="price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
            </div>

            <p class="sub-title bottom">{{ $product->store->name }}</p>
        </div>
    </div>
    <div class="item-action-icons">
        <div class="cart <?php echo $cartClass ?>" id="cartActive{{ $product->id }}" data-id="{{ $product->id }}"
             data-name="{{ $product->name }}"
             data-price="{{ $product->price_uzs }}" data-url="{{asset('images/popular1.png')}}"><i
                class="mbcart"></i></div>
        <div class="libra" onclick="addToCompare({{ $product->id }})" data-name="{{ $product->name }}"
             data-price="{{ $product->price_uzs }}"
             data-url="{{asset('images/popular1.png')}}"><i class="mbtocompare"></i></div>
        <div class="like <?php echo $favoriteClass ?>" onclick="addToFavorite({{ $product->id }})"><i
                class="mbfavorite"></i></div>
    </div>
    @guest
        <script>
            JSON.parse(localStorage.getItem('product_id')).forEach(el => {
                if (el.product_id === {{$product->id}}) {
                    $(`[data-id="${el.product_id}"]`).addClass('selected_cart');
                }
            })
        </script>
    @endguest
</div>

