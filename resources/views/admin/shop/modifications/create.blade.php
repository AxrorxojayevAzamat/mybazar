@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.modifications.store', $product) }}" enctype="multipart/form-data">
        @csrf

        @include('admin.shop.modifications._form', ['modification' => null])
    </form>
@endsection
