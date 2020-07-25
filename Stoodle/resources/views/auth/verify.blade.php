@extends('layouts.app')

@section('title', 'Verificare Mail')

@section('content')
<div class="container mx-auto login">
    <div class="headline">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <h1>Verificare</h1>
    </div>
    <div class="card-body text-center">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fost trimis un nou link de verificare la adresa de e-mail') }}
            </div>
        @endif

        {{ __('Înainte de a continua, verificați e-mailul dvs. pentru un link de verificare.') }}
        {{ __('Dacă nu ați primit e-mailul') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <br>
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click aici pentru a solicita un altul') }}</button>.
        </form>
    </div>
</div>
@endsection
