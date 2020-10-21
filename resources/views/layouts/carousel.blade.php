<section>
    <div id="carousel-index" class="carousel slide" data-ride="carousel" data-interval="false">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < $slidersCount; $i++)
                <li data-target="#carousel-index" data-slide-to="{{$i}}" class="@if ($i== 0){{'active'}}@endif"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            <div class="item">
                <img src="{{asset('images/slider1.jpg')}}" alt="">
            </div>
            {{-- @foreach($sliders as $slide)
                <div class="item @if ($loop->first) {{ 'active' }} @endif">
                    <img src="{{ $slide->fileOriginal }}" alt="">
                </div>
            @endforeach --}}
        </div>
        <a class="carousel-control-prev" href="#carousel-index" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">@lang('frontend.previous')</span>
        </a>
        <a class="carousel-control-next" href="#carousel-index" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">@lang('frontend.next')</span>
        </a>
    </div>
</section>
