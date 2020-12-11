<section>
    <div class="slide-banner">
{{--        {{dd($longBanner)}}--}}

    @if ($longBanner)
            <a href="{{ $longBanner->url }}"><img src="{{ $longBanner->fileCustom }}" alt=""></a>
        @endif
{{--        @if (isset($banner))--}}
{{--            <a><img src="{{ $banner->fileCustom }}" alt=""></a>--}}
{{--        @else--}}
{{--            <img src="{{asset('images/catalog-slider-banner.png')}}" alt="">--}}
{{--        @endif--}}
    </div>
</section>
