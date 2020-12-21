<section>
    <div class="carousel-products">
        <div class="h4-title">
            <h4 class="title">{{$title}}</h4>
        </div>
        <div class="outter-products">
            <div class="products owl-carousel owl-theme">
                @foreach ($products as $product)
                    @include('layouts.product-item')
                @endforeach
            </div>
        </div>
    </div>
</section>
<script>
    function addToFavorite(id) {
        let product_id = {};
        product_id.id = id;
        $.ajax({
            url: 'add-to-favorite/' + id,
            method: 'GET',
            success: function (data) {
                console.log(data);
            }, error: function (data) {
                console.log(data);
            }
        })
    }

    function addToCompare(id) {
        if (localStorage.getItem('compare_product')) {
            let compare_products = '';
            let exist = false;
            let product_id = localStorage.getItem('compare_product')
            let cart_product_check = product_id.split(',');
            for (let i = 0; i <= cart_product_check.length; i++) {
                if (cart_product_check[i] == id) {
                    console.log('exists')
                    exist = true;
                }
            }
            if (!exist) {
                if (cart_product_check.length < 1){
                    compare_products += product_id;
                    compare_products += id + ',';
                    localStorage.setItem('compare_product', compare_products + '');
                    let containerCounter = $('.counter');
                    containerCounter.text(cart_product_check.length);
                }
                if (cart_product_check.length <= 3 && cart_product_check.length >= 1) {
                    $.ajax({
                        url: '/check-compare/' + id+'/' + cart_product_check[0] ,
                        method: 'GET',
                        success: function (data) {
                            if (data === "success"){
                                compare_products += product_id;
                                compare_products += id + ',';
                                localStorage.setItem('compare_product', compare_products + '');
                                let containerCounter = $('.counter');
                                containerCounter.text(cart_product_check.length);
                            }else{
                                alert('{{ trans('frontend.compare_not_fit') }}')
                            }
                        }, error: function (data) {
                            // console.log(data);
                        }
                    });
                } else {
                    alert('{{ trans('frontend.compare_full') }}')
                }

            }
        } else {
            localStorage.setItem('compare_product', id + ',');
        }
    }

    function addCart(id) {
        let product_id = {};
        product_id.data = [];
        product_id.product_id = id;

        $.ajax({
            url: '/add-cart',
            method: 'POST',
            data: product_id,
            dataType: 'json',
            success: function (data) {

                if (data.message == 'success') {
                    localStorage.removeItem('product_id');
                    let containerCounter = $('.counter');
                    console.log(counterCartNumber)
                    counterCartNumber += 1;
                    containerCounter.text(counterCartNumber);
                } else if(data.message == 'exists'){
                    removeCartList(id);
                } else {
                    nonRegisteredUsersCart(id);
                    console.log($.ajaxSettings.headers);
                    console.log('isnotexists');
                }
            }, error: function (data) {

            }
        })

    }

    function nonRegisteredUsersCart(id) {
        if (localStorage.getItem('product_id')) {
            let cart_products = '';
            let exist = false;
            let product_id = localStorage.getItem('product_id')
            let cart_product_check = product_id.split(',');
            for (let i = 0; i <= cart_product_check.length; i++) {
                console.log('hello')
                if (cart_product_check[i] == id) {
                    console.log('exists')
                    exist = true;
                } else {
                    console.log('loging')
                }
            }
            if (!exist) {
                cart_products += product_id;
                cart_products += id + ',';
                localStorage.setItem('product_id', cart_products + '');
                let containerCounter = $('.counter');
                containerCounter.text(cart_product_check.length);
            } else {
                removeCartList(id);
                console.log('exist');
            }
        } else {
            localStorage.setItem('product_id', id + ',');
        }
    }

    function removeCartList(id){
        console.log('working')
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
                    let ids = 'cartActive' + id;
                    console.log($('#' + ids));
                    $('#' + ids).removeClass('selected_cart');
                }else{
                    let product_id_local = localStorage.getItem('product_id');
                    product_id_local = product_id_local.replace(id + ',', '');
                    localStorage.removeItem('product_id');
                    localStorage.setItem('product_id',product_id_local);
                    let productID_carts = product_id_local;

                    if (productID_carts !== null){
                        productID_carts = productID_carts.slice(0, -1);
                    }else {
                        console.log('error');
                    }
                    window.location.href = window.location.origin + '/cart-list?product_id=' + productID_carts;
                    $('#' + id).hide();


                }

            }, error: function (data) {
                console.log(data);
            }
        })
    }
</script>

@include('pages.rating-js', ['products' => $products, 'type' => $rate_for['js']])

