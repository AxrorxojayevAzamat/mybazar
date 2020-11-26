@extends('layouts.app')

@section('title', 'Auth page')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/auth.css')}}"> --}}
@endsection

@section('body')
    <h1>hello</h1>

@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
