<input type="hidden" value="{{ Auth::user() }}" id="user_info">
<div class="item">
    <div class="product-img">
        @if ($product->mainPhoto)
            <a href="{{ route('products.show', $product) }}">
                <img src="{{ $product->mainPhoto->fileOriginal }}" alt="">
            </a>
        @endif
        @if ($product->new)
            <span class="new-product">@lang('frontend.novelty_upper')</span>
        @endif
    </div>
    <div class="description">
        <h6 class="title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h6>
        <p class="sub-title">
            <a href="{{ route('categories.show', products_path($product->mainCategory)) }}">{{ $product->mainCategory->name }}</a><br>
        </p>
        <div class="rate">
            <div id="rateYo_{{$rate_for['html']}}{{ $loop->index }}"></div>
            <div class="comment">
                <i class="mbcomment"></i>
                <span>{{ $product->number_of_reviews }}</span>
            </div>
        </div>
        <div class="current-old-price horizontal">
            <h5 class="price">@lang('frontend.product.price', ['price' => $product->currentPriceUzs])</h5>
        </div>
        <div class="item-action-icons">
            <div class="cart" onclick="addCart({{ $product->id }}, {{ Auth::user() }})" data-name="{{ $product->name }}" data-price="{{ $product->price_uzs }}" data-url="{{asset('images/popular1.png')}}"><i class="mbcart"></i></div>
            <div class="libra"  data-name="{{ $product->name }}" data-price="{{ $product->price_uzs }}" data-url="{{asset('images/popular1.png')}}"><i class="mbtocompare"></i></div>
            <div class="like"><i class="mbfavorite"></i></div>
        </div>
        <p class="sub-title bottom">{{ $product->store->name }}</p>
    </div>
</div>


<script>
    function addCart(id, auth){
        console.log(auth);
        let product_id = {};
        product_id.data = [];
        if (auth == undefined){
            // console.log(localStorage.getItem('product_id'));
            if (localStorage.getItem('product_id')){
                let cart_products = '';
                let exist = false;
                let product_id = localStorage.getItem('product_id')
                let cart_product_check = product_id.split(',');
                for(let i = 0; i < cart_product_check.length; i++){
                    if (cart_product_check[i] === id){
                        exist = true;
                    }else {
                        exist = false;
                    }
                }
                if (!exist){
                    cart_products += product_id;
                    cart_products += id + ',';
                    localStorage.setItem('product_id', cart_products + '');
                }else{
                    console.log('exist');
                }
            }else {
                localStorage.setItem('product_id', id + ',');
            }
        }else{
            console.log('ajax')
            product_id.product_id = id;
            $.ajax({
                url: 'api/add-cart',
                method: 'POST',
                data: product_id,
                dataType: 'json',
                success: function (data){
                    console.log(data);
                },error: function (data){
                    console.log(data);
                }
            })
        }

    }
</script>
