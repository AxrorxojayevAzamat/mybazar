@if($threeBanners)
    <section>
        <div class="three-small-banners">
            @foreach($threeBanners as $banners)
            <div class="first">
                <img src="{{ $banners->fileCustom }}" alt="">
{{--                <div class="text-primary">{!! $banners->title !!}</div>--}}
                <a href="{{ $banners->url }}"><button class="btn-yellow">@lang('frontend.cart.in_detail')</button></a>
            </div>
            @endforeach
        </div>
    </section>
@endif
