@extends('layouts.default-layout')

@section('title', 'Popular page')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/popular-page.css')}}">
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
                    @include('layouts.breadcrumb-popular')

                     <!-- POPULAR NEW  RECOMMENDED BUTTONS -->
                     @include('layouts.new-pp-rec-btn')

                     <!-- POPULAR VIEW  -->
                     @include('layouts.popular_view')
                    
                     <div class="h4-title">
                         <h4 class="title">Магазины</h4>
                     </div>
                    <!-- SHOPS 1 -->
                    <section class="popular-shops">
                        @include('layouts.shops1')
                    </section>

                     <!-- FULL BANNER 1 -->
                    @include ('layouts.full-banner1')

                    <!-- SHOPS 2 -->
                    <section class="popular-shops">
                        @include('layouts.shops2')
                    </section>

                    <!-- SHOPS 2 -->
                    <section class="popular-shops last">
                        @include('layouts.shops2')
                    </section>

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
