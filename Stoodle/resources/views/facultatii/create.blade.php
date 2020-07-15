@extends('layouts.app')

@section('title', 'Introducere facultate')

@section('content')
    <div class="form">
        <div class="container">
            {{-- Header --}}
            <h1>Inregistrare facultate in baza de date</h1>
            <p>Completeaza formularul de mai jos pentru a inregistrara o faculatate.</p>

            <form action="{{ route('facultati.store') }}" method="POST" id="formular">
                @csrf

                {{-- Type college's name --}}
                <div class="form-group">
                    <label for="name">Numele facultatii.</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Numele facultatii">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Select the college's univerisity --}}
                <div class="form-group">
                    <label for="university">Universitatea de care apartine facultatea.</label>
                    <select class="custom-select" name="university" id="countyPassion">
                        @foreach ( $data['universities'] as $university )
                            <option value="{{ $university->id }}">{{ $university->name }}</option>
                        @endforeach
                    </select>
                    @error('university')
                            {{ $message }}
                    @enderror
                </div>

                {{-- Type the link to the college's website --}}
                <div class="form-group">
                    <label for="url">Link catre facultate.</label>
                    <textarea name="url" id="url" rows="1" class="form-control"></textarea>
                    @error('url')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Type a description for the college --}}
                <div class="form-group">
                    <label for="description">Descriere facultate.</label>
                    <textarea name="description" id="description" rows="7" class="form-control"></textarea>
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
                
                {{-- Select if this college needs addmitence --}}
                <div class="form-group">
                    <label for="admittance">Necesita facultatea admintere?</label>
                    <select class="custom-select" name="admittance" id="admittanceSelect">
                        <option value="1">Da</option>
                        <option value="0">Nu</option>
                    </select>
                    @error('admittance')
                            {{ $message }}
                    @enderror
                </div>

                {{-- Complete a form for the perfect candidate's profile --}}
                @include('inc.passion')
                @include('inc.form')

                {{-- Submit the form --}}
                <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
            </form>
        </div>
    </div>
@endsection
