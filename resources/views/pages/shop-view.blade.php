@extends('layouts.default-layout')

@section('title', 'Shop view')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/shop-view.css')}}">
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
                @include('layouts.breadcrumb-shop-view')

                <!-- Slide Banner brand-view -->
                @include('layouts.slide-banner-shop-view')

                <!-- PRODUCT OF DAY -->
                @include ('layouts.products-of-day')

                <!--shop view list mosaic -->
                @include('layouts.shop-view-list-mosaic')
                 <!-- NEWS LETTER -->
                @include ('layouts.news-letter')

<!-- FOOTER -->
@include ('layouts.footer')
@endsection
@endsection


@section('script')
<script src="{{asset('js/autoNumeric-2.0-BETA.js')}}"></script>
<script src="{{asset('js/autoNumeric.js')}}"></script>

<script src="{{asset('js/range-slider.js')}}"></script>
<script src="{{asset('js/1-index.js')}}"></script>
<script src="{{asset('js/2-catalog-page.js')}}"></script>
@endsection
