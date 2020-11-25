@if (isset($categories))
    <button type="button" class="btn accordion active">@lang('frontend.breadcrumb.categories')</button>
    <div id="filter2" class="panel">
        @foreach($categories as $i => $category)
            <div  class="custom-control custom-checkbox show-more-height">
                <a href="#">{{ $category['name'] }}</a>
                <a href="#">Malika</a>
                <a href="#">Malika</a>
                <a href="#">Malika</a>
                <a href="#">Malika</a>
                <a href="#">Malika</a>
                <a href="#">Malika</a>
                <a href="#">Malika</a>
                <a href="#">Malika</a>
                <a href="#">Malika</a>
            </div>
        @endforeach
        <div class="show-more" >Показать еще</div>
    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif
