@extends('layouts.app')

@section('title', 'Favorite')

@section('content')
    <div class="text-center">
        {{-- Search Bar --}}
        <div id="search" class="mx-4 my-3">
            <input onkeyup="sort()" class="form-control"
                type="text" placeholder="cauta" id="search_field" aria-label="Search">
        </div>
        
        {{-- Display all the colleges that exist --}}
        @if (count($myFavorites ) > 0)
            <div class="d-flex">
                @foreach($myFavorites  as $college)
                    <div class="card col-lg-4">
                        {{-- Image --}}
                        <div class="backgrounded">
                        <img src="{{ asset('storage/'.$college->image) }}" alt="">
                        </div>

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
                                        {{ $college->compability }}
                                        <i class="fas fa-percentage"></i>
                                    </div>
                                    <div class="col">
                                        {{ $college->county->name }}
                                        <i class="fas fa-city"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Add the colleges to favorites --}}
                        <div class="row-lg-3 fav text-center"> 
                                <favorite
                                    :college={{ $college->id }}
                                    :favorited={{ $college->favorited() ? 'true' : 'false' }}
                                ></favorite>
                        </div>

                        {{-- Know more about the college --}}
                        <div class="row-lg-3 extra text-center">
                            <a href="/facultati/{{ $college->id }}">Afla mai mult</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else 
            {{-- If there are no colleges display next content --}}
            <h1>Nu ai seelctat inca facultati. Du-te si gaseste-ti unele :D</h1>
        @endif
    </div>
@endsection