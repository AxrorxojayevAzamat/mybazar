@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
    <link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
    <link rel="stylesheet" href="{{ mix('css/colorpicker.css', 'build') }}">
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('characteristic_id', trans('adminlte.characteristic.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('characteristic_id', $characteristics, $characteristic ? $characteristic->id : null,
                                ['class'=>'form-control' . ($errors->has('characteristic_id') ? ' is-invalid' : ''), 'id' => 'characteristic_id',
                                'required' => true, 'placeholder' => trans('adminlte.characteristic.name')]) !!}
                            @if ($errors->has('characteristic_id'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('characteristic_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('main', trans('adminlte.main'), ['class' => 'col-form-label']); !!}
                            {!! Form::checkbox('main', 1, old('main', $value ? $value->main : null),
                                    ['class'=>'form-control' . ($errors->has('main') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('main'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('main') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4" id="main-forms">
                        @if ($characteristic)
                            {!! Form::label('value', trans('adminlte.value.name'), ['class' => 'col-form-label']); !!}
                            @if ($characteristic->isSelect())
                                {!! Form::select('value', $characteristic->variants, $value->value,
                                    ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''),
                                    'required' => $characteristic->required, 'placeholder' => '']) !!}
                            @elseif($characteristic->isFloat())
                                {!! Form::number('value', old('value', $value->value), ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''),
                                    'step' => '0.01', 'required' => $characteristic->required]) !!}
                            @elseif($characteristic->isInteger())
                                {!! Form::number('value', old('value', $value->value), ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''),
                                    'required' => $characteristic->required]) !!}
                            @else
                                {!! Form::text('value', old('value', $value->value), ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''),
                                    'required' => $characteristic->required]) !!}
                            @endif
                            @if ($errors->has('value'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('value') }}</strong></span>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="form-group" id="submit-button" style="display: none">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($value ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script>
        $('#characteristic_id').select2();
        let main_forms = $('#main-forms');
        let submit_button = $('#submit-button');

        $(document).ready(function () {
            $('#characteristic_id').change(function () {
                let characteristicValue = $(this).val();
                $.ajax({
                    url: "/api/characteristics/" + characteristicValue,
                    type: "get",
                    dataType: 'json',
                    success: function(data) {
                        data = data.data;
                        submit_button.hide();
                        main_forms.empty();

                        let form = "";

                        let defaultValue = "{{ $value ? $value->value : old('value') }}";
                        defaultValue = defaultValue === "" ? defaultValue : data.default;

                        if (data.variants !== null) {
                            form +=
                                "<label for=value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                "<select id=\"value\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\" name=\"value\">\n" +
                                "   <option value=\"\"></option>\n";

                            $.each(data.variants, function (key, value) {
                                form += "<option value=" + value;

                                if (value === defaultValue) {
                                    form += ' selected';
                                }

                                form += '>' + value + '</option>\n';
                            })

                            form += '</select>';
                        } else if (data.type === {{ \App\Entity\Shop\Characteristic::TYPE_FLOAT }}) {
                            form +=
                                "<label for=value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                "<input id=\"value\" type=\"number\" step=\"0.01\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\"\n" +
                                "name=\"value\" value=\"{{ old('value', $value ? $value->value : null)}}\"";

                            if (data.required) {
                                form += " required>";
                            }
                        } else if (data.type === {{ \App\Entity\Shop\Characteristic::TYPE_INTEGER }}) {
                            form +=
                                "<label for=value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                "<input id=\"value\" type=\"number\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\"\n" +
                                "name=\"value\" value=\"{{ old('value', $value ? $value->value : null)}}\"";

                            if (data.required) {
                                form += " required>";
                            }
                        } else {
                            form +=
                                "<label for=value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                "<input id=\"value\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\"\n" +
                                "   name=\"value\" value=\"{{ old('value', $value ? $value->value : null)}}\"";

                            if (data.required) {
                                form += " required>";
                            }
                        }

                        form +=
                            "@if ($errors->has('value'))\n" +
                            "   <span class=\"invalid-feedback\"><strong>{{ $errors->first('value') }}</strong></span>\n" +
                            "@endif";
                        main_forms.append(
                            form
                        );

                        submit_button.show();
                    },
                    error: function (error) {
                    }
                });
            });
        });

    </script>
@endsection
