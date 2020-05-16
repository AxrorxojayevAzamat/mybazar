@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.characteristics.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.shop.characteristics._form', ['characteristic' => null])
    </form>
@endsection
