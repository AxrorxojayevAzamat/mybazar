@if($brands)
    <section>
        <div class="top-brands">
            <h4 class="title">@lang('frontend.nav.top_brands')</h4>
            <!-- responsive one-row -->
            <div class="one-row-brands owl-carousel owl-theme">
                @foreach($brands as $brand)
                    <div class="item">
                        <a href="{{ $brand->logoOriginal }}"><img src="{{ $brand->logoOriginal }}"></a>
                    </div>
                @endforeach
            </div>

            <!-- original two-row brands -->

            {{-- <div class="two-rows-brands row">
                @foreach($gBrands as $brand)
                <div class="col-1">
                    <img src="{{$brand->logo}}">
                </div>
                @endforeach
            </div> --}}
        </div>
    </section>
@endif
