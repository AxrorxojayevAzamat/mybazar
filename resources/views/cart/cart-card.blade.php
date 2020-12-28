<div class="item" id="{{ $product->id }}">
    <div class="product-img">
        <img src="{{ $product->mainPhoto->fileThumbnail }}" alt="">
    </div>
    <!-- description -->
    <div class="description ">
        <a href="{{ route('products.show', $product) }}"><h6 class="title">{{ $product->name }}</h6></a>
        <p class="sub-title">{{ $product->name }}</p>
        <div class="current-old-price horizontal">
            <h5 class="price">{{ $product->price_uzs }} <span>@lang('frontend.cart.sum')</span></h5>
            <!-- <h6 class="old-price">855 790 <span>сум</span></h6> -->
        </div>
        <div class="count-div"> {{--TODO: make counter for payment--}}
            <i class="mbdeleteone" onclick="quantityCounter({{ $product->id }}, 'delete')"></i>
            <div class="number" id="{{ $product->id }}-cartCounter">1</div>
            <i class="mbaddone" onclick="quantityCounter({{ $product->id }}, 'add')"></i>
        </div>
        <div class="item-action-icons">
            <div class="libra" data-name="Телевизор Samsung QE55Q77RAU" data-url="{{asset('images/tv6.png')}}"
                 data-price="741640"><i class="mbtocompare"></i></div>
            <div class="like"><i class="mbfavorite"></i></div>
        </div>
        <div class="delivery-options">
            <div><i class="mbdelievery"></i> @lang('frontend.cart.delivery_in_day')</div>
            <div><i class="mbbox"></i>@lang('frontend.cart.callback_until_8_april')</div>
        </div>
        <p class="sub-title bottom">{{ $product->store->name }}</p>
    </div>
    <!-- end description -->
    <button class="btn delete-btn" onclick="removeCartList({{ $product->id }})"><i class="mbexit_mobile"></i></button>
</div>
