@extends('layouts.app')

@section('title', 'Introducere facultate')

@section('content')
    <div class="form">
        <div class="container">
            {{-- Header --}}
            <h1>Inregistrare facultate in baza de date</h1>
            <p>Completeaza formularul de mai jos pentru a inregistrara o faculatate.</p>

            <form action="{{ route('facultati.store') }}" method="POST" id="formular" enctype="multipart/form-data">
                @csrf

                {{-- Type college's name --}}
                <div class="form-group">
                    <label for="name">Numele facultatii.</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Numele facultatii">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Type college picture --}}
                <div class="form-group d-flex flex-column">
                    <label for="image">Poza cu facultatea.</label>
                    <input type="file" id="image" name="image" class="py-3" >
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Select the college's univerisity --}}
                <div class="form-group">
                    <label for="university">Universitatea de care apartine facultatea.</label>
                    <select class="custom-select" name="university" id="countyPassion">
                        @foreach ( $data['universities'] as $university )
                            <option value="{{ $university->id }}"
                                @if (old('university') == $university->id)
                                    selected
                                @endif>{{ $university->name }}</option>
                        @endforeach
                    </select>
                    @error('university')
                            {{ $message }}
                    @enderror
                </div>

                {{-- Type the link to the college's website --}}
                <div class="form-group">
                    <label for="url">Link catre facultate.</label>
                    <input name="url" id="url" value="{{old('url')}}"class="form-control">
                    @error('url')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Type a description for the college --}}
                <div class="form-group">
                    <label for="description">Descriere facultate.</label>
                    <textarea name="description" id="description" rows="7" class="form-control">{{old('description')}}</textarea>
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
                
                {{-- Select if this college needs addmitence --}}
                <div class="form-group">
                    <label for="admittance">Necesita facultatea admintere?</label>
                    <select class="custom-select" name="admittance" id="admittanceSelect">
                        <option value="1"
                            @if (old('addmittance') == 1)
                                selected
                            @endif>Da</option>
                        <option value="0"
                            @if (old('addmittance') == 0)
                                    selected
                                @endif>Nu</option>
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
