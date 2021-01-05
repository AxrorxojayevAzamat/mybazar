@section('script')
    <script src="{{asset('js/autoNumeric-2.0-BETA.js')}}"></script>
    <script src="{{asset('js/autoNumeric.js')}}"></script>

    <script src="{{asset('js/range-slider.js')}}"></script>
    <script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>

    <script>
        let filterButton = $('#shop-filter-button');
        let filterForm = $('#shop-filter-form');

        $(document).ready(function () {
            filterButton.click(function (e) {
                e.preventDefault();

                let brands = getFilter('brands-checkbox');
                let brandsInput = $('#brands-hidden-input');

                brandsInput.val(brands);

                // let input = '<input name="brands" value="' + brands + '">';
                // input += '<input name="stores" value="' + stores + '">';

                // filterForm.append(input);
                filterForm.submit();
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
