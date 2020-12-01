{{--@if(session('cart'))--}}
<a href="#" id="dropdownCart" class="dropdownToggle"><i class="mbcart"><span>{{ count((array) session('cart')) }}</span></i> @lang('menu.carts')</a>
<div class="cart-items" id="cartItems">
    <ul class="selected-items" id="card_body">


    </ul>
    <div id="cart_none" class="cart-none-text">{{ trans('frontend.cart_none') }}</div>
    <div class="bottom-btn">
        <form action="/cart-list" method="GET" id="goToCart">
            <input type="hidden" id="cart_products_id" name="product_id">
            <button class="btn bold switch-to-compare">
                @lang('frontend.go_to_cart')
            </button>
        </form>
    </div>
</div>

<script>

    function removing(id){
        let product_id = {};
        product_id.data = [];
        product_id.product_id = id;

        $.ajax({
            url: '/remove-cart',
            method: 'POST',
            data: product_id,
            dataType: 'json',
            success: function (data) {
                if (data.data == 'success'){
                    $('#header' + id).hide();
                }else{
                    let product_id_local = localStorage.getItem('product_id');
                    product_id_local = product_id_local.replace(id + ',', '');
                    localStorage.removeItem('product_id');
                    localStorage.setItem('product_id',product_id_local);
                    $('#header' + id).hide();
                }

            }, error: function (data) {
                console.log(data);
            }
        })
    }


</script>

{{--@endif--}}
