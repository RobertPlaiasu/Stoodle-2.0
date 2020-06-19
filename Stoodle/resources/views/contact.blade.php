<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

@include('inc.navbar')

<div id="showcase">
    <div class="content d-flex align-items-center justify-content-center">
        <div class="college-card text-center">
            <img src="./Images/Grigo.jpg" alt="Poza cu Grigo">
            <h3>Grigorescu Alexandru</h3>
            <h6>Front-End Developer</h6>
            <p>Ma consider o persoana joviala</p>
        </div>

        <div class="college-card text-center">
            <img src="./Images/Robert.jpg" alt="Poza cu Robert">
            <h3>Plaiasu Robert</h3>
            <h6>Back-End Developer</h6>
            <p>Imi place sa ma uit la seriale</p>
        </div>
    </div>
</div>
