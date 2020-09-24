@php($childrenCategories = $children)

@foreach($childrenCategories as $i => $child)
    <li>
        <a href="{{route('categories.show', products_path($child))}}"><span>{{$child->name}}</span></a>

        @if(count($child->children))
            <ul>
                @include('layouts.mobile-menu-sub', ['children' => $children[$i]->children])
            </ul>
        @endif
    </li>
@endforeach
