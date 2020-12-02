{{--@if(session('cart'))--}}


<a href="#" id="dropdownCart" class="dropdownToggle"><i class="mbcart"><span class="{{isset($gCartCount) ? count($gCartCount) > 0 ? 'counter' : '' : ''}}">{{ isset($gCartCount) ? count($gCartCount) : '' }}</span></i> @lang('menu.carts')</a>
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

    let counterCartNumber = {!! isset($gCartCount) ? count($gCartCount) : '' !!}

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
                let counterCart = $('.counter');
                if (data.data == 'success'){
                    $('#header' + id).hide();
                    if (counterCartNumber > 0){
                        counterCartNumber = counterCartNumber - 1;
                        counterCart.text(counterCartNumber);
                        if(counterCartNumber === 0){
                            $('#goToCart').hide();
                            $('#cart_none').show();
                            $('#card_body').hide();
                            $('.mbcart span').removeClass('counter')
                        }else{
                            return true;
                        }
                    }else{
                        $('#goToCart').hide();
                        $('#cart_none').show();
                        $('#card_body').hide();
                        $('.mbcart span').removeClass('counter')
                    }
                }else{
                    let product_id_local = localStorage.getItem('product_id');
                    product_id_local = product_id_local.replace(id + ',', '');
                    let counter = product_id_local.split(',');
                    for (let i = 0; i <= counter.length; i++) {
                        if (counter[i] == '') {
                            counter.splice(i, 1);
                        } else {
                            continue;
                        }
                    }
                    counter = counter.length;
                    localStorage.removeItem('product_id');
                    localStorage.setItem('product_id',product_id_local);

                    counterCart.html('')
                    counterCart.html(counter);
                    if (localStorage.getItem('product_id') == ''){
                        localStorage.clear();
                        $('#goToCart').hide();
                        $('#cart_none').show();
                        $('#card_body').hide();
                        $('.mbcart span').removeClass('counter')
                    }
                    $('#header' + id).hide();
                }

            }, error: function (data) {
                console.log(data);
            }
        })
    }


</script>

{{--@endif--}}
