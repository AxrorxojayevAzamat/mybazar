@extends('layouts.default-layout')

@section('title', 'Auth page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')
    
    <!--auth body  -->
    @include('pages.auth-body')

@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection