@extends('layouts.default-layout')

@section('title', 'SMS page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('body')
    @extends ('layouts.menu')
@section('page')

    <!--auth body  -->
    @include('layouts.sms-body')

@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection