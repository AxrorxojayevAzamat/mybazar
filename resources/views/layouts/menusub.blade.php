@php($childrenCategories = $children)

<ul class="dropdown-menu d2" aria-labelledby="navbarDropdown{{$category->id}}">
    @foreach($childrenCategories as $i => $child)
        <li class="nav-item dropdown">
{{--            <img class="menu-discount-icon" src="{{$category->iconOriginal}}">--}}
            <a class="dropdown-item{{ count($child->children) ? ' first-dropdown' : '' }}"
               href="{{route('categories.show', products_path($child))}}"
               onmouseover="setBanner('{{$child->photoOriginal}}', '{{$child->slug}}', {{$child->brands}})"
               onmouseout="removeBanner('{{$child->slug}}')">
                <img class="menu-discount-icon" src="{{$child->iconOriginal}}">{{ $child->name }}
            </a>

            @if(count($child->children))
                @include('layouts.menusub', ['children' => $children[$i]->children])
            @endif
        </li>
        <li class="full-image-banner">
            <img src="{{asset('images/white.png')}}" id="categoryBanner_{{$child->slug}}" alt="">
        </li>
        <li id="banner2_{{$child->slug}}" class="full-image-banner2">
            <div class="all-brands"><a href="{{ route('brands') }}">{{trans("menu.all_brands")}}</a></div>
        </li>
    @endforeach

    @if (!$banner)
        @php($banner = true)
        <li class="full-image-banner">
            <img src="{{asset('images/white.png')}}" id="categoryBanner_{{$category->slug}}" alt="">
        </li>
        <li id="banner2_{{$category->slug}}" class="full-image-banner2">
            <div class="all-brands"><a href="{{ route('brands') }}">{{trans("menu.all_brands")}}</a></div>
        </li>
    @endif
</ul>


