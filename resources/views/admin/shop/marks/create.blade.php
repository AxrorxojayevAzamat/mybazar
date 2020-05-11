@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.marks.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.shop.marks._form', ['mark' => null])
    </form>
@endsection
