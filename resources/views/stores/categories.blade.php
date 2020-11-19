<ul class="list-group">
    @foreach($categories as $category)
        <li class="list-group-item"><a href="{{ route('stores.index') }}">{!! $category->name !!}</a></li>
    @endforeach
</ul>
