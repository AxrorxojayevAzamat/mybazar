@component('mail::message')
# Email Confirmation

@lang('auth.refer_link')

@component('mail::button', ['url' => route(Auth::guest() ? 'verify.email' : 'profile.verify.email', ['token' => $user->verify_token])])
@lang('auth.verify_email')
@endcomponent

@lang('auth.thanks'),<br>
{{ config('app.name') }}
@endcomponent
