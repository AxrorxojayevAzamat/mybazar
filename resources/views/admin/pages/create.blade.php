@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.pages.store') }}"{{-- enctype="multipart/form-data"--}}>
        @csrf

        @include('partials.admin._nav')

        @include('admin.pages._form', ['page' => null])
    </form>
@endsection

