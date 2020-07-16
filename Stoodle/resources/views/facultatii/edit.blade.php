@extends('layouts.app')

@section('title', 'Editare facultate')

@section('content')
    <div class="form">
        <div class="container">
            {{-- Header --}}
            <h1>Editare facultate in baza de date</h1>
            <p>Completeaza formularul de mai jos pentru a edita o faculatate.</p>
            
            <form action="{{ route('facultati.update', $college->id) }}" method="POST" id="formular" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                {{-- Edit college name --}}
                <div class="form-group">
                    <label for="name">Numele facultatii.</label>
                    <input type="text" id="name" name="name" value="{{ $college->name }}" class="form-control" placeholder="Numele facultatii" value="{{ $college->name }}">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Edit the university --}}
                <div class="form-group">
                    <label for="university">Universitatea de care apartine facultatea.</label>
                    <select class="custom-select" name="university" id="countyPassion">
                        @foreach ( $data['universities'] as $university )
                            <option value="{{ $university->id }}"
                                {{-- Select the current university --}}
                                @if ( $university->id == $college->university_id)
                                    selected
                                @endif    
                            >
                                {{ $university->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('university')
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
                
                {{-- Edit the link to the college's website --}}
                <div class="form-group">
                    <label for="url">Link catre facultate.</label>
                    <textarea name="url" id="url" rows="1" value="{{ $college->url }}" class="form-control">
                        {{ $college->url }}
                    </textarea>
                    @error('url')
                        {{ $message }}
                    @enderror
                </div>

                {{-- Edit the description of the college --}}
                <div class="form-group">
                    <label for="description">Descriere facultate.</label>
                    <textarea name="description" id="description" value="{{ $college->description }}" rows="7" class="form-control">
                        {{ $college->description }}
                    </textarea>
                    @error('description')
                        {{ $message }}
                    @enderror
                </div> 
                
                {{-- Edit the addmitence boolean --}}
                <div class="form-group">
                    <label for="admittance">Necesita facultatea admintere?</label>
                    <select class="custom-select" name="admittance" id="admittanceSelect">
                        <option value="1"
                        @if ($college->admittance == 1)
                            selected
                        @endif>Da</option>
                    <option value="0"
                        @if ($college->admittance == 0)
                            selected
                        @endif>Nu</option>    
                    </select>
                    @error('admittance')
                            {{ $message }}
                    @enderror
                </div>

                {{-- Enable editing the form --}}
                @include('inc.passion')
                @include('inc.form')


                {{-- Submit the form --}}
                <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
            </form>
                {{-- Delete the college --}}
                <form action="{{ route('facultati.destroy', $college->id ) }}" method="post"> 
                    @method('DELETE')
                    @csrf

                    <button class="btn">
                        DELETE
                    </button>
                </form>
        </div>
    </div>
@endsection
