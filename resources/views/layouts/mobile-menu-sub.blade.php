@foreach($childs as $child)
<li>
    <span>{{$child->name}}</span>
    @if(count($child->children))
    <ul>
        @include('layouts.mobile-menu-sub-child',['childs' => $child->children])
    </ul>
    @endif
</li>
@endforeach
