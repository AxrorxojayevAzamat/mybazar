@extends('layouts.app')
@section('title')
    {{ trans('frontend.breadcrumb.shops') }}
@endsection
@section('body')
@section('banner')
    "bannner"
@endsection

<div class="container">
    <div class="row">
        <form id="search-bar" class="search-bar form-control" method="get" >
            <div class="input-with-tags">
                <input id="search-input" class="main-search-bordered-input" type="text"
                       placeholder="{{ trans('frontend.search_placeholder') }}" do-not-use-data-role="tagsinput" name="shopName">
            </div>
            <button class="search btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="col-sm-3">
            @include('stores.categories')
        </div>
        <div class="col-sm-9">
            <div class="outter-shops">
                <div class="all-shops">
                    @include('stores.storesList')
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

