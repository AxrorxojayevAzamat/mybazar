@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.marks.update', $mark) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.shop.marks._form')
    </form>
@endsection
