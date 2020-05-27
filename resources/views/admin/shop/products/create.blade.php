@extends('layouts.admin.page')

@section('content')
    {!! Form::open(['url' => route('admin.shop.products.store'), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
        @csrf

        @include('partials.admin._nav')

        @include('admin.shop.products._form', ['product' => null])
    {!! Form::close() !!}
@endsection
