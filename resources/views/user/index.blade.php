@extends('layouts.app')

@section('title', 'User Profile')

@section('breadcrumbs','')

@section('body')
<!-- body -->
<section>
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('user.edit', $user) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">Profile</h3></div>
                <div class="card-body">
                    <table class="table table-striped projects">
                        <tbody>
                            <tr>
                                <th>{{ trans('adminlte.image') }}</th>
                                <td>
                                    @if ($user->profile->avatar)
                                    <a href="{{ $user->profile->avatarOriginal }}" target="_blank"><img src="{{ $user->profile->avatarThumbnail }}"></a>
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped projects">
                        <tbody>
                            <tr>
                                <th>@lang('adminlte.first_name')</th>
                                <td>{{$user->profile->first_name}}</td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.last_name')</th>
                                <td>{{$user->profile->last_name}}</td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.birth_date')</th>
                                <td>{{$user->profile->birth_date}}</td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.gender')</th>
                                <td>
                                    @if ($user->profile->gender === \App\Entity\User\Profile::FEMALE)
                                    <span class="badge badge-danger">@lang('adminlte.female')</span>
                                    @elseif ($user->profile->gender === \App\Entity\User\Profile::MALE)
                                    <span class="badge badge-secondary">@lang('adminlte.male')</span>
                                    @elseif ($user->profile->gender === \App\Entity\User\Profile::GENDER_EMPTY)
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.address')</th>
                                <td>{{$user->profile->address}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="{{asset('js/1-index.js')}}"></script>
@endsection
