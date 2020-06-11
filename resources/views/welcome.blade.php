<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script type="text/javascript"  src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript"  src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript"  src="{{ asset('js/bootstrap.min.js') }}" ></script>
        <script type="text/javascript"  src="{{ asset('js/dragAndDrop.js') }}" ></script>
        <script type="text/javascript"  src="{{ asset('js/validar.js') }}" ></script>
        <!-- IMPORTAR -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">



    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home/en') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>

                        @endif
                    @endauth

                </div>
            @endif
            <div class="content">
             <h1>Tu Portal</h1>

            </div>
        </div>
    </body>
</html>
