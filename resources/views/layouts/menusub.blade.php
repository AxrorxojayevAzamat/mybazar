@php($childrenCategories = $children)

<ul class="dropdown-menu d2" aria-labelledby="navbarDropdown{{$category->id}}">
    @foreach($childrenCategories as $i => $child)
        <li class="nav-item dropdown">
{{--            <img class="menu-discount-icon" src="{{$category->iconOriginal}}">--}}
            <a class="dropdown-item{{ count($child->children) ? ' first-dropdown' : '' }}"
               href="{{route('categories.show', products_path($child))}}"
               onmouseover="setBanner('{{$child->photoOriginal}}', '{{$child->slug}}', {{count($child->children)}})"
               onmouseout="removeBanner('{{$child->slug}}')">
                <img class="menu-discount-icon" src="{{$child->iconOriginal}}">{{ $child->name }}
            </a>

            @if(count($child->children))
                @include('layouts.menusub', ['children' => $children[$i]->children])
            @endif
        </li>
        <li class="full-image-banner">
            <img id="categoryBanner_{{$child->slug}}" alt="">
        </li>
    @endforeach

    @if (!$banner)
        @php($banner = true)
        <li class="full-image-banner">
            <img id="categoryBanner_{{$category->slug}}" alt="">
        </li>
        <li id="banner2_{{$category->slug}}" class="full-image-banner2">
            <img alt="">
        </li>
    @endif
</ul>


