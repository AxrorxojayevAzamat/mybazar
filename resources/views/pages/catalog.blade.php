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
                    <section>
                        <div class="h4-title catalog-view">
                            <h4 class="title">Телевизоры</h4>
                        </div>
                        <div class="outter-catalog-view">
                            <!-- big filter without title checkbox -->
                            @include('layouts.big-filter-with-title-checkbox')

                            <div class="wrapper-filtered-items">

                                <nav class=" navbar navbar-expand-custom sort-types">

                                    <!--sort-by options  -->
                                    @include('layouts.sort-by-options')
                                    
                                    <!-- small filter without title checkbox -->
                                    @include('layouts.small-filter-without-title-checkbox')
                                </nav>

                                <!-- list mosaic catalog items -->
                                @include('layouts.list-mosaic-catalog-items', ['products'=>$product])

                                <!-- pagination -->
                                @include('layouts.pagination')
                                
                            </div>
                        </div>
                    </section>

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