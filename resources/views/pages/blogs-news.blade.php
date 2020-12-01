@extends('layouts.default-layout')

@section('title', trans('frontend.title.news_page'))
@include ('includes.common-style')
@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/blog-news.css')}}"> --}}
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
    @include('layouts.breadcrumb-blog')

    <!-- blog-news btn -->
    @include('layouts.blog-news-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab">

            <div class="outter-list-of-blogs">
                <!-- big filter without title checkbox -->
                @include('layouts.big-filter-with-listof-checkbox')
                <div class="wrapper-filtered-items">
                    <nav class=" navbar navbar-expand-custom sort-types">

                        <!--sort-by options  -->
                        @include('layouts.sort-by-options')

                        <!-- small filter without title checkbox -->
                        @include('layouts.big-filter-with-listof-checkbox')
                    </nav>

                    <!-- blog-items -->
                    @include('layouts.blog-items', ['categories'=>$blogs])

                     <!-- pagination -->
                     @include('layouts.pagination')

                </div>
            </div>
        </div>

        <div class="tab-pane fade show" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
            <!-- blog body -->

        </div>
    <div>
    <!-- recently watched -->
    @include('layouts.recently-viewed')

     <!-- NEWS LETTER -->
     @include ('layouts.news-letter')

<!-- FOOTER -->
@include ('layouts.footer')
@endsection
@endsection


@section('script')
            <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
