<section>
    <div id="products-of-day" class=" products-of-day owl-carousel owl-theme">
        @foreach($dayProducts as $product)
            <?php
            if ($product->classFavorite($product->id)) {
                $className = "selected_like";
            }else{
                $className = '';
            }
            ?>
            <div class="product-item">
                <div class="product-of-day-item">
                    <div class="top">
                        <h5 class="bold title">@lang('frontend.product.day_product')</h5>
                        <div class="time">
                            @php($discountExpireDate = $product->discountExpiresAt)
                            <span class="day">{{ date('d', $discountExpireDate) }}</span>
                            <span class="hour">{{ date('H', $discountExpireDate) }}</span>
                            <span class="minute">{{ date('i', $discountExpireDate) }}</span>{{-- TODO: fix timing --}}
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-image">
                            @if ($product->mainPhoto)
                                <a href="{{ route('products.show', $product) }}"><img src="{{ $product->mainPhoto->fileThumbnail }}" alt=""></a>
                            @endif
                            <span class="sale big">
                            <span class="number">-{{ $product->discount * 100 }}% @lang('frontend.discount_upper')</span>
                        </span>
                        </div>
                        <div class="description">
                            <h6 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
                            <div class="rate">
                                <div id="rateYo_D{{ $loop->index }}"></div>
                                <div class="comment">
                                    <i class="mbcomment"></i>
                                    <span>{{ $product->number_of_reviews }}</span>
                                </div>
                            </div>
                            <div class="current-old-price vertical">
                                <h5 class="price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
                                <h6 class="old-price">@lang('frontend.product.price', ['price' => $product->price_uzs])</h6>
                            </div>
                            <div class="item-action-icons">
                                <div class="cart" data-name="{{ $product->name }}" id="cartActive{{ $product->id }}" onclick="addCart({{ $product->id }})" data-price="{{ $product->currentPriceUzs }}" data-url="{{asset('images/laptop.png')}}"><i class="mbcart"></i></div>
                                <div class="libra" data-name="{{ $product->name }}" data-price="{{ $product->currentPriceUzs }}" data-url="{{asset('images/laptop.png')}}" onclick="addToCompare({{ $product->id }})"><i class="mbtocompare"></i></div>
                                <div class="like <?php echo $className ?>" onclick="addToFavorite({{ $product->id }})" ><i class="mbfavorite"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<script>
    function addToFavorite(id){
        let product_id = {};
        product_id.id = id;
        $.ajax({
            url: 'add-to-favorite/'+id,
            method: 'GET',
            success: function (data){
                console.log(data);
            },error: function (data){
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
                } else if(data.message == 'exists'){
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

    function removeCartList(id){
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
                if (data.data == 'success'){
                    let ids = 'cartActive' + id;
                    console.log($('#' + ids));
                    $('#' + ids).removeClass('selected_cart');
                }else{
                    let product_id_local = localStorage.getItem('product_id');
                    product_id_local = product_id_local.replace(id + ',', '');
                    localStorage.removeItem('product_id');
                    localStorage.setItem('product_id',product_id_local);
                    let productID_carts = product_id_local;

                    if (productID_carts !== null){
                        productID_carts = productID_carts.slice(0, -1);
                    }else {
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

    function goToCartInAdd(){
        let cart_products_id = $('#cart_products_id');
        let saved_carts = localStorage.getItem('product_id');
        if (saved_carts !== null){
            saved_carts = saved_carts.slice(0, -1);
            cart_products_id.val(saved_carts);
        }else {
            console.log('error');
        }
    }
</script>
@include('pages.rating-js', ['products' => $dayProducts, 'type' => '"D"'])
