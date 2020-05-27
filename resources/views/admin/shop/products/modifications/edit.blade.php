@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.products.modifications.update', ['product' => $product, 'modification' => $modification]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.shop.products.modifications._form')
    </form>
@endsection
