<div class="all-information" id="additionalInfo">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-personal-info-tab" data-toggle="pill"
               href="#pills-personal" role="tab" aria-controls="pills-home"
               aria-selected="true">@lang('adminlte.personal_info')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-pasport-info-tab" data-toggle="pill" href="#pills-pasport"
               role="tab" aria-controls="pills-profile"
               aria-selected="false">@lang('adminlte.passport_info')</a>
        </li>
        {{--                            <li class="nav-item">--}}
        {{--                                <a class="nav-link" id="pills-card-info-tab" data-toggle="pill" href="#pills-card"--}}
        {{--                                   role="tab" aria-controls="pills-contact"--}}
        {{--                                   aria-selected="false">@lang('adminlte.cart_info')</a>--}}
        {{--                            </li>--}}
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <!-- personal information -->
        <div class="tab-pane fade show active" id="pills-personal" role="tabpanel"
             aria-labelledby="pills-personal-info-tab">
            <button class="btn edit-personal-information"
                    onclick="additionalInform()">@lang('adminlte.change_additional_info')</button>
            <div class="row" id="additionalView">
                <div class="col-4 d-flex flex-column">
                    <p class="sub-title">@lang('adminlte.region'):</p>
                    <p class="sub-title">@lang('adminlte.address'):</p>
                    {{--                                                <p class="sub-title">Город:</p>--}}
                    {{--                                                <p class="sub-title">Район:</p>--}}
                    {{--                                                <p class="sub-title">Улица:</p>--}}
                    {{--                                                <p class="sub-title">Дом/квЖ:</p>--}}
                </div>
                <div class="col-8 d-flex flex-column">
                    <span>{{ $user->profile->getRegionName($user->profile->region) ?? trans('adminlte.no') }}</span>
                    <span>{{ $user->profile->address ?? trans('adminlte.no') }}</span>
                    {{--                                                <span>г. Ташкент</span>--}}
                    {{--                                                <span>Юнусабадский</span>--}}
                    {{--                                                <span>Амир Темур</span>--}}
                    {{--                                                <span>дом 5, кв 42</span>--}}
                </div>
            </div>

            <div class="edit-profile-info d-none" id="additionalEdit">
                <form action="{{ route('profile.add-inform') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-5 d-flex flex-column">
                            {!! Form::label('address', trans('adminlte.address'), ['class' => 'address']); !!}
                            <div class="input">
                                {!! Form::text('address', old('address', $user->profile ? $user->profile->address : null), ['class'=>'form-control bordered-input' . ($errors->has('address') ? ' is-invalid' : ''), 'required' => true]) !!}
                                @if ($errors->has('address'))
                                    <span
                                        class="invalid-feedback"><strong>{{ $errors->first('address') }}</strong></span>
                                @endif
                            </div>

                            {!! Form::label('region', trans('adminlte.region'), ['class' => 'region']); !!}
                            {!! Form::select('region', $regions, old('region', $user->profile ? ($user->profile ? $user->profile->region : null) : null), ['class'=>'form-select' . ($errors->has('region') ? ' is-invalid' : ''),'id' => 'region' ]) !!}

                        </div>
                    </div>
                    <input type="submit" value="{{ trans('adminlte.save') }}" id="submit">
                </form>
            </div>

        </div>
        <!-- pasport information -->
        <div class="tab-pane fade" id="pills-pasport" role="tabpanel"
             aria-labelledby="pills-pasport-info-tab">
            <h6 class="title">@lang('adminlte.verify_identity')</h6>
            <p>@lang('adminlte.for_necessary_passport')</p>
            <br>
            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <article>
                    <p>@lang('adminlte.foto_with_registration') </p>
                    @if(!empty($user->profile->passport))
                        <img src="{{ $user->profile->passportThumbnail }}" alt="">
                    @endif
                    <div class="upload-file">
                        <label for="files1">
                            <p>@lang('adminlte.pres_for_upload')</p>
                        </label>
                        <input id="files1" type="file" name="avatar" multiple/>
                    </div>
                    <output id="result1"/>
                </article>
                <article>
                    <p>@lang('adminlte.upload_avatar') </p>
                    @if(!empty($user->profile->avatar))
                        <img src="{{ $user->profile->avatarThumbnail }}" alt="">
                    @endif
                    <div class="upload-file">
                        <label for="files2">
                            <p>@lang('adminlte.pres_for_upload')</p>
                        </label>
                        <input id="files2" type="file" name="passport" multiple/>
                    </div>
                    <output id="result2"/>
                </article>
                <input type="submit" value="{{ trans('adminlte.save') }}" id="submit">
            </form>
            <br>
        </div>
        <!-- card information -->
        {{--                            <div class="tab-pane fade" id="pills-card" role="tabpanel"--}}
        {{--                                 aria-labelledby="pills-card-info-tab">--}}
        {{--                                <button class="btn add-card">Добавить карту</button>--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-4 d-flex flex-column">--}}
        {{--                                        <p class="sub-title">Тип карты:</p>--}}
        {{--                                        <p class="sub-title">Номер карты:</p>--}}
        {{--                                        <p class="sub-title">Срок действия:</p>--}}
        {{--                                        <p class="sub-title">Банк:</p>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-8 d-flex flex-column">--}}
        {{--                                        <span>UZCARD</span>--}}
        {{--                                        <span>8600 0123 4567 8901</span>--}}
        {{--                                        <span>06/24</span>--}}
        {{--                                        <span>Aloqa Bank</span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <button class="btn remove-card">Удалить карту</button>--}}
        {{--                            </div>--}}
    </div>
</div>
