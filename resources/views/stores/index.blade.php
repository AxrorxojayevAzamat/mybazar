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

