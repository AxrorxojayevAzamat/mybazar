<section>
    <div class="outter-single-blog-body">
        <div id="search-bar" class="search-bar form-control">
            <input id="search-input" class="bordered-input" type="search" placeholder="Поиск по блогам и новостям">
            <button class="search btn" type="submit"><i class="mbsearch"></i></button>
        </div>
        <div class="inner-single-blog-body">
            <img class="full-width" src="/storage/posts/{{$post->file}}" alt="">
            <div class="description">
                <h5 class="title">{{$post->title}}</h5>
                <p>{{$post->description}}</p>
                {!! $post->body !!}
            </div>
            <div class="all-filtered-blogs">
                @foreach($lastBlogs as $blog)
                <a href="{{route('blogs.show',$blog)}}">
                    <div class="blog-item">
                        <div class="image">
                            <img src="/storage/posts/{{$blog->file}}" alt="">
                            <div class="image-overlay"></div>
                        </div>
                        <div class="description">
                            <h6 class="title">{{$blog->title}}</h6>
                            <p>{{$blog->description}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
