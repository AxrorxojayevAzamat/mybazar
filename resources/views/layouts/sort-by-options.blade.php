<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<!-- <span class="navbar-toggler-icon"></span>     -->
<img src="{{asset('images/filter.svg')}}" alt="" class="navbar-toggler-icon">
</button>
<form action="?" method="GET">
    <button type="submit" class="btn" name="by-price" value="price" ><i></i>По цене</button>
    <button type="submit" class="btn" name="by-raiting" value="raiting" ><i></i>По рейтингу</button>
    <button type="submit" class="btn" name="new-items" value="is_new" ><i></i>По новизне</button>
</form>
<div class="toggle-view">
    <a class="list-view view-blue-bg" href=""><i class="mblistview_white"></i></a>
    <a class="column-view" href=""><i class="mbmosaicview_white"></i></a>
</div> 
