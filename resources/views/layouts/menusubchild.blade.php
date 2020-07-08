<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach($childs as $child)
    <li><a class="dropdown-item" href="{{route('category.show',$child)}}">{{$child->name}}</a></li>
    @endforeach
</ul>
