@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.brands.update', $brand) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.brands._form')
    </form>
@endsection
