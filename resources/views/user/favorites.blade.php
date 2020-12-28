@extends('layouts.app')

@section('title', trans('frontend.title.favorites_page'))


@section('styles')
{{-- <link rel="stylesheet" href="{{asset('css/favorites.css')}}"> --}}
@endsection

@section('body')
<!-- favorities VIEW -->
<section>
    <div class="h4-title catalog-view">
        <h4 class="title">@lang('frontend.breadcrumb.favorites')</h4>
    </div>
    <div class="outter-catalog-view">
        <!-- big filter without title checkbox -->
        <form class="big-filter-without-title-checkbox" id="shop-filter-form">
            @include('filters.category-blog-filter')
        </form>


        <div class="wrapper-filtered-items">

            <nav class=" navbar navbar-expand-custom sort-types">

                <!--sort-by options  -->
                @include('layouts.sort-by-options')

                <!-- small filter without title checkbox -->
                @include('layouts.small-filter-without-title-checkbox')
            </nav>

            <!-- list mosaic catalog items -->
             @include('layouts.products-list-grid')

            <!-- pagination -->
            <nav class="products-pagination" aria-label="Page navigation example">
                <ul class="pagination">
                    {!! $products->links() !!}
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ mix('js/1-index.js', 'build') }}"></script>
<script src="{{ mix('js/2-catalog-page.js', 'build') }}"></script>
@endsection
