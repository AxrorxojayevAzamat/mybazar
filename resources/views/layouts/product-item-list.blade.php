<?php
if ($product->classFavorite($product->id)) {
    $favoriteClass = "selected_like";
} else {
    $favoriteClass = '';
}

if ($product->classCart($product->id)) {
    $cartClass = "selected_cart";
} else {
    $cartClass = '';
}
?>
<div class="item">
    <div class="product-img d-flex justify-content-center">
        @if ($product->mainPhoto)
            <a href="{{ route('products.show',$product) }}" class="w-100"><img
                    src="{{ $product->mainPhoto->fileThumbnail }}" alt="" class="d-block"></a>
        @endif
    </div>
    <!-- description -->
    <div class="description ">
        <h6 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
        <p class="sub-title">
            @foreach($product->categories as $category)
                <a href="{{ route('categories.show', products_path($category)) }}">{{ $category->name }}</a><br>
            @endforeach
        </p>
        <div class="rate">
            <div id="rateYo_P{{ $loop->index }}"></div>
            <div class="comment">
                <i class="mbcomment"></i>
                <span>{{$product->number_of_reviews}}</span>
            </div>
        </div>
        <div class="list-full-des">
            @foreach($product->allCharacteristics as $characteristics)
                @if($characteristics->characteristic->main)
                    <p>{!! $characteristics->characteristic->name !!}:
                        <span>
                              @foreach($product->modificationsForProduct($characteristics->characteristic_id) as $modifications)
                                {{ $modifications->value }}
                            @endforeach
                        </span>
                    </p>
                @endif
            @endforeach
        </div>
        <div class="current-old-price horizontal">
            <h5 class="price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
            <h6 class="old-price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h6>
        </div>
        <div class="item-action-icons">
            <div class="cart <?php echo $cartClass ?>" id="cartActive{{ $product->id }}"
                 onclick="addCart({{ $product->id }})"
                 data-id="c{{ $product->id }}" data-url="{{asset('images/tv6.png')}}">
                <i class="mbcart"></i>@lang('frontend.product.to_cart')
            </div>
            <div class="libra" onclick="addToCompare({{ $product->id }})" data-id="l{{ $product->id }}"><i
                    class="mbtocompare"></i></div>
            <div class="like <?php echo $favoriteClass ?>" onclick="addToFavorite({{ $product->id }})"><i
                    class="mbfavorite"></i></div>
        </div>
        <div class="delivery-options">
            <div>
                <i class="mbdelievery"></i>@lang('frontend.product.delivery_time', ['hour' => date('g', $product->discountExpiresAt)])
            </div>
            <div>
                <i class="mbbox"></i>@lang('frontend.product.pickup_time', ['date' => date("d.m.Y", strtotime($product->discount_ends_at))])
            </div>
        </div>
        <p class="sub-title bottom">{{$product->store->name}}</p>
    </div>
    <!-- end description -->
    <script>
        localStorage.getItem('compare_product').split(',').forEach(el => {
            if (el === "{{$product->id}}") {
                $(`[data-id="l${el}"]`).addClass('selected_libra');
            }
        })
        @guest
        JSON.parse(localStorage.getItem('product_id')).forEach(el => {
            if (el.product_id === {{$product->id}}) {
                $(`[data-id="c${el.product_id}"]`).addClass('selected_cart');
            }
        })
        @endguest
    </script>
</div>

<script>

    function addToCompare(id) {
        if (localStorage.getItem('compare_product')) {
            let compare_products = '';
            let exist = false;
            let product_id = localStorage.getItem('compare_product')
            let cart_product_check = product_id.split(',');
            for (let i = 0; i <= cart_product_check.length; i++) {
                if (cart_product_check[i] == id) {
                    console.log('exists')
                    exist = true;
                }
            }
            if (!exist) {
                if (cart_product_check.length < 1) {
                    compare_products += product_id;
                    compare_products += id + ',';
                    localStorage.setItem('compare_product', compare_products + '');
                    let containerCounter = $('.counter');
                    containerCounter.text(cart_product_check.length);
                }
                if (cart_product_check.length <= 3 && cart_product_check.length >= 1) {
                    $.ajax({
                        url: '/check-compare/' + id + '/' + cart_product_check[0],
                        method: 'GET',
                        success: function (data) {
                            if (data === "success") {
                                compare_products += product_id;
                                compare_products += id + ',';
                                localStorage.setItem('compare_product', compare_products + '');
                                let containerCounter = $('.counter');
                                containerCounter.text(cart_product_check.length);
                            } else {
                                alert('{{ trans('frontend.compare_not_fit') }}')
                                $(`[data-id="l${id}"]`).removeClass('selected_libra')
                            }
                        }, error: function (data) {
                            // console.log(data);
                        }
                    });
                } else {
                    alert('{{ trans('frontend.compare_full') }}')
                    $(`[data-id="l${id}"]`).removeClass('selected_libra')
                }

            }
        } else {
            localStorage.setItem('compare_product', id + ',');
        }
    }

    function addToFavorite(id) {
        let product_id = {};
        product_id.id = id;
        $.ajax({
            url: '{{ route('user.favorites.add',$product) }}',
            method: 'GET',
            success: function (data) {
                console.log(data);
            }, error: function (data) {
                console.log(data);
            }
        })
    }


    function addCart(id) {
        console.log('item-list')
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
