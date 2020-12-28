@extends('layouts.app')

@section('title', trans('frontend.title.pay_page'))
@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/pay.css')}}"> --}}
@endsection

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frontend.cart.payment_method')</h4>
        </div>
        <div class="outter-pay">
{{--            @include('cart.side-calculation', ['method' => 'checkout'])--}}
{{--            <form id="paymentFinal">--}}
{{--                <div class="check-labels">--}}
{{--                    <div class="form-check form-check-inline">--}}
{{--                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">--}}
{{--                        <label class="form-check-label" for="inlineRadio2">@lang('frontend.cart.in_cash')</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check form-check-inline">--}}
{{--                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">--}}
{{--                        <label class="form-check-label" for="inlineRadio3">@lang('frontend.cart.from_card')</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check form-check-inline">--}}
{{--                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">--}}
{{--                        <label class="form-check-label" for="inlineRadio1">@lang('frontend.cart.online_pay')</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
                {{--                <div class="pn-ProductNav_Wrapper">--}}
                {{--                    <nav id="pnProductNav" class="pn-ProductNav">--}}
                {{--                        <div id="pnProductNavContents" class=" add-carts-type pn-ProductNav_Contents">--}}
                {{--                            <a href="#" class="pn-ProductNav_Link chairs" aria-selected="true">Chairs</a>--}}
                {{--                            <a href="#" class="pn-ProductNav_Link">--}}
                {{--                                <div class="item">--}}
                {{--                                    <img src="{{asset('images/uzcard.png')}}" alt="">--}}
                {{--                                </div>--}}
                {{--                            </a>--}}
                {{--                            <a href="#" class="pn-ProductNav_Link">--}}
                {{--                                <div class="item">--}}
                {{--                                    <img src="{{asset('images/humo.png')}}" alt="">--}}
                {{--                                </div>--}}
                {{--                            </a>--}}
                {{--                            <a href="#" class="pn-ProductNav_Link">--}}
                {{--                                <div class="item add-another-cart">--}}
                {{--                                    <p>@lang('frontend.cart.add_card')</p>--}}
                {{--                                </div>--}}
                {{--                            </a>--}}
                {{--                            <span id="pnIndicator" class="pn-ProductNav_Indicator"></span>--}}
                {{--                        </div>--}}
                {{--                    </nav>--}}
                {{--                    <button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button">--}}
                {{--                        <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>--}}
                {{--                    </button>--}}
                {{--                    <button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button">--}}
                {{--                        <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>--}}
                {{--                    </button>--}}
                {{--                </div>--}}
{{--                <button class="btn pay">@lang('frontend.cart.pay')</button>--}}
{{--            </form>--}}
{{--            <div class="inner-pay-checkout-cart">--}}
{{--                    <h6 class="title">@lang('frontend.cart.select_method_of_payment')</h6>--}}
{{--                <p>@lang('frontend.cart.delivery_period') 48 @lang('frontend.cart.hours') </p>--}}
{{--                <p>@lang('frontend.cart.due_to_that_we_deliver_some_goods_via_courier_services') <a href="#">@lang('frontend.cart.in_detail')</a></p>--}}
{{--            </div>--}}

            <div>@lang('frontend.cart.success_order'): {{ $order->id }}</div>
            <form action="/">
                <button class="btn">@lang('frontend.cart.back_to_products')</button>
            </form>
        </div>
        <div class="back-to-products">
            <button class="btn">@lang('frontend.cart.back_to_products')</button>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script>
        // $('#paymentFinal').submit(function (e){
        //     e.preventDefault();
        //
        //     let formData = new FormData(this);
        //     console.log(formData.getAll('inlineRadioOptions'));
        //
        // })

    </script>
@endsection


