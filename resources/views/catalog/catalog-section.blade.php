@extends('layouts.app')

@section('title', trans('frontend.title.catalog_section_page'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/catalog-page.css')}}"> --}}
@endsection

@section('body')
    @section('banner')
        @include ('layouts.slide-banner-catalog')
    @endsection

    <section>
        <div class="h4-title catalog-section">
            <h4 class="title">@lang('menu.whole_catalog')</h4>

        </div>

        <div class="outter-catalog-view">
            <div class="wrapper-filtered-items">
                <nav class=" navbar navbar-expand-custom sort-types">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span>     -->
                        <i class="navbar-toggler-icon mbcompare"></i>
                    </button>
                </nav>

                <!-- catalog section-items -->
                @include('catalog.catalog-section-items')
            </div>
        </div>
    </section>

    <!-- TOP BRANDS  -->
{{--    @include ('layouts.top-brands')--}}

    <!-- shops -->
{{--    <section class="catalog-section-shop">--}}
{{--        @include ('shop.shops2')--}}
{{--    </section>--}}

    <!-- TOP sales  -->
{{--    @include ('layouts.top-sales')--}}
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>
@endsection
