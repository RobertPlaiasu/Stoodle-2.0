@extends('layouts.app')

@section('title', 'Acasa')

@section('content')
    <div class="text-center mx-auto container">
        <h1>Acasa</h1>
        {{-- Search Bar --}}
        <div id="search" class="mx-4 my-3">
            <input onkeyup="sort()" class="form-control"
                type="text" placeholder="cauta" id="search_field" aria-label="Search">
        </div>

        {{-- Display colleges --}}
        <div class="d-flex flex-wrap">
            @forelse ($colleges as $college)
                <college-card
                    id = {{ $college->id }}
                    image = "{{ asset('storage/'.$college->image) }}"
                    name = "{{ $college->name }}"
                    :university = "{{ $college->university }}"
                    compatibility = "{{ $college->compability }}"
                    county = "{{ $college->county->name }}"
                    isfavorite = {{ $college->favorited() ? "true" : "false" }}
                ></college-card>
            @empty
                {{-- If there are no colleges display next content --}}
                <h1>Nu am reusit sa incercam facultatile din baza de date</h1>
            @endforelse
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
