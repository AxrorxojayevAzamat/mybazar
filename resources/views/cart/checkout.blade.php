@extends('layouts.app')

@section('title', trans('frontend.title.checkout_page'))
@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/pay.css')}}"> --}}
@endsection

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frontend.cart.checkout_order')</h4>
        </div>
        <div class="outter-checkout">
            @include('cart.side-calculation', ['method' => 'checkout'])

            <div class="inner-pay-checkout-cart">
                <h6 class="title">@lang('frontend.cart.present_datas_for_get_order')</h6>

                <form>

                    <div class="form-group">
                        <div>
                            <label for="country">@lang('frontend.cart.country')</label>
                            <select id="country"  class="form-control">
                                <option value="" disabled selected>@lang('frontend.cart.select')</option>
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
                            <label for="city">@lang('frontend.cart.city')</label>
                            <select id="city" class="form-control">
                                <option value="" disabled selected>@lang('frontend.cart.select')</option>
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

                    <div class="form-group">
                        <div>
                            <label for="district">@lang('frontend.cart.district')</label>
                            <select id="district" class="form-control">
                                <option value="" disabled selected>@lang('frontend.cart.select')</option>
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
                            <label for="">@lang('frontend.cart.locality')</label>
                            <select id="city" class="form-control">
                                <option value="" disabled selected>@lang('frontend.cart.select')</option>
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
                            <label for="street">@lang('frontend.cart.street')</label>
                            <div class="input">
                                <input type="text" id="street" class="form-control bordered-input"  required placeholder="" >
                            </div>
                        </div>
                        <div class="house-number">
                            <div class="outter">
                                <label for="house">@lang('frontend.cart.house')</label>
                                <div class="input">
                                    <input type="text" id="house"class="form-control bordered-input" required placeholder="" >
                                </div>
                            </div>
                            <div class="outter">
                                <label for="flat">@lang('frontend.cart.apartment')</label>
                                <div class="input">
                                    <input type="text" id="flat" class="form-control bordered-input" required placeholder="" >
                                </div>
                            </div>
                        </div>

                    </div>

                    <h6 class="sub-title">@lang('frontend.cart.contacts')</h6>

                    <div class="form-group">
                        <div>
                                <label for="fname">@lang('frontend.cart.name')</label>
                            <div class="input">
                                <input type="text" id="name"  class="form-control bordered-input" required placeholder="" >
                            </div>
                        </div>
                        <div>
                            <label for="phone-number">@lang('frontend.cart.number_of_phone')</label>
                            <div class="input">
                                <input type="text" id="phone-number"  class="form-control bordered-input" required placeholder="" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group wishes">
                        <div>
                            <label for="wishes">@lang('frontend.cart.wishlist_optional')</label>
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
            <button class="btn">@lang('frontend.cart.back_to_products')</button>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection


