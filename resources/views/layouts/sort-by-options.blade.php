<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<!-- <span class="navbar-toggler-icon"></span>     -->
<img src="{{asset('images/filter.svg')}}" alt="" class="navbar-toggler-icon">
</button>
<form action="?" method="GET" class="sort-by-btn">
    <label for="by-price">@lang('frontend.by_price') <i></i></label>
    <input type="radio" id = "by-price" class="btn" name="order_by" value="price">

    <label for="by-rating">@lang('frontend.by_rating') <i></i></label>
    <input type="radio" id = "by-rating" class="btn" name="order_by" value="rating" class="sort-by-btn">
        
    <label for="by-date">@lang('frontend.by_novelty') <i></i></label>
    <input type="radio" id = "by-date" class="btn" name="order_by" value="date" class="sort-by-btn" >
</form>
<div class="toggle-view">
    <a class="list-view view-blue-bg" href=""><i class="mblistview_white"></i></a>
    <a class="column-view" href=""><i class="mbmosaicview_white"></i></a>
</div>
