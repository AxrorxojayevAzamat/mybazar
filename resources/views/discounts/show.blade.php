@extends('layouts.app')

@section('title', 'Sales view')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/sales.css')}}"> --}}
@endsection

@section('body')
@section('banner')
    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')
@endsection
<!-- sales body -->
<section>
    <div class="h4-title sales-body">
        <h4 class="title">@lang('frontend.discounts')</h4>
    </div>
    <div class="outter-salesview-body">
        <div class="shop-name">
            <img src="{{ $discount->photoThumbnail }}" alt="">
            <div class="name">
                <h6>{!! $discount->name !!}</h6>
                <p>{!! $discount->maincategory->name !!}</p>
            </div>
        </div>
        <div class="sales-view-body">
            <img class="full-width" src="{{ $discount->photoOriginal }}" alt="">
            <div class="description">
                {!! $discount->description !!}
            </div>
            @include ('discounts.discount-products',
         ['products' => $product, 'rate_for' => ['js' => '"R"', 'html' => 'R']])
        </div>
    </div>
</section>
<nav class="products-pagination" aria-label="Page navigation example">
    <ul class="pagination">
        {!! $product->links() !!}
    </ul>
</nav>
@endsection
@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
