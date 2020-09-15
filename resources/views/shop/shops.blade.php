@extends('layouts.default-layout')

@section('title', 'Shops page')   
@include ('includes.common-style')
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    @endsection
        @section('body')
            @extends ('partials.menu')
                @section('page')

                    @section('banner')
                        <!-- Slide banner -->
                        @include ('layouts.slide-banner-catalog')
                    @endsection
                        
                     <!-- SHOPS body  -->
                     <section>
                        <div class="h4-title shops-body">
                            <h4 class="title">Магазины</h4>
                        </div>
                        <div class="outter-list-of-shops">
                            @include('filters.big-filter-with-listof-checkbox')

                            <div class="wrapper-filtered-items">

                                <nav class=" navbar navbar-expand-custom sort-types">

                                    <!--sort-by options  -->
                                    @include('layouts.sort-by-options')

                                    <!-- small filter without title checkbox -->
                                    @include('filters.small-filter-without-title-checkbox')
                                </nav>

                                <!-- list mosaic catalog items -->
                                @include('shop.shops-items')

                                <!-- pagination -->

                            </div>
                        </div>
                     </section>
                    
                     <!-- recently viewed -->
                    @include('layouts.recently-viewed')

                @endsection

        @endsection

        @section('script')
        <script src="{{asset('js/1-index.js')}}"></script>
        <script src="{{asset('js/3-popular-page.js')}}"></script>
        @endsection
