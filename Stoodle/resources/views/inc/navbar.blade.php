<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            @guest
                Stoodle
            @else
                {{ Auth::user()->name }} <span class="caret"></span>
            @endguest
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" style="flex-direction: row-reverse;">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('autentificare') }}</a>
                    </li>
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('inregistrare') }}</a>
                        </li>
                    @endif

                @else
                    <li class="nav-item">
                        <a href="{{ url('/acasa') }}" class="nav-link">Acasa</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/formular') }}" class="nav-link">Formular</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
                    </li>

                    @if (Auth::user()->admin == 1)
                    <li class="nav-item">
                        <a href="{{ url('/admin') }}" class="nav-link">Admin</a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ url('/facultati-favorite') }}" class="nav-link">Facultati favorite</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/intrebari') }}" class="nav-link">Intrebari</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Deconectare') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf

                    </form>
                @endguest
            </ul>
        </div>
        
    </div>
</nav>