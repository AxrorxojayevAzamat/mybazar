@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/2-catalog-page.js')}}"></script>

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

                actualProductPrice.html(modification.data('actual-price'));
                finalProductPrice.html(modification.data('final-price'));
            });

            cartButton.click(function (e) {
                e.preventDefault();

                let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
                XMLHttpRequest.prototype.send = function(data) {
                    this.setRequestHeader('X-CSRF-Token', token);
                    return send.apply(this, arguments);
                };

                $.ajax({
                    url: '',
                });
            });

            // reviewButton.click(function (e) {
            //     e.preventDefault();
            //
            //     console.log(reviewForm);
            // });
        });
    </script>
@endsection
