@foreach($childs as $child)
<li>
    <a href="{{route('categories.show',$child)}}">{{$child->name}}</a>
</li>
@endforeach
