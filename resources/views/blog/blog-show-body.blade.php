<section>
    <div class="outter-single-blog-body d-flex justify-content-center">
        <div class="inner-single-blog-body">
            <img class="full-width h-auto" src="{{ $post->fileOriginal }}" alt="">
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
                            <img src="{{asset( $blog->fileOriginal)}}" alt="">
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
