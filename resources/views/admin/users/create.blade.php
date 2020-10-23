@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.users._form', ['user' => null])
    </form>
@endsection