<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<!-- <span class="navbar-toggler-icon"></span>     -->
<img src="{{asset('images/filter.svg')}}" alt="" class="navbar-toggler-icon">
</button>
<form action="?" method="GET">
<input type="radio" id = "by-price" class="btn" name="order_by" value="price"><i></i>@lang('frontend.by_price')
<input type="radio" id = "by-rating" class="btn" name="order_by" value="rating"><i></i>@lang('frontend.by_rating')
<input type="radio" id = "by-date" class="btn" name="order_by" value="date" ><i></i>@lang('frontend.by_novelty')
    
</form>
<div class="toggle-view">
    <a class="list-view view-blue-bg" href=""><i class="mblistview_white"></i></a>
    <a class="column-view" href=""><i class="mbmosaicview_white"></i></a>
</div>
