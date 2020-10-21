@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.characteristic-groups.update', $group) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.shop.characteristic_groups._form')
    </form>
@endsection
