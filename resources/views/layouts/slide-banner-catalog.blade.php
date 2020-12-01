<section>
    <div class="slide-banner">
        @if ($banner)
            <a><img src="{{ $banner->fileCustom }}" alt=""></a>
{{--        @else--}}
{{--            <img src="{{asset('images/catalog-slider-banner.png')}}" alt="">--}}
        @endif
    </div>
</section>
