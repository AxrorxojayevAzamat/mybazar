@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.discounts.store') }}" enctype="multipart/form-data">
        @csrf

        @include('partials.admin._nav')

        @include('admin.discounts._form', ['discount' => null])
    </form>
@endsection
