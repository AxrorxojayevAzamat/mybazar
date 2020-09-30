@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.blog.posts.store') }}" enctype="multipart/form-data">
        @csrf

        @include('partials.admin._nav')

        @include('admin.blog.posts._form', ['post' => null])
    </form>
@endsection

