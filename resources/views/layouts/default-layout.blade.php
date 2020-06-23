<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>
    <style >
        
        @keyframes loader {
            0% { transform: rotate(0deg);}
            25% { transform: rotate(180deg);}
            50% { transform: rotate(180deg);}
            75% { transform: rotate(360deg);}
            100% { transform: rotate(360deg);}
        }
        @keyframes loader-inner {
            0% { height: 0%;}
            25% { height: 0%;}
            50% { height: 100%;}
            75% { height: 100%;}
            100% { height: 0%;}
        }
        .wrapper-loader{
            width: 100%;
            height: 100vh;
            position: fixed;
            z-index:99;
            top: 0;
            left: 0;
            background-color: #07108f;
            display:flex;
            justify-content: center;
            align-items: center;
        }
        .wrapper-loader  .loader{
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            top: 0%;
            border: 4px solid #Fff;
            animation: loader 2s infinite ease;
        }
        .wrapper-loader .loader .loader-inner{
            vertical-align: top;
            display: inline-block;
            width: 100%;
            background-color: #fff;
            animation: loader-inner 2s infinite ease-in;
        }
    </style>
    @include ('includes.common-style')
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