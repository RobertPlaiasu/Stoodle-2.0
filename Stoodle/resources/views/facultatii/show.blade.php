@extends('layouts.app')

@section('title', $college->name)

@section('content')
    {{-- Close option --}}
    <div id="close">
        <a href="/facultati">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>

    {{-- Display the name and the compability with the user  --}}
    <h1 id="show_header">
        {{ $college->name }} 
        <span> 
            {{ $college->compability }} 
            <i class="fas fa-percentage"></i> 
        </span> 
    </h1>

    {{-- Display features --}}
    <p class="text-muted"> 
        {{ $college->university->name }} | 
        {{ $college->county->name }} | 
        {{ $college->profil->name }} 
    </p>

    {{-- Display the college descriptiomn --}}
    <hr>
    <p>
        {{ $college->description }}
    </p>
    
    <footer class="links mb-5">
        {{-- Link to the college's website --}}
        <a href="{{ $college->url }}" target="_blank">Daca vrei sa afli mai mult despre aceasta facultate apasa aici</a>
        
        {{-- Edit option for admins --}}
        @if( Auth::user()->admin )
            <a href="/facultati/{{ $college->id }}/edit">EDIT</a>
        @endif
    </footer>
@endsection