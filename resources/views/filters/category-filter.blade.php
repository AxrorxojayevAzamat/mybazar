@if (isset($categories))
    <button type="button" class="btn accordion active">@lang('frontend.breadcrumb.categories')</button>
    <div id="filter2" class="panel">
        @foreach($categories as $i => $category)
            <div class="custom-control custom-checkbox" >
                <a href="#">{{ $category['name'] }}</a>
            </div>
        @endforeach
        <div class="custom-control custom-checkbox">
            <a  href="#">Malika1</a>
            <a  href="#">Malika2</a>
            <a  href="#">Malika3</a>
            <a  href="#">Malika4</a>
            <a  href="#">Malika5</a>
            <a  href="#">Malika6</a>
            <a  href="#">Malika7</a>
            <a  href="#">Malika8</a>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-1" >
            <label  class="custom-control-label" for="smallcustomCheck1-1">LED</label>
        </div>
        <div  class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-2"  >
            <label class="custom-control-label" for="smallcustomCheck1-2">OLED</label>
        </div>

    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif
