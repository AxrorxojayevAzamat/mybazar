<div class="main-header">
    <div class="logo">
        <a href="/">
            <img src="{{asset('images/mybazar_logo.svg')}}" alt="">
        </a>
    </div>
    <div id="search-bar" class="search-bar form-control">
        <div class="input-with-tags">
            <input id="search-input" class="main-search-bordered-input" type="search" placeholder="Поиск на myBazar" do-not-use-data-role="tagsinput">
        </div>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Все категории
            </button>
            <div class="dropdown-menu animated fadeIn" aria-lab#mm-14elledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Телевизоры, аудио, видео</a>
                <a class="dropdown-item" href="#">Смартфоны и гаджеты</a>
                <a class="dropdown-item" href="#">Техника для дома</a>
                <a class="dropdown-item" href="#">Техника для кухни</a>
                <a class="dropdown-item" href="#">Красота и здоровье</a>
                <a class="dropdown-item" href="#">Игры, софт, развления</a>
                <a class="dropdown-item" href="#">Компьютеры</a>
                <a class="dropdown-item" href="#">Автопродукты</a>
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