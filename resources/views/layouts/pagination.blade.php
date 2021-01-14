<nav class="products-pagination" aria-label="Page navigation example">
    <ul class="pagination">
        {!! $products->appends($_GET)->links() !!}
    </ul>
</nav>
