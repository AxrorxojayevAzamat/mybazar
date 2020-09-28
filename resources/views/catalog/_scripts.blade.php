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
                // let minPrice = $('#min-price').val();
                // let maxPrice = $('#max-price').val();

                let input = '<input name="brands" value="' + brands + '">';
                input += '<input name="stores" value="' + stores + '">';
                // input += '<input name="min_price" value="' + minPrice + '">';
                // input += '<input name="max_price" value="' + maxPrice + '">';

                filterForm.append(input);
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
