@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
<div class="mx-auto container my-4">
    <h1>Admin Panel</h1>
    <ul class="list-group mt-2">
        <li class="list-group-item links">
            <a href="/facultati/create"> Adauga o facultate noua </a><br>
        </li>
        <li class="list-group-item links">
            <a href="/university"> Manager universitati </a><br>
        </li>
    @foreach ($panels as $item)
        <li class="list-group-item links">
            <a href="/admin/{{ $item["link"] }}"> Manager {{ $item["text"] }} </a><br>
        </li>
        @endforeach
    </ul>
</div>  
    {{-- <a href="/admin/profil">Edit the profils</a> --}}
@endsection