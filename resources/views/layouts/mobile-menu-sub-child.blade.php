@foreach($childs as $child)
<li>
    <a href="{{route('category.show',$child)}}">{{$child->name}}</a>
</li>
@endforeach
