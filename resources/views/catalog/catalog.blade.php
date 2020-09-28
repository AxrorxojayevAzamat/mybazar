@extends('layouts.app')

@section('title', 'Catalog page')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/catalog-page.css')}}">
@endsection

@section('body')
    @section('banner')
        <!-- Slide banner -->
        @include ('layouts.slide-banner-catalog')
    @endsection

        <!-- CATALOG VIEW -->
    <section>
        <div class="h4-title catalog-view">
            <h4 class="title">{{ $category->name }}</h4>
        </div>
        <div class="outter-catalog-view">

            <!-- big filter without title checkbox -->
            @include('catalog.big-filter-without-title-checkbox')

            <div class="wrapper-filtered-items">
                <nav class=" navbar navbar-expand-custom sort-types">
                    @include('layouts.sort-by-options')

                    @include('catalog.small-filter-without-title-checkbox')
                </nav>

                @include('layouts.list-mosaic-catalog-items')

                @include('layouts.pagination')

            </div>
        </div>
    </section>
@endsection

@include('catalog._scripts')
