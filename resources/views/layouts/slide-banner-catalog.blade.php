<section>
    <div class="slide-banner">
        @if ($longBanner)
            <a href="{{ $longBanner->url }}"><img src="{{ $longBanner->fileCustom }}" alt=""></a>
        @endif
{{--        {{dd($banner)}}--}}
{{--        @if (isset($banner))--}}
{{--            <a><img src="{{ $banner->fileCustom }}" alt=""></a>--}}
{{--        @else--}}
{{--            <img src="{{asset('images/catalog-slider-banner.png')}}" alt="">--}}
{{--        @endif--}}
    </div>
</section>
