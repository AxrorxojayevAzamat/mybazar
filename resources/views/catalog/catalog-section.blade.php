@extends('layouts.default-layout')

@section('title', 'Catalog section page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/catalog-page.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')

@section('banner')
     <!-- Slide banner -->
     @include ('layouts.slide-banner-catalog')
@endsection
    <!-- body part -->
    <section>
        <div class="h4-title catalog-section">
            <h4 class="title">Телевизоры, аудио и видео</h4>
        </div>
        <div class="outter-catalog-view">
            <!-- big filter without title checkbox -->
            @include('filters.big-filter-without-title-checkbox')

            <div class="wrapper-filtered-items">

                <nav class=" navbar navbar-expand-custom sort-types">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span>     -->
                    <i class="navbar-toggler-icon mbcompare"></i>
                    </button>

                    <!-- small filter without title checkbox -->
                    @include('filters.small-filter-without-title-checkbox')
                </nav>

                <!-- catalog section-items -->
                @include('catalog.catalog-section-items', ['rootCategories'])
              
            </div>
        </div>
    </section>

    <!-- TOP BRANDS  -->
    @include ('layouts.top-brands')

    <!-- shops -->
    <section class="catalog-section-shop">
        @include ('shop.shops2')
    </section>

    <!-- TOP sales  -->
    @include ('layouts.top-sales')


@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
<script src="{{asset('js/2-catalog-page.js')}}"></script>

@endsection