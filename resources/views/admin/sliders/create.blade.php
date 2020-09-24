@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.sliders._form', ['slider' => null])
    </form>
@endsection

