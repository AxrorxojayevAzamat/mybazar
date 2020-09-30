@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.banners.update', $banner) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('partials.admin._nav')

        @include('admin.banners._form')
    </form>
@endsection
