@extends('layouts.app')

@section('title', 'Cart page')

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">Корзина</h4>
        </div>
        <div class="outter-cart">
            <div class="ur-cart">
                <h6>Ваша корзина</h6>
                <p class="first"> В корзине:<span> 2 шт.</span></p>
                <p> Общий вес товаров:<span> 16 570 гр.</span></p>
                <p> Скидка:<span class="sale"> 25%</span></p>
                <p> Сумма скидки:<span class="sale"> -564 500 сум</span></p>
                <div class="go-to-checkout-page-buttons">
                    <div>
                        <p class="overall"> Всего к оплате</p>
                        <p class="total-checkout">10 231 749 <span>сум</span></p>
                    </div>
                    <button class="btn make-order">Оформить заказ </button>
                </div>
            </div>
            <div class="inner-pay-checkout-cart">
                <button class="clear-list">Очистить список</button>
                <div class="all-items">
                    <div class="item">
                        <div class="product-img">
                            <img src="{{asset('images/tv6.png')}}" alt="">
                        </div>
                        <!-- description -->
                        <div class="description ">
                            <h6 class="title">Телевизор Samsung QE55Q77RAU</h6>
                            <p class="sub-title">Телевизоры</p>
                            <div class="current-old-price horizontal">
                                <h5 class="price">741 640 <span>сум</span></h5>
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
                            <h6 class="title">Телевизор Samsung QE55Q77RAU</h6>
                            <p class="sub-title">Телевизоры</p>
                            <div class="current-old-price horizontal">
                                <h5 class="price">741 640 <span>сум</span></h5>
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
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection


