<section>
    <div class="outter-blogs owl-carousel owl-theme">
        <a href="#">
            <div class="item">
                <img src="{{asset('images/blog1.png')}}" alt="">
                <div class="description">
                    <p class="sub-title">Lorem ipsum dolor</p>
                    <h5>vfndkknjgfbn erkjnervknev dkjne kdv</h5>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="item">
                <img src="{{asset('images/blog2.png')}}" alt="">
                <div class="description">
                    <p class="sub-title">Lorem ipsum dolor</p>
                    <h5>vfndkknjgfbn erkjnervknev dkjne kdv</h5>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="item">
                <img src="{{asset('images/blog3.png')}}" alt="">
                <div class="description">
                    <p class="sub-title">Lorem ipsum dolor</p>
                    <h5>vfndkknjgfbn erkjnervknev dkjne kdv</h5>
                </div>
            </div>
        </a>
        @foreach($blogs as $blog)
        <a href="{{route('blogs.show',$blog)}}">
            <div class="item">
                <img src="/storage/blogs/{{$blog->file}}" alt="">
                <div class="description">
                    <p class="sub-title">{{$blog->title}}</p>
                    <h5>{{$blog->description}}</h5>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
