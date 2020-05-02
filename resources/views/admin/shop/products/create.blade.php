@extends('layouts.page')

@section('content')
    {!! Form::open(['url' => route('admin.shop.products.store'), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
        @csrf

        @include('admin.shop.products._nav')

        @include('admin.shop.products._form', ['product' => null])
    {!! Form::close() !!}
@endsection
