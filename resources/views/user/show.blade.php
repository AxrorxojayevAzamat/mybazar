@extends('user.main')

@section('userInform')
    @if($type == 'personal')
    @include('user.personal-info')
    @elseif($type == 'additional')
    @include('user.additional-info')
    @endif
@endsection

