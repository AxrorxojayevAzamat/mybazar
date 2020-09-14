@extends('layouts.default-layout')

@section('title', 'Compare page')
@include ('includes.common-style')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/compare.css')}}">
@endsection

@section('body')
    @extends ('partials.menu')
@section('page')

    <!-- compare body -->
    @include('compare.compare-body')

@endsection
@endsection


@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection