<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <form action="get" class="accordion small-filter filter" id="catalogFilter">
        <ul class="navbar-nav">
            <div class="card">
                <div class="card-header" id="filterOne">
                    <h2 class="mb-0">
                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="filterOne">
                        Технология
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="filterOne" data-parent="#catalogFilter">
                    <div class="card-body">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-1" >
                            <label  class="custom-control-label" for="smallcustomCheck1-1">LED</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-2"  >
                            <label class="custom-control-label" for="smallcustomCheck1-2">OLED</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-3" >
                            <label class="custom-control-label" for="smallcustomCheck1-3">QLED</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-4"  >
                            <label class="custom-control-label" for="smallcustomCheck1-4">4K UHD</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-5"  >
                            <label class="custom-control-label" for="smallcustomCheck1-5">8K FHD</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="filterTwo">
                    <h2 class="mb-0">
                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="filterTwo">
                        Бренд
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="filterTwo" data-parent="#catalogFilter">
                    <div class="card-body">
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-1"  >
                            <label class="custom-control-label" for="smallcustomCheck2-1">LG</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-2"  >
                            <label class="custom-control-label" for="smallcustomCheck2-2">Samsung</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-3"  >
                            <label class="custom-control-label" for="smallcustomCheck2-3">Artel</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-4"  >
                            <label class="custom-control-label" for="smallcustomCheck2-4">Roison</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck2-5"  >
                            <label class="custom-control-label" for="smallcustomCheck2-5">Toshiba</label>
                        </div>
                        <a class="show-more" href="#">@lang('frontend.show_more')</a>
                    </div>
                </div>
            </div>

            <div class="card price">
                <div class="card-header" id="filterThree">
                    <h2 class="mb-0">
                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="filterThree">
                            @lang('frontend.price')
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

            <div class="card">
                <div class="card-header" id="filterFour">
                    <h2 class="mb-0">
                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="filterFour">
                        Диагональ
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="filterFour" data-parent="#catalogFilter">
                    <div class="card-body">
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-1"  >
                            <label class="custom-control-label" for="smallcustomCheck4-1">До 19 дюймов</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-2"  >
                            <label class="custom-control-label" for="smallcustomCheck4-2">20 - 26 дюймов</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-3"  >
                            <label class="custom-control-label" for="smallcustomCheck4-3">27 - 32 дюймов</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-4"  >
                            <label class="custom-control-label" for="smallcustomCheck4-4">37 - 43 дюймов</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-5"  >
                            <label class="custom-control-label" for="smallcustomCheck4-5">45 - 49 дюймов</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-6"  >
                            <label class="custom-control-label" for="smallcustomCheck4-6">50 - 58 дюймов</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-7"  >
                            <label class="custom-control-label" for="smallcustomCheck4-7">60 дюймов и более</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="filterFive">
                    <h2 class="mb-0">
                        <button class="btn filter-title" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="filterFive">
                        Функции
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="filterFive" data-parent="#catalogFilter">
                    <div class="card-body">
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-1"  >
                            <label class="custom-control-label" for="smallcustomCheck5-1">SmartTV</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-2"  >
                            <label class="custom-control-label" for="smallcustomCheck5-2">WiFi</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-3"  >
                            <label class="custom-control-label" for="smallcustomCheck5-3">Поддержка HDR</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-4"  >
                            <label class="custom-control-label" for="smallcustomCheck5-4">Встроенный сабвуфер</label>
                        </div>
                        <div  class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-5"  >
                            <label class="custom-control-label" for="smallcustomCheck5-5">Curved</label>
                        </div>
                    </div>
                </div>
            </div>

        </ul>
    </form>
</div>
