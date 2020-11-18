@if($shops1)
    <div class="shops-fr owl-carousel owl-theme">
        @foreach($shops1 as $shop)
            <div class="item ">
                <div class="shop-name-logo">
                    <a href="#"><img src="{{ $shop->store->logoOriginal }}" alt=""></a>
                    <div>
                        <h6 class="title">{!! $shop->store->name !!}</h6>
                                            <p class="sub-title">{!! $shop->maincategory->name !!}</p>
                    </div>
                </div>
                <div class="product-images">
                    <div class="big-img">
                        <img src="{{ $shop->mainPhoto }}" alt="">
                    </div>
                    <div class="small-img">
                        <img src="{{asset('images/phone2.png')}}" alt="">
                        <img src="{{asset('images/phone3.png')}}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
