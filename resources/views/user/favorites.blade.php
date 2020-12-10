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
        <ul class="list-group">
            @foreach($categorys as $category)
                <li class="list-group-item"><a href="?categoryId={{ $category->id }}">{!! $category->name !!}</a></li>
            @endforeach
        </ul>


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
<script src="{{mix('js/1-index.js', 'build')}}"></script>
<script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>
@endsection
