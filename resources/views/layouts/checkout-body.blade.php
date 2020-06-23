<section>
    <div class="h4-title pay-body">
        <h4 class="title">Оформление заказа</h4>
    </div>
    <div class="outter-pay-checkout-cart">
        <div class="ur-cart">
            <button class="btn back-to-address">Назад в корзину</button>
            <h6>Ваша корзина</h6>
            <p> В корзине:<span> 2 шт.</span></p>
            <p> Общий вес товаров:<span> 16 570 гр.</span></p>
            <p> Скидка:<span class="sale"> 25%</span></p>
            <p> Сумма скидки:<span class="sale"> -564 500 сум</span></p>
            <p class="overall"> Всего к оплате</p>
            <p class="total-checkout">10 231 749 <span>сум</span></p>
        </div>
        <div class="inner-pay-checkout-cart">
            <h6>Предоставьте данные для получения заказа </h6>

            <form id="registration_form" class="form-inner">
                
                <div class="row">
                    <div class="sectionofform">
                        <label for="country">Страна</label>
                        <select id="country" name="country" class="input-outter">
                            <option value="" disabled selected>Выберите</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                        </select>
                        <span class="isselected"></span>
                    </div>
                    <div class="sectionofform">
                        <label for="city">Город</label>
                        <select id="city" name="city" class="input-outter">
                            <option value="" disabled selected>Выберите</option>
                            <option value="">Ташкент</option>
                            <<option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                        </select>
                        <span class="isselected"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="sectionofform">
                        <label for="district">Район</label>
                        <select id="district" name="district" class="input-outter">
                            <option value="" disabled selected>Выберите</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                            <option value="">Узбекистан</option>
                        </select>
                        <span class="isselected"></span>
                    </div>
                    <div class="sectionofform">
                        <label for="">Населенный пункт</label>
                        <select id="city" name="city" class="input-outter">
                            <option value="" disabled selected>Выберите</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                            <option value="">Ташкент</option>
                        </select>
                        <span class="isselected"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="sectionofform">
                        <label for="street">Улица</label>
                        <div class="input-outter">
                            <input type="text" id="street" name="street"  required placeholder="" >
                            <span class="street"></span>
                        </div>
                    </div>
                    <div class="sectionofform">
                        <label for="house">Дом</label>
                        <div class="input-outter">
                            <input type="text" id="house" name="house"  required placeholder="" >
                            <span class="house"></span>
                        </div>
                    </div>
                    <div class="sectionofform">
                        <label for="flat">Квартира</label>
                        <div class="input-outter">
                            <input type="text" id="flat" name="flat"  required placeholder="" >
                            <span class="flat"></span>
                        </div>
                    </div>
                    
                </div>
                

                <div class="sectionofform">
                    <label for="fname">Имя</label>
                    <div class="input-outter">
                        <input type="text" id="fname" name="fullname"  required placeholder="" >
                        <span class="fullname"></span>
                    </div>
                        <span class="error_form" id="fname_error_message"></span>
                </div>

                <div class="sectionofform">
                    <label for="pseries">Серия и номер паспорта</label>
                    <div class="passport-series input-outter">
                        <input required type="text" id="pseriesl" name="passportletter" placeholder="AA" >
                        <input required type="number" id="pseriesn" name="passportnumber" placeholder="00000000" min="000001" max="99999999">
                        <span class="passportseries"></span>
                        <span class="error_form" id="pseries_error_message"></span>
                    </div>
                </div>


                <div class="sectionofform">
                <label for="date">Дата выдачи паспорта</label>
                <div class="input-outter">
                    <input required type="text" id="date" class="form-control" placeholder="дд.мм.гггг">
                    <span class="dateofissue"></span>
                </div>
                <span class="error_form" id="date_error_message"></span>
                </div>

                <div class="sectionofform">
                <label for="adress1">Адрес прописки</label>
                <div class="input-outter">
                    <input required type="text" id="address1" name="placeofresidence" placeholder="Город, район, дом, квартира.">
                <span class="addressofresidence"></span>
                </div>
                <span class="error_form" id="address1_error_message"></span>
                </div>

                <div class="sectionofform">
                <label for="scanpassport">Фото паспорта (главная страница, страница прописки)</label>
                <div class="upload-scan">
                    <div class="add-photo-btn">
                    <span class="fileinput-button">
                        <span> Нажмите для загрузки
                        <img src="{{asset('images/online-application/download.svg')}}">
                        </span>
                            
                        <input type="file" name="files[]" multiple />
                    </span>
                    </div>
                    <div class="list-of-added-phone">
                    <table role="presentation" class="table table-striped">
                        <tbody class="files"></tbody>
                    </table>
                    </div>
                </div>
                </div>

                <div class="sectionofform">
                <label for="dnumber">Введите последние 4 цифры желаемого номера</label>
                <div class="desired-number input-outter">
                    <input required type="text" disabled="disabled" id="desirednumbercode" name="desirednumbercode" placeholder="+99899***">
                    <input type="text" id="dnumber" name="desirednumbernumber" min="0" max="9999" placeholder="0000">
                    <span class="desirednumber"></span>
                    <span class="error_form" id="dnumber_error_message"></span>
                </div>
                </div>


                <div class="sectionofform">
                <label for="tarif">Выберите тарифный план</label>
                <select id="tarif" name="tarifplan" class="input-outter">
                    <option value="" disabled selected>Тарифный план</option>
                    <option value="street">Street (39 900 сум)</option>
                    <option value="streetUpgrade">Street Upgrade(119 700 сум)</option>
                    <option value="flash">Flash (69 900 сум)</option>
                    <option value="flashUpgrade">Flash Upgrade (209 700 сум)</option>
                    <option value="royal">Royal (149 900 сум)</option>
                    <option value="prosto-10">Prosto 10 (10 000 сум)</option>
                    <option value="delovoy">Деловой (99 000 сум)</option>
                    <option value="bolajon">Bolajon (18 000 сум)</option>
                    <option value="yoshlar">Yoshlar (5 000 сум)</option>
                </select>
                <span class="isselected"></span>
                </div>


                <div class="sectionofform conumber">
                <label for="phone">Ваш контакный номер</label>
                <div class="input-outter">
                    <input required type="text" id="phone" name="contactnumber" placeholder="Код ХХХ ХХ ХХ">
                <span class="contactnumber"></span>
                </div>
                <span class="error_form" id="phone_error_message"></span>
                </div>

                <p class="sendcode"><a href="">Отправить код подтверждения</a></p>

                <div class="input-outter sectionofform">
                <input required type="number" id="cverify" name="codeverify" placeholder="Код подтверждения">
                </div>

                <div class="sectionofform"> 
                <label for="address2">Адрес доставки сим карты</label>
                <div class="input-outter">
                    <input type="text" id="address2" name="placeofdelivery" placeholder="Город, район, дом, квартира.">
                <span class="placeofdelivery"></span>
                </div>
                <span class="error_form" id="address2_error_message"></span>
                </div>
        
                <input type="submit" id="submit" value="Отправить заявку">
            </form>
        </div>
    </div>

</section>