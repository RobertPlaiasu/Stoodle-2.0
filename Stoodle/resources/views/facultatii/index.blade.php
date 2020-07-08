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
                                  {{ $college->university()->name }}
                              </div> 
                          </div>
                         </div>
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
        
            <h1>Nu am resuti sa incercam facultatile din baza de date</h1>
            
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