@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.modifications.update', ['product' => $product, 'modification' => $modification]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.shop.modifications._form')
    </form>
@endsection
