@extends('layouts.app')

@section('title', 'Auth page')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">Вход или регистрация</h4>
        </div>
        <div class="outter-sign-reg">
            <div class="inner-sign-reg">
                <form action="">
                    <div class="phone-number">
                        <label for="phone-number">По номеру телефона</label>
                        <div class="input">
                            <input type="tel" id="phone-number" class="form-control bordered-input"  required placeholder="" >
                        </div>
                    </div>
                    <input type="submit" id="submit" value="Получить SMS код">
                </form>
                <div class="sign-in-through">
                    <label for="social-accounts">Войти через</label>
                    <div class="social-app-icons" id="social-accounts">
                        <i class="mbfacebook"></i>
                        <i class="mbtwitter"></i>
                        <!-- <i class=""></i> -->
                        <i class="mbvkontakte"></i>
                        <!-- <i class=""></i> -->
                    </div>
                </div>
            </div>
            <a href="#">Войти с помощью пароля</a>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
@endsection
