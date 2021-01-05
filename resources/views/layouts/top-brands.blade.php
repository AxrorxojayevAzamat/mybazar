@if($brands)
    <section>
        <div class="top-brands">
            <h4 class="title">@lang('frontend.nav.top_brands')</h4>
            <div class="one-row-brands owl-carousel owl-theme">
                @foreach($brands as $brand)
                    <div class="item">
                        <a href="{{route('brands.show', $brand)}}"><img src="{{ $brand->logoOriginal }}"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
