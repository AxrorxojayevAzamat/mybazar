@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.sliders.update', $slider) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.sliders._form')
    </form>
@endsection
