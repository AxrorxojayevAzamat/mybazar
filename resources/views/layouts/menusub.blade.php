@foreach($childs as $child)
<li class="nav-item dropdown">
    <a class="dropdown-item dropdown-toggle" href="{{route('category.show',$child)}}" id="navbarDropdown{{$child->id}}" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        {{ $child->name }}
</a>
<!-- third dropdown -->
@if(count($child->children))
    @include('layouts.menusubchild',['childs' => $child->children])
@endif
</li>
@endforeach
