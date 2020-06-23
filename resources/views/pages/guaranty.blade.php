@extends('layouts.default-layout')

@section('title', 'Guaranty page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/guaranty.css')}}">
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

    <!-- BREADCRUMB -->
    @include('layouts.breadcrumb-payment')

    <!-- blog-news btn -->
    @include('layouts.d-guaranty-p-btn')

    <!-- slide banner -->
    @include('layouts.slide-banner-guaranty')

    <!-- delivery body -->
    @include('layouts.guaranty-body')

    <!-- NEWS LETTER -->
    @include ('layouts.news-letter')

<!-- FOOTER -->
@include ('layouts.footer')
@endsection
@endsection


@section('script')
<script src="{{asset('js/shopping-cart.js')}}"></script>
<script src="{{asset('js/compare-items.js')}}"></script>
<script src="{{asset('js/1-index.js')}}"></script>
@endsection