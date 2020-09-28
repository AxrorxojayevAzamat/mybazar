<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<!-- <span class="navbar-toggler-icon"></span>     -->
<img src="{{asset('images/filter.svg')}}" alt="" class="navbar-toggler-icon">
</button>
<form action="?" method="GET">
    <button type="submit" class="btn" name="by-price" value="price" ><i></i>@lang('frontend.by_price')</button>
    <button type="submit" class="btn" name="by-rating" value="rating" ><i></i>@lang('frontend.by_rating')</button>
    <button type="submit" class="btn" name="new-items" value="is_new" ><i></i>@lang('frontend.by_novelty')</button>
</form>
<div class="toggle-view">
    <a class="list-view view-blue-bg" href=""><i class="mblistview_white"></i></a>
    <a class="column-view" href=""><i class="mbmosaicview_white"></i></a>
</div>
