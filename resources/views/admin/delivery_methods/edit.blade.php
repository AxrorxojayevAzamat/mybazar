@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.deliveries.update', $delivery) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('partials.admin._nav')

        @include('admin.delivery_methods._form')
    </form>
@endsection
