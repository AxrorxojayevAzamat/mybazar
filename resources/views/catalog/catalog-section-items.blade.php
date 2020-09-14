<div class="all-filtered-catalog-section">
    <div class="types-of-media">
        @foreach($rootCategories as $category)
        <a href="{{ route('category.show', $category) }}">
            <div class="item">
                <div class="image">
                    <img src="{{asset('images/type-of-media1.png')}}" alt="">
                </div>
                <h6 class="title">{{$category->name}}</h6>
            </div>
        </a>
        @endforeach
    </div>
    <div class="all-filtered-blogs">
        <a href="#">
            <div class="blog-item">
                <div class="image">
                    <img src="{{asset('images/blog-page1.png')}}" alt="">
                    <div class="image-overlay"></div>
                </div>
                <div class="description">
                    <h6 class="title">Как выбрать телевизор?</h6>
                    <p>Выбор телевизора- процесс непростой, но мы постарались вам его максимально облегчить. Если вы планируете </p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="blog-item">
                <div class="image">
                    <img src="{{asset('images/blog-page2.png')}}" alt="">
                    <div class="image-overlay"></div>
                </div>
                <div class="description">
                    <h6 class="title">Сравнение отечественных телевизоров</h6>
                    <p>Групповой тест- сравниваем 55-дюймовые 4k- бюджетники от трёх приличных брендов из Поднебесно!</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="blog-item">
                <div class="image">
                    <img src="{{asset('images/blog-page3.png')}}" alt="">
                    <div class="image-overlay"></div>
                </div>
                <div class="description">
                    <h6 class="title">Умный ТВ в умном доме</h6>
                    <p>Все, что вы хотели знать о некоторых технологиях, но боялись спросить! Максимально доступно и коротко </p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="blog-item">
                <div class="image">
                    <img src="{{asset('images/blog-page4.png')}}" alt="">
                    <div class="image-overlay"></div>
                </div>
                <div class="description">
                    <h6 class="title">Топ-10 Smart-телевизоров 2020 года</h6>
                    <p>Телевизор уже давно превратился в домашний мультимедийный центр. </p>
                </div>
            </div>
        </a>
    </div>

    <div class="catalog-banner"></div>
</div>

            

