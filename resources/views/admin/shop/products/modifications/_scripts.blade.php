@section($javaScriptSectionName)
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/purify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fa/theme.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/uz.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/ru.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/LANG.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    {{--    <script src="{{ mix('js/colorpicker.js', 'build') }}"></script>--}}
    {{--    <script src="{{ mix('js/fileinput.js', 'build') }}"></script>--}}

    <script>
        $('#modification-color').colorpicker({});

        let fileInput = $("#file-input");
        let logoUrl = '{{ $modification ? ($modification->photo ? $modification->photoOriginal : null) : null }}';

        if (logoUrl) {
            let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
            XMLHttpRequest.prototype.send = function (data) {
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
                deleteUrl: 'remove-photo',
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

    <script>
        $('#characteristic_id').select2();
        let characteristicForm = $('#characteristic-form');
        let valueForm = $('#value-form');

        $(document).ready(function () {
            $('#characteristic_id').change(function () {
                let characteristicValue = $(this).val();
                if (characteristicValue) {
                    $.ajax({
                        url: "/api/characteristics/" + characteristicValue,
                        type: "get",
                        dataType: 'json',
                        success: function (data) {
                            console.log(data)
                            data = data.data;
                            characteristicForm.empty();

                            let form = "";

                            let defaultValue = "{{ $modification ? $modification->value : old('value') }}";
                            defaultValue = defaultValue === "" ? defaultValue : data.default;

                            if (data.type === '{{ \App\Entity\Shop\Characteristic::TYPE_FLOAT }}') {
                                form +=
                                    "<label for=characteristic_value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                    "<input id=\"characteristic_value\" type=\"number\" step=\"0.01\" class=\"form-control{{ $errors->has('characteristic_value') ? ' is-invalid' : '' }}\"\n" +
                                    "name=\"characteristic_value\" value=\"{{ old('characteristic_value', $modification ? $modification->value : '')}}\"";

                                if (data.required) {
                                    form += " required>";
                                } else {
                                    form += ">";
                                }
                            } else if (data.type === '{{ \App\Entity\Shop\Characteristic::TYPE_INTEGER }}') {
                                form +=
                                    "<label for=characteristic_value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                    "<input id=\"characteristic_value\" type=\"number\" class=\"form-control{{ $errors->has('characteristic_value') ? ' is-invalid' : '' }}\"\n" +
                                    "name=\"characteristic_value\" value=\"{{ old('characteristic_value', $modification ? $modification->value : null)}}\"";

                                if (data.required) {
                                    form += " required>";
                                } else {
                                    form += ">";
                                }
                            } else if (data.type === '{{ \App\Entity\Shop\Characteristic::TYPE_COLOR }}') {
                                form +=
                                    "<label for=characteristic_value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                    "<input id=\"modification-color\" type=\"text\" class=\"form-control{{ $errors->has('characteristic_value') ? ' is-invalid' : '' }}\"\n" +
                                    "name=\"characteristic_value\"  value=\"{{ old('characteristic_value', $modification ? $modification->value : null)}}\"";
                                if (data.required) {
                                    form += " required>";
                                } else {
                                    form += ">";
                                }
                            } else {
                                form +=
                                    "<label for=characteristic_value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                    "<input id=\"characteristic_value\" class=\"form-control{{ $errors->has('characteristic_value') ? ' is-invalid' : '' }}\"\n" +
                                    "   name=\"characteristic_value\" value=\"{{ old('characteristic_value', $modification ? $modification->value : null)}}\"";

                                if (data.required) {
                                    form += " required>";
                                } else {
                                    form += ">";
                                }
                            }

                            form +=
                                "@if ($errors->has('characteristic_value'))\n" +
                                "   <span class=\"invalid-feedback\"><strong>{{ $errors->first('characteristic_value') }}</strong></span>\n" +
                                "@endif";


                            characteristicForm.append(form);
                            $('#modification-color').colorpicker({})
                        },
                        error: function (error) {
                        }
                    });
                } else {
                    characteristicForm.empty();
                }

            });
        });

    </script>

@endsection
