@if($product)
    @foreach($product as $item)
        @include('pages.rating-js', ['products' => $product, 'type' => $rate_for['js']])
        <div class="item">
            <div class="product-img">
                <a href="{{ route('products.show',['product' => $item->id]) }}"><img src="{{ $item->main_photo_id }}" alt=""></a>
            </div>
            <!-- description -->
            <div class="description ">
                <h6 class="title"><a
                        href="{{ route('products.show',['product' => $item->id]) }}">{!! $item->name !!}</a></h6>
                <p class="sub-title">{!! $item->maincategory->name !!}</p>
                <div class="rate">
                    <div id="rateYo_{{$rate_for['html']}}{{ $loop->index }}"></div>
                    <div class="comment">
                        <i class="mbcomment"></i>
                        <span>{{ $item->number_of_reviews }}</span>
                    </div>
                </div>
                <div class="list-full-des">
                    {!! $item->description !!}
                </div>
                <div class="current-old-price horizontal">
                    <h5 class="price">{{ $item->price_uzs }} <span>сум</span></h5>
                    <h6 class="old-price">855 790 <span>сум</span></h6>
                </div>
                <div class="item-action-icons">
                    <div class="cart" data-name="Телевизор Samsung QE55Q77RAU"
                         data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbcart"></i>В
                        корзину
                    </div>
                    <div class="libra" data-name="Телевизор Samsung QE55Q77RAU"
                         data-url="{{asset('images/tv6.png')}}" data-price="741640"><i
                            class="mbtocompare"></i></div>
                    <div class="like"><i class="mbfavorite"></i></div>
                </div>
                <div class="delivery-options">
                    <div><i class="mbdelievery"></i> Доставка в течении сутки</div>
                    <div><i class="mbbox"></i>Самовывоз, с 8 апреля</div>
                </div>
                <p class="sub-title bottom">{!! $item->store->name !!}</p>
            </div>
            <!-- end description -->
        </div>
        {{--        <div class="description">--}}
        {{--            <h6 class="title">Xiaomi Mi 9T 6/64Gb черный</h6>--}}
        {{--            <p>Грациозная и завораживающая задняя панель Xiaomi Mi 9T оживает и начинает переливаться, когда--}}
        {{--                на нее попадает свет. Благодаря плавным--}}
        {{--                контурам телефон удобно лежит в руке и выглядит просто восхитительно. 6.39" AMOLED дисплей--}}
        {{--                поражает своей яркостью при каждой разблокировке устройства. </p>--}}
        {{--        </div>--}}
    @endforeach
@endif
