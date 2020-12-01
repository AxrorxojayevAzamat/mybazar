<div class="all-filtered-catalog-section">
    <div class="types-of-media">
        @foreach($children as $category)
        <a href="{{ route('categories.show', products_path($category)) }}">
            <div class="item">
                <div class="image">
                    <img src="{{ $category->photoOriginal }}" alt="">
                </div>
                <h6 class="title">{{ $category->name }}</h6>
            </div>
        </a>
        @endforeach
    </div>
    <div class="all-filtered-blogs">
        @foreach($posts as $post)
            <a href="{{ route('blogs.show', $post) }}">
                <div class="blog-item">
                    <div class="image">
                        <img src="{{ $post->fileOriginal }}" alt="">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="description">
                        <h6 class="title">{{ $post->title }}</h6>
                        <p>{!! $post->description !!}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div>
        @if ($banner)
            <img src="{{ $banner->fileCustom }}" alt="">
        @endif
    </div>
</div>



