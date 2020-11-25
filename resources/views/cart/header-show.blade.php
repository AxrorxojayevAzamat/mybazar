{{--@if(session('cart'))--}}
<a href="#" id="dropdownCart" class="dropdownToggle"><i class="mbcart"><span>{{ count((array) session('cart')) }}</span></i> @lang('menu.carts')</a>
<div class="cart-items" id="cartItems">
    <ul class="selected-items" id="card_body">


    </ul>
    <div class="bottom-btn">
        <button class="btn bold switch-to-compare">
            @lang('frontend.compare_products')
        </button>
    </div>
</div>
{{--@endif--}}
