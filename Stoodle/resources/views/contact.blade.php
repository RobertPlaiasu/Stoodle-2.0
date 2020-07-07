@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div id="showcase">
    <div class="content d-flex align-items-center justify-content-center">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('img/grigo.jpg') }}" alt="Grigorescu Alexandru">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('img/robert.jpg') }}" alt="Plaiașu Robert">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
</div>
@endsection
