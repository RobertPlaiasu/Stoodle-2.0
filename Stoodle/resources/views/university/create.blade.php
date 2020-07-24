@extends('layouts.app')

@section('title', 'Introducere facultate')

@section('content')
    <div class="form">
        <div class="container">
            {{-- Header --}}
            <h1>Inregistrare universitate in baza de date</h1>
            <p>Completeaza formularul de mai jos pentru a inregistrara o universitate.</p>

            <form action="{{ route('university.store') }}" method="POST" id="formular" enctype="multipart/form-data">
                @csrf

                {{-- Type college's name --}}
                <div class="form-group">
                    <label for="name">Numele universitatii.</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Numele universitatii">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Type college picture --}}
                <div class="form-group d-flex flex-column">
                    <label for="image">Poza cu universitatea.</label>
                    <input type="file" id="image" name="image" class="py-3" >
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Type the link to the college's website --}}
                <div class="form-group">
                    <label for="url">Link catre universitate.</label>
                    <input name="url" id="url" value="{{old('url')}}"class="form-control">
                    @error('url')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Type a description for the college --}}
                <div class="form-group">
                    <label for="description">Descriere universitate.</label>
                    <textarea name="description" rows="7" class="form-control">{{old('description')}}</textarea>
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Submit the form --}}
                <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
            </form>
        </div>
    </div>
@endsection
