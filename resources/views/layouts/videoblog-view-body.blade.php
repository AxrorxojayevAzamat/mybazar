<section>
    <div class="h4-title video-blog">
        <h4 class="title">Видеоролики</h4>
    </div>
    <div class="outter-videoview">
        <div id="search-bar" class="search-bar form-control">
            <input id="search-input" class="bordered-input" type="search" placeholder="Поиск по блогам и новостям">
            <button class="search btn" type="submit"><i class="mbsearch"></i></button>
        </div>
        <div class="inner-videoview">
            <div class="video-player">
                    <video 
                    onplay="hideOverlay()"
                    onpause="showOverlay()"
                    id="my-video"
                    class="video-js"
                    controls
                    preload="auto"
                    poster="../images/poster-ihateusomuch.jpg"
                    data-setup="{}"
                >
                    <source src="{{asset('images/ihateusomuch.mp4')}}" type="video/mp4" />
                    
                    </p>

                    </video>
                    <div class="player-overlay">
                        <h6>Alexander 23 - I Hate You So Much [Official Music Video]</h6>
                    </div> 
            </div>
            <h6>Топовая SFF-сборка на Ryzen</h6>
            <p>Несмотря на то, что мы сейчас переходим на обновленную методику тестирования, «пропустить» 
                Ryzen 5 3600 и не «погонять» его хотя бы для подведения итогов, было бы абсолютно неверно.
                 Чем так интересен этот процессор? Хотя бы тем, что среди решений AMD на базе новой микроархитектуры
                  он является младшим и самым дешевым. </p>
            <div class="small-videos">
                <a href="#">
                    <div class="video-item">
                        <img src="{{asset('images/poster-ihateusomuch.jpg')}}" alt="" class="poster">
                        <div class="video-overlay">
                            <h6>Alexander 23 - I Hate You So Much [Official Music Video]</h6>
                            <button class="btn play">
                                <div class="arrow-right"></div>
                            </button>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div class="video-item">
                        <img src="{{asset('images/poster-ihateusomuch.jpg')}}" alt="" class="poster">
                        <div class="video-overlay">
                            <h6>Alexander 23 - I Hate You So Much [Official Music Video]</h6>
                            <button class="btn play">
                                <div class="arrow-right"></div>
                            </button>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="video-item">
                        <img src="{{asset('images/poster-ihateusomuch.jpg')}}" alt="" class="poster">
                        <div class="video-overlay">
                            <h6>Alexander 23 - I Hate You So Much [Official Music Video]</h6>
                            <button class="btn play">
                                <div class="arrow-right"></div>
                            </button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>