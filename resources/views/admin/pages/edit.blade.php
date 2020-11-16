@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.pages.update', $page) }}"{{-- enctype="multipart/form-data"--}}>
        @csrf
        @method('PUT')

        @include('partials.admin._nav')

        @include('admin.pages._form')
    </form>
@endsection
