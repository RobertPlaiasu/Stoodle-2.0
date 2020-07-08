@extends('layouts.app')

@section('title', 'Formular')

@section('content')
<div class="form">
    <div class="container">
        <h1>Bun venit in familia Stoodle!</h1>
        <p>Completeaza formularul de mai jos pentru a putea termina inregistrarea.</p>
        <form action="/form" method="POST" id="formular">
            @csrf
            @include('inc.passion')
            <div class="form-group">
                <label for="passion-metter"> Cat de pasionat esti? </label> <br>
                <input class="radio" type="radio" name="passionIntensity" id="budget-1" value="1" checked>
                    <label class="for-radio" for="budget-1">
                        <span data-hover="1">1</span>
                    </label>
                <input class="radio" type="radio" name="passionIntensity" id="budget-2" value="2">
                    <label class="for-radio" for="budget-2">							
                        <span data-hover="2">2</span>
                    </label>    
                <input class="radio" type="radio" name="passionIntensity" id="budget-3" value="3">
                    <label class="for-radio" for="budget-3">							
                        <span data-hover="3">3</span>
                    </label>
                <input class="radio" type="radio" name="passionIntensity" id="budget-4" value="4">
                    <label class="for-radio" for="budget-4">							
                        <span data-hover="4">4</span>
                    </label>
                <input class="radio" type="radio" name="passionIntensity" id="budget-5" value="5">
                    <label class="for-radio" for="budget-5">							
                        <span data-hover="5">5</span>
                    </label>
                    @error('passionIntenstity')
                        {{ $message }}
                    @enderror
            </div>
            @include('inc.form');
            <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
        </form>
    </div>
</div>
@endsection