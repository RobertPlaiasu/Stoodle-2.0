@extends('layouts.app')

@section('title', 'Inregistrare')

@section('content')
    <div class="container mx-auto login">
        <div class="headline">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
            <h1>Inregistrare</h1>
        </div>
        <form method="POST" action="{{ route('register') }}"> 
            @csrf

            <div class="form-group">
                <input id="password" type="text" class="form-control" name="name" placeholder=" " required autocomplete="current-password">
                <label for="name">{{ __('Nume') }}</label>
                @error('name')
                        <small> {{ $message }} </small>
                @enderror
            </div>

            <div class="form-group ">
                <input id="email" type="email" class="form-control" name="email" placeholder=" " required autocomplete="email" autofocus>
                <label for="email">{{ __('E-mail') }}</label>
                @error('email')
                        <small> {{ $message }} </small>
                @enderror
            </div>

            <div class="form-group ">
                <input id="password" type="password" class="form-control" name="password" placeholder=" " required autocomplete="current-password">
                <label for="password">{{ __('Parola') }}</label>
                    @error('password')
                            <small> {{ $message }} </small>
                    @enderror
            
            </div>

            <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder=" " required autocomplete="current-password">
                <label for="password-confirm">{{ __('Confirma parola') }}</label>
            </div>

            <div class="form-group m-0">
                <a href="{{ route('login') }}">Conecteaza-te!</a><br>
            </div>

            <input type="submit" name="loginsubmit" value="Trimite" class="button" />
        </form>
    </div>
@endsection
