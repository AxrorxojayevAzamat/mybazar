@extends('layouts.default-layout')

@section('title', 'Pay page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/pay.css')}}">
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

    <!-- Pay body -->
    @include('layouts.pay-body')

    
    <!-- NEWS LETTER -->
    @include ('layouts.news-letter')

    <!-- FOOTER -->
    @include ('layouts.footer')
@endsection
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection


