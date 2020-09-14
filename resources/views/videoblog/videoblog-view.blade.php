@extends('layouts.default-layout')

@section('title', 'Video blog')
@include ('includes.common-style')
@section('styles')
    <link href="{{asset('css/video-js.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('css/videoblog-view.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')

    @section('banner')
    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')
    @endSection

    <!-- list of videos -->
    @include ('videoblog.videoblog-view-body')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')

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