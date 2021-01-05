@extends('layouts.app')

@section('title', trans('frontend.title.video_blog'))

@section('styles')
{{-- <link rel="stylesheet" href="{{asset('css/video-blog.css')}}"> --}}
@endsection

@section('body')
@section('banner')
<!-- Slide banner -->
@include ('layouts.slide-banner-catalog')
@endsection
<!-- list of videos -->
<section>
    @include('blog._blog-news-btn')

    <div class="outter-list-of-videos">
        <form action="get" class="accordion big-filter filter" id="catalogFilter">
            <div class="filter-item">
                @include('filters.category-blog-filter')
            </div>
        </form>

        <div class="wrapper-filtered-videos">
            <nav class=" navbar navbar-expand-custom sort-types">

                <button class="navbar-toggler" type ="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span>     -->
                    <i class="navbar-toggler-icon mbcompare"></i>
                </button>

                <form method="GET" id="search-bar" class="w-100 search-bar form-control">
                    <input id="search-input" name="videoName" type="search" placeholder="@lang('frontend.search_videos')">
                    <button class="search btn" type="submit"><i class="mbsearch"></i></button>
                </form>

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
@include ('layouts.carousel-products',
        ['products' => $recentProducts, "title" => trans('frontend.product.you_watched'), 'rate_for' => ['js' => '"R"', 'html' => 'R']])
@endsection

