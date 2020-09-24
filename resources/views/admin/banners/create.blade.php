@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data">
        @csrf

        @include('partials.admin._nav')

        @include('admin.banners._form', ['banner' => null])
    </form>
@endsection

