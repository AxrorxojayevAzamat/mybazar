@extends('layouts.default-layout')

@section('title', 'Catalog section page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/catalog-section.css')}}">
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
    @include ('layouts.breadcrumb-catalog-section')

    <!-- filter section -->
    @include('layouts.catalog-section-filter-part')

    <!-- TOP BRANDS  -->
    @include ('layouts.top-brands')

    <!-- TOP sales  -->
    @include ('layouts.top-sales')

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