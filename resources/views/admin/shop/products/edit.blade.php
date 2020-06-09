@extends('layouts.admin.page')

@section('content')
    {!! Form::open(['url' => route('admin.shop.products.update', $product), 'method' => 'POST']) !!}
        @csrf
        @method('PUT')

        @include('partials.admin._nav')

        @include('admin.shop.products._form')
    {!! Form::close() !!}
@endsection
