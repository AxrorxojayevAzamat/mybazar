<section>
    <div class="outter-full-comments">
        <div class="comments">
            <div class="sort-by">
                <button class="btn sort-by-btn by-price">По дате <i></i></button>
                <button class="btn sort-by-btn by-rating">По оценке <i></i></button>
            </div>
            <div class="item">
                <div class="user-with-rating">
                    <div class="user">
                        <div class="user-ava">
                            <img src="{{asset('images/username-default-ava.png')}}" alt="">
                        </div>
                        <div class="user-name">
                            <h6>Анастасия Гаврилова</h6>
                            <p class="green">Этот пользователь купил(а) данный товар</p>
                        </div>
                    </div>
                    <div class="voted-rate">
                        <div class="rating stars">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                        </div>
                    </div>
                </div>
                <p class="date">7 марта 2020</p>
                <h6>Достоинства</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim suscipit sit deserunt natus ducimus minus. Eaque deleniti qui nesciunt quos.</p>

                <h6>Недостатки</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim suscipit sit deserunt natus ducimus minus. Eaque deleniti qui nesciunt quos.</p>

                <h6>Коментарий</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim suscipit sit deserunt natus ducimus minus. Eaque deleniti qui nesciunt quos.</p>
            </div>

            <div class="item">
                <div class="user-with-rating">
                    <div class="user">
                        <div class="user-ava">
                            <img src="{{asset('images/username-default-ava.png')}}" alt="">
                        </div>
                        <div class="user-name">
                            <h6>Анастасия Гаврилова</h6>
                            <p class="red">Этот пользователь не купил(а) данный товар</p>
                        </div>
                    </div>
                    <div class="voted-rate">
                        <div class="rating stars">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                        </div>
                    </div>
                </div>
                <p class="date">7 марта 2020</p>
                <h6>Достоинства</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim suscipit sit deserunt natus ducimus minus. Eaque deleniti qui nesciunt quos.</p>

                <h6>Недостатки</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim suscipit sit deserunt natus ducimus minus. Eaque deleniti qui nesciunt quos.</p>

                <h6>Коментарий</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim suscipit sit deserunt natus ducimus minus. Eaque deleniti qui nesciunt quos.</p>
            </div>

        </div>
        <div class="leave-comment">
            <h6 class="title">Написать отзыв</h6>
            <div class="new-rate">
                <div class="rating stars">
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                </div>
            </div>
            <form action="">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Достоинтсва</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea2">Недостатки</label>
                    <textarea class="form-control" id="exampleFormControlTextarea2"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea3">Коментарий</label>
                    <textarea class="form-control" id="exampleFormControlTextarea3"></textarea>
                </div>
                <input type="submit" id="submit" value="Отправить ">
            </form>
        </div>
    </div>
</section>