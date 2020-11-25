@extends('layouts.app')

@section('title', 'Pay page')
@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/pay.css')}}"> --}}
@endsection

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frondend.cart.payment_method')</h4>
        </div>
        <div class="outter-pay">
            <div class="ur-cart">
                <button class="btn back-to-address">@lang('frondend.cart.back_to_cart')</button>
                <h6>@lang('frondend.cart.your_cart')</h6>
                <p> @lang('frondend.cart.in_cart')<span> 2 @lang('frondend.cart.item').</span></p>
                <p> @lang('frondend.cart.total_weight_of_goods')<span> 16 570 @lang('frondend.cart.gr').</span></p>
                <p> @lang('frondend.cart.discount')<span class="sale"> 25%</span></p>
                <p> @lang('frondend.cart.sum_of_discount')<span class="sale"> -564 500 @lang('frondend.cart.sum')</span></p>
                <p class="overall"> @lang('frondend.cart.all_to_pay')</p>
                <p class="total-checkout">10 231 749 <span>@lang('frondend.cart.sum')</span></p>
            </div>
                <div class="inner-pay-checkout-cart">
                <h6 class="title">@lang('frondend.cart.select_method_of_payment')</h6>
                <div class="check-labels">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">@lang('frondend.cart.online_pay')</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">@lang('frondend.cart.in_cash')</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">@lang('frondend.cart.from_card')</label>
                    </div>
                </div>
                <div class="pn-ProductNav_Wrapper">
                    <nav id="pnProductNav" class="pn-ProductNav">
                        <div id="pnProductNavContents" class=" add-carts-type pn-ProductNav_Contents">
                            <a href="#" class="pn-ProductNav_Link chairs" aria-selected="true">Chairs</a>
                            <a href="#" class="pn-ProductNav_Link">
                                <div class="item">
                                    <img src="{{asset('images/uzcard.png')}}" alt="">
                                </div>
                            </a>
                            <a href="#" class="pn-ProductNav_Link">
                                <div class="item">
                                    <img src="{{asset('images/humo.png')}}" alt="">
                                </div>
                            </a>
                            <a href="#" class="pn-ProductNav_Link">
                                <div class="item add-another-cart">
                                    <p>@lang('frondend.cart.add_card')</p>
                                </div>
                            </a>
                            <span id="pnIndicator" class="pn-ProductNav_Indicator"></span>
                        </div>
                    </nav>
                    <button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button">
                        <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>
                    </button>
                    <button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button">
                        <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>
                    </button>
                </div>
                <button class="btn pay">@lang('frondend.cart.pay')</button>
                <p>@lang('frondend.cart.delivery_period') 48 @lang('frondend.cart.hours') </p>
                <p>@lang('frondend.cart.due_to_that_we_deliver_some_goods_via_courier_services') <a href="#">@lang('frondend.cart.in_detail')</a></p>
            </div>
        </div>
        <div class="back-to-products">
            <button class="btn">@lang('frondend.cart.back_to_products')</button>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection


