@extends('layouts.app')

@section('title', trans('frontend.title.cart_page'))

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frontend.cart.cart')</h4>
        </div>
        <div class="outter-cart">
            <div class="ur-cart">
                <h6>@lang('frontend.cart.your_cart')</h6>
                @if(isset($cart_product_count))
                    <p class="first"> @lang('frontend.cart.in_cart')<span> {{ $cart_product_count }} @lang('frontend.cart.items').</span></p>
                @endif
                @if(isset($cart_product_weight))
                    <p> @lang('frontend.cart.total_weight_of_goods')<span> {{ $cart_product_weight }} @lang('frontend.cart.gr').</span></p>
                @endif
                @if(isset($cart_product_discount))
                    <p> @lang('frontend.cart.discount')<span class="sale"> {{ $cart_product_discount * 100 }}%</span></p>
                @endif
                @if(isset($cart_product_discount_amount))
                    <p> @lang('frontend.cart.sum_of_discount')<span class="sale"> -{{ $cart_product_discount_amount }} @lang('frontend.cart.sum')</span>
                    </p>
                @endif
                <div class="go-to-checkout-page-buttons">
                    <div>
                        <p class="overall"> @lang('frontend.cart.all_to_pay')</p>
                        @if(isset($cart_product_total))
                            <p class="total-checkout">{{ $cart_product_total }} <span>@lang('frontend.cart.sum')</span></p>
                        @endif
                    </div>
                    <button class="btn make-order">@lang('frontend.cart.checkout_order')</button>
                </div>
            </div>
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
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script>
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
                        location.reload();
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
            // let counter = 1
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


