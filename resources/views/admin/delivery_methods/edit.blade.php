@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.deliveries.update', $delivery) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('partials._nav')

        @include('admin.delivery_methods._form')
    </form>
@endsection
