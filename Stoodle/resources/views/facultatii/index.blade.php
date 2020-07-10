@extends('layouts.app')

@section('title', 'Acasa')

@section('content')
    <div class="text-center">
        {{-- Search Bar --}}
        <div id="search" class="mx-4 my-3">
            <input onkeyup="sort()" class="form-control"
                type="text" placeholder="cauta" id="search_field" aria-label="Search">
        </div>
        
        {{-- Display all the colleges that exist --}}
        @if (count($colleges) > 0)
          @foreach($colleges as $college)
              <div class="card">
                    {{-- Image --}}
                    <div class="backgrounded"></div>

                    {{-- Name --}}
                    <div class="name">
                        {{ $college->name }}                 
                    </div>

                    {{-- Features --}}
                    <div class="prop text-center">
                        <div class="col">

                            {{-- University --}}
                            <div class="row">
                                <div class="col">
                                    {{ $college->university->name }}
                                </div>
                            </div>

                            {{-- Compability with the student --}}
                            <div class="row justify-content-between">
                                <div class="col">
                                    {{-- {{ $college->compability }} --}} 50
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <div class="col">
                                    {{ $college->county->name }}
                                    <i class="fas fa-city"></i>
                                </div>
                            </div>

                            {{-- College's profile --}}
                            <div class="row">
                                <div class="col">
                                    {{ $college->profil->name }}
                                    <i class="fas fa-code-branch"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Add the colleges to favorites --}}
                    <div class="row-lg-3 fav text-center">
                        Adaugare la favorite
                        {{-- <form action="./favoriteAlg.php" method="post">
                            {{ $college->favoriteCollegeFound() }}
                        </form> --}}
                    </div>

                    {{-- Know more about the college --}}
                    <div class="row-lg-3 extra text-center">
                        <a href="/facultati/{{ $college->id }}">Afla mai mult</a>
                    </div>
                </div>
            @endforeach
        @else 
            {{-- If there are no colleges display next content --}}
            <h1>Nu am reusit sa incercam facultatile din baza de date</h1>
        @endif
    </div>
@endsection