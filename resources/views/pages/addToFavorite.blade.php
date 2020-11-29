<script>
        function addToFavorite(id){
            let product_id = {};
            product_id.id = id;
            $.ajax({
                url: '{{ route('user.favorites.add',$product) }}',
                method: 'GET',
                success: function (data){
                    console.log(data);
                },error: function (data){
                    console.log(data);
                }
            })
        }
</script>

