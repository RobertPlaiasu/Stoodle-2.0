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

<div id="search">
    <input onkeyup="sort()" class="form-control w-75"
        type="text" placeholder="cauta" id="search_field" aria-label="Search">
</div>

@if (count($colleges) > 1)
    @foreach($colleges as $college)

        <div class="col card">
            <!--Image Background-->
            <div class="row-lg-4 backgrounded"></div>

            <!--Print the proprities-->
            <div class="row-lg-2 name">
                {{ $college->name }}                 
            </div>
            <div class="row-lg-3 prop text-center">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            {{ $college->university }}
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">
                            {{ $college->compability }}}
                            <i class="fas fa-percentage"></i></div>
                        <div class="col">
                            $this->countyCollege
                            <i class="fas fa-city"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            
                            {{ $college->profilColllege }}
                            <i class="fas fa-code-branch"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-lg-3 fav text-center">
                <form action="./favoriteAlg.php" method="post">
                    
                    {{ $college->favoriteCollegeFound() }}
                </form>
            </div>
            <div class="row-lg-3 extra text-center">
                <a href="{{ $college->linkCollege }}" target="_blank">Afla mai mult</a>
            </div>
        </div>
    @endforeach
@else 

    <h1>No Colleges</h1>
    
@endif


<script>
    function sort() {
        // Declare variables
        var input = document.getElementById('search_field');
        var filter = input.value.toUpperCase();
        var faculties = document.getElementsByClassName("name");
        var cards = document.getElementsByClassName("card");

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < faculties.length; i++) {
            txtValue = facultati[i].textContent || faculties[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>