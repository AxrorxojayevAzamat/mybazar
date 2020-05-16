@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.characteristics.update', $characteristic) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.shop.characteristics._form')
    </form>
@endsection
