<section>
    <div class="top-brands">
        <h4 class="title">Топ бренды</h4>
        <!-- responsive one-row -->
        <div class="one-row-brands owl-carousel owl-theme">
            <div class="item">
                <img src="{{asset('images/apple_brand.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/mi_brand.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/samsung.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/huawei.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/zte.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/yota.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/vivo.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/adidas.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/nike.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/starbucks.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/delonghi.png')}}">
            </div>
            <div class="item">
                <img src="{{asset('images/macdonals.png')}}">
            </div>
        </div>

        <!-- original two-row brands -->

        <div class="two-rows-brands row">
            @foreach($gBrands as $brand)
            <div class="col-1">
                <img src="{{$brand->logo}}">
            </div>
            @endforeach
        </div>
    </div>
</section>
