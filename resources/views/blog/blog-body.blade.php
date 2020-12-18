<section>
    <div class="outter-list-of-blogs">
        <form action="get" class="accordion big-filter filter" id="catalogFilter">
            <div class="filter-item">
                {{-- @foreach($gCategories as $category)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-{{$category->id}}" value="{{$category->id}}">
                        <label  class="custom-control-label" for="smallcustomCheck1-{{$category->id}}">{{$category->name}}</label>
                    </div>
                @endforeach --}}
                @include('filters.category-blog-filter')

            </div>
        </form>

        <div class="wrapper-filtered-blogs">
            <nav class=" navbar navbar-expand-custom sort-types">

                <button class="navbar-toggler" type ="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span>     -->
                <i class="navbar-toggler-icon mbcompare"></i>
                </button>

                <form method="GET" id="search-bar" class="search-bar form-control">
                    <input id="search-input" name="blogName" class="bordered-input" type="search" placeholder="@lang('frontend.search_videos')">
                    <button class="search btn" type="submit"><i class="mbsearch"></i></button>
                </form>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <form action="get" class="accordion small-filter filter" id="catalogFilter">
                        <ul class="navbar-nav">
                            <div class="card">
                                <div id="collapseOne" class="collapse" aria-labelledby="filterOne" data-parent="#catalogFilter">
                                    <div class="card-body">
                                        @foreach($gCategories as $category)
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
                @foreach($blogs as $blog)
                <a href="{{ route('blogs.show', $blog) }}">
                    <div class="blog-item">
                        <div class="image">
                            <img src="{{$blog->fileOriginal}}" alt="">
                            <div class="image-overlay"></div>
                        </div>
                        <div class="description">
                            <h6 class="title">{{$blog->title}}</h6>
                            <p>{{$blog->description}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
                {{ $blogs->links() }}
            </div>

            <!-- PAGINATION  -->
{{--            <nav class="products-pagination" aria-label="Page navigation example">--}}
{{--                <ul class="pagination">--}}

{{--                    <li class="page-item active"><a href="#">1</a></li>--}}
{{--                    <li class="page-item"><a href="#">2</a></li>--}}
{{--                    <li class="page-item"><a href="#">3</a></li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a href="#" aria-label="Next">--}}
{{--                            <i class="mbnext_page"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item"><a href="#">10</a></li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
        </div>
    </div>
</section>
