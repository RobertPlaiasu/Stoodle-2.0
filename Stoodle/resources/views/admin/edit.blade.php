@extends('layouts.app')

@section('title', 'Creare profil')

@section('content')
<div class="mx-auto container mt-4">

    <h1> Schimba {{ $text }} in baza de date</h1>
    <form action="/admin/{{ $text }}/{{ $item->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Nume {{ $text }}</label>    
            <input type="text" name="name" class="form-control" value="{{ $item->name ?? $item->type }}">
            @error('name')
                <small>
                    {{ $message }}
                </small>
                @enderror
        </div>
        @if ( $hasType )
        <div class="form-group">
                <label for="name">Tipul {{ $text }}</label>    
                <select name="type" class="form-control" multiple>
                    @forelse ($data as $item)
                        <option value="{{ $item->id }}"> {{ $item->type }} </option>
                    @empty
                        Reincarca pagina!
                        @endforelse
                </select>
                @error('type')
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