@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.categories.store') }}">
        @csrf

        @include('admin.shop.categories._nav')

        @include('admin.shop.categories._form', ['category' => null])
    </form>
@endsection
