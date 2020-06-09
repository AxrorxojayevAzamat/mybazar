@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.stores.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.stores._form', ['store' => null])
    </form>
@endsection
