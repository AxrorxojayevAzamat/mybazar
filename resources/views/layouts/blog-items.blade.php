<div class="all-filtered-blogs">
    @foreach($blogs as $blog)
    <a href="{{ route('blogs.show', $blog) }}">
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
    {{ $blogs->links() }}
</div>