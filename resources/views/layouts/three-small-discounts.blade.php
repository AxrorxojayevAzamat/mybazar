@if($threeDiscounts)
    <section>
        <div class="three-small-banners">
            @foreach($threeDiscounts as $discount)
            <div class="first">
                <img src="{{ $discount->photoThumbnail }}" alt="">
{{--                <div class="text-primary">{!! $banners->title !!}</div>--}}
                <a href="{{ route('discounts.show', $discount) }}"><button class="btn-yellow">@lang('frontend.cart.in_detail')</button></a>
            </div>
            @endforeach
        </div>
    </section>
@endif

