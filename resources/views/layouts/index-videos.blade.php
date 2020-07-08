<section>
    <div class="videos">
        <div class="h4-title">
            <h4 class="title">Видеоролики</h4>
        </div>
        <div class="outter-players">
            <div class="all-players owl-carousel owl-theme">
                @foreach($videos as $video)
                <div class="item">
                    <a href="/videos/{{$video->id}}">
                        <img src="/storage/videos/{{$video->poster}}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
