@if($threeBanners)
    <section>
        <div class="three-small-banners">
            @foreach($threeBanners as $banners)
            <div class="first">
                <img src="{{ $banners->fileCustom }}" alt="">
                <div class="text-primary">{!! $banners->title !!}</div>
                <button class="btn-yellow"><a href="{{ $banners->url }}">Подробно</a></button>
            </div>
            @endforeach
{{--            <div class="second">--}}
{{--                <img src="{{asset('images/gifts.jpg')}}" alt="">--}}
{{--                <h5 class="title bold">ПОДАРКИ <br> для ВСЕХ</h5>--}}
{{--                <button class="btn-yellow">Подробно</button>--}}
{{--            </div>--}}
{{--            <div class="third">--}}
{{--                <img src="{{asset('images/1plus1.jpg')}}" alt="">--}}
{{--                <h5 class="title bold">1=2</h5>--}}
{{--                <p>Простая <br> арифметика</p>--}}
{{--                <button class="btn-yellow">Подробно</button>--}}
{{--            </div>--}}
        </div>
    </section>
@endif
