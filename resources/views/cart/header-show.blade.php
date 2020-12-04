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

    let counterCartNumber = {!! isset($gCartCount) ? count($gCartCount) : '0' !!}
    let droping = $('#droping');
    let cart = $('#dropdownCart');
    droping.hide();
    let searchInput = $('#search-input');

    cart.click(function (e) {
        console.log('loging')
        e.preventDefault();
        let cart_product = localStorage.getItem('product_id');
        if (cart_product !== null || cart_product == '') {
            console.log(cart_product);
            let cart_product_check = cart_product.split(',');
            for (let i = 0; i <= cart_product_check.length; i++) {
                if (cart_product_check[i] == '') {
                    cart_product_check.splice(i, 1);
                } else {
                    continue;
                }
            }
            let data = {};
            data.product_id = [];
            data.product_id = cart_product_check;

            $.ajax({
                url: '/cart-header',
                method: 'GET',
                data: data,
                dataType: 'json',
                success: function (data) {
                    $('#goToCart').show();
                    $('#cart_none').hide();
                    $('#card_body').show();
                    let body_cart = '';
                    console.log(data.data.length);
                    let origin = window.location.origin;
                    for (let i = 0; i < data.data.length; i++) {
                        body_cart += '<li class="item" id="header'+ data.data[i].id + '" ><div class="product-img"><a href="#">' +
                            '<img src="'+ origin + data.data[i].main_photo +'"></a></div><div class="description">' +
                            '<a href="/products/show/' + data.data[i].id + '"><h5 class="title">' + data.data[i].name + '</h5></a>' +
                            '<p class="price">' + data.data[i].price_uzs + '</p> </div> ' +
                            '<button class="btn delete-btn" onclick="removing(' + data.data[i].id + ')">' +
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

                        $('#goToCart').hide();
                        $('#cart_none').show();
                        $('#card_body').hide();
                    }
                    else{
                        $('#goToCart').show();
                        $('#cart_none').hide();
                        $('#card_body').show();
                        console.log(data.data.length);
                        let origin = window.location.origin;
                        for (let i = 0; i < data.data.length; i++) {
                            body_cart += '<li class="item" id="header'+ data.data[i].id + '" ><div class="product-img"><a href="#">' +
                                '<img src="' + origin + data.data[i].main_photo + '"></a></div><div class="description">' +
                                '<a href="/products/show/' + data.data[i].id + '"><h5 class="title">' + data.data[i].name + '</h5></a>' +
                                '<p class="price">' + data.data[i].price_uzs + '</p> </div> ' +
                                '<button class="btn delete-btn" onclick="removing(' + data.data[i].id + ')">' +
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
