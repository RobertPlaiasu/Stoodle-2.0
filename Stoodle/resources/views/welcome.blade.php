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
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">logare</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">inregistrare</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 id="main-title"> 
                                Dezvolta-te in viata si in cariera
                            </h1>
                            <p class="mb-5">
                            Viața ta începe în momentul în care începi să iei decizii. Decizii 
                        importante care îți marchează tot <br> viitorul. Și sigur nu vrei să fie unele 
                        greșite. Pentru a fi sigur că te îndrepți spre reușită, ia cele mai <br> bune 
                        decizii pentru tine, în funcție de aptitudinile pe care le ai.
                            </p>
                            <div class="links">
                            <a href="{{ route('login') }}"> Incepe </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="cookie-container">
                <p class="p-2">
                    Folosim cookie-uri pe acest site web pentru a vă oferi cea mai bună experiență pe site-ul nostru și pentru a vă afișa reclame relevante. Pentru a afla mai multe, citiți
                    <a href="#">politica noastră de confidențialitate</a> și <a href="#">olitica privind cookie-urile</a>.
                </p>
                <button class="cookie-btn">
                Okay
                </button>
            </div>

        </div>
    </body>
</html>
