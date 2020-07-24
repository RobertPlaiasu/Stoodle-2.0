@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
<div class="mx-auto container">

    <div id="headline" class="m-4">
        <h1 class="text-capitalize"> {{ $text }} Manager </h1>
    </div>
    <div id="body">
        <div class="card w-100" style="max-width: 100em">
            <div class="card-body ">
                <div class="float-right links">
                    <a href="{{ $text }}/create" class="m-0">
                        adauga un {{ $text }}
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card w-100" style="max-width: 100em">
            <ul class="list-group list-group-flush">
                @foreach ($data as $item)
                <li class="list-group-item w-100">
                    {{ $item->type ?? $item->name }}
                    <div class="float-right links d-flex justi-content-cetenr align-items-center">
                        <a href="{{ $text }}/{{ $item->id }}/edit" class="p-0"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                        <form action="{{ $text }}/{{ $item->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            
                            <button class="btn">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
    @endsection