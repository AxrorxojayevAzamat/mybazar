{{--@if(session('cart'))--}}
<a href="#" class="btn dropdown-toggle cart" role="button" id="dropdownCart" data-toggle="dropdown"
   aria-haspopup="true" aria-expanded="false">
    <i class="mbcart"><span
            class="counter">{{ count((array) session('cart')) }}</span></i> @lang('menu.carts')
</a>
<div class="dropdown-menu" aria-labelledby="dropdownCart">
    <div class="selected-items" id="card_body">


    </div>
    <div class="bottom-btn">
        <button class="btn bold switch-to-cart">
            @lang('frontend.go_to_cart')
        </button>
    </div>
</div>
{{--@endif--}}
