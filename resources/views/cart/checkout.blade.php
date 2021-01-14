@extends('layouts.app')

@section('title', trans('frontend.title.checkout_page'))

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frontend.cart.checkout_order')</h4>
        </div>
        <div class="outter-checkout">
            @include('cart.side-calculation', ['method' => 'checkout'])

            <div class="inner-pay-checkout-cart">
                <h6 class="title">@lang('frontend.cart.present_datas_for_get_order')</h6>

                <form method="POST" action="{{ route('pay') }}">
                    @csrf
                    <div class="form-group">
                        <div>
                            <label for="country">@lang('frontend.cart.country')</label>
                            <select name="country" id="country" class="form-control">
                                <option value="" disabled selected>@lang('frontend.cart.select')</option>
                                <option value="uzb">@lang('frontend.uzb')</option>
                            </select>
                            <span class="isselected"></span>
                        </div>
                        <div>
                            <label for="city">@lang('frontend.cart.region')</label>
                            <select id="city" name="city" class="form-select form-control">
                                <option value="" disabled selected>@lang('frontend.cart.select')</option>
                                <option value="@lang('region.andijan')">@lang('region.andijan')</option>
                                <option value="@lang('region.bukhara')">@lang('region.bukhara')</option>
                                <option value="@lang('region.jizzakh')">@lang('region.jizzakh')</option>
                                <option value="@lang('region.kashkadaryo')">@lang('region.kashkadaryo')</option>
                                <option value="@lang('region.khorazim')">@lang('region.khorazim')</option>
                                <option value="@lang('region.korakalpakistan')">@lang('region.korakalpakistan')</option>
                                <option value="@lang('region.namangan')">@lang('region.namangan')</option>
                                <option value="@lang('region.navai')">@lang('region.navai')</option>
                                <option value="@lang('region.samarkhand')">@lang('region.samarkhand')</option>
                                <option value="@lang('region.sirdaryo')">@lang('region.sirdaryo')</option>
                                <option value="@lang('region.surkhandaryo')">@lang('region.surkhandaryo')</option>
                                <option value="@lang('region.tashkent')">@lang('region.tashkent')</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group three-inputs">
                        <div class="street">
                            <label for="street">@lang('frontend.cart.street')</label>
                            <div class="input">
                                <input type="text" name="address" id="street" class="form-control bordered-input" required placeholder="">
                            </div>
                        </div>
                        <div class="house-number">
                            <div class="outter">
                                <label for="house">@lang('frontend.cart.house')</label>
                                <div class="input">
                                    <input type="text" name="house" id="house" class="form-control bordered-input" required placeholder="">
                                </div>
                            </div>
                            <div class="outter">
                                <label for="flat">@lang('frontend.cart.apartment')</label>
                                <div class="input">
                                    <input type="text" name="flat" id="flat" class="form-control bordered-input" required placeholder="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div>
                            <label for="delivery">@lang('frontend.delivery.delivery')</label>
                            <select id="city" name="delivery" class="form-control">
                                <option value="" disabled selected>@lang('frontend.cart.select')</option>
                                @foreach($delivery as $i => $deliveryMethod)
                                    <option value="{{ $deliveryMethod->id }}, {{ $deliveryMethod->name }}">{{ $deliveryMethod->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="fname">@lang('frontend.cart.index')</label>
                            <div class="input">
                                <input type="text" name="index" id="name" class="form-control bordered-input" required placeholder="">
                            </div>
                        </div>
                    </div>

                    <h6 class="sub-title">@lang('frontend.cart.contacts')</h6>

                    <div class="form-group">
                        <div>
                            <label for="fname">@lang('frontend.cart.name')</label>
                            <div class="input">
                                <input type="text" name="userName" id="name" class="form-control bordered-input" required placeholder="">
                            </div>
                        </div>
                        <div>
                            <label for="phone-number">@lang('frontend.cart.number_of_phone')</label>
                            <div class="input">
                                <input type="text" name="phone" id="phone-number" class="form-control bordered-input" required placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group wishes">
                        <div>
                            <label for="wishes">@lang('frontend.cart.wishlist_optional')</label>
                            <div class="input">
                                <input type="text" name="wishes" id="wishes" class="form-control bordered-input" required placeholder="">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="total_cost" value="{{$cart_product_total}}">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">@lang('frontend.cart.in_cash')</label>
                    </div>

                    <input type="submit" id="submit" value="{{trans('frontend.to_order')}}">
                </form>
            </div>
        </div>
        <div class="back-to-products">
            <button class="btn">@lang('frontend.cart.back_to_products')</button>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@endsection


