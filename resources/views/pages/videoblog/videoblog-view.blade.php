@extends('layouts.default-layout')

@section('title', 'Video blog')
@include ('includes.common-style')
@section('styles')
    <link href="{{asset('css/video-js.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('css/videoblog-view.css')}}">
@endsection

@section('body')
    @extends ('layouts.menu')
@section('page')
    <!-- All headers 1560 -->
    <section class="navbar-1560">
        @include('layouts.top-header')
        @include('layouts.main-header')
        @include('layouts.nav-header')
    </section>
    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')

    <!-- Breadcrumbs -->
    @include ('layouts.breadcrumb-videoblog-view')

    <!-- list of videos -->
    @include ('layouts.videoblog-view-body')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')

     <!-- NEWS LETTER -->
     @include ('layouts.news-letter')

    <!-- FOOTER -->
    @include ('layouts.footer')

    @endsection

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