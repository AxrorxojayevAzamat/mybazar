@extends('layouts.app')

@section('title', 'Pay page')
@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/pay.css')}}"> --}}
@endsection

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">Способ оплаты</h4>
        </div>
        <div class="outter-pay">
            <div class="ur-cart">
                <button class="btn back-to-address">Назад к адресу</button>
                <h6>Ваша корзина</h6>
                <p> В корзине:<span> 2 шт.</span></p>
                <p> Общий вес товаров:<span> 16 570 гр.</span></p>
                <p> Скидка:<span class="sale"> 25%</span></p>
                <p> Сумма скидки:<span class="sale"> -564 500 сум</span></p>
                <p class="overall"> Всего к оплате</p>
                <p class="total-checkout">10 231 749 <span>сум</span></p>
            </div>
            <div class="inner-pay-checkout-cart">
                <h6 class="title">Выберите способ оплаты</h6>
                <div class="check-labels">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Онлайн оплата</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Наличными</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">С картой</label>
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
                                    <p>Добавить карту</p>
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
                <button class="btn pay">Оплатить</button>
                <p>Срок доставки: 48 часов </p>
                <p>Связи с тем, некоторые товары мы доставляем через курьерскими службами. <a href="#">Подробно</a></p>
            </div>
        </div>
        <div class="back-to-products">
            <button class="btn">Назад к товарам</button>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection


