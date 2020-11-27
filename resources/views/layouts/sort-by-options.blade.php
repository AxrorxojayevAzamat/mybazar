<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<!-- <span class="navbar-toggler-icon"></span>     -->
<img src="{{asset('images/filter.svg')}}" alt="" class="navbar-toggler-icon">
</button>
    <a href="?order=price">@lang('frontend.by_price') <i></i></a> &nbsp;
    <a href="?order=rating">@lang('frontend.by_rating') <i></i></a> &nbsp;
    <a href="?order=novelty">@lang('frontend.by_novelty') <i></i></a> &nbsp;
<div class="toggle-view">
    <a class="list-view view-blue-bg" href=""><i class="mblistview_white"></i></a>
    <a class="column-view" href=""><i class="mbmosaicview_white"></i></a>
</div>
