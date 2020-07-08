<section>
    <div id="carousel-index" class="carousel slide" data-ride="carousel" data-interval="false">
        <ol class="carousel-indicators">
            @for ($i = 0; $i <= $sliders_count -1; $i++)
            <li data-target="#carousel-index" data-slide-to="{{$i}}" class="@if ($i== 0){{'active'}}@endif"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $slide)
            <div class="carousel-item @if ($loop->first){{'active'}}@endif">
                <div class="inner-content">
                    <div class="info">
                        <img src="/storage/sliders/{{$slide->file}}" alt="">
                        <h5 class="bold"></h5>
                    </div>
                    <div class="image">
                        <img src="" alt="">
                    </div>
                </div>
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
