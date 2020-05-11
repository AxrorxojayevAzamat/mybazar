@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.payments.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.payments._form', ['payment' => null])
    </form>
@endsection
