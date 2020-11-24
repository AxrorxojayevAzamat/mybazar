@if($shops1)
    <div class="shops-fr owl-carousel owl-theme">
        @foreach($shops1 as $shop)
            <div class="item ">
                <div class="shop-name-logo">
                    <a href="#"><img src="{{ $shop->store->logoOriginal }}" alt=""></a>
                    <div>
                        <h6 class="title"><a href="#">{!! $shop->store->name !!}</a></h6>
                        <p class="sub-title"><a href="#">{!! $shop->maincategory->name !!}</a></p>
                    </div>
                </div>
                <div class="product-images">
                    <div class="big-img">
                        <a href="#"><img src="{{ $shop->mainPhoto }}" alt=""></a>
                    </div>
                    <div class="small-img">
                        <a href="#"><img src="{{asset('images/phone2.png')}}" alt=""></a>
                        <a href="#"><img src="{{asset('images/phone3.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
