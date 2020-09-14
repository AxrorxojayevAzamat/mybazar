@extends('layouts.default-layout')

@section('title', 'SMS page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')

    <!--auth body  -->
    @include('pages.sms-body')

@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection