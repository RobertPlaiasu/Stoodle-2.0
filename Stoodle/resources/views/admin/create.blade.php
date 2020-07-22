@extends('layouts.app')

@section('title', 'Creare profil')

@section('content')
<div class="mx-auto container mt-4">

    <h1> Adaugare {{ $text }} in baza de date</h1>
    <form action="/admin/{{ $text }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Nume {{ $text }}</label>    
            <input type="text" name="name" value="{{old('name')}}"class="form-control">
            @error('name')
                <small>
                    {{ $message }}
                </small>
                @enderror
            </div>  
            @if ( $hasType )
            <div class="form-group">
                <label for="name">Tipul {{ $text }}</label>    
                <select name="type[]" class="form-control" multiple>
                    @forelse ($data as $item)
                        <option value="{{ $item->id }}"
                            @if(old('type'))
                                @if (in_array($item->id,old('type')))
                                    selected="selected"
                                @endif
                            @endif> {{ $item->type }} </option>
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