@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.brands._form', ['brand' => null])
    </form>
@endsection
