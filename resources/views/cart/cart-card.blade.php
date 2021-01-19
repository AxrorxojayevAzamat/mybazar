<?php
if ($product->classFavorite($product->id)) {
    $favoriteClass = "selected_like";
} else {
    $favoriteClass = '';
}
?>
<div class="item" id="{{ $product->id }}">
    <div class="product-img">
        <img src="{{ $product->mainPhoto->fileThumbnail }}" class="h-100 w-auto" alt="">
    </div>
    <!-- description -->
    <div class="description ">
        <a href="{{ route('products.show', $product) }}"><h6 class="title">{{ $product->name }}</h6></a>
        <p class="sub-title">{{ $product->name }}</p>
        <div class="current-old-price horizontal">
            <h5 class="price">{{ $product->price_uzs }} <span>@lang('frontend.cart.sum')</span></h5>
        </div>
        <div class="count-div">
            <i class="mbdeleteone" onclick="quantityCounter({{ $product->id }}, 'delete')"></i>
            <div class="number" id="{{ $product->id }}-cartCounter">1</div>
            <i class="mbaddone" onclick="quantityCounter({{ $product->id }}, 'add')"></i>
        </div>
        <div class="item-action-icons">
            <div class="libra" data-name="{{ $product->name }}"
                 data-id="l{{ $product->id }}"
                 data-url="{{ route('products.show', $product) }}"
                 data-price="{{ $product->price_uzs }}"><i class="mbtocompare"></i></div>
            <div class="like <?php echo $favoriteClass ?>"><i class="mbfavorite"></i></div>
        </div>
        <div class="delivery-options">
            <div><i class="mbdelievery"></i> @lang('frontend.cart.delivery_in_day')</div>
            <div><i class="mbbox"></i>@lang('frontend.cart.callback_until_8_april')</div>
        </div>
        <p class="sub-title bottom mb-0">{{ $product->store->name }}</p>
    </div>
    <!-- end description -->
    <button class="btn delete-btn" onclick="removeCartListInCart({{ $product->id }})"><i class="mbexit_mobile"></i></button>
    <script>
        localStorage.getItem('compare_product').split(',').forEach(el => {
            if (el === "{{$product->id}}") {
                $(`[data-id="l${el}"]`).addClass('selected_libra');
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
