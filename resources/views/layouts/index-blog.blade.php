<section>
    <div class="outter-blogs owl-carousel owl-theme">
        @foreach($blogs as $blog)
        <a href="{{route('blogs.show',$blog)}}">
            <div class="item first">
                <p class="sub-title">{{$blog->title}}</p>
                <h5>{{$blog->description}}</h5>
            </div>
        </a>
        @endforeach
    </div>
</section>
