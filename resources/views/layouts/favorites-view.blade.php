<section>
    <div class="h4-title catalog-view">
        <h4 class="title">Избранное</h4>
    </div>
    <div class="outter-catalog-view">
        <form action="get" class="accordion big-filter filter" id="catalogFilter">
            <ul class="navbar-nav">
                <div class="card">
                    <div class="card-header" id="filterOne">
                        <h2 class="mb-0">
                            <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="filterOne">
                            Телевизоры, аудио и видео
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="filterOne" data-parent="#catalogFilter">
                        <div class="card-body">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-1" >
                                <label  class="custom-control-label" for="smallcustomCheck1-1"> Телевизоры</label>
                            </div>
                            <div  class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-2"  >
                                <label class="custom-control-label" for="smallcustomCheck1-2">OLED</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="filterTwo">
                        <h2 class="mb-0">
                            <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="filterTwo">
                            Смартфоны и гаджеты
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="filterTwo" data-parent="#catalogFilter">
                        <div class="card-body">
                            <div  class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-1"  >
                                <label class="custom-control-label" for="smallcustomCheck2-1">Смартфоны</label>
                            </div>
                            <div  class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-2"  >
                                <label class="custom-control-label" for="smallcustomCheck2-2">Наушники и гарнитуры</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="filterFour">
                        <h2 class="mb-0">
                            <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="filterFour">
                            Одежда и обувь
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse show" aria-labelledby="filterFour" data-parent="#catalogFilter">
                        <div class="card-body">
                            <div  class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-1"  >
                                <label class="custom-control-label" for="smallcustomCheck4-1">Мужчинам</label>
                            </div>
                        </div>
                    </div>
                </div>
                
            </ul>
        </form>

        <div class="wrapper-filtered-items">
            <!-- SORTING OPTIONS -->
            <nav class=" navbar navbar-expand-custom sort-types">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span>     -->
                <img src="{{asset('images/filter.svg')}}" alt="" class="navbar-toggler-icon">
                </button>

                <button class="btn sort-by-btn by-price">По цене <i></i></button>
                <button class="btn sort-by-btn by-rating">По рейтингу <i></i></button>
                <button class="btn sort-by-btn new-items">По новизне <i></i></button>
                <div class="toggle-view">
                    <a class="list-view view-blue-bg" href=""><i class="mblistview_white"></i></a>
                    <a class="column-view" href=""><i class="mbmosaicview_white"></i></a>
                </div> 

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <form action="get" class="accordion small-filter filter" id="catalogFilter">
                        <ul class="navbar-nav">
                            <div class="card">
                                <div class="card-header" id="filterOne">
                                    <h2 class="mb-0">
                                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="filterOne">
                                        Телевизоры, аудио и видео
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="filterOne" data-parent="#catalogFilter">
                                    <div class="card-body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-1" >
                                            <label  class="custom-control-label" for="smallcustomCheck1-1"> Телевизоры</label>
                                        </div>
                                        <div  class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-2"  >
                                            <label class="custom-control-label" for="smallcustomCheck1-2">OLED</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="filterTwo">
                                    <h2 class="mb-0">
                                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="filterTwo">
                                        Смартфоны и гаджеты
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="filterTwo" data-parent="#catalogFilter">
                                    <div class="card-body">
                                        <div  class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-1"  >
                                            <label class="custom-control-label" for="smallcustomCheck2-1">Смартфоны</label>
                                        </div>
                                        <div  class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-2"  >
                                            <label class="custom-control-label" for="smallcustomCheck2-2">Наушники и гарнитуры</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="filterFour">
                                    <h2 class="mb-0">
                                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="filterFour">
                                        Одежда и обувь
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="filterFour" data-parent="#catalogFilter">
                                    <div class="card-body">
                                        <div  class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-1"  >
                                            <label class="custom-control-label" for="smallcustomCheck4-1">Мужчинам</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </ul>
                    </form>
                </div>
            </nav>
            
            <div class="all-filtered-items">
                <div class="item">
                    <div class="product-img">
                        <img src="{{asset('images/tv6.png')}}" alt="">
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Телевизор Samsung QE55Q77RAU</h6>
                        <p class="sub-title">Телевизоры</p>
                        <div class="rate">
                            <div class="rating stars">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>75</span>
                            </div>
                        </div>
                        <div class="list-full-des">
                            <!-- display -->
                            <h6 class="bold sub-title1">Экран</h6>
                            <p>Диагональ: <span>50" (127см)</span></p>
                            <p>Технология: <span>LED</span></p>
                            <p>Разрешение экрана: <span>380х2160 Пикс (4K Ultra HD)</span></p> 
                            <p>Поддержка HDR: <span>Есть</span> </p>
                            <!-- functionality -->
                            <h6 class="bold sub-title2">Функции</h6>
                            <p class="functions">SmartTV, Воспроизведение видео через USB</p> 
                            <!-- user interfrace -->
                            <h6 class="bold sub-title3">Интерфейсы</h6>
                            <p>HDMI: <span>3</span> </p>
                            <p>Кол-во разюемов: <span>3</span> </p>
                            <p>Wi-Fi: <span>Есть </span> </p>
                            <p>Ethernet: <span>Есть </span> </p>
                            <p class="catalog-item-color">Цвет: <span></span> </p>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">741 640 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Телевизор Samsung QE55Q77RAU" data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbcart"></i>В корзину</div>
                            <div class="libra"data-name="Телевизор Samsung QE55Q77RAU" data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbtocompare"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                        <div class="delivery-options">
                            <div><i class="mbdelievery"></i> Доставка в течении сутки</div>
                            <div><i class="mbbox"></i>Самовывоз, с 8 апреля</div>
                        </div>
                        <p class="sub-title bottom">ООО “Malika Savdo”</p>
                    </div>
                    <!-- end description -->
                </div>
                <div class="item">
                    <div class="product-img">
                        <img src="{{asset('images/tv5.png')}}" alt="">
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Телевизор LG NanoCell 49SM8600PLA</h6>
                        <p class="sub-title">Телевизоры</p>
                        <div class="rate">
                            <div class="rating stars">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>75</span>
                            </div>
                        </div>
                        <div class="list-full-des">
                            <!-- display -->
                            <h6 class="bold sub-title1">Экран</h6>
                            <p>Диагональ: <span>50" (127см)</span></p>
                            <p>Технология: <span>LED</span></p>
                            <p>Разрешение экрана: <span>380х2160 Пикс (4K Ultra HD)</span></p> 
                            <p>Поддержка HDR: <span>Есть</span> </p>
                            <!-- functionality -->
                            <h6 class="bold sub-title2">Функции</h6>
                            <p class="functions">SmartTV, Воспроизведение видео через USB</p> 
                            <!-- user interfrace -->
                            <h6 class="bold sub-title3">Интерфейсы</h6>
                            <p>HDMI: <span>3</span> </p>
                            <p>Кол-во разюемов: <span>3</span> </p>
                            <p>Wi-Fi: <span>Есть </span> </p>
                            <p>Ethernet: <span>Есть </span> </p>
                            <p class="catalog-item-color">Цвет: <span></span> </p>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">446 725 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Телевизор LG NanoCell 49SM8600PLA" data-url="{{asset('images/tv5.png')}}" data-price="446725"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Телевизор LG NanoCell 49SM8600PLA" data-url="{{asset('images/tv5.png')}}" data-price="446725"><i class="mbtocompare"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                        <div class="delivery-options">
                            <div><i class="mbdelievery"></i> Доставка в течении сутки</div>
                            <div><i class="mbbox"></i>Самовывоз, с 8 апреля</div>
                        </div>
                        <p class="sub-title bottom">ООО “Malika Savdo”</p>
                    </div>
                    <!-- end description -->
                </div>
                <div class="item">
                    <div class="product-img">
                        <img src="{{asset('images/tv4.png')}}" alt="">
                        <span class="new-product">НОВИНКА</span>
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Телевизор Samsung UE32M5550AU</h6>
                        <p class="sub-title">Телевизоры</p>
                        <div class="rate">
                            <div class="rating stars">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </div>
                            <div class="comment">
                                <i class="mbcomment"></i>
                                <span>75</span>
                            </div>
                        </div>
                        <div class="list-full-des">
                            <!-- display -->
                            <h6 class="bold sub-title1">Экран</h6>
                            <p>Диагональ: <span>50" (127см)</span></p>
                            <p>Технология: <span>LED</span></p>
                            <p>Разрешение экрана: <span>380х2160 Пикс (4K Ultra HD)</span></p> 
                            <p>Поддержка HDR: <span>Есть</span> </p>
                            <!-- functionality -->
                            <h6 class="bold sub-title2">Функции</h6>
                            <p class="functions">SmartTV, Воспроизведение видео через USB</p> 
                            <!-- user interfrace -->
                            <h6 class="bold sub-title3">Интерфейсы</h6>
                            <p>HDMI: <span>3</span> </p>
                            <p>Кол-во разюемов: <span>3</span> </p>
                            <p>Wi-Fi: <span>Есть </span> </p>
                            <p>Ethernet: <span>Есть </span> </p>
                            <p class="catalog-item-color">Цвет: <span></span> </p>
                        </div>
                        <div class="current-old-price horizontal">
                            <h5 class="price">3 456 447 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Телевизор Samsung UE32M5550AU" data-url="{{asset('images/tv4.png')}}" data-price="3456447"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Телевизор Samsung UE32M5550AU" data-url="{{asset('images/tv4.png')}}" data-price="3456447"><i class="mbtocompare"></i></div>
                            <div class="like"><i class="mbfavorite"></i></div>
                        </div>
                        <div class="delivery-options">
                            <div><i class="mbdelievery"></i> Доставка в течении сутки</div>
                            <div><i class="mbbox"></i>Самовывоз, с 8 апреля</div>
                        </div>
                        <p class="sub-title bottom">ООО “Malika Savdo”</p>
                    </div>
                    <!-- end description -->
                </div>
                

        </div>
    </div>
</section>