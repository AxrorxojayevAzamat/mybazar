@extends('layouts.default-layout')

@section('title', 'Catalog page')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/catalog-page.css')}}">
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
                    @include ('layouts.breadcrumb-catalog')

                    <!-- CATALOG VIEW -->
                    @include ('layouts.catalog-view')

                    <!-- NEWS LETTER -->
                    @include ('layouts.news-letter')

                    <!-- FOOTER -->
                    @include ('layouts.footer')

                @endsection

        @endsection

        @section('script')
            <script src="{{asset('js/autoNumeric-2.0-BETA.js')}}"></script>
            <script src="{{asset('js/autoNumeric.js')}}"></script>
            
            <script src="{{asset('js/1-index.js')}}"></script>
            <script src="{{asset('js/range-slider.js')}}"></script>
            <script src="{{asset('js/2-catalog-page.js')}}"></script>
        @endsection