<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> @yield('title')</title>
        
        @yield('styles')
    </head>
    <body>
        <!-- page loader -->
        <div class="wrapper-loader">
            <span class="loader">
                <span class="loader-inner"></span>
            </span>
        </div>
        @yield('body')
        @include ('includes.common-js')
    </body>
</html>