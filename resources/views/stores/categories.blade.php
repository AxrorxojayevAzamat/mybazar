<ul class="list-group">
    @foreach($categories as $category)
        <li class="list-group-item"><a href="{{ route('stores.show',['store'=>$category->id]) }}">{!! $category->name !!}</a></li>
    @endforeach
</ul>
