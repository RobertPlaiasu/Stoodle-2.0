@extends('layouts.app')

@section('title', 'Resetare parola')

@section('content')
    <div class="container mx-auto login">
        <div class="headline">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
            <h1>Resetare parola</h1>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" placeholder=" " required autocomplete="email" autofocus>
                <label for="email">{{ __('E-mail') }}</label>
                
                @error('email')
                    <small> {{ $message }} </small>
                @enderror
            
            </div>
            <input type="submit" name="loginsubmit" value="Trimite link-ul pentru resetare parola" class="button" />
        </form> 
    </div>
@endsection
