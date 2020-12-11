<section>
    <div class="outter-single-product-with-des">
        <h4 class="title">{{ $product->name }}</h4>
        <div class="inner-single-product-with-des">
            <div class="images">
                @if ($product->mainPhoto)
                    <div class="big-image">
                        <img src="{{ $product->mainPhoto->fileThumbnail }}" style="width:100%">
                    </div>
                @endif


                <div class="several-images owl-theme owl-carousel">
                    @php($currentSlide = 1)
                    @if ($product->mainPhoto)
                        <img class="demo cursor" src="{{ $product->mainPhoto->fileThumbnail }}" style="width:100%"
                             onclick="currentSlide({{ $currentSlide }})">
                        @php($currentSlide++)
                    @endif
                    @foreach($product->photos as $photo)
                        <img class="demo cursor" src="{{ $photo->fileOriginal }}" style="width:100%"
                             onclick="currentSlide({{ $currentSlide }})">
                        @php($currentSlide++)
                    @endforeach
                </div>
            </div>
            <div class="description">
                <div class="text-description">
                    <div class="rate">
                        <div id="rateYo_one0"></div>
                        <div class="comment">
                            <i class="mbcomment"></i>
                            <span>{{ $product->number_of_reviews }} @lang('frontend.reviews')</span>
                        </div>
                    </div>

                    {{--                    <p>ID товара: <span> 1666559495</span></p>--}}
                    <p class="title">@lang('frontend.product.characteristics')</p>
                    @foreach($product->allCharacteristics as $characteristics)
                        @if($characteristics->characteristic->main)
                            <p>{!! $characteristics->characteristic->name !!}:
                                <span>
                                    @foreach($product->modificationsForProduct($characteristics->characteristic_id) as $modifications) {{ $modifications->value }} @endforeach
                                </span>
                            </p>
                        @endif
                    @endforeach
                    <a href="#pills-characteristics">@lang('frontend.product.all_characteristics')</a>
                </div>
                <div class="color-delivery-des">
                    <form action="#">
                        @foreach($product->allCharacteristics as $modification)
                           @if($modification->characteristic->main == false && $modification->characteristic->type != \App\Entity\Shop\Characteristic::TYPE_COLOR)
                                   @if(!empty($modification->modifications->value))
                                        <p>{{ $modification->characteristic->name }}:</p>
                                   @endif
                                    @foreach($product->modificationsForProduct($modification->characteristic_id) as $modifications)
                                            <span class="pr-des-radio-buttons">
                                                <div class="value-modification" id="value-modification"
                                                     data-actual-price="{{ trans('frontend.product.price', ['price' => $modifications->price_uzs]) }}"
                                                     data-final-price="{{ trans('frontend.product.price', ['price' => $modifications->currentPriceUzs]) }}">
                                                    {{ $modifications->value }}
                                                </div>
                                            </span>
                                    @endforeach
                           @endif
                        @if($modification->characteristic->main == false && $modification->characteristic->type == \App\Entity\Shop\Characteristic::TYPE_COLOR)
                            <p>@lang('frontend.color'): <span
                                    id="color-modification-name">{{ $modification->characteristic->name }}</span></p>
                            <div class="colors pr-des-radio-buttons3">
                                @foreach($product->colorModifications($modification->characteristic_id) as $modification)
                                    <div class="color color-modification" id="color-modification">
                                        <div style="background-color: {{ $modification->value }}"
                                             data-name="{{ $modification->name }}"
                                             data-actual-price="{{ trans('frontend.product.price', ['price' => $modification->price_uzs]) }}"
                                             data-final-price="{{ trans('frontend.product.price', ['price' => $modification->currentPriceUzs]) }}"
                                        ></div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @endforeach
                    </form>
                    <div class="current-old-price horizontal">
                        <h5 class="price"
                            id="final-product-price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
                        <h6 class="old-price"
                            id="actual-product-price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h6>
                    </div>
                    <div class="item-action-icons">
                        <div class="cart" id="cart-button"
                             data-name="{{ $product->name }}"
                             data-url="{{ $product->mainPhoto ? $product->mainPhoto->fileOriginal : asset('images/tv6.png') }}"
                             data-price="{{ $product->currentPriceUzs }}"
                             onclick="addCart({{ $product->id }})">
                            <i class="mbcart"></i>@lang('frontend.product.to_cart')
                        </div>
                        <div class="libra" data-name="{{ $product->name }}"
                             data-url="{{ $product->mainPhoto ? $product->mainPhoto->fileOriginal : asset('images/tv6.png') }}"
                             data-price="{{ $product->currentPriceUzs }}"
                        >
                            <i class="mbtocompare"></i>
                        </div>
                        <div class="like" onclick="addToFavorite({{ $product->id }})"><i class="mbfavorite"></i></div>
                    </div>
                    <div class="delivery-options">
                        <div><i class="mbdelievery"></i>@lang('frontend.product.delivery_time')</div>
                        <div><i class="mbbox"></i>@lang('frontend.product.pickup_time', ['date' => '8 апреля'])</div>
                    </div>
                    <div class="sub-title bottom">
                        <div class="shop-name-logo">
                            <a href="{{ route('stores.view',['store' => $product->store]) }}"><img
                                    src="{{ $product->store->logoThumbnail ?? null }}" alt="" class="img-rounded"></a>
                            <div>
                                <b class="title"><a
                                        href="{{ route('stores.view',['store' => $product->store]) }}">{!! $product->store->name !!}</a></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('pages.rating-js', ['products' => $product, 'type' => '"one"'])

<script>
    function addToFavorite(id) {
        let product_id = {};
        product_id.id = id;
        $.ajax({
            url: '{{ route('user.add-to-favorite',$product) }}',
            method: 'GET',
            success: function (data) {
                console.log(data);
            }, error: function (data) {
                console.log(data);
            }
        })
    }

    function addCart(id) {
        let product_id = {};
        product_id.data = [];
        product_id.product_id = id;

        $.ajax({
            url: '/add-cart',
            method: 'POST',
            data: product_id,
            dataType: 'json',
            success: function (data) {

                if (data.message == 'success') {
                    localStorage.removeItem('product_id');
                    let containerCounter = $('.counter');
                    console.log(counterCartNumber)
                    counterCartNumber += 1;
                    containerCounter.text(counterCartNumber);
                    console.log('exists');
                } else {
                    nonRegisteredUsersCart(id);
                    console.log($.ajaxSettings.headers);
                    console.log('isnotexists');
                }
            }, error: function (data) {

            }
        })

    }

    function nonRegisteredUsersCart(id) {
        if (localStorage.getItem('product_id')) {
            let cart_products = '';
            let exist = false;
            let product_id = localStorage.getItem('product_id')
            let cart_product_check = product_id.split(',');
            for (let i = 0; i <= cart_product_check.length; i++) {
                console.log('hello')
                if (cart_product_check[i] == id) {
                    console.log('exists')
                    exist = true;
                } else {
                    console.log('loging')
                }
            }
            if (!exist) {
                cart_products += product_id;
                cart_products += id + ',';
                localStorage.setItem('product_id', cart_products + '');
                let containerCounter = $('.counter');
                containerCounter.text(cart_product_check.length);
            } else {
                console.log('exist');
            }
        } else {
            localStorage.setItem('product_id', id + ',');
        }
    }
</script>
