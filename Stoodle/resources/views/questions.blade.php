@extends('layouts.app')

@section('title', 'Intrebari')

@section('content')
<div class="container mt-5">
    <h1>Intrebari fregvente</h1>
    @foreach ($questions as $question)
        <div style="margin: 2em 0">
            <h1 class="m-0" style="color: black"> {{ $question->question }} </h1>
            <p> {{ $question->answer }} </p>
        </div>
    @endforeach
</div>  
@endsection