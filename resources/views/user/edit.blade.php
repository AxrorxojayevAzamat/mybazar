@extends('layouts.app')

@section('title', 'User Profile Edit')

@section('css')
<link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
@endsection

@section('body')
<!-- body -->
<form method="POST" action="{{ route('user.update', $user) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">Profile</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.phone') }}">
                                                
                    <div class="form-group">
                        {!! Form::label('phone', trans('adminlte.phone') , ['class' => 'col-form-label']); !!}
                        {!! Form::number('phone',old('phone', $user->phone ? $user->phone : null), ['id' => 'user-phone','class'=>'form-control' . ($errors->has('phone') ? ' is-invalid' : '')]) !!}
                        @if ($errors->has('phone'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', trans('adminlte.password') , ['class' => 'col-form-label']); !!}
                        {!! Form::password('password', ['class'=>'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) !!}
                        @if ($errors->has('password'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('first_name', trans('adminlte.first_name') , ['class' => 'col-form-label']); !!}
                        {!! Form::text('first_name', old('first_name', $user ? ($user->profile ? $user->profile->first_name : null) : null), ['class'=>'form-control' . ($errors->has('first_name') ? ' is-invalid' : '') ]) !!}
                        @if ($errors->has('first_name'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('first_name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('last_name', trans('adminlte.last_name') , ['class' => 'col-form-label']); !!}
                        {!! Form::text('last_name', old('last_name', $user ? ($user->profile ? $user->profile->last_name : null) : null), ['class'=>'form-control' . ($errors->has('last_name') ? ' is-invalid' : '') ]) !!}
                        @if ($errors->has('last_name'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('birth_date', trans('adminlte.birth_date') , ['class' => 'col-form-label']); !!}
                        {!! Form::date('birth_date', old('birth_date', $user ? ($user->profile ? $user->profile->birth_date : null) : null), ['class'=>'form-control' . ($errors->has('birth_date') ? ' is-invalid' : '') ]) !!}
                        @if ($errors->has('birth_date'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('birth_date') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('gender', trans('adminlte.gender') , ['class' => 'col-form-label']); !!}
                        {!! Form::select('gender', $genders, old('gender', $user ? ($user->profile ? $user->profile->gender : null) : null),
                        ['class'=>'form-control' . ($errors->has('gender') ? ' is-invalid' : '')]) !!}
                        @if ($errors->has('gender'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('gender') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', trans('adminlte.address') , ['class' => 'col-form-label']); !!}
                        {!! Form::text('address', old('address', $user ? ($user->profile ? $user->profile->address : null) : null), ['class'=>'form-control' . ($errors->has('address') ? ' is-invalid' : '') ]) !!}
                        @if ($errors->has('address'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('address') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.files') }}</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="avatar" class="col-form-label">{{ trans('adminlte.image') }}</label>
                                <div class="file-loading">
                                    <input id="avatar-input" class="file" type="file" name="avatar" accept=".jpg,.jpeg,.png">
                                </div>
                                @if ($errors->has('avatar'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('avatar') }}</strong></span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ trans('adminlte.edit') }}</button>
    </div>

</form>
@endsection
@section('script')
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/purify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fa/theme.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/uz.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/ru.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/LANG.js') }}"></script>
{{--    <script src="{{ mix('js/fileinput.js', 'build') }}"></script>--}}

<script>

let avatarInput = $("#avatar-input");
let avatarUrl = '{{ $user ? ($user->profile ? ($user->profile->avatar ? $user->profile->avatarOriginal : null) : null ): null }}';

let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
XMLHttpRequest.prototype.send = function (data) {
    this.setRequestHeader('X-CSRF-Token', token);
    return send.apply(this, arguments);
};

if (avatarUrl) {
    avatarInput.fileinput({
        initialPreview: [avatarUrl],
        initialPreviewAsData: true,
        showUpload: false,
        previewFileType: 'text',
        browseOnZoneClick: true,
        overwriteInitial: true,
        deleteUrl: 'remove-avatar',
        maxFileCount: 1,
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
    });
} else {
    avatarInput.fileinput({
        showUpload: false,
        previewFileType: 'text',
        browseOnZoneClick: true,
        maxFileCount: 1,
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
    });
}
</script>

@endsection