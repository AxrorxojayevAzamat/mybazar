@php($childrenCategories = $children)

<ul class="dropdown-menu d2" aria-labelledby="navbarDropdown{{$category->id}}">
    @foreach($childrenCategories as $i => $child)
        <li class="nav-item dropdown">
{{--            <img class="menu-discount-icon" src="{{$category->iconOriginal}}">--}}
            <a class="dropdown-item{{ count($child->children) ? ' first-dropdown' : '' }}" href="{{route('categories.show', products_path($child))}}">
                {{ $child->name }}
            </a>

            @if(count($child->children))
                @include('layouts.menusub', ['children' => $children[$i]->children])
            @endif
        </li>
    @endforeach

    @if (!$banner)
        @php($banner = true)
        <li class="full-image-banner">
            <img src="{{asset('images/menu-banner1.jpg')}}" alt="">
        </li>
        <li class="full-image-banner2">
            <img src="{{asset('images/menu-banner2.png')}}" alt="">
        </li>
    @endif
</ul>


