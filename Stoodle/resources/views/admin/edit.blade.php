@extends('layouts.app')

@section('title', $text->printDocumentTitle('Editare') )

@section('content')
<div class="mx-auto container mt-4">

    <h1> Schimba o/un {{ $text->printNormalText() }} in baza de date</h1>
    <form action="/admin/{{ $text->printLink() }}/{{ $item->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Nume pentru {{ $text->printNormalText() }}</label>    
            <input type="text" name="nume" class="form-control" value="{{ $item->name ?? $item->type }}">
            @error('nume')
                <small>
                    {{ $message }}
                </small>
                @enderror
        </div>
        @if ( $hasType )
        <div class="form-group">
                <label for="name">Tipul pentru {{ $text->printNormalText() }}</label>    
                <select name="tip[]" class="form-control" multiple>
                    @forelse ($data as $item)
                        
                        <option value="{{ $item->id }}"
                            @if (in_array($item->id,$typeSelected))
                                selected="selected"
                            @endif> {{ $item->type }} </option>
                    @empty
                        Reincarca pagina!
                        @endforelse
                </select>
                @error('tip')
                    <small>
                        {{ $message }}
                    </small>
                @enderror
            </div>       
            @endif  

            <input type="submit" value="Trimite" name="formularsubmit" class="button">

        </form>
    </div>
        @endsection