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
@include ('admin.layout.flash')
<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name_uz', trans('adminlte.name') . ' Uz', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_uz', old('name_uz', $store ? $store->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_uz'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('name_ru', trans('adminlte.name') . ' Ru', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_ru', old('name_ru', $store ? $store->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_ru'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('name_en', trans('adminlte.name') . ' En', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_en', old('name_en', $store ? $store->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_en'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug', ['class' => 'col-form-label']); !!}
                    {!! Form::text('slug', old('name_en', $store ? $store->slug : null), ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('slug'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('categories', trans('adminlte.category.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('categories[]', $categories, old('categories', $store ? $store->categoriesList() : null),
                                ['multiple' => true, 'class'=>'form-control' . ($errors->has('categories') ? ' is-invalid' : ''), 'id' => 'categories', 'required' => true]) !!}
                            @if ($errors->has('categories'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('categories') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('marks', trans('adminlte.mark.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('marks[]', $marks, old('marks', $store ? $store->marksList() : null),
                                ['multiple' => true, 'class'=>'form-control' . ($errors->has('marks') ? ' is-invalid' : ''), 'id' => 'marks', 'required' => true]) !!}
                            @if ($errors->has('marks'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('marks') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('payments', trans('adminlte.payment.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('payments[]', $payments, old('categories', $store ? $store->paymentsList() : null),
                                ['multiple' => true, 'class'=>'form-control' . ($errors->has('payments') ? ' is-invalid' : ''), 'id' => 'payments', 'required' => true]) !!}
                            @if ($errors->has('payments'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('payments') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('delivery_methods', trans('adminlte.delivery.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('delivery_methods[]', $deliveryMethods, old('delivery_methods', $store ? $store->deliveriesList() : null),
                                ['multiple' => true, 'class'=>'form-control' . ($errors->has('delivery_methods') ? ' is-invalid' : ''), 'id' => 'delivery_methods', 'required' => true]) !!}
                            @if ($errors->has('delivery_methods'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('delivery_methods') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('cost', trans('adminlte.delivery.cost'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('cost', old('cost', $store ? $store->cost : null), ['class'=>'form-control' . ($errors->has('cost') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('cost'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('cost') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('sort', trans('adminlte.delivery.sort'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('sort', old('sort', $store ? $store->sort : null), ['class'=>'form-control' . ($errors->has('sort') ? ' is-invalid' : ''), 'required' => true]) !!}
                        @if ($errors->has('sort'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('sort') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('discounts', trans('adminlte.product.discount'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('discounts[]', $discounts, old('discounts', $store ? $store->discountsList() : null),
                                ['multiple' => true, 'class'=>'form-control' . ($errors->has('discounts') ? ' is-invalid' : ''), 'id' => 'discounts']) !!}
                            @if ($errors->has('discounts'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('discounts') }}</strong></span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">Logo</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <div class="file-loading">
                        <input id="file-input" class="file" type="file" name="logo">
                    </div>
                    @if ($errors->has('logo'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('logo') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($store ? 'edit' : 'save')) }}</button>
</div>

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
        $('#categories').select2();
        $('#marks').select2();
        $('#payments').select2();
        $('#delivery_methods').select2();
        $('#discounts').select2();

        let fileInput = $("#file-input");
        let logoUrl = '{{ $store ? ($store->logo ? $store->logoOriginal : null) : null }}';

        if (logoUrl) {
            let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
            XMLHttpRequest.prototype.send = function(data) {
                this.setRequestHeader('X-CSRF-Token', token);
                return send.apply(this, arguments);
            };

            fileInput.fileinput({
                initialPreview: [logoUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                deleteUrl: 'remove-logo',
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        } else {
            fileInput.fileinput({
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        }
    </script>

@endsection
