@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.products.values.store', $product) }}" enctype="multipart/form-data">
        @csrf

        @include('admin.shop.products.values._form', ['value' => null, 'characteristic' => null])
    </form>
@endsection
