<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stoodle</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links m-5">
                    @auth
                        <a href="{{ url('/acasa') }}">acasa</a>
                    @else
                        <a href="{{ route('login') }}">autentificare</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">inregistrare</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                        <img src="{{ asset('img/logo.png') }}" alt="logo">
                        </div>
                        <div class="col">
                            <h1> 
                                Dezvolta-te in viata si in cariera
                            </h1>
                            <p class="mb-3">
                                Viața ta începe în momentul în care începi să iei decizii. Decizii 
                                importante care îți marchează tot
                                viitorul. Și sigur nu vrei să fie unele greșite. Pentru a fi sigur 
                                că te îndrepți spre reușită, ia cele mai 
                                bune decizii pentru tine, în funcție de aptitudinile pe care le ai.
                            </p>
                            <div class="links">
                                <a href="{{ route('login') }}"> Incepe </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="cookie-container">
                @include('cookieConsent::index')
            </div>

        </div>
    </body>
</html>
