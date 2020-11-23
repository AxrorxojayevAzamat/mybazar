@extends('layouts.app')

@section('title', trans('frontend.breadcrumb.search'))

{{--@include ('includes.common-style')--}}

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/blog-news.css')}}"> --}}
@endsection

@section('body')

    <!-- products-brands-shops-blogs-video btn -->
    @include('layouts.products-brands-shops-videos-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-products" role="tabpanel" aria-labelledby="pills-products-tab">
            <!-- products body -->
            <div class="outter-catalog-view">
                <!-- big filter without title checkbox -->

                @include('search.sidebar', ['sidebar_is' => 'products'])

                <div class="wrapper-filtered-items">

                    <h6>
                        {!! trans('frontend.number_found_product', ['query' => session('search'), 'result' => count($products->items()), 'category' => count($categories)])  !!}
                    </h6>

                    <nav class=" navbar navbar-expand-custom sort-types">
                        <!--sort-by options  -->
                    @include('layouts.sort-by-options')

                    <!-- small filter without title checkbox -->
                        @include('filters.small-filter-with-title-checkbox')
                    </nav>

                    <!-- list mosaic catalog items -->
                @include('layouts.products-list-grid')

                <!-- pagination -->
                    @include('layouts.pagination')

                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-brands" role="tabpanel" aria-labelledby="pills-brands-tab">
            <!-- brands body -->
            <div class="outter-catalog-view">
                <!-- big filter without title checkbox -->
                @include('layouts.big-filter-without-title-checkbox')

                <div class="wrapper-filtered-items">

                    <h6>По запросу " <span class="search-tag">телевизор</span> " найдено 1114 результатов в 11
                        категориях</h6>

                    <nav class=" navbar navbar-expand-custom sort-types">

                        <!--sort-by options  -->
                    @include('layouts.sort-by-options')

                    <!-- small filter without title checkbox -->
                        @include('layouts.small-filter-without-title-checkbox')
                    </nav>

                    <!-- list mosaic catalog items -->
                    {{--                    @include('layouts.list-mosaic-catalog-items', ['products'=>$product])--}}

                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-shops" role="tabpanel" aria-labelledby="pills-shops-tab">
            <!-- shops body -->
            <div class="outter-catalog-view">
                <!-- big filter without title checkbox -->
                @include('layouts.big-filter-without-title-checkbox')

                <div class="wrapper-filtered-items">

                    <h6>По запросу " <span class="search-tag">телевизор</span> " найдено 1114 результатов в 11
                        категориях</h6>

                    <nav class=" navbar navbar-expand-custom sort-types">

                        <!--sort-by options  -->
                    @include('layouts.sort-by-options')

                    <!-- small filter without title checkbox -->
                        @include('layouts.small-filter-without-title-checkbox')
                    </nav>

                    <!-- shop items -->
                    {{--                    @include('layouts.shops-items')--}}

                </div>
            </div>

        </div>
        <div class="tab-pane fade show" id="pills-blogs" role="tabpanel" aria-labelledby="pills-blogs-tab">
            <!-- blogs body -->
            <div class="outter-catalog-view">
                <!-- big filter without title checkbox -->
                {{--                @include('layouts.big-filter-with-listof-checkbox')--}}

                <div class="wrapper-filtered-items">

                    <h6>По запросу " <span class="search-tag">телевизор</span> " найдено 1114 результатов в 11
                        категориях</h6>

                    <nav class=" navbar navbar-expand-custom sort-types">

                        <!--sort-by options  -->
                    @include('layouts.sort-by-options')

                    <!-- small filter without title checkbox -->
                        @include('layouts.small-filter-without-title-checkbox')
                    </nav>

                    <!-- blog items -->
                    {{--                    @include('layouts.blog-items',  ['categories'=>$blogs])--}}

                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab">
            <!-- videos body -->
            <div class="outter-catalog-view">
                <!-- big filter without title checkbox -->
                @include('layouts.big-filter-without-title-checkbox')

                <div class="wrapper-filtered-items">

                    <h6>По запросу " <span class="search-tag">телевизор</span> " найдено 1114 результатов в 11
                        категориях</h6>

                    <nav class=" navbar navbar-expand-custom sort-types">

                        <!--sort-by options  -->
                    @include('layouts.sort-by-options')

                    <!-- small filter without title checkbox -->
                        @include('layouts.small-filter-without-title-checkbox')
                    </nav>

                    <!-- list of videos -->


                </div>
            </div>
        </div>
    <div>

            <!-- NEWS LETTER -->
            {{--    @include ('layouts.news-letter')--}}

            @endsection

            @section('script')
                @include('catalog._scripts')
                <script src="{{mix('js/1-index.js', 'build')}}"></script>
                <script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>
                <script src="{{asset('js/jquery.rateyo.js')}}"></script>
@endsection
