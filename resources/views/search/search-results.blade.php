@extends('layouts.app')

@section('title', trans('frontend.breadcrumb.search'))

{{--@include ('includes.common-style')--}}

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/blog-news.css')}}"> --}}
@endsection

@section('body')

    <!-- products-brands-shops-blogs-video btn -->
    @include('layouts.products-brands-shops-videos-btn')

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-products" role="tabpanel" aria-labelledby="pills-products-tab">
            <!-- products body -->
            <div class="outter-catalog-view">
                <!-- big filter without title checkbox -->
                @if(!$products->isEmpty())
                    @include('search.sidebar', ['sidebar_is' => 'products'])
                @endif

                <div class="wrapper-filtered-items">

                    <h6>
                        {!! trans('frontend.number_found_product', ['query' => session('search'), 'result' => !$products->isEmpty() ? count($products->items()) : 0, 'category' => count($categories)])  !!}
                    </h6>
                    @if(!$products->isEmpty())
                        <nav class=" navbar navbar-expand-custom sort-types">
                            <!--sort-by options  -->
                        @include('layouts.sort-by-options')

                        <!-- small filter without title checkbox -->

                            @include('filters.small-filter-with-title-checkbox')
                        </nav>
                    @endif

                <!-- list mosaic catalog items -->
                    @include('layouts.products-list-grid')

                <!-- pagination -->
                    @include('layouts.pagination')

                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-brands" role="tabpanel" aria-labelledby="pills-brands-tab">
            <!-- brands body -->
            <div class="outter-catalog-view">
                <!-- big filter without title checkbox -->
                @if(!$products->isEmpty())
                    @include('search.sidebar', ['sidebar_is' => 'Brands', 'categories' => $brandsCategory])
                @endif

                <div class="wrapper-filtered-items">

                    <h6>
                        {!! trans('frontend.number_found_product', ['query' => session('search'), 'result' => !$brandFilter->isEmpty() ? count($brandFilter) : 0, 'category' => count($brandFilter)])  !!}
                    </h6>

                    <div class="brands-by-letter">
                        <div>
                            @foreach($brandFilter as $brand)
                                <a href="brands/{{$brand->id}}">{{ $brand->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <!-- list mosaic catalog items -->
{{--                    @include('brand.brands', )--}}
{{--                                        @include('layouts.list-mosaic-catalog-items', ['products'=>$products])--}}

                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-shops" role="tabpanel" aria-labelledby="pills-shops-tab">
            <!-- shops body -->
            <div class="outter-list-of-shops">
                <!-- big filter without title checkbox -->
                @if(!$stores->isEmpty())
                    @include('search.sidebar', ['sidebar_is' => 'Brands', 'categories' => $storesCategory])
                @endif

                <div class="wrapper-filtered-items">

                    <h6>
                        {!! trans('frontend.number_found_product', ['query' => session('search'), 'result' => !$stores->isEmpty() ? count($stores->items()) : 0, 'category' => count($storesCategory)])  !!}
                    </h6>

                    <!-- shop items -->
                    @include('stores.storesList')

                </div>
            </div>

        </div>
        <div class="tab-pane fade show" id="pills-blogs" role="tabpanel" aria-labelledby="pills-blogs-tab">
            <!-- blogs body -->
            <div class="outter-catalog-view">
                <!-- big filter without title checkbox -->
                @if(!$blogs->isEmpty())
                    @include('search.sidebar', ['sidebar_is' => 'Brands', 'categories' => $blogsCategory])
                @endif

                <div class="wrapper-filtered-items">

                    <h6>
                        {!! trans('frontend.number_found_product', ['query' => session('search'), 'result' => !$blogs->isEmpty() ? count($blogs->items()) : 0, 'category' => count($blogsCategory)])  !!}
                    </h6>

                    <!-- blog items -->
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

                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab">
            <!-- videos body -->
            <div class="outter-list-of-videos">
                <!-- big filter without title checkbox -->
                @if(!$blogs->isEmpty())
                    @include('search.sidebar', ['sidebar_is' => 'Brands', 'categories' => $videosCategory])
                @endif

                <div class="wrapper-filtered-videos">

                    <h6>
                        {!! trans('frontend.number_found_product', ['query' => session('search'), 'result' => !$videos->isEmpty() ? count($videos->items()) : 0, 'category' => count($videosCategory)])  !!}
                    </h6>

                    <div class="all-filtered-videos">
                        @foreach($videos as $video)
                            <a href="{{ route('videos.show', $video) }}">
                                <div class="video-item">
                                    <img src="{{$video->posterThumbnail}}" alt="" class="poster">
                                    <div class="video-overlay">
                                        <h6>{{$video->title}}</h6>
                                        <button class="btn play">
                                            <div class="arrow-right"></div>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
        <div>

            <!-- NEWS LETTER -->
            {{--    @include ('layouts.news-letter')--}}
            @if(isset($newProducts))
                @include ('layouts.carousel-products',
['products' => $newProducts, "title" => trans('frontend.novelty_upper'), 'rate_for' => ['js' => '"N"', 'html' => 'N']])
            @endif
            @endsection

            @section('script')
                @include('catalog._scripts')
                <script src="{{mix('js/1-index.js', 'build')}}"></script>
                <script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>
                <script src="{{asset('js/jquery.rateyo.js')}}"></script>
@endsection
