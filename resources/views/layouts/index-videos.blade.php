<section>
    <div class="videos">
        <div class="h4-title">
            <h4 class="title">@lang('frontend.videos')</h4>
        </div>
        <div class="outter-players">
            <div class="all-players owl-carousel owl-theme">

                @foreach($videos as $video)
                <a href="/videos/{{$video->id}}">
                    <div class="video-item">
                        <img src="{{$video->posterOriginal}}" alt="" class="poster">
                        <div class="video-overlay">
                            <h6>{{$video->title}}</h6>
                            <button class="btn play">
                                <div class="arrow-right"></div>
                            </button>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
