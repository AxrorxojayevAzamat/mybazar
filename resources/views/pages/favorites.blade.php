@extends('layouts.default-layout')

@section('title', 'Favorites page')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/favorites.css')}}">
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

                    <!-- Breadcrumbs -->
                    @include ('layouts.breadcrumb-favorites')

                    <!-- favorities VIEW -->
                    <section>
                        <div class="h4-title catalog-view">
                            <h4 class="title">Избранное</h4>
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
                                @include('layouts.favorite-items')

                                <!-- pagination -->

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
            <script src="{{asset('js/1-index.js')}}"></script>
            <script src="{{asset('js/2-catalog-page.js')}}"></script>
        
        @endsection