@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.blog.posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('partials.admin._nav')

        @include('admin.blog.posts._form')
    </form>
@endsection
