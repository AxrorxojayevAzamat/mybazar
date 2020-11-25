@extends('layouts.app')

@section('title', 'Cart page')

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frondend.cart.cart')</h4>
        </div>
        <div class="outter-cart">
            <div class="ur-cart">
                <h6>@lang('frondend.cart.your_cart')</h6>
                <p class="first"> @lang('frondend.cart.in_cart')<span> 2 @lang('frondend.cart.items').</span></p>
                <p> @lang('frondend.cart.total_weight_of_goods')<span> 16 570 @lang('frondend.cart.gr').</span></p>
                <p> @lang('frondend.cart.discount')<span class="sale"> 25%</span></p>
                <p> @lang('frondend.cart.sum_of_discount')<span class="sale"> -564 500 @lang('frondend.cart.sum')</span></p>
                <div class="go-to-checkout-page-buttons">
                    <div>
                        <p class="overall"> @lang('frondend.cart.all_to_pay')</p>
                        <p class="total-checkout">10 231 749 <span>@lang('frondend.cart.sum')</span></p>
                    </div>
                    <button class="btn make-order">@lang('frondend.cart.checkout_order')</button>
                </div>
            </div>
            <div class="inner-pay-checkout-cart">
                <button class="clear-list">@lang('frondend.cart.clear_list')</button>
                <div class="all-items">
                    <div class="item">
                        <div class="product-img">
                            <img src="{{asset('images/tv6.png')}}" alt="">
                        </div>
                        <!-- description -->
                        <div class="description ">
                            <h6 class="title">@lang('frondend.cart.tv') Samsung QE55Q77RAU</h6>
                            <p class="sub-title">@lang('frondend.cart.tvs')</p>
                            <div class="current-old-price horizontal">
                                <h5 class="price">741 640 <span>@lang('frondend.cart.sum')</span></h5>
                                <!-- <h6 class="old-price">855 790 <span>сум</span></h6> -->
                            </div>
                            <div class="count-div">
                                <i class="mbdeleteone"></i>
                                <div class="number">1</div>
                                <i class="mbaddone"></i>
                            </div>
                            <div class="item-action-icons">
                                <div class="libra"data-name="Телевизор Samsung QE55Q77RAU" data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbtocompare"></i></div>
                                <div class="like"><i class="mbfavorite"></i></div>
                            </div>
                            <div class="delivery-options">
                                <div><i class="mbdelievery"></i> Доставка в течении сутки</div>
                                <div><i class="mbbox"></i>Самовывоз, с 8 апреля</div>
                            </div>
                            <p class="sub-title bottom">ООО “Malika Savdo”</p>
                        </div>
                        <!-- end description -->
                        <button class="btn delete-btn"><i class="mbexit_mobile"></i></button>
                    </div>
                    <div class="item">
                        <div class="product-img">
                            <img src="{{asset('images/tv6.png')}}" alt="">
                        </div>
                        <!-- description -->
                        <div class="description ">
                            <h6 class="title">@lang('frondend.cart.tv') Samsung QE55Q77RAU</h6>
                            <p class="sub-title">@lang('frondend.cart.tvs')</p>
                            <div class="current-old-price horizontal">
                                <h5 class="price">741 640 <span>@lang('frondend.cart.sum')</span></h5>
                                <!-- <h6 class="old-price">855 790 <span>сум</span></h6> -->
                            </div>
                            <div class="count-div">
                                <i class="mbdeleteone"></i>
                                <div class="number">1</div>
                                <i class="mbaddone"></i>
                            </div>
                            <div class="item-action-icons">
                                <div class="libra"data-name="Телевизор Samsung QE55Q77RAU" data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbtocompare"></i></div>
                                <div class="like"><i class="mbfavorite"></i></div>
                            </div>
                            <div class="delivery-options">
                                <div><i class="mbdelievery"></i> Доставка в течении сутки</div>
                                <div><i class="mbbox"></i>Самовывоз, с 8 апреля</div>
                            </div>
                            <p class="sub-title bottom">ООО “Malika Savdo”</p>
                        </div>
                        <!-- end description -->
                        <button class="btn delete-btn"><i class="mbexit_mobile"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- u might also like -->

@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection


