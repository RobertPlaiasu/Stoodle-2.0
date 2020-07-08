@extends('layouts.app')

@section('title', 'Formular')

@section('content')
<div id="close" style="position: absolute; right: 3em;">
    <a href="/facultati" style="color: black; font-size: 1.25rem">
        <i class="fa fa-times-circle" aria-hidden="true"></i>
    </a>
</div>

<h1>{{ $college->name }} <span> 50% </span> </h1>
<p> 
    {{ $college->university->name }} | 
    {{ $college->county->name }} | 
    {{ $college->profil->name }} 
</p>
<hr>
{{ $college->description }}

<footer>
    <a href="{{ $college->link }}" target="_blank">Daca vrei sa afli mai mult despre aceasta facultate apasa aici</a>
</footer>

@endsection