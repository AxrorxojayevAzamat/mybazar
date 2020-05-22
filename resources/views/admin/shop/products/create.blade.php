@extends('layouts.page')

@section('content')
    {!! Form::open(['url' => route('admin.shop.products.store'), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
        @csrf

        @include('partials._nav')

        @include('admin.shop.products._form', ['product' => null])
    {!! Form::close() !!}
@endsection
