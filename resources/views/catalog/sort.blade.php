
<a href="order=price_uzs">@lang('frontend.by_price') <i></i></a> &nbsp;

<a href="order=rating">@lang('frontend.by_rating') <i></i></a> &nbsp;

@include('layouts.sort-by-options')

<script>
    let language = window.location.href;
    if(language.search('uz') == -1 && language.search('ru') == -1){
        document.getElementById('sorting_by_name').setAttribute('href', '?order=name_en');

    }else if(language.search('uz') == -1 && language.search('en') == -1){
        document.getElementById('sorting_by_name').setAttribute('href', '?order=name_ru');

    }else{
        document.getElementById('sorting_by_name').setAttribute('href', '?order=name_uz');

    }

</script>
