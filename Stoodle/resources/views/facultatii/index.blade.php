@extends('layouts.app')

@section('title', 'Acasa')

@section('content')
    <div class="w-100 text-center">
        <div id="search" class="mx-4 my-3">
            <input onkeyup="sort()" class="form-control"
                type="text" placeholder="cauta" id="search_field" aria-label="Search">
        </div>
        
        @if (count($colleges) > 0)
          @foreach($colleges as $college)

              <div class="card">
                    {{-- * Image --}}
                    <div class="backgrounded"></div>

                    {{-- * Name --}}
                    <div class="name">
                        {{ $college->name }}                 
                    </div>

                    {{--* University && Compability && County --}}
                    <div class="prop text-center">
                        <div class="col">

                            {{-- * University --}}
                            <div class="row">
                                <div class="col">
                                    {{ $college->university->name }}
                                </div>
                            </div>

                            <div class="row justify-content-between">
                                <div class="col">
                                    {{-- {{ $college->compability }} --}}
                                    50 %
                                    <i class="fas fa-percentage"></i></div>
                                <div class="col">
                                    {{ $college->county->name }}
                                    <i class="fas fa-city"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{ $college->profil->name }}
                                    <i class="fas fa-code-branch"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-lg-3 fav text-center">
                        Adaugare la favorite
                        {{-- <form action="./favoriteAlg.php" method="post">
                            {{ $college->favoriteCollegeFound() }}
                        </form> --}}
                    </div>
                    <div class="row-lg-3 extra text-center">
                        <a href="facultati/{{ $college->id }}">Afla mai mult</a>
                    </div>
                </div>
            @endforeach
        @else 
        
            <h1>Nu am reusit sa incercam facultatile din baza de date</h1>
            
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
    </div>
@endsection