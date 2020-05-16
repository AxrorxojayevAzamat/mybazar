@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.products.modifications.store', $product) }}" enctype="multipart/form-data">
        @csrf

        @include('admin.shop.products.modifications._form', ['modification' => null])
    </form>
@endsection
