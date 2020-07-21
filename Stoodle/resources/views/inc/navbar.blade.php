<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <a href="/">
            <img src="{{ asset('img/logo.png') }}" alt="logo" width="32px">
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100 ml-4">
                <li class="nav-item">
                    <a href="{{ url('/facultati') }}" class="nav-link">Exploreaza</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/intrebari') }}" class="nav-link">Intrebari</a>
                </li>

                <li class="nav-item ml-auto">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if( Auth::user()->admin )
                                <a href="{{ url('/admin') }}" class="dropdown-item">Admin</a>
                            @endif
                            <a href="{{ url('/form') }}" class="dropdown-item">Formular</a>
                            <a href="{{ url('/facultati-favorite') }}" class="dropdown-item">Facultati favorite</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Deconectare') }}
                            </a>
                        </div>
                      </div>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>