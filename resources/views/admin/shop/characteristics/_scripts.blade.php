@section($javaScriptSectionName)
    <script>
        $('#categories').select2();
        $('#group_id').select2();
        let characteristicForm = $('#characteristic-form');
        $(document).ready(function () {
            $('#type').change(function () {
                let characteristicValue = $(this).val();
                let form = "";
                characteristicForm.empty();


                if (characteristicValue) {
                    if (characteristicValue === '{{ \App\Entity\Shop\Characteristic::TYPE_FLOAT }}') {
                        form +=
                            "<label for=default\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                            "<input id=\"default\" type=\"number\" step=\"0.01\" class=\"form-control{{ $errors->has('default') ? ' is-invalid' : '' }}\"\n" +
                            "name=\"default\" value=\"{{ old('default', $characteristic ? $characteristic->default : '')}}\"" + ">";
                    } else if (characteristicValue === '{{ \App\Entity\Shop\Characteristic::TYPE_INTEGER }}') {
                        form +=
                            "<label for=default\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                            "<input id=\"default\" type=\"number\" class=\"form-control{{ $errors->has('default') ? ' is-invalid' : '' }}\"\n" +
                            "name=\"default\" value=\"{{ old('default', $characteristic ? $characteristic->default : null)}}\"" + ">";
                    } else if (characteristicValue === '{{ \App\Entity\Shop\Characteristic::TYPE_COLOR }}') {
                        form +=
                            "<label for=default\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                            "<input id=\"modification-color\" type=\"text\" class=\"form-control{{ $errors->has('default') ? ' is-invalid' : '' }}\"\n" +
                            "name=\"default\"  value=\"{{ old('default', $characteristic ? $characteristic->default : null)}}\"" + ">";

                    } else {
                        form +=
                            "<label for=default\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                            "<input id=\"default\" class=\"form-control{{ $errors->has('default') ? ' is-invalid' : '' }}\"\n" +
                            "   name=\"default\" value=\"{{ old('default', $characteristic ? $characteristic->default : null)}}\"" + ">";
                    }

                    form +=
                        "@if ($errors->has('default'))\n" +
                        "   <span class=\"invalid-feedback\"><strong>{{ $errors->first('default') }}</strong></span>\n" +
                        "@endif";

                    characteristicForm.append(form);
                    $('#modification-color').colorpicker({})

                }
            });
        });
    </script>
    <script src="{{ asset('vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
@endsection
