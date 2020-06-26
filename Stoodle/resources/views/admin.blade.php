@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    @if (Auth::user()->rank == 'admin')
        <div class="form">
            <div class="container">
                <h1>Inregistrare facultate in baza de date</h1>
                <p>Completeaza formularul de mai jos pentru a putea termina inregistrarea.</p>
                <form action="./formular.php" method="post" id="formular">
                    <div class="form-group">
                        <label for="name">Numele facultatii.</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Numele facultatii">
                    </div>
                    <div class="form-group">
                        <label for="university">Universitatea de care apartine facultatea.</label>
                        <input type="text" id="university" name="university" class="form-control" placeholder="Universitatea de care apartine facultatea">
                    </div>
                    <div class="form-group">
                        <label for="county">Judetul in care se afla facultatea.</label>
                        <select class="custom-select" id ="county" name="county">
                        @foreach ($counties as $county)
                            <option value="{{ $county->name }}"> {{ $county->name }} </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="branch">Link catre facultate.</label>
                        <textarea name="county" id="conuty" rows="15" class="form-control"></textarea>
                    </div>
                    <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
                </form>
            </div>
        </div>
    @else
        <h1>ACCES RESTRICTIONAT</h1>
    @endif
@endsection
