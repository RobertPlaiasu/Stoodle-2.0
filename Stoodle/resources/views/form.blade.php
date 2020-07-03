@extends('layouts.app')

@section('title', 'Formular')

@section('content')
<div class="form">
    <div class="container">
        <h1>Bun venit in familia Stoodle!</h1>
        <p>Completeaza formularul de mai jos pentru a putea termina inregistrarea.</p>
        <form action="/form" method="POST" id="formular">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="passion">De ce esti pasionat?</label>
                <select class="custom-select" id="passionSelect" name="passion">

                    @foreach ( $passions as $passion )
                        <option value="{{ $passion->name }}"> {{ $passion->name }} </option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
            <label for="passion-metter">Cat de pasionat esti?</label> <br>
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
            </div>
            <div class="form-group">
                <label for="classes">Ce materii iti plac?</label>
                <select class="custom-select mb-2 classSelect" name="class-1" class="classSelect">
                    @foreach ( $subjects as $subject )
                        <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
                <select class="custom-select mb-2 classSelect" name="class-2" class="classSelect">
                    @foreach ( $subjects as $subject )
                        <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
                <select class="custom-select mb-2 classSelect" name="class-3" class="classSelect">
                    @foreach ( $subjects as $subject )
                        <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="branch">Pe ce profil esti?</label>
                <select class="custom-select" name="branch" id="branchSelect">
                    @foreach ( $profils as $profil )
                        <option value="{{ $profil->name }}">{{ $profil->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="stress">Poti face fata unor situatii strsante?</label>
                <select class="custom-select" name="stress" id="passionSelect">
                    <option value="1">Da</option>
                    <option value="0">Nu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="job">Iti doresti un part-time job?</label>
                <select class="custom-select" name="job" id="jobSelect">
                    <option value="1">Da</option>
                    <option value="0">Nu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="books">Ce tip de carti citesti?</label>
                <select class="custom-select" name="books" id="booksSelect">
                    @foreach ( $books as $book )
                        <option value="{{ $book->name }}">{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="county">Din ce judet esti?</label>
                <select class="custom-select" name="county" id="countyPassion">
                    @foreach ( $counties as $county )
                        <option value="{{ $county->name }}">{{ $county->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="social">Te consideri o persoana sociabila?</label>
                <select class="custom-select" name="social" id="socialSelect">
                    <option value="1">Da</option>
                    <option value="0">Nu</option>   
                </select>
            </div>
            <div class="form-group">
                <label for="sport">Practici vreun sport?</label>
                <select class="custom-select" name="sport" id="sportSelect">
                    <option value="1">Da</option>
                    <option value="0">Nu</option>                       
                </select>
            </div>
            <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
        </form>
    </div>
</div>
@endsection