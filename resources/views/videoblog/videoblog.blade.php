@extends('layouts.app')

@section('title', 'Video blog')

@section('styles')
<link rel="stylesheet" href="{{asset('css/video-blog.css')}}">
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
    <div class="outter-list-of-videos">
        <form action="get" class="accordion big-filter filter" id="catalogFilter">
            <div class="filter-item">
                @foreach($categories as $category)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-{{$category->id}}" value="{{$category->id}}">
                    <label  class="custom-control-label" for="smallcustomCheck1-{{$category->id}}">{{$category->name}}</label>
                </div>
                @endforeach
            </div>
        </form>

        <div class="wrapper-filtered-videos">
            <nav class=" navbar navbar-expand-custom sort-types">

                <button class="navbar-toggler" type ="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span>     -->
                    <i class="navbar-toggler-icon mbcompare"></i>
                </button>

                <div id="search-bar" class="search-bar form-control">
                    <input id="search-input" type="search" placeholder="Поиск по блогам и новостям">
                    <button class="search btn" type="submit"><i class="mbsearch"></i></button>
                </div>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <form action="get" class="accordion small-filter filter" id="catalogFilter">
                        <ul class="navbar-nav">
                            <div class="card">
                                <div id="collapseOne" class="collapse" aria-labelledby="filterOne" data-parent="#catalogFilter">
                                    <div class="card-body">
                                        @foreach($categories as $category)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-{{$category->id}}" value="{{$category->id}}">
                                            <label  class="custom-control-label" for="smallcustomCheck1-{{$category->id}}">{{$category->name}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </form>
                </div>
            </nav>

            <div class="all-filtered-videos">
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
@include('layouts.recently-viewed')
@endsection

@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection
