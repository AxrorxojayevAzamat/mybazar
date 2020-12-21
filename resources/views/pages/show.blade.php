@extends('layouts.app')

@section('title', trans('frontend.title.home_page'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/index.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/jquery.rateyo.css')}}">
@endsection

{{--@section('breadcrumbs', '')--}}

@section('body')
    <!-- Page -->
{{--    {{dd($page)}}--}}
    <div class="h4-title padding-1-10">
        <h4 class="title">{{$page->title}}</h4>
    </div>
    <div class="container-fluid">
        <div class="padding-1-10">
            <div class="description">
                <h5>{{$page->description}}</h5>
            </div>
            <div class="body">
                {!!$page->body!!}
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
