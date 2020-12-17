@extends('layouts.app')

@section('body')

    <section>
        <div class="h4-title profile">
            <h4 class="title">Персональный кабинет</h4>
        </div>
    </section>
    <div class="outter-profile container-fluid">
        <div class="d-flex flex-row inner-profile">
            <div class="col-3 justify-content-start side-menu">
                <ul>
                    <li onclick="personalShow()"><a href="#profile-info">
                            <i class="mbwear"></i>
                            Персональные данные
                        </a>
                    </li>
                    <li onclick="additionalShow()"><a href="#">
                            <i class="mbedit"></i>
                            Личные данные
                        </a>
                    </li>
                    <li><a href="#">
                            <i class="mbbox"></i>
                            {{ trans('menu.orders') }}
                        </a>
                    </li>
                    <li><a href="{{ route('cart') }}">
                            <i class="mbcart"></i>
                            {{ trans('frontend.cart.cart') }}
                        </a>
                    </li>
                    <li><a href="{{ route('user.favorites') }}">
                            <i class="mbfavorite"></i>
                            {{ trans('menu.favorites') }}
                        </a>
                    </li>
                    <li><a href="{{ route('logout') }}">
                            <i class="mbaccount"></i>
                            {{ trans('adminlte.log_out') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-9 content">
                <!-- profile info -->
                <div class="profile-info" id="profile-info">
                    <button class="btn edit-personal-information"
                            onclick="personalInform()">izment</button>
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

                                    <a href="{{ route('profile.add-email-show') }}"
                                       class="btn btn-primary mr-1">{{ trans('frontend.change_email') }}</a>

                                    <a href="{{ route('profile.change-password') }}"
                                       class="btn btn-primary mr-1">{{ trans('menu.change_password') }}</a>

                                    <a href="{{ route('profile.add-photo') }}"
                                       class="btn btn-primary mr-1">{{ trans('adminlte.photo.add') }}</a>
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
                                </div>
                            </div>
                                <input type="submit" value="{{ trans('adminlte.save') }}" id="submit">
                        </form>
                    </div>

                    <!-- information -->
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
                                        onclick="additionalInform()">@lang('adminlte.change_personal_info')</button>
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

                                <div class="edit-profile-info" id="additionalEdit">
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
                                <h6 class="title">Подтвердите личность</h6>
                                <p>Необходимо, для осуществления покупок в рассрочку в будущем. Информация из паспорта и
                                    фото, должны быть читабельны</p>
                                <br>
                                <article>
                                    <p>Фото паспорта с личными данными и прописки </p>
                                    <div class="upload-file">
                                        <label for="files1">
                                            <p>Нажмите для загрузки</p>
                                        </label>
                                        <input id="files1" type="file" multiple/>
                                    </div>
                                    <output id="result1"/>
                                </article>
                                <article>
                                    <p>Загрузите фото лица на фоне паспорта </p>
                                    <div class="upload-file">
                                        <label for="files2">
                                            <p>Нажмите для загрузки</p>
                                        </label>
                                        <input id="files2" type="file" multiple/>
                                    </div>
                                    <output id="result2"/>
                                </article>
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
                </div>

            </div>
        </div>
    </div>
    </div>

{{--    <div class="d-flex flex-row mb-3">--}}
{{--        <a href="{{ route('user.setting', $user) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>--}}
{{--        @if (!$user->email || !$user->isEmailVerified())--}}
{{--            <a href="{{ route('profile.add-email-show') }}"--}}
{{--               class="btn btn-primary mr-1">{{ trans('auth.add_email') }}</a>--}}
{{--        @endif--}}
{{--        @if (!$user->phone || !$user->isPhoneVerified())--}}
{{--            <a href="{{ route('profile.add-phone-show') }}"--}}
{{--               class="btn btn-primary mr-1">{{ trans('auth.add_phone') }}</a>--}}
{{--        @endif--}}
{{--        @if (!$user->isManagerRoleRequested() && !$user->isManager())--}}
{{--            <form method="POST" action="{{ route('profile.manager.request', $user) }}" class="mr-1">--}}
{{--                @csrf--}}
{{--                <button class="btn btn-success"--}}
{{--                        onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('frontend.manager.request_manager_role')</button>--}}
{{--            </form>--}}
{{--        @endif--}}
{{--        @if (!$user->isNetworkExists('facebook'))--}}
{{--            <a href="{{ route('login.network', ['network' => 'facebook']) }}" class="btn btn-primary mr-1"><i--}}
{{--                    class="fa fa-facebook-square"></i>Facebook</a>--}}
{{--        @endif--}}
{{--        @if (!$user->isNetworkExists('google'))--}}
{{--            <a href="{{ route('login.network', ['network' => 'google']) }}" class="btn btn-primary mr-1"><i--}}
{{--                    class="fa fa-facebook-square"></i>Google</a>--}}
{{--        @endif--}}
{{--        @if (!$user->isNetworkExists('telegram'))--}}
{{--            <a href="{{ route('login.network', ['network' => 'telegram']) }}" class="btn btn-primary mr-1"><i--}}
{{--                    class="fa fa-facebook-square"></i>Telegram</a>--}}
{{--        @endif--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card card-gray card-outline">--}}
{{--                <div class="card-body">--}}
{{--                    <table class="table table-bordered table-striped">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th>ID</th>--}}
{{--                            <td>{{ $user->id }}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>{{ trans('adminlte.user.name') }}</th>--}}
{{--                            <td>{{ $user->name }}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>{{ trans('adminlte.email') }}</th>--}}
{{--                            <td>{{ $user->email }} <a href="{{ route('profile.add-email-show') }}"--}}
{{--                                                      class="btn btn-primary mr-1">{{ trans('frontend.change_email') }}</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>{{ trans('adminlte.phone') }}</th>--}}
{{--                            <td>{{ $user->phone }} <a href="{{ route('profile.add-phone-show') }}"--}}
{{--                                                      class="btn btn-primary mr-1">{{ trans('frontend.change_phone') }}</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>{{ trans('adminlte.user.role') }}</th>--}}
{{--                            <td>{{ $user->roleName() }}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>{{ trans('adminlte.status') }}</th>--}}
{{--                            <td>--}}
{{--                                @if ($user->status === \App\Entity\User\User::STATUS_WAIT)--}}
{{--                                    <span class="badge badge-secondary">@lang('adminlte.user.waiting')</span>--}}
{{--                                @endif--}}
{{--                                @if ($user->status === \App\Entity\User\User::STATUS_ACTIVE)--}}
{{--                                    <span class="badge badge-primary">@lang('adminlte.user.active')</span>--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>@lang('frontend.social_networks')</th>--}}
{{--                            <td>--}}
{{--                                @if ($user->isNetworkExists('facebook'))--}}
{{--                                    <i class="fa fa-facebook-square"></i>Facebook--}}
{{--                                @endif--}}
{{--                                @if ($user->isNetworkExists('google'))--}}
{{--                                    <i class="fa fa-google-plus-square"></i>Google--}}
{{--                                @endif--}}
{{--                                @if ($user->isNetworkExists('telegram'))--}}
{{--                                    <i class="fa fa-telegram-plane"></i>Telegram--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tbody>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @if ($user->profile)--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="card card-gray card-outline">--}}
{{--                    <div class="card-header"><h3 class="card-title">Profile</h3></div>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="table --}}{{--table-bordered--}}{{-- table-striped projects">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <th>{{ trans('adminlte.image') }}</th>--}}
{{--                                <td>--}}
{{--                                    @if ($user->profile->avatar)--}}
{{--                                        <a href="{{ $user->profile->avatarOriginal }}" target="_blank"><img--}}
{{--                                                src="{{ $user->profile->avatarThumbnail }}"></a>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                            </tr>--}}

{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <table class="table table-bordered table-striped projects">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <th>@lang('adminlte.first_name')</th>--}}
{{--                                <td>{{$user->profile->first_name}}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th>@lang('adminlte.last_name')</th>--}}
{{--                                <td>{{$user->profile->last_name}}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th>@lang('adminlte.birth_date')</th>--}}
{{--                                <td>{{$user->profile->birth_date}}</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th>@lang('adminlte.gender')</th>--}}
{{--                                <td>--}}
{{--                                    @if ($user->profile->gender === \App\Entity\User\Profile::FEMALE)--}}
{{--                                        <span class="badge badge-danger">@lang('adminlte.female')</span>--}}
{{--                                    @elseif ($user->profile->gender === \App\Entity\User\Profile::MALE)--}}
{{--                                        <span class="badge badge-secondary">@lang('adminlte.male')</span>--}}
{{--                                    @elseif ($user->profile->gender === \App\Entity\User\Profile::GENDER_EMPTY)--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th>@lang('adminlte.address')</th>--}}
{{--                                <td>{{$user->profile->address}}</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}

    <script>
        function personalInform(){
                $('#personalEdit').toggleClass('d-block');
                $('#personalView').toggleClass('d-none');
        }
        function additionalInform(){
                $('#additionalEdit').toggleClass('d-block');
                $('#additionalView').toggleClass('d-none');
        }

        window.onload = function () {
            $('#region').niceSelect();
            //Check File API support
            if (window.File && window.FileList && window.FileReader) {
                var filesInput1 = document.getElementById("files1");
                var filesInput2 = document.getElementById("files2");

                filesInput1.addEventListener("change", function (event) {

                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result1");

                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];

                        //Only pics
                        if (!file.type.match('image'))
                            continue;

                        var picReader = new FileReader();

                        picReader.addEventListener("load", function (event) {

                            var picFile = event.target;

                            var div = document.createElement("div");

                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/>";

                            output.insertBefore(div, null);

                        });

                        //Read the image
                        picReader.readAsDataURL(file);
                    }

                });
                filesInput2.addEventListener("change", function (event) {

                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result2");

                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];

                        //Only pics
                        if (!file.type.match('image'))
                            continue;

                        var picReader = new FileReader();

                        picReader.addEventListener("load", function (event) {

                            var picFile = event.target;

                            var div = document.createElement("div");

                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/>";

                            output.insertBefore(div, null);

                        });

                        //Read the image
                        picReader.readAsDataURL(file);
                    }

                });
            } else {
                console.log("Your browser does not support File API");
            }
        }

    </script>

@endsection
