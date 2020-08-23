<section>
    <div id="carousel-index" class="carousel slide" data-ride="carousel" data-interval="false">
        <ol class="carousel-indicators">
            @for ($i = 0; $i <= $sliders_count -1; $i++)
            <li data-target="#carousel-index" data-slide-to="{{$i}}" class="@if ($i== 0){{'active'}}@endif"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            <div class="item">
                <img src="{{asset('images/slider1.jpg')}}" alt="">
            </div>
            @foreach($sliders as $slide)
            <div class="item @if ($loop->first){{'active'}}@endif">
                <img src="/storage/sliders/{{$slide->file}}" alt="">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel-index" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-index" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
