@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.blog.categories.store') }}">
        @csrf

        @include('admin.blog.categories._form', ['category' => null])
    </form>
@endsection
