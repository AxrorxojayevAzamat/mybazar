@section('script')
    <script src="{{asset('js/autoNumeric-2.0-BETA.js')}}"></script>
    <script src="{{asset('js/autoNumeric.js')}}"></script>

    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/range-slider.js')}}"></script>
    <script src="{{asset('js/2-catalog-page.js')}}"></script>

    <script>
        let filterButton = $('#catalog-filter-button');
        let filterForm = $('#catalog-filter-form');

        $(document).ready(function () {
            filterButton.click(function (e) {
                e.preventDefault();

                let brands = getFilter('brands-checkbox');
                let stores = getFilter('stores-checkbox');
                let brandsInput = $('#brands-hidden-input');
                let storesInput = $('#stores-hidden-input');

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

                // let input = '<input name="brands" value="' + brands + '">';
                // input += '<input name="stores" value="' + stores + '">';

                // filterForm.append(input);
                filterForm.submit();

                console.log(brands);
                console.log(stores);
            });
        });

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
