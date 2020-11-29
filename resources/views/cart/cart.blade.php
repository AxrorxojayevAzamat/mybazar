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
                <p class="first"> @lang('frontend.cart.in_cart')<span> {{ $cart_product_count }} @lang('frontend.cart.items').</span></p>
                <p> @lang('frontend.cart.total_weight_of_goods')<span> {{ $cart_product_weight }} @lang('frontend.cart.gr').</span></p>
                <p> @lang('frontend.cart.discount')<span class="sale"> {{ $cart_product_discount * 100 }}%</span></p>
                <p> @lang('frontend.cart.sum_of_discount')<span class="sale"> -{{ $cart_product_discount_amount }} @lang('frontend.cart.sum')</span>
                </p>
                <div class="go-to-checkout-page-buttons">
                    <div>
                        <p class="overall"> @lang('frontend.cart.all_to_pay')</p>
                        <p class="total-checkout">{{ $cart_product_total }} <span>@lang('frontend.cart.sum')</span></p>
                    </div>
                    <button class="btn make-order">@lang('frontend.cart.checkout_order')</button>
                </div>
            </div>
{{--            {{ dd($cart_product_id) }}--}}
{{--            @foreach($cart_product_id as $i => $idid)--}}
{{--                <input type="hidden" value="{{ $idid[$i] }}" class="cart_all_products_id">--}}
{{--            @endforeach--}}
            <div class="inner-pay-checkout-cart">
                <button class="clear-list" onclick="clearAll(@json($cart_product_id))">@lang('frontend.cart.clear_list')</button>
                <div class="all-items">
                    @foreach($products as $i => $product)
                        @include('cart.cart-card')
                    @endforeach
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
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            //     }
            // })

            $.ajax({
                url: '/remove-cart',
                method: 'POST',
                data: product_id,
                dataType: 'json',
                success: function (data) {
                    location.reload();
                    console.log(data);
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
    </script>
@endsection


