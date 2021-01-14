@extends('layouts.app')

@section('title', trans('frontend.title.video_blog'))

@section('styles')
    <link href="{{asset('css/video-js.css')}}" rel="stylesheet"/>
@endsection

@section('body')
@section('banner')
    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')
@endsection

<!-- list of videos -->
<section>
    <div class="h4-title video-blog">
        <h4 class="title">@lang('frontend.videos')</h4>
    </div>
    <div class="outter-videoview d-flex justify-content-center">
        <div class="inner-videoview">
            <div class="video-player">
                <video
                    onplay="hideOverlay()"
                    onpause="showOverlay()"
                    id="my-video"
                    class="video-js"
                    controls
                    preload="auto"
                    poster="{{$video->posterOriginal}}"
                    data-setup="{}"
                >
                    <source src="{{$video->videoFile}}" type="video/mp4"/>

                </video>
                <div class="player-overlay">
                    <h6>{{$video->title}}</h6>
                </div>
            </div>
            <h6>{{$video->title}}</h6>
            <p>{!!$video->body!!}</p>

            <div class="small-videos">
                @foreach($videos as $video)
                    <a href="{{ route('videos.show', $video) }}">
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

<!-- recently viewed -->

@include ('layouts.carousel-products',
        ['products' => $recentProducts, "title" => trans('frontend.product.you_watched'), 'rate_for' => ['js' => '"R"', 'html' => 'R']])
@endsection

@section('script')
    <script>
        function hideOverlay() {
            $(".player-overlay").hide();
        }

        function showOverlay() {
            $(".player-overlay").show();
        }
    </script>
    <script src="{{asset('js/video.js')}}"></script>
@endsection
