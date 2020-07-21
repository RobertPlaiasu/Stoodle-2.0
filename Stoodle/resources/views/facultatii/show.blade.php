@extends('layouts.app')

@section('title', $college->name)

@section('content')
    {{-- Close option --}}
    <div id="background"></div>
    <div class="mx-auto container">
    
        <div class="d-flex align-items-center justify-content-between">
            <div>
                   {{-- Display the name and the compability with the user  --}}
        <h5 class="mt-3">
            {{ $college->name }} 
            <span id="college_compatibility"> 
                {{ $college->compability }} 
                <i class="fas fa-percentage"></i> 
            </span> 
        </h5>
    
        {{-- Display features --}}
        <p class="text-muted"> 
            {{ $college->university->name }} | 
            {{ $college->county->name }} | 
            {{ $college->profil->name }} 
        </p>
            </div>

            <div id="close" class="mr-5">
                <a href="/facultati">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    
        {{-- Display the college descriptiomn --}}
        <hr>

        <div id="description">
            <p>
                {{ $college->description }}
            </p>
        </div>
        
        <footer id="college_show_footer">
            {{-- Link to the college's website --}}
            <a href="{{ $college->url }}" target="_blank">Siteul facultatii <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
            <br>

            {{-- Edit option for admins --}}
            @if( Auth::user()->admin )
                <a href="/facultati/{{ $college->id }}/edit">Editeaza facultatea <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            @endif
            
                   
        </footer>
        <div class="text-muted mt-4 mb-5">
            
            <small>Actualizat pe {{ $college->updated_at }}</small>
        </div>

    </div>
@endsection