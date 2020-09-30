<div class="main-header">
    <div class="logo">
        <a href="/">
            <img src="{{asset('images/mybazar_logo.svg')}}" alt="">
        </a>
    </div>
    <div id="search-bar" class="search-bar form-control">
        <div class="input-with-tags">
            <input id="search-input" class="main-search-bordered-input" type="search" placeholder="{{ trans('frontend.search_placeholder') }}" do-not-use-data-role="tagsinput">
        </div>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('frontend.all_categories')
            </button>
            <div class="dropdown-menu animated fadeIn" aria-labelledby="dropdownMenuButton">
                @foreach ($gCategories as $category)
                    <a class="dropdown-item" href="{{ route('categories.show', products_path($category)) }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <button class="search btn" type="submit"><i class="mbsearch"></i></button>
    </div>
    <div class="from-statistics-to-account">
        <div class="dropdown compare-dropdown">
            <a href="#" class="btn dropdown-toggle comparison" role="button" id="dropdownComparison" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mbcompare"><span></span></i> Сравнение
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownComparison">
                <div class="selected-items">
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular2.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular3.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                </div>
                <div class="bottom-btn">
                    <button class="btn bold switch-to-compare">
                        Сравнить товары
                    </button>
                </div>
            </div>
        </div>

        <div class="dropdown cart-dropdown" >
            <a href="#" class="btn dropdown-toggle cart" role="button" id="dropdownCart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mbcart"><span class="counter">{{ count((array) session('cart')) }}</span></i> Корзина
            </a>
            <div class="dropdown-menu"  aria-labelledby="dropdownCart">
                <div class="selected-items">
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular2.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular3.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                </div>
                <div class="bottom-btn">
                    <button class="btn bold switch-to-cart">
                        Перейти в корзину
                    </button>
                </div>
            </div>
        </div>
        <a href="#" class=" wish-list"> <i class="mbfavorite"><span></span></i> Избранные</a>
        <a href="#" class="account bold"><i class="mbaccount"></i> Аккаунт</a>
    </div>
</div>
