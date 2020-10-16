@extends('layouts.app')

@section('title', 'Sales page')

@section('styles')
{{-- <link rel="stylesheet" href="{{asset('css/sales.css')}}"> --}}
@endsection

@section('body')
<!-- sales body -->
<section>
    <div class="h4-title sales-body">
        <h4 class="title">@lang('frontend.discounts')</h4>
    </div>
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

            <!-- full page banner -->
            <div class="sales-full-banner"></div>
            <!-- end of full page banner -->

        </div>

        <!-- PAGINATION  -->
        <nav class="products-pagination" aria-label="Page navigation example">
            <ul class="pagination">
                <!-- <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li> -->
                <li class="page-item active"><a href="#">1</a></li>
                <li class="page-item"><a href="#">2</a></li>
                <li class="page-item"><a href="#">3</a></li>
                <li class="page-item">
                    <a href="#" aria-label="Next">
                        <i class="mbnext_page"></i>
                    </a>
                </li>
                <li class="page-item"><a href="#">10</a></li>
            </ul>
        </nav>
    </div>
</section>

<!-- recently viewed -->
@include('layouts.recently-viewed')
@endsection

@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection
