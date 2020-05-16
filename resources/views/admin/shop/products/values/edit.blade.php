@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.products.values.update', ['product' => $product, 'characteristic' => $characteristic]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.shop.products.values._form')
    </form>
@endsection
