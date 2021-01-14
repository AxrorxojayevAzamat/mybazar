{{--@if(session('cart'))--}}


<a href="#" id="dropdownCart" class="dropdownToggle"><i class="mbcart"><span id="counterCartRed" class="{{isset($gCartCount) ? count($gCartCount) > 0 ? 'counter' : '' : ''}}">{{ isset($gCartCount) ? count($gCartCount) : '' }}</span></i> @lang('menu.carts')</a>
<div class="cart-items" id="cartItems">
    <ul class="selected-items" id="card_body">


    </ul>
    <div id="cart_none" class="cart-none-text">{{ trans('frontend.cart_none') }}</div>
    <div class="bottom-btn">
        <form action="/cart-list" method="GET" id="goToCart" class="cartHeaderGoToCart">
            <input type="hidden" id="cart_products_id" name="product_id" class="cart_products_id">
            <button class="btn bold switch-to-compare">
                @lang('frontend.go_to_cart')
            </button>
        </form>
    </div>
</div>
<input type="hidden" value="{{ isset($gCartCount) ? count($gCartCount) : '0' }}" id="counterCartItems">

<script>


    let droping = $('#droping');
    let cart = $('#dropdownCart');
    droping.hide();
    let searchInput = $('#search-input');

    cart.click(function (e) {
        e.preventDefault();
        let cart_product = localStorage.getItem('product_id');
        cart_product = JSON.parse(cart_product);
        console.log(cart_product);
        if (cart_product !== null || cart_product === '') {
            let data = {};
            data.product_id = [];
            data.product_id = cart_product;

            $.ajax({
                url: '/cart-header',
                method: 'GET',
                data: data,
                dataType: 'json',
                success: function (data) {
                    $('.cartHeaderGoToCart').show();
                    $('#cart_none').hide();
                    $('#card_body').show();
                    let body_cart = '';
                    console.log(data.length);
                    let origin = window.location.origin;
                    for (let i = 0; i < data.length; i++) {
                        console.log(data[i][0].id)
                        body_cart += '<li class="item" id="header'+ data[i][0].id + '" ><div class="product-img"><a href="#">' +
                            '<img src="'+ origin + data[i][0].main_photo +'"></a></div><div class="description">' +
                            '<a href="/products/show/' + data[i][0].id + '"><h5 class="title">' + data[i][0].name + '</h5></a>' +
                            '<p class="price">' + data[i][0].price_uzs + '</p> </div> ' +
                            '<button class="btn delete-btn" onclick="removeCartListInHeader(' + data[i][0].id + ')">' +
                            '<i class="mbexit_mobile"></i></button> </li>';
                    }


                    $('#card_body').html(body_cart);
                    console.log(data);
                }, error: function (data) {
                    console.log(data);
                }
            });
        }else{
            $.ajax({
                url: '/cart-header',
                method: 'GET',
                success: function (data) {
                    let body_cart = '';
                    console.log(data.data)
                    if (data.data == 'error'){
                        console.log('wpringngjsd');

                        $('.cartHeaderGoToCart').hide();
                        $('#cart_none').show();
                        $('#card_body').hide();
                    }
                    else{
                        $('.cartHeaderGoToCart').show();
                        $('#cart_none').hide();
                        $('#card_body').show();
                        console.log(data.data.length);
                        let origin = window.location.origin;
                        for (let i = 0; i < data.data.length; i++) {
                            body_cart += '<li class="item" id="header'+ data.data[i].id + '" ><div class="product-img"><a href="#">' +
                                '<img src="' + origin + data.data[i].main_photo + '"></a></div><div class="description">' +
                                '<a href="/products/show/' + data.data[i].id + '"><h5 class="title">' + data.data[i].name + '</h5></a>' +
                                '<p class="price">' + data.data[i].price_uzs + '</p> </div> ' +
                                '<button class="btn delete-btn" onclick="removeCartListInHeader(' + data.data[i].id + ')">' +
                                '<i class="mbexit_mobile"></i></button> </li>';
                        }
                    }
                    $('#card_body').html(body_cart);
                    console.log(data);
                }, error: function (data) {
                    console.log(data);
                }
            });
        }
    });

    function removeCartListInHeader(id){
        let product_id = {};
        product_id.product_id = id;

        $.ajax({
            url: '/remove-cart',
            method: 'POST',
            data: product_id,
            dataType: 'json',
            success: function (data) {
                let counterCart = $('#counterCartRed');
                if (data.data === 'success'){
                    $('#header' + id).hide();
                    let counterCartNumber = $('#counterCartItems').val();
                    if (counterCartNumber > 0){
                        counterCartNumber = counterCartNumber - 1;
                        counterCart.text(counterCartNumber);
                        $('#counterCartItems').val(counterCartNumber);
                        if(counterCartNumber === 0){
                            $('.cartHeaderGoToCart').hide();
                            $('#cart_none').show();
                            $('#card_body').hide();
                            $('.mbcart span').removeClass('counter')
                        }else{
                            return true;
                        }
                    }else{
                        $('.cartHeaderGoToCart').hide();
                        $('#cart_none').show();
                        $('#card_body').hide();
                        $('.mbcart span').removeClass('counter')
                    }
                }else{
                    let product_id_local = localStorage.getItem('product_id');
                    product_id_local = JSON.parse(product_id_local);
                    product_id_local = product_id_local.filter(item => item.product_id !== product_id.product_id);
                    console.log(product_id_local);
                    localStorage.removeItem('product_id');
                    console.log(product_id_local.length);
                    counterCart.text(product_id_local.length);

                    localStorage.setItem('product_id', JSON.stringify(product_id_local));
                    if (localStorage.getItem('product_id') === '[]'){
                        localStorage.clear();
                        $('.cartHeaderGoToCart').hide();
                        $('#cart_none').show();
                        $('#card_body').hide();
                        $('.mbcart span').removeClass('counter')
                        counterCart.html('')
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
