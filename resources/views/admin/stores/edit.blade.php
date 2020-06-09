@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.stores.update', $store) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.stores._form')
    </form>
@endsection
