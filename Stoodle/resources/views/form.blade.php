@extends('layouts.app')

@section('title', 'Formular')

@section('content')
<div class="form">
    <div class="container">
        <h1>Bun venit in familia Stoodle!</h1>
        <p>Completeaza formularul de mai jos pentru a putea termina inregistrarea.</p>
        <form action="/form" method="POST" id="formular">
            @csrf
            @include('inc.form');
            <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
        </form>
    </div>
</div>
@endsection