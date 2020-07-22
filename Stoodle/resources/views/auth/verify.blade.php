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
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <br>
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
        </form>
    </div>
</div>
@endsection
