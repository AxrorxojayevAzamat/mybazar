@push('script')
    <script>
        var type = <?php echo $type; ?>;
        var products = <?php echo json_encode($products); ?>;
        var productsIterator = products.length ? products.entries() : null;
        function ratingProduct(type, element, num) {
            $('#rateYo_' + type + num).rateYo({
                rating: element.rating,
                readOnly: true,
                starWidth: "24px",
                normalFill: "#ddd",
                ratedFill: "#f1b145",
                spacing: "7px"
            });
        }
        if (productsIterator) {
            for (var [i, x] of productsIterator) {
                ratingProduct(type, x, i)
            }
        } else {
            ratingProduct(type, products, 0)
        }
    </script>
@endpush
