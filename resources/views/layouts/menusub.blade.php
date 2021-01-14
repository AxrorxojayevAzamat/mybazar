@php($childrenCategories = $children)

<ul class="dropdown-menu d2" aria-labelledby="navbarDropdown{{$category->id}}">
    @foreach($childrenCategories as $i => $child)
        <li class="nav-item dropdown">
            <a class="dropdown-item{{ count($child->children) ? ' first-dropdown' : '' }}"
               href="{{route('categories.show', products_path($child))}}"
               onmouseover="setBanner('{{$child->photoOriginal}}', '{{$child->slug}}', {{$child->brands}})"
               onmouseout="removeBanner('{{$child->slug}}')">
                {{ $child->name }}
            </a>

            @if(count($child->children))
                @include('layouts.menusub', ['children' => $children[$i]->children])
            @endif
        </li>
            {{--<li id="full-image-banner_{{$child->slug}}" class="full-image-banner" ></li>--}}
            <li id="banner2_{{$child->slug}}" class="full-image-banner2 banner2_{{$child->slug}} @if(!count($child->children)) left-100 @else left-200 @endif"></li>
    @endforeach

    @if (!$banner)
            @php($banner = true)
        <li id="full-image-banner_{{$category->slug}}" class="full-image-banner full-image-banner_{{$category->slug}}"></li>
        <li id="banner2_{{$category->slug}}" class="full-image-banner2 banner2_{{$category->slug}}"></li>
    @endif
</ul>
