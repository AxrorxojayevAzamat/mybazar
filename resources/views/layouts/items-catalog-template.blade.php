<section>
    <div class="outter-catalog-view">
        <!-- big filter without title checkbox -->
        @include('filters.big-filter-without-title-checkbox')

        <div class="wrapper-filtered-items">

            <nav class=" navbar navbar-expand-custom sort-types">

                <!--sort-by options  -->
                @include('layouts.sort-by-options')

                <!-- small filter without title checkbox -->
                @include('layouts.small-filter-without-title-checkbox')
            </nav>

            <!-- list mosaic catalog items -->
            @include('layouts.list-mosaic-catalog-items')

        </div>
    </div>
</section>