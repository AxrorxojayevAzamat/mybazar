@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.discounts.update', $discount) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('partials.admin._nav')

        @include('admin.discounts._form')
    </form>
@endsection
