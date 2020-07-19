@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
    <h1>Admin Panel</h1>
    <ul class="list-group mt-5">
        <li class="list-group-item links">
            <a href="/facultati/create"> Adauga o facultate noua </a><br>
        </li>
    @foreach ($text as $item)
        <li class="list-group-item links">
            <a href="/admin/{{ $item }}"> Manager {{ $item }} </a><br>
        </li>
    @endforeach
    </ul>
    {{-- <a href="/admin/profil">Edit the profils</a> --}}
@endsection