@extends('layouts.default-layout')

@section('title', 'Shops page')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/shops.css')}}">
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
                    @include('layouts.breadcrumb-shops')

                     <!-- SHOPS body  -->
                     @include('layouts.shops-view')


                     <!-- NEWS LETTER -->
                     @include ('layouts.news-letter')
                    
                    <!-- FOOTER -->
                    @include ('layouts.footer')

                @endsection

        @endsection

        @section('script')
        <script src="{{asset('js/1-index.js')}}"></script>
        <script src="{{asset('js/3-popular-page.js')}}"></script>
        @endsection
