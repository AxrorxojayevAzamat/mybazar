{{--@if(session('cart'))--}}
<a href="#" id="dropdownCart" class="dropdownToggle"><i class="mbcart"><span>{{ count((array) session('cart')) }}</span></i> @lang('menu.carts')</a>
<div class="cart-items" id="cartItems">
    <ul class="selected-items" id="card_body">


    </ul>
    <div class="bottom-btn">
        <a class="btn bold switch-to-compare" href="{{ route('cart') }}">
            @lang('frontend.go_to_cart')
        </a>
    </div>
</div>
{{--@endif--}}
