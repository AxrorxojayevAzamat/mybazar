@extends('layouts.app')

@section('title', 'Productviewpage characteristics')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/productviewpage.css')}}"> --}}
@endsection

@section('body')
    <!-- product with description -->
    @include('products.single-product-with-des')

    <!-- similar products -->
    @include('products.similar-products')

    <!-- other products of this seller -->
    @include('products.other-products-of-this-seller')

    @include('products.singlep-charac-com-btn')
    <!-- single-charachteristics-comments btn-->

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-about-product" role="tabpanel" aria-labelledby="pills-about-product-tab">
            <!-- about product -->
            @include('products.full-des-of-singlep')
        </div>
        <div class="tab-pane fade" id="pills-characteristics" role="tabpanel" aria-labelledby="pills-characteristics-tab">
            <!-- full characteristics of single products -->
            @include('products.full-characteristics-singlep')
        </div>
        <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
            <!-- full comments -->
            @include('products.full-comments-singlep')
        </div>
    </div>

    <!-- u will also like -->
    @include('products.u-will-also-like')

    <!-- recently viewed -->
    @include('layouts.recently-viewed')
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>
@endsection


