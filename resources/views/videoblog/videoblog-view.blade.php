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
    @include ('videoblog.videoblog-view-body')

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
