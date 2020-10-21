@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.shop.characteristic-groups.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.shop.characteristic_groups._form', ['group' => null])
    </form>
@endsection
