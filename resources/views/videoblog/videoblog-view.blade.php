@extends('layouts.app')

@section('title', 'Video blog')

@section('styles')
    <link href="{{asset('css/video-js.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('css/videoblog-view.css')}}">
@endsection

@section('body')
    @section('banner')
        <!-- Slide banner -->
        @include ('layouts.slide-banner-catalog')
    @endsection

    <!-- list of videos -->
    <section>
    <div class="h4-title video-blog">
        <h4 class="title">Видеоролики</h4>
    </div>
    <div class="outter-videoview">
        <div id="search-bar" class="search-bar form-control">
            <input id="search-input" class="bordered-input" type="search" placeholder="Поиск по блогам и новостям">
            <button class="search btn" type="submit"><i class="mbsearch"></i></button>
        </div>
        <div class="inner-videoview">
            <div class="video-player">
                    <video 
                    onplay="hideOverlay()"
                    onpause="showOverlay()"
                    id="my-video"
                    class="video-js"
                    controls
                    preload="auto"
                    poster="{{asset('images/'.$video->poster)}}"
                    
                    data-setup="{}"
                >
                        <source src="{{asset('images/'.$video->video)}}" type="video/mp4" />
                    
                    </p>

                    </video>
                    <div class="player-overlay">
                        <h6>{{$video->title}}</h6>
                    </div> 
            </div>
            <h6>{{$video->title}}</h6>
            <p>{{$video->body}}</p>
            <div class="small-videos">
                <a href="#">
                    <div class="video-item">
                        <img src="{{asset('images/poster5.jpg')}}" alt="" class="poster">
                        <div class="video-overlay">
                            <h6>Alexander 23 - I Hate You So Much [Official Music Video]</h6>
                            <button class="btn play">
                                <div class="arrow-right"></div>
                            </button>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="video-item">
                        <img src="{{asset('images/poster5.jpg')}}" alt="" class="poster">
                        <div class="video-overlay">
                            <h6>Alexander 23 - I Hate You So Much [Official Music Video]</h6>
                            <button class="btn play">
                                <div class="arrow-right"></div>
                            </button>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="video-item">
                        <img src="{{asset('images/poster5.jpg')}}" alt="" class="poster">
                        <div class="video-overlay">
                            <h6>Alexander 23 - I Hate You So Much [Official Music Video]</h6>
                            <button class="btn play">
                                <div class="arrow-right"></div>
                            </button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

    <!-- recently viewed -->
    @include('layouts.recently-viewed')

@endsection

@section('script')
    <script>
        function hideOverlay(){
            $(".player-overlay").hide();
        }
        function showOverlay(){
            $(".player-overlay").show();
        }
    </script>
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/video.js')}}"></script>
@endsection
