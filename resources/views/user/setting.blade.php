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
                                <th>@lang('adminlte.password')</th>
                                <td>

                                    <form class="body">
                                        @csrf
                                    <div class="form-group">
                                        {!! Form::label('current-password', 'Current Password' , ['class' => 'col-form-label']); !!}
                                        {!! Form::password('current-password', ['id' => 'currentPassword','class'=>'form-control' . ($errors->has('current-password') ? ' is-invalid' : ''), 'required' => true]) !!}
                                        @if ($errors->has('current-password'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('current-password') }}</strong></span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('new-password', 'New Password' , ['class' => 'col-form-label']); !!}
                                        {!! Form::password('new-password', ['id' => 'newPassword','class'=>'form-control' . ($errors->has('new-password') ? ' is-invalid' : ''), 'required' => true]) !!}
                                        @if ($errors->has('new-password'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('new-password') }}</strong></span>
                                        @endif
                                    </div>

                                    <button id="changePassword" type="button" class="btn btn-sm btn-success">change paasword</button>
</form>
                                </td>
                            </tr>

                            <tr>
                                <th>@lang('adminlte.user.name')</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.email')</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>@lang('adminlte.phone')</th><td>
                                    @if ($user->phone)
                                    {{ $user->phone }}
                                    @if (!$user->isPhoneVerified())
                                    <i>(is not verified)</i><br />
                                    <form method="POST" action="{{ route('user.phone') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Verify</button>
                                    </form>
                                    @endif
                                    @endif
                                </td>
                            </tr>

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
@section('js')
<script src="{{asset('js/1-index.js')}}"></script>
<script>

//////////// changePassword Auth User
    $(document).ready(function () {
        
        $('#changePassword').on('click', function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            let currentPassword = $('#currentPassword').val();
            let newPassword = $('#newPassword').val();
            $.ajax({
                url: '/change-password',
                type: 'POST',
                data: {
                    current_password: currentPassword,
                    new_password: newPassword
                },
                dataType: 'json',

                    
                success: function (data) {
                    console.log(data)
                }
                    });
            });
        });


</script>

@endsection
