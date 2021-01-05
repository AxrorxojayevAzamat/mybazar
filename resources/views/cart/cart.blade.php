@extends('layouts.app')

@section('title', trans('frontend.title.cart_page'))

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frontend.cart.cart')</h4>
        </div>
        <div class="outter-cart">
            @include('cart.side-calculation', ['method' => 'cart'])
{{--            {{ dd($cart_product_id) }}--}}
{{--            @foreach($cart_product_id as $i => $idid)--}}
{{--                <input type="hidden" value="{{ $idid[$i] }}" class="cart_all_products_id">--}}
{{--            @endforeach--}}
            <div class="inner-pay-checkout-cart">
                @if(isset($cart_product_id))
                    <button class="clear-list" onclick="clearAll(@json($cart_product_id))">@lang('frontend.cart.clear_list')</button>
                @endif
                <div class="all-items">
                    @if(isset($products))
                        @foreach($products as $i => $product)
                            @include('cart.cart-card')
                        @endforeach
                    @else
                        <h3>Please create account fist</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- u might also like -->

@endsection


@section('script')
    <script>
        function removeCartListInCart(cartProduct) {
            let product_id = {};
            product_id.product_id = cartProduct;
            $.ajax({
                url: '/remove-cart',
                method: 'POST',
                data: product_id,
                dataType: 'json',
                success: function (data) {
                    if (data.data === 'success') {
                        let ids = 'cartActive' + cartProduct.product_id;
                        console.log($('#' + ids));
                        $('#' + ids).removeClass('selected_cart');
                    } else {
                        console.log('loging')
                        let product_id_local = localStorage.getItem('product_id');
                        product_id_local = JSON.parse(product_id_local);
                        product_id_local = product_id_local.filter(item => item.product_id !== product_id.product_id);
                        console.log(product_id_local);
                        localStorage.removeItem('product_id');
                        localStorage.setItem('product_id', JSON.stringify(product_id_local));
                        let productID_carts = '';

                        for (let i = 0; i < product_id_local.length; i++) {
                            productID_carts += product_id_local[i].product_id;
                        }

                        if (window.location.href.includes('/cart-list')) {
                            product_id_local = JSON.stringify(product_id_local);
                            window.location.href = window.location.origin + '/cart-list?product_id=' + product_id_local;
                            $('#' + cartProduct.product_id).hide();
                        }
                    }

                }, error: function (data) {
                    console.log(data);
                }
            })
        }

        function clearAll(id){
            let data = {};
            data.product_id = [];
            data.product_id = id;
            $.ajax({
                url: '/remove-cart',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(data){
                    location.reload();

                },error: function (data){
                    console.log(data.message);
                }
            })
        }


        function quantityCounter(id, type){
            if (type == 'add'){
                let countNumber = $('#'+id + '-cartCounter').text()
                let counterNumber = parseInt(countNumber);
                counterNumber+=1;
                $('#'+id + '-cartCounter').text(counterNumber)
            }else{
                let countNumber = $('#'+id + '-cartCounter').text()
                let counterNumber = parseInt(countNumber);
                if (counterNumber > 1){
                    counterNumber-=1;
                    $('#'+id + '-cartCounter').text(counterNumber)
                }else{
                    return false;
                }
                console.log(countNumber);
            }
        }
    </script>
@endsection


