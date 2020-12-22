<section>
    <div class="outter-blogs owl-carousel owl-theme">
        @foreach($posts as $post)
        <a href="{{route('blogs.show', $post)}}">
            <div class="item">
                <img src="{{ $post->fileOriginal }}" alt="">
                <div class="description">
                    <p class="sub-title">{{ $post->title }}</p>
{{--                    <h5>{{ $post->description }}</h5>--}}
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
