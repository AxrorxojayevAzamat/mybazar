@extends('layouts.default-layout')

@section('title', 'Shops page')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/shop.css')}}">
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
                     <section>
                        <div class="h4-title shops-body">
                            <h4 class="title">Магазины</h4>
                        </div>
                        <div class="outter-list-of-shops">
                            @include('layouts.big-filter-with-listof-checkbox')

                            <div class="wrapper-filtered-items">

                                <nav class=" navbar navbar-expand-custom sort-types">

                                    <!--sort-by options  -->
                                    @include('layouts.sort-by-options')

                                    <!-- small filter without title checkbox -->
                                    @include('layouts.small-filter-without-title-checkbox')
                                </nav>

                                <!-- list mosaic catalog items -->
                                @include('layouts.shops-items')

                                <!-- pagination -->

                            </div>
                        </div>
                     </section>
                    
                     <!-- recently viewed -->
                    @include('layouts.recently-viewed')

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
