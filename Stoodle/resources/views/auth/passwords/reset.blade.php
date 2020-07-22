@extends('layouts.app')

@section('title', 'Resetare Parola')

@section('content')
<div class="container mx-auto login">
    <div class="headline">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <h1>Autentificare</h1>
    </div>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            <label for="email">{{ __('Adresa de E-Mail') }}</label>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            <label for="password">{{ __('Parola') }}</label>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <label for="password-confirm">{{ __('Confirma parola') }}</label>
        </div>

        <input type="submit" name="loginsubmit" value="Trimite" class="button" />

    </form>
</div>
@endsection
