@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
    <div id="headline" class="m-4">
        <h1> Profil Manager </h1>
    </div>
    <div id="body">
        <div class="card w-100" style="max-width: 100em">
            <div class="card-body ">
                <div class="float-right">
                    <p class="m-0">
                        Adauga un profil
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </p>
                </div>
            </div>
        </div>
        <div class="card w-100" style="max-width: 100em">
            <ul class="list-group list-group-flush">
                @foreach ($profils as $profil)
                <li class="list-group-item w-100">
                    {{ $profil->name }}
                    <div class="float-right links">
                        <a href=""> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                        <a href=""> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection