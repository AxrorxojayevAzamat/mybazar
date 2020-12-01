@extends('layouts.app')

@section('body')

<div class="d-flex flex-row mb-3">
    <a href="{{ route('user.setting', $user) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
    @if (!$user->email || !$user->isEmailVerified())
        <a href="{{ route('profile.add-email-show') }}" class="btn btn-primary mr-1">{{ trans('auth.add_email') }}</a>
    @endif
    @if (!$user->phone || !$user->isPhoneVerified())
        <a href="{{ route('profile.add-phone-show') }}" class="btn btn-primary mr-1">{{ trans('auth.add_phone') }}</a>
    @endif
    @if (!$user->isManagerRoleRequested() && !$user->isManager())
        <form method="POST" action="{{ route('profile.manager.request', $user) }}" class="mr-1">
            @csrf
            <button class="btn btn-success" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('frontend.manager.request_manager_role')</button>
        </form>
    @endif
    @if (!$user->isNetworkExists('facebook'))
        <a href="{{ route('login.network', ['network' => 'facebook']) }}" class="btn btn-primary mr-1"><i class="fa fa-facebook-square"></i>Facebook</a>
    @endif
    @if (!$user->isNetworkExists('google'))
        <a href="{{ route('login.network', ['network' => 'google']) }}" class="btn btn-primary mr-1"><i class="fa fa-facebook-square"></i>Google</a>
    @endif
    @if (!$user->isNetworkExists('telegram'))
        <a href="{{ route('login.network', ['network' => 'telegram']) }}" class="btn btn-primary mr-1"><i class="fa fa-facebook-square"></i>Telegram</a>
    @endif
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
                            <th>{{ trans('adminlte.email') }}</th><td>{{ $user->email }} <a href="{{ route('profile.add-email-show') }}" class="btn btn-primary mr-1">{{ trans('frontend.change_email') }}</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.phone') }}</th><td>{{ $user->phone }} <a href="{{ route('profile.add-phone-show') }}" class="btn btn-primary mr-1">{{ trans('frontend.change_phone') }}</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.user.role') }}</th><td>{{ $user->roleName() }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.status') }}</th>
                            <td>
                                @if ($user->status === \App\Entity\User\User::STATUS_WAIT)
                                <span class="badge badge-secondary">@lang('adminlte.user.waiting')</span>
                                @endif
                                @if ($user->status === \App\Entity\User\User::STATUS_ACTIVE)
                                <span class="badge badge-primary">@lang('adminlte.user.active')</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('frontend.social_networks')</th>
                            <td>
                                @if ($user->isNetworkExists('facebook'))
                                    <i class="fa fa-facebook-square"></i>Facebook
                                @endif
                                @if ($user->isNetworkExists('google'))
                                    <i class="fa fa-google-plus-square"></i>Google
                                @endif
                                @if ($user->isNetworkExists('telegram'))
                                    <i class="fa fa-telegram-plane"></i>Telegram
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
