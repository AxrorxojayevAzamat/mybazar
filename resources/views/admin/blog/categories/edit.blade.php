@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.blog.categories.update', $category) }}">
        @csrf
        @method('PUT')

        @include('admin.blog.categories._form')
    </form>
@endsection
