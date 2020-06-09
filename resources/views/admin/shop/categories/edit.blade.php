@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.categories.update', $category) }}">
        @csrf
        @method('PUT')

        @include('admin.shop.categories._nav')

        @include('admin.shop.categories._form')
    </form>
@endsection
