<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a href="{{ url('/') }}">
                "Salut, '.$user->firstNameUser.'!"
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" style="flex-direction: row-reverse;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/acasa') }}" class="nav-link">Acasa</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/formular') }}" class="nav-link">Formular</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/facultati-favorite') }}" class="nav-link">Facultati favorite</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/intrebari') }}" class="nav-link">Intrebari</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link"> Deconectare</a>
                </li>
            </ul>
        </div>
        
    </div>
</nav>