@extends('layouts.app')

@section('title', $college->name)

@section('content')
    {{-- Close option --}}
    <div id="close" style="position: absolute; right: 3em;">
        <a href="/facultati" style="color: black; font-size: 1.25rem">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
        </a>
    </div>

    {{-- Display the name and the compability with the user  --}}
    <h1>
        {{ $college->name }} 
        <span> 50% </span> 
    </h1>

    {{-- Display features --}}
    <p> 
        {{ $college->university->name }} | 
        {{ $college->county->name }} | 
        {{ $college->profil->name }} 
    </p>

    {{-- Display the college descriptiomn --}}
    <hr>
    <p>
        {{ $college->description }}
    </p>
    
    <footer>
        {{-- Edit option for admins --}}
        <a href="edit">EDIT</a>

        {{-- Link to the college's website --}}
        <a href="{{ $college->link }}" target="_blank">Daca vrei sa afli mai mult despre aceasta facultate apasa aici</a>
    </footer>
@endsection