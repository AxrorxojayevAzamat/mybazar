@extends('layouts.admin.page')

@section('content')

<div class="d-flex flex-row mb-3">
    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
    @if ($user->isManagerRoleRequested())
        <form method="POST" action="{{ route('admin.users.request.manager-role.approve', $user) }}" class="mr-1">
            @csrf
            <button class="btn btn-success" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('frontend.manager.approve')</button>
        </form>
    @endif
    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mr-1">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
    </form>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>ID</th><td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.user.name') }}</th><td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.email') }}</th><td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.user.role') }}</th><td>{{ $user->roleName() }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.status') }}</th>
                            <td>
                                @if ($user->status === \App\Entity\User\User::STATUS_WAIT)
                                <span class="badge badge-secondary">Waiting</span>
                                @endif
                                @if ($user->status === \App\Entity\User\User::STATUS_ACTIVE)
                                <span class="badge badge-primary">Active</span>
                                @endif
                            </td>
                        </tr>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@if ($user->profile)
<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">Profile</h3></div>
            <div class="card-body">
                <table class="table {{--table-bordered--}} table-striped projects">
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
@endif

@endsection
