@extends('layouts.app')

@section('title', 'SMS page')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/auth.css')}}"> --}}
@endsection

@section('body')
    <!--auth body  -->
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">Вход или регистрация</h4>
        </div>
        <div class="outter-resend-sms">
            <div class="inner">
                <form action="">
                    <div class="phone-number">
                        <label for="phone-number">Введите код из SMS</label>
                        <div class="input">
                            <input type="tel" id="phone-number" class="form-control bordered-input"  required placeholder="" >
                        </div>
                    </div>
                    <input class="resend-sms" type="submit" id="submit" value="Отправить заново через 59 секунд">
                </form>
                <a href="#">Войти с помощью пароля</a>
            </div>
        </div>

    </section>
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
