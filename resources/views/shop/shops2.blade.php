<div class="shops-2r">
    @if($shops2)
        @include('pages.rating-js', ['products' => $shops2ThreeItems, 'type' => $rate_for['js']])
        @foreach($shops2 as $shop)
            <div class="first-item">
                <div class="shop-name-logo">
                    <a href="{{ route('stores.view', $shop->store) }}"><img src="{{ $shop->store->logoOriginal }}"
                                                                            alt=""></a>
                    <div>
                        <h6 class="title"><a
                                href="{{ route('stores.view',['store'=>$shop->store]) }}">{!! $shop->store->name !!}</a>
                        </h6>
                        <p class="sub-title"><a
                                href="{{ route('categories.show', products_path($shop->mainCategory)) }}">{!! $shop->maincategory->name !!}</a>
                        </p>
                    </div>
                </div>
                <div class="single-img">
                    <a href="{{ route('stores.view', $shop->store) }}">
                        @if ($shop->mainPhoto)
                            <img src="{{ $shop->mainPhoto->fileOriginal }}">
                        @endif</a>
                    </a>
                </div>
            </div>
        @endforeach
    @endif
    @if($shops2ThreeItems)
        <div class="shops-2r-inner owl-carousel owl-theme">
            @foreach($shops2ThreeItems as $shops2ThreeItem)
                <?php
                if ($shops2ThreeItem->classFavorite($shops2ThreeItem->id)) {
                    $favoriteClass = "selected_like";
                } else {
                    $favoriteClass = '';
                }

                if ($shops2ThreeItem->classCart($shops2ThreeItem->id)) {
                    $cartClass = "selected_cart";
                } else {
                    $cartClass = '';
                }
                ?>
                <div class="palette-items">
                    <div class="item" onclick="location.href = '{{ route('products.show', $shop) }}'">
                        <div class="product-img">
                            @if ($shops2ThreeItem->mainPhoto)
                                <div class="big-image">
                                    <img src="{{ $shops2ThreeItem->mainPhoto->fileOriginal }}" style="width:100%">
                                </div>
                            @endif
                            <span class="sale small">
                                <span class="number">-29</span>
                                % СКИДКА
                            </span>
                        </div>
                        <div class="description">
                            <h6 class="title"><a
                                    href="{{ route('products.show', $shop) }}">{!! $shops2ThreeItem->name !!}</a></h6>
                            <div class="rate">
                                <div class="rating stars">
                                    <div id="rateYo_{{$rate_for['html']}}{{ $loop->index }}"></div>
                                </div>
                                <div class="comment">
                                    <i class="mbcomment"></i>
                                    <span>75</span>
                                </div>
                            </div>
                            <div class="current-old-price horizontal">
                                <h5 class="price">{{ $shops2ThreeItem->price_uzs }}
                                    <span>@lang('frontend.cart.sum')</span></h5>
                            </div>

                        </div>
                    </div>
                    <div class="item-action-icons">
                        <div class="libra" id="cartActive{{ $shops2ThreeItem->id }}"
                             onclick="addToCompare({{ $shops2ThreeItem->id }})"
                             data-id="l{{ $shops2ThreeItem->id }}">
                            <i class="mbtocompare"></i>
                        </div>
                        <div class="cart <?php echo $cartClass ?>" data-id="c{{ $shops2ThreeItem->id }}"><i
                                class="mbcart"></i></div>
                        <div class="like <?php echo $favoriteClass ?>"
                             onclick="addToFavorite({{ $shops2ThreeItem->id }})"><i class="mbfavorite"></i></div>
                    </div>
                    <script>
                        localStorage.getItem('compare_product').split(',').forEach(el => {
                            if (el === "{{$shops2ThreeItem->id}}") {
                                $(`[data-id="l${el}"]`).addClass('selected_libra');
                            }
                        })
                        @guest
                        JSON.parse(localStorage.getItem('product_id')).forEach(el => {
                            if (el.product_id === {{$shops2ThreeItem->id}}) {
                                $(`[data-id="c${el.product_id}"]`).addClass('selected_cart');
                            }
                        })
                        @endguest
                    </script>
                </div>
            @endforeach
        </div>
</div>
@endif
<script>
    function addToFavorite(id) {
        let product_id = {};
        product_id.id = id;
        $.ajax({
            url: 'add-to-favorite/' + id,
            method: 'GET',
            success: function (data) {
                console.log(data);
            }, error: function (data) {
                console.log(data);
            }
        })
    }

    function addCart(id) {
        console.log('shop')
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
                } else if (data.message == 'exists') {
                    removeCartList(id);
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
                removeCartList(id);
                console.log('exist');
            }
        } else {
            localStorage.setItem('product_id', id + ',');
        }
    }

    function removeCartList(id) {
        console.log('working')
        let product_id = {};
        product_id.data = [];
        product_id.product_id = id;

        $.ajax({
            url: '/remove-cart',
            method: 'POST',
            data: product_id,
            dataType: 'json',
            success: function (data) {
                if (data.data == 'success') {
                    let ids = 'cartActive' + id;
                    console.log($('#' + ids));
                    $('#' + ids).removeClass('selected_cart');
                } else {
                    let product_id_local = localStorage.getItem('product_id');
                    product_id_local = product_id_local.replace(id + ',', '');
                    localStorage.removeItem('product_id');
                    localStorage.setItem('product_id', product_id_local);
                    let productID_carts = product_id_local;

                    if (productID_carts !== null) {
                        productID_carts = productID_carts.slice(0, -1);
                    } else {
                        console.log('error');
                    }
                    window.location.href = window.location.origin + '/cart-list?product_id=' + productID_carts;
                    $('#' + id).hide();


                }

            }, error: function (data) {
                console.log(data);
            }
        })
    }
</script>

