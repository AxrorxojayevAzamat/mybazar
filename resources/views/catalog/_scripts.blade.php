@section('script')
    <script src="{{asset('js/autoNumeric-2.0-BETA.js', 'build')}}"></script>
    <script src="{{asset('js/autoNumeric.js', 'build')}}"></script>

    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{asset('js/range-slider.js')}}"></script>
    <script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>

    <script>
        let filterButton = $('#catalog-filter-button');
        let filterForm = $('#catalog-filter-form');

        $(document).ready(function () {


        let defaultRadioButton = $("#" + localStorage.getItem("radioBtn"));

        if(defaultRadioButton.selector !== '#null'){
            defaultRadioButton[0].checked = true;
        }else{
           $('#by-price')[0].checked = true;
        }
            filterButton.click(function (e) {
                e.preventDefault();
                getCatalogFilter();
            });
        });


    $('input[type=radio][name=order_by]').change(function () {

        localStorage.setItem("radioBtn", this.id);
        this.checked = true;
        getCatalogFilter();
    });

    function getCatalogFilter(){
        let brands = getFilter('brands-checkbox');
        let stores = getFilter('stores-checkbox');
        let order_by = $('input[type=radio][name=order_by]:checked').val()
        let brandsInput = $('#brands-hidden-input');
        let storesInput = $('#stores-hidden-input');
        let sortFilterInput = $('#sort-hidden-input');

                let i = 0;
                while ($(`.modifications-checkbox-${i}`).length) {
                    console.log($('.modifications-checkbox-' + i).length);
                    const modificationsInput = $('#modifications-' + i + '-hidden-input');
                    const modifications = getFilter('modifications-checkbox-' + i);
                    modificationsInput.val(modifications);
                    i++;
                }

                brandsInput.val(brands);
                storesInput.val(stores);
                sortFilterInput.val(order_by);

                // let input = '<input name="brands" value="' + brands + '">';
                // input += '<input name="stores" value="' + stores + '">';

                // filterForm.append(input);
                filterForm.submit();

                console.log(brands);
                console.log(stores);
    }


        function getFilter(className) {
            let filter = '';
            $('.' + className + ':checked').each(function() {
                filter += $(this).val() + ',';
                // filter.push($(this).val());
            });
            return filter.slice(0, -1);
        }
    </script>
@endsection

@push('script')
<script>
        $(function () {
            let min_price = {{$min_price}}, max_price = {{$max_price}}
            var $range = $(".js-range-slider"),
                $inputFrom = $(".js-input-from"),
                $inputTo = $(".js-input-to"),
                instance,
                min = min_price,
                max = max_price,
                from = 0,
                to = 0;

            $range.ionRangeSlider({
                type: "double",
                min: min,
                max: max,
                from: min_price,
                to: max_price,
                prefix: 'Rp. ',
                onStart: updateInputs,
                onChange: updateInputs,
                step: 100,
                prettify_enabled: true,
                prettify_separator: ".",
                values_separator: " - ",
                force_edges: true


            });

            instance = $range.data("ionRangeSlider");

            function updateInputs (data) {
                from = data.from;
                to = data.to;

                $inputFrom.prop("value", from);
                $inputTo.prop("value", to);
            }

            $inputFrom.on("input", function () {
                var val = $(this).prop("value");

                // validate
                if (val < min) {
                    val = min;
                } else if (val > to) {
                    val = to;
                }

                instance.update({
                    from: val
                });
            });

            $inputTo.on("input", function () {
                var val = $(this).prop("value");

                // validate
                if (val < from) {
                    val = from;
                } else if (val > max) {
                    val = max;
                }

                instance.update({
                    to: val
                });
            });

    });

    </script>
@endpush
