@push('script')
    <script>
        var type = <?php echo $type; ?>;
        var products = <?php echo json_encode($products); ?>;
        for( var [i, x] of products.entries()) {
            // console.log(Number(x.rating).toFixed(1))
            $('#rateYo_'+ type + i).rateYo({
                rating: x.rating,
                readOnly: true,
                starWidth: "24px",
                normalFill: "#ddd",
                ratedFill: "#feea3b",
                spacing: "7px"
            });
        }
    </script>
@endpush