@component('mail::message')
# Reset Password Confirmation

@lang('auth.refer_link')

@component('mail::button', ['url' => route('password.reset', ['token' => $user->verify_token])])
@lang('auth.reset_password')
@endcomponent

@lang('auth.thanks'),<br>
{{ config('app.name') }}
@endcomponent
