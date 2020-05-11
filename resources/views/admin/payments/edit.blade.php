@extends('layouts.page')

@section('content')
    <form method="POST" action="{{ route('admin.payments.update', $payment) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.payments._form')
    </form>
@endsection
