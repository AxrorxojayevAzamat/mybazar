@extends('layouts.admin.page')

@section('content')
<form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @include('admin.users._form')
</form>
@endsection