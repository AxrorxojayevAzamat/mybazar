@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.deliveries.store') }}" enctype="multipart/form-data">
        @csrf

        @include('partials.admin._nav')

        @include('admin.delivery_methods._form', ['delivery' => null])
    </form>
@endsection
