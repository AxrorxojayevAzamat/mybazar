<div class="shops-2r">
    @if($shops2)
        @include('pages.rating-js', ['products' => $shops2ThreeItems, 'type' => $rate_for['js']])
        @foreach($shops2 as $shop)
            <div class="first-item">
                <div class="shop-name-logo">
                    <a href="#"><img src="{{ $shop->store->logoOriginal }}" alt=""></a>
                    <div>
                        <h6 class="title"><a href="#">{!! $shop->store->name !!}"</a></h6>
                        <p class="sub-title"><a href="{{ route('categories.show', products_path($shop->mainCategory)) }}">{!! $shop->maincategory->name !!}</a></p>
                    </div>
                </div>
                <div class="single-img">
                    <a href="#"><img src="{{ $shop->mainPhoto }}" alt=""></a>
                </div>
            </div>
        @endforeach
    @endif
    @if($shops2ThreeItems)
        <div class="shops-2r-inner owl-carousel owl-theme">
            @foreach($shops2ThreeItems as $shops2ThreeItem)
                <?php
                if ($shops2ThreeItem->classFavorite($shops2ThreeItem->id)) {
                    $className = "selected_like";
                }else{
                    $className = '';
                }
                ?>
                <div class="palette-items">
                    <div class="product-img">
                        <img src="{{ $shop->mainPhoto }}" alt="">
                        <span class="sale small">
                    <span class="number">-29</span>
                    % СКИДКА
                </span>
                    </div>
                    <div class="description">
                        <h6 class="title"><a href="{{ route('products.show', $shop) }}">{!! $shops2ThreeItem->name !!}</a></h6>
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
                            <h5 class="price">{{ $shops2ThreeItem->price_uzs }} <span>@lang('frontend.cart.sum')</span></h5>
                        </div>
                        <div class="item-action-icons">
                            <div class="libra"><i class="mbtocompare"></i></div>
                            <div class="cart"><i class="mbcart"></i></div>
                            <div class="like <?php echo $className ?>" onclick="addToFavorite({{ $shops2ThreeItem->id }})"><i class="mbfavorite"></i></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
@endif
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
</script>

