<div class="ur-cart">
    @if($method !== 'cart')
        <form action="/cart-list">
            <button class="btn back-to-address">@lang('frontend.cart.back_to_cart')</button>
        </form>
    @endif
    <h6>@lang('frontend.cart.your_cart')</h6>
    @if(isset($cart_product_count))
        <p class="first"> @lang('frontend.cart.in_cart')<span> {{ $cart_product_count }} @lang('frontend.cart.items').</span></p>
    @endif
    @if(isset($cart_product_weight))
        <p> @lang('frontend.cart.total_weight_of_goods')<span> {{ $cart_product_weight }} @lang('frontend.cart.gr').</span></p>
    @endif
    @if(isset($cart_product_discount))
        <p> @lang('frontend.cart.discount')<span class="sale"> {{ $cart_product_discount * 100 }}%</span></p>
    @endif
    @if(isset($cart_product_discount_amount))
        <p> @lang('frontend.cart.sum_of_discount')<span class="sale"> -{{ $cart_product_discount_amount }} @lang('frontend.cart.sum')</span>
        </p>
    @endif

    <div class="go-to-checkout-page-buttons">
        <div>
            <p class="overall"> @lang('frontend.cart.all_to_pay')</p>
            @if(isset($cart_product_total))
                <p class="total-checkout">{{ $cart_product_total }} <span>@lang('frontend.cart.sum')</span></p>
            @endif
        </div>
        @if($method !== 'checkout')
            <form action="/checkout">
                <button href="/checkout" class="btn make-order">@lang('frontend.cart.checkout_order')</button>
            </form>
        @endif
    </div>
</div>
