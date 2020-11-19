@if(isset($sliders))

    <section>
        <div id="carouselIndex" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i = 0; $i < $slidersCount; $i++)
                    <li data-target="#carouselIndex" data-slide-to="{{ $i }}" class="active"></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                @foreach( $sliders as $i => $slider)
                    <div class=" carousel-item{{ $i === 1 ? ' active' : '' }}">
                        <img class="d-block w-100" src="{{ $slider->fileOriginal }}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselIndex" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndex" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
@endif
