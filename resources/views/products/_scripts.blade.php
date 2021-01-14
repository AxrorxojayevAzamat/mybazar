@push('script')
    <script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>
    <script src="{{asset('js/jquery.rateyo.js')}}"></script>

    <script>
        let valueModification = $('.value-modification');
        let colorModification = $('.color-modification');
        let colorModificationName = $('#color-modification-name');
        let actualProductPrice = $('#actual-product-price');
        let finalProductPrice = $('#final-product-price');
        let cartButton = $('#cart-button');
        let reviewButton = $('#submit-review');
        let reviewForm = $('#review-form');
        $(document).ready(function () {
            colorModification.click(function (e) {
                e.preventDefault();

                let modification = $(this).children();
                const name = modification.data('name');
                colorModificationName.html(name);
                actualProductPrice.html(modification.data('actual-price'));
                finalProductPrice.html(modification.data('final-price'));

            });

            valueModification.click(function (e) {
                e.preventDefault();

                let modification = $(this);
                $('#productModification'+modification.data('actual-product-id')).val(modification.data('actual-modification-id'));
                console.log(sessionStorage.getItem('product_modification'));
                actualProductPrice.html(modification.data('actual-price'));
                finalProductPrice.html(modification.data('final-price'));
            });

            // reviewButton.click(function (e) {
            //     e.preventDefault();
            //
            //     console.log(reviewForm)
            // });

        });

    </script>
@endpush
