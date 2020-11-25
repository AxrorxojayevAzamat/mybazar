@extends('layouts.app')

@section('title', 'Checkout page')
@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/pay.css')}}"> --}}
@endsection

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frondend.cart.checkout_order')</h4>
        </div>
        <div class="outter-checkout">
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
                <h6 class="title">@lang('frondend.cart.present_datas_for_get_order')</h6>

                <form>

                    <div class="form-group">
                        <div>
                            <label for="country">@lang('frondend.cart.country')</label>
                            <select id="country"  class="form-control">
                                <option value="" disabled selected>@lang('frondend.cart.select')</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                            </select>
                            <span class="isselected"></span>
                        </div>
                        <div>
                            <label for="city">@lang('frondend.cart.city')</label>
                            <select id="city" class="form-control">
                                <option value="" disabled selected>@lang('frondend.cart.select')</option>
                                <option value="">Ташкент</option>
                                <<option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="district">@lang('frondend.cart.district')</label>
                            <select id="district" class="form-control">
                                <option value="" disabled selected>@lang('frondend.cart.select')</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                                <option value="">Узбекистан</option>
                            </select>
                        </div>
                        <div>
                            <label for="">@lang('frondend.cart.locality')</label>
                            <select id="city" class="form-control">
                                <option value="" disabled selected>@lang('frondend.cart.select')</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                                <option value="">Ташкент</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group three-inputs">
                        <div class="street">
                            <label for="street">@lang('frondend.cart.street')</label>
                            <div class="input">
                                <input type="text" id="street" class="form-control bordered-input"  required placeholder="" >
                            </div>
                        </div>
                        <div class="house-number">
                            <div class="outter">
                                <label for="house">@lang('frondend.cart.house')</label>
                                <div class="input">
                                    <input type="text" id="house"class="form-control bordered-input" required placeholder="" >
                                </div>
                            </div>
                            <div class="outter">
                                <label for="flat">@lang('frondend.cart.apartment')</label>
                                <div class="input">
                                    <input type="text" id="flat" class="form-control bordered-input" required placeholder="" >
                                </div>
                            </div>
                        </div>

                    </div>

                    <h6 class="sub-title">@lang('frondend.cart.contacts')</h6>

                    <div class="form-group">
                        <div>
                                <label for="fname">@lang('frondend.cart.name')</label>
                            <div class="input">
                                <input type="text" id="name"  class="form-control bordered-input" required placeholder="" >
                            </div>
                        </div>
                        <div>
                            <label for="phone-number">@lang('frondend.cart.number_of_phone')</label>
                            <div class="input">
                                <input type="text" id="phone-number"  class="form-control bordered-input" required placeholder="" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group wishes">
                        <div>
                            <label for="wishes">@lang('frondend.cart.wishlist_optional')</label>
                            <div class="input">
                                <input type="text" id="wishes"  class="form-control bordered-input" required placeholder="" >
                            </div>
                        </div>
                    </div>


                    <input type="submit" id="submit" value="Заказать">
                </form>
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


