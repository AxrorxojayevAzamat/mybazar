<div class="all-filtered-catalog-section">
    <div class="types-of-media">
        @foreach($categories as $category)
            <a href="{{ route('categories.show', products_path($category)) }}">
                <div class="item">
                    <div class="image">
                        <img src="{{ $category->photoThumbnail }}" alt="">
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
        @if ($longBanner)
            <img src="{{ $longBanner->fileCustom }}" alt="">
        @endif
{{--        @if (isset($banner))--}}
{{--            <img src="{{ $banner->fileCustom }}" alt="">--}}
{{--        @endif--}}
    </div>
</div>



