{{--@if(session('cart'))--}}
<a href="#" id="dropdownCart" class="dropdownToggle"><i class="mbcart"><span>{{ count((array) session('cart')) }}</span></i> @lang('menu.carts')</a>
<div class="cart-items" id="cartItems">
    <ul class="selected-items" id="card_body">


    </ul>
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
    let cart = $('#dropdownCart');
    cart.click(function (e) {
        e.preventDefault();
        console.log('loging')
        let cart_product = localStorage.getItem('product_id');
        if (cart_product !== null) {
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
                    let body_cart = '';
                    console.log(data.products.length);
                    for (let i = 0; i < data.products.length; i++) {
                        body_cart += '<li class="item" ><div class="product-img"><a href="#">' +
                            '<img src=""></a></div><div class="description">' +
                            '<a href="#"><h5 class="title">' + data.products[i].name_uz + '</h5></a>' +
                            '<p class="price">' + data.products[i].price_uzs + '</p> </div> ' +
                            '<button class="btn delete-btn" onclick="removing(' + data.products[i].id + ')">' +
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
                    console.log(data.products.length);
                    for (let i = 0; i < data.products.length; i++) {
                        body_cart += '<li class="item" ><div class="product-img"><a href="#">' +
                            '<img src=""></a></div><div class="description">' +
                            '<a href="#"><h5 class="title">' + data.products[i].name_uz + '</h5></a>' +
                            '<p class="price">' + data.products[i].price_uzs + '</p> </div> ' +
                            '<button class="btn delete-btn" onclick="removing(' + data.products[i].id + ')">' +
                            '<i class="mbexit_mobile"></i></button> </li>';
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

    }


</script>

{{--@endif--}}
