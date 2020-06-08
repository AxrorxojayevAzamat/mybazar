<section>
    <div class="outter-brand-view-body">
        <form action="get" class="accordion big-filter filter" id="catalogFilter">
            <div class="filter-item">
                <label for="" class="filter-title">Категории</label>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1-1" >
                    <label  class="custom-control-label" for="customCheck1-1">Телевизоры, аудио и виедо</label>
                </div>
                <div  class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1-2"  >
                    <label class="custom-control-label" for="customCheck1-2">Смартфоны и гаджеты</label>
                </div>
                <div  class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1-3" >
                    <label class="custom-control-label" for="customCheck1-3">Бытовая техника для дома</label>
                </div>
                <div  class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1-4"  >
                    <label class="custom-control-label" for="customCheck1-4">Для кухни</label>
                </div>
            </div>
            <div class="filter-item">
                <label for="" class="filter-title">Цена</label>
                <div class="outter-range-slider">	
                    <div class="form-group">
                        <input type="text" class=" js-input-from form-control" value="0" />
                        <span>-</span>
                        <input type="text" class=" js-input-to form-control" value="0" />
                    </div>
                    <div class="range-slider">
                        <input type="text" class="js-range-slider" value="" />
                    </div>
                </div>
            </div>
        </form>
        <div class="wrapper-filtered-items">
            <!-- SORTING OPTIONS -->
            <nav class=" navbar navbar-expand-custom sort-types">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span>     -->
                <i class="navbar-toggler-icon mbcompare"></i>
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
                                        Категории
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="filterOne" data-parent="#catalogFilter">
                                    <div class="card-body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-1" >
                                            <label  class="custom-control-label" for="smallcustomCheck1-1">Телевизоры, аудио и видео</label>
                                        </div>
                                        <div  class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-2"  >
                                            <label class="custom-control-label" for="smallcustomCheck1-2">Смартфоны и гаджеты</label>
                                        </div>
                                        <div  class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-3" >
                                            <label class="custom-control-label" for="smallcustomCheck1-3">Бытовая техника для дома</label>
                                        </div>
                                        <div  class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-4"  >
                                            <label class="custom-control-label" for="smallcustomCheck1-4">Для кухни</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card price">
                                <div class="card-header" id="filterThree">
                                    <h2 class="mb-0">
                                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="filterThree">
                                        Цена
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="filterThree" data-parent="#catalogFilter">
                                    <div class="card-body">
                                    <div class="outter-range-slider">	
                                        <div class="form-group">
                                            <input type="text" class=" js-input-from form-control" value="0" />
                                            <span>-</span>
                                            <input type="text" class=" js-input-to form-control" value="0" />
                                        </div>
                                        <div class="range-slider">
                                            <input type="text" class="js-range-slider" value="" />
                                        </div>
                                    
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
                <div class="item">
                    <div class="product-img">
                        <img src="{{asset('images/tv3.png')}}" alt="">
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Samsung UE 49 M6500AU</h6>
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
                            <h5 class="price">2 446 447 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Samsung UE 49 M6500AU" data-url="{{asset('images/tv3.png')}}" data-price="2446447"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Samsung UE 49 M6500AU" data-url="{{asset('images/tv3.png')}}" data-price="2446447"><i class="mbtocompare"></i></div>
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
                        <img src="{{asset('images/tv1.png')}}" alt="">
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Телевизор Samsung UE437200U</h6>
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
                            <h5 class="price">427 895 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Телевизор Samsung UE437200U" data-url="{{asset('images/tv1.png')}}" data-price="427895"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Телевизор Samsung UE437200U" data-url="{{asset('images/tv1.png')}}" data-price="427895"><i class="mbtocompare"></i></div>
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
                        <img src="{{asset('images/tv1.png')}}" alt="">
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Телевизор Samsung UE437200U</h6>
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
                            <h5 class="price">427 895 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Телевизор Samsung UE437200U" data-url="{{asset('images/tv1.png')}}" data-price="427895"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Телевизор Samsung UE437200U" data-url="{{asset('images/tv1.png')}}" data-price="427895"><i class="mbtocompare"></i></div>
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
                        <img src="{{asset('images/tv3.png')}}" alt="">
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Samsung UE 49 M6500AU</h6>
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
                            <h5 class="price">2 446 447 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Samsung UE 49 M6500AU" data-url="{{asset('images/tv3.png')}}" data-price="2446447"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Samsung UE 49 M6500AU" data-url="{{asset('images/tv3.png')}}" data-price="2446447"><i class="mbtocompare"></i></div>
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
                        <img src="{{asset('images/tv1.png')}}" alt="">
                        <span class="sale small">
                            <span class="number">-20%<span>
                                СКИДКa
                            </span>
                        </span>
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Телевизор Samsung UE437200U</h6>
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
                            <h5 class="price">427 895 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Телевизор Samsung UE437200U"data-url="{{asset('images/tv1.png')}}" data-price="427895"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Телевизор Samsung UE437200U"data-url="{{asset('images/tv1.png')}}" data-price="427895"><i class="mbtocompare"></i></div>
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
                        <img src="{{asset('images/tv3.png')}}" alt="">
                    </div>
                    <!-- description -->
                    <div class="description ">
                        <h6 class="title">Samsung UE 49 M6500AU</h6>
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
                            <h5 class="price">2 446 447 <span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Samsung UE 49 M6500AU" data-url="{{asset('images/tv3.png')}}" data-price="2446447"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Samsung UE 49 M6500AU" data-url="{{asset('images/tv3.png')}}" data-price="2446447"><i class="mbtocompare"></i></div>
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
                            <div class="libra"  data-name="Телевизор Samsung UE32M5550AU" data-url="{{asset('images/tv4.png')}}" data-price="3456447"><i class="mbtocompare"></i></div>
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
                            <div class="cart" data-name="Телевизор LG NanoCell 49SM8600PLA" data-url="{{asset('images/tv5.png')}}" data-price="446725 "><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Телевизор LG NanoCell 49SM8600PLA" data-url="{{asset('images/tv5.png')}}" data-price="446725 "><i class="mbtocompare"></i></div>
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
                            <h5 class="price">741 640<span>сум</span></h5>
                            <h6 class="old-price">855 790 <span>сум</span></h6>
                        </div>
                        <div class="item-action-icons">
                            <div class="cart" data-name="Телевизор Samsung QE55Q77RAU"  data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbcart"></i>В корзину</div>
                            <div class="libra" data-name="Телевизор Samsung QE55Q77RAU"  data-url="{{asset('images/tv6.png')}}" data-price="741640"><i class="mbtocompare"></i></div>
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

            <!-- PAGINATION  -->
            <nav class="products-pagination" aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li> -->
                    <li class="page-item active"><a href="#">1</a></li>
                    <li class="page-item"><a href="#">2</a></li>
                    <li class="page-item"><a href="#">3</a></li>
                    <li class="page-item">
                        <a href="#" aria-label="Next">
                            <i class="mbnext_page"></i>
                        </a>
                    </li>
                    <li class="page-item"><a href="#">10</a></li>
                </ul>
            </nav>

        </div>
    </div>
</section>