@extends('layouts.app')

@section('title', trans('frontend.breadcrumb.newest'))

@section('styles')
    <link rel="stylesheet" href="{{asset('css/jquery.rateyo.css')}}">
@endsection

@section('body')
    <!-- Casousel -->
    <div class="outter-catalog-view">
        <!-- big filter without title checkbox -->
        @include('filters.big-filter-without-title-checkbox')

        <div class="wrapper-filtered-items d-flex justify-content-center">

            <nav class=" navbar navbar-expand-custom sort-types">

                <!--sort-by options  -->
            @include('catalog.sort')

            <!-- small filter without title checkbox -->
                @include('layouts.small-filter-without-title-checkbox')
            </nav>

            <!-- list mosaic catalog items -->
            @include('layouts.products-list-grid', ['products' => $newProducts])

        </div>
    </div>

@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{asset('js/jquery.rateyo.js')}}"></script>
@endsection
