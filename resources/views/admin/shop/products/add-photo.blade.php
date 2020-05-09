@extends('layouts.page')

@if (!config('adminlte.enabled_laravel_mix'))
@php($cssSectionName = 'css')
@php($javaScriptSectionName = 'js')
@else
@php($cssSectionName = 'mix_adminlte_css')
@php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
<link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
@endsection

@section('content')

    <div class="card" id="photos">
        <div class="card-header border">{{ trans('adminlte.photo.plural') }}</div>
        <div class="card-body">
            <div class="row">
                @foreach($product->photos as $photo)
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div class="btn-group">
                            <a href="{{ route('admin.shop.products.move-photo-up', ['product' => $product, 'photo' => $photo]) }}" id="{{ $product->id }}" photo_id="{{ $photo->id }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                            </a>
                            <a href="{{ route('admin.shop.products.delete-photo', ['product' => $product, 'photo' => $photo]) }}" id="{{ $product->id }}" photo_id="{{ $photo->id }}" class="btn btn-default" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                            <a href="{{ route('admin.shop.products.move-photo-down', ['product' => $product, 'photo' => $photo]) }}" id="{{ $product->id }}" photo_id="{{ $photo->id }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </a>
                        </div>
                        <div style="margin-top: 10px;">
                            <a href="{{ $photo->fileOriginal }}" target="_blank" class="img-thumbnail"><img src="{{ $photo->fileThumbnail }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header border">{{ trans('adminlte.photo.add') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.shop.products.add-photo', $product) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="file-loading">
                        <input id="file-input" class="file" type="file" name="photo">
                    </div>
                    @if ($errors->has('photo'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('photo') }}</strong></span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{ trans('adminlte.upload') }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section($javaScriptSectionName)
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
        let fileInput = $("#file-input");
        fileInput.fileinput({
            showUpload: false,
            previewFileType: 'text',
            browseOnZoneClick: true,
            overwriteInitial: false,
            allowedFileExtensions: ['jpg', 'jpeg', 'png'],

        });
    </script>

@endsection
