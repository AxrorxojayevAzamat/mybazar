<div id="personalInfo">
    <button class="btn edit-personal-information"
            onclick="personalInform()">@lang('adminlte.change_personal_info')</button>
    <div class="row" id="personalView">
        <div class="col-3 d-flex flex-column">
            <p class="sub-title">@lang('adminlte.last_name'):</p>
            <p class="sub-title">@lang('adminlte.first_name'):</p>
            <p class="sub-title">@lang('adminlte.gender'):</p>
            <p class="sub-title">@lang('adminlte.birth_date'):</p>
            <p class="sub-title">@lang('adminlte.phone'):</p>
            <p class="sub-title">@lang('adminlte.email'):</p>
        </div>
        <div class="col-9 d-flex flex-column">
            <span>{{ $user->profile->last_name ?? trans('adminlte.no') }}</span>
            <span>{{ $user->profile->first_name ?? trans('adminlte.no') }}</span>
            @if ($user->profile->gender === \App\Entity\User\Profile::FEMALE)
                <span>@lang('adminlte.female')</span>
            @elseif ($user->profile->gender === \App\Entity\User\Profile::MALE)
                <span>@lang('adminlte.male')</span>
            @else
                <span>@lang('adminlte.no')</span>
            @endif
            <span>{{ $user->profile->birth_date ?? trans('adminlte.no') }}</span>
            <span>{{ $user->phone ?? trans('adminlte.no') }}</span>
            <span>{{ $user->email ?? trans('adminlte.no') }}</span>
        </div>
    </div>

    <!-- edit profile info -->
    <div class="edit-profile-info d-none" id="personalEdit">
        <form action="{{ route('profile.add-inform') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-5 d-flex flex-column">
                    {!! Form::label('last_name', trans('adminlte.last_name'), ['class' => 'last-name']); !!}
                    <div class="input">
                        {!! Form::text('last_name', old('last_name', $user->profile ? $user->profile->last_name : null), ['class'=>'form-control bordered-input' . ($errors->has('last_name') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('last_name'))
                            <span
                                class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
                        @endif
                    </div>

                    {!! Form::label('first_name', trans('adminlte.first_name'), ['class' => 'first-name']); !!}
                    <div class="input">
                        {!! Form::text('first_name', old('first_name', $user->profile ? $user->profile->first_name : null), ['class'=>'form-control bordered-input' . ($errors->has('first_name') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('first_name'))
                            <span
                                class="invalid-feedback"><strong>{{ $errors->first('first_name') }}</strong></span>
                        @endif
                    </div>

                    {!! Form::label('gender', trans('adminlte.gender'), ['class' => 'gender']); !!}
                    {!! Form::select('gender', $genders, old('gender', $user ? ($user->profile ? $user->profile->gender : null) : null), ['class'=>'form-select' . ($errors->has('gender') ? ' is-invalid' : ''),'id' => 'gender']) !!}

                </div>
                <div class="col-5 d-flex flex-column">

                    {!! Form::label('birth_date', trans('adminlte.birth_date') , ['class' => 'col-form-label']); !!}
                    <div class="input">
                        {!! Form::date('birth_date', old('birth_date', $user ? ($user->profile ? $user->profile->birth_date : null) : null), ['class'=>'form-control' . ($errors->has('birth_date') ? ' is-invalid' : '') ]) !!}
                        @if ($errors->has('birth_date'))
                            <span
                                class="invalid-feedback"><strong>{{ $errors->first('birth_date') }}</strong></span>
                        @endif
                    </div>
                    <a href="{{ route('profile.add-phone-show') }}"
                       class="btn btn-primary mr-1">{{ trans('frontend.change_phone') }}</a>
                    <br>
                    <a href="{{ route('profile.add-email-show') }}"
                       class="btn btn-primary mr-1">{{ trans('frontend.change_email') }}</a>
                    <br>
                    <a href="{{ route('profile.change-password') }}"
                       class="btn btn-primary mr-1">{{ trans('menu.change_password') }}</a>
                    <br>
                </div>
            </div>
            <input type="submit" value="{{ trans('adminlte.save') }}" id="submit">
        </form>
    </div>

</div>
