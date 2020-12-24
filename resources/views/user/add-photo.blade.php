@extends('layouts.app')

@section('title', trans('frontend.profile'))

@section('breadcrumbs','')


@section('body')
    <!-- body -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-header">@lang('adminlte.photo.add')</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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
                                                            <input id="avatar-input" class="file" type="file" name="avatar"
                                                                   accept=".jpg,.jpeg,.png">
                                                        </div>
                                                        @if ($errors->has('avatar'))
                                                            <span
                                                                class="invalid-feedback"><strong>{{ $errors->first('avatar') }}</strong></span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ mix('js/1-index.js', 'build') }}"></script>

    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/purify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fa/theme.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/uz.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/ru.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/LANG.js') }}"></script>
    {{--    <script src="{{ mix('js/fileinput.js', 'build') }}"></script>--}}-->


    @include('user._script')

@endsection
