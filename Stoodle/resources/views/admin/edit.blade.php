@extends('layouts.app')

@section('title', 'Creare profil')

@section('content')
    <h1> Adaugare {{ $text }} in baza de date</h1>
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
        {{-- <div class="form-group">
            <label for="name">Tipul {{ $text }}</label>    
            <select name="profile-type" class="form-control">
                @forelse ($data as $item)
                    <option value="{{ $item->id }}"> {{ $item->type }} </option>
                @empty
                    Reincarca pagina!
                @endforelse
            </select>
            @error('profile-type')
                <small>
                    {{ $message }}
                </small>
            @enderror
        </div>        --}}

        <input type="submit" value="Trimite" name="formularsubmit" class="button">

    </form>
@endsection