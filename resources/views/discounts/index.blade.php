@extends('layouts.app')

@section('title', trans('frontend.title.sales_page'))

@section('styles')
{{-- <link rel="stylesheet" href="{{asset('css/sales.css')}}"> --}}
@endsection

@section('body')
<!-- sales body -->
<section>
    <div class="h4-title sales-body">
        <h4 class="title">@lang('frontend.discounts')</h4>
    </div>
    <!-- full page banner -->
    <div class="sales-full-banner"></div>
    <!-- end of full page banner -->
    <div class="outter-sales">
        <div class="sales-banners">
            @foreach($discounts as $discount)
                @if ($discount->photo)
                    <div class="banner-item">
                        <a href="{{ route('discounts.show', $discount) }}"><img src="{{ $discount->photoThumbnail }}" alt=""></a>
                        <span> @lang('adminlte.date_to') {{\Carbon\Carbon::parse($discount->end_date)->format('Y-m-d')}}</span>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- PAGINATION  -->
        <nav class="products-pagination" aria-label="Page navigation example">
            <ul class="pagination">
                 {!! $discounts->links() !!}
            </ul>
        </nav>
    </div>
</section>

<!-- recently viewed -->
@include ('layouts.carousel-products',
        ['products' => $recentProducts, "title" => trans('frontend.product.you_watched'), 'rate_for' => ['js' => '"R"', 'html' => 'R']])
@endsection
