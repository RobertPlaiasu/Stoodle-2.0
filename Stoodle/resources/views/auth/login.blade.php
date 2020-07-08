@extends('layouts.app')

@section('title', 'Logare')

@section('content')
    <div class="container login">
        <div class="headline">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
            <h1>Autentificare</h1>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" placeholder=" " required autocomplete="email" autofocus>
                <label for="email">{{ __('E-mail') }}</label>

                @error('email')
                    <small> {{ $message }} </small>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" placeholder=" " required autocomplete="current-password">
                <label for="password">{{ __('Parola') }}</label>

                @error('password')
                <small> {{ $message }} </small>
                @enderror
            </div>

            <div class="form-group mb-0">
                <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label  for="remember">
                            {{ __('Ține-mă minte') }}
                </label>
            </div>

            <div class="form-group m-0">
                <a href="{{ route('register') }}">Creeaza-ti un cont!</a><br>
                <a href="{{ route('password.request') }}">Reseteaza-ti parola!</a>
            </div>

            <a class="btn btn-outline-dark" 
                role="button" style="text-transform:none; width: 100%; padding: 1em; margin: .3em 0;">
                <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" 
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                Conecteaza-te cu Google
            </a>
            <input type="submit" name="loginsubmit" value="Trimite" class="button" />
        </form>
    </div>
@endsection