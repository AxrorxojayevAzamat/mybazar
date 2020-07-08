<section>
    <div class="outter-list-of-blogs">
        <form action="get" class="accordion big-filter filter" id="catalogFilter">
            <div class="filter-item">
                @foreach($categories as $category)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-{{$category->id}}" value="{{$category->id}}">
                        <label  class="custom-control-label" for="smallcustomCheck1-{{$category->id}}">{{$category->name}}</label>
                    </div>
                @endforeach
            </div>
        </form>

        <div class="wrapper-filtered-blogs">
            <nav class=" navbar navbar-expand-custom sort-types">

                <button class="navbar-toggler" type ="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span>     -->
                    <i class="navbar-toggler-icon mbcompare"></i>
                </button>

                <div id="search-bar" class="search-bar form-control">
                    <input id="search-input" type="search" placeholder="Поиск по блогам и новостям">
                    <button class="search btn" type="submit"><i class="mbsearch"></i></button>
                </div>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <form action="get" class="accordion small-filter filter" id="catalogFilter">
                        <ul class="navbar-nav">
                            <div class="card">
                                <div id="collapseOne" class="collapse" aria-labelledby="filterOne" data-parent="#catalogFilter">
                                    <div class="card-body">
                                        @foreach($categories as $category)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-{{$category->id}}" value="{{$category->id}}">
                                                <label  class="custom-control-label" for="smallcustomCheck1-{{$category->id}}">{{$category->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </form>
                </div>
            </nav>

            <div class="all-filtered-blogs">
                <h1>{{$post->title}}</h1>
                <h3>{{$post->description}}</h3>
                {!! $post->body !!}
            </div>

        </div>
    </div>
</section>
