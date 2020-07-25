@extends('layouts.app')

@section('title', $university->name)

@section('content')
    {{-- Close option --}}
<div id="background" style="background: url('{{ asset('storage/'.$university->image) }}')"></div>
    <div class="mx-auto container">
        <div class="d-flex align-items-center justify-content-between">
            {{-- Display the name and the compability with the user  --}}
            <div>
                <div class="mt-3 display-4"> {{ $university->name }} </div>
            </div>

            {{-- Closing tag --}}
            <div id="close" class="mr-5">
                <a href="/facultati">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    
        {{-- Display the university descriptiom --}}
        <hr>

        <div class="mx-2">
            <h1> Descriere </h1>
            <p> {{ $university->description }} </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non urna mi. Sed sodales ipsum a velit blandit eleifend. Etiam non pellentesque risus. Curabitur eu ipsum vitae dui semper varius. Nulla lacinia arcu eu lorem lacinia elementum. Phasellus convallis eros leo, eget tempus turpis lacinia eget. Proin eget elit enim. Sed nec lacus mauris. Nam sed erat posuere, bibendum nibh nec, fermentum est. Aenean feugiat lorem sed dolor tristique, sed dignissim ligula feugiat.

Donec venenatis lorem nec urna tincidunt, et tempus mi fermentum. Nunc molestie libero est. Maecenas tristique iaculis finibus. Sed vitae scelerisque justo. Integer elementum nisi id quam dictum, non luctus ligula sodales. Phasellus id magna commodo, fermentum metus non, auctor est. Nullam mattis dapibus arcu ut pharetra. Pellentesque sed massa tristique, faucibus justo eget, tincidunt velit. Maecenas commodo id dolor nec posuere.

Nunc at nunc vel leo commodo posuere. Donec tempor justo in ligula viverra, nec ultricies erat euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec molestie consectetur vehicula. Donec tempus placerat feugiat. Aenean non suscipit nibh. Nulla vel dapibus enim. Aliquam nulla odio, condimentum a dolor sit amet, ultrices interdum mi. Vestibulum dictum molestie ex nec facilisis. Integer tempus at justo eu egestas. Phasellus sit amet felis nulla. Ut pretium turpis diam, quis egestas nulla sollicitudin quis.

Nullam imperdiet sagittis tellus, sed placerat massa. Sed ac placerat lectus, vel scelerisque nunc. Fusce urna sem, iaculis suscipit odio sit amet, dignissim tristique nunc. Phasellus lacus leo, blandit sed volutpat eu, aliquam vel sapien. Mauris cursus a purus non facilisis. Mauris convallis mi egestas, porttitor velit et, posuere nibh. Nulla facilisi. Vestibulum eleifend ante velit, vel efficitur metus ultricies tincidunt. Nulla vitae hendrerit felis. Ut sed bibendum nibh. In laoreet, felis et finibus aliquam, diam risus malesuada tortor, vitae luctus purus leo vitae quam. Aenean vitae sapien consectetur tortor efficitur tempor porttitor eu massa. Maecenas luctus urna at libero efficitur, eget fermentum sem egestas.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent sollicitudin dignissim nibh ut interdum. Morbi ornare eleifend elit varius aliquam. Nulla consequat nulla justo, a consequat augue ultricies pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec vehicula orci justo, quis consequat metus placerat nec. Vivamus sollicitudin quam eget ullamcorper rutrum.
            </p>
        </div>

        <div class="mx-2 my-4">
            <h1> Facultatiile care apartin acestei universitati </h1>
            <div class="d-flex flex-wrap">
                @forelse ($university->colleges as $college)
                    <college-card
                        id = {{ $college->id }}
                        image = "{{ asset('storage/'.$college->image) }}"
                        name = "{{ $college->name }}"
                        :university = "{{ $college->university }}"
                        compatility = "{{ $college->compability }}"
                        county = "{{ $college->county->name }}"
                        isfavorite = {{ $college->favorited() ? true : false }}
                    ></college-card>
                @empty
                    Nu avem nicio facultate care sa apartina acestei universitati in baza noastra de date
                @endforelse
            </div>
        </div>

        <div id="university_show_footer">
            {{-- Link to the university's website --}}
            <a href="{{ $university->url }}" target="_blank">Siteul universitatii <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
            <br>

            {{-- Edit option for admins --}}
            @if( Auth::user()->admin )
                <a href="/university/{{ $university->id }}/edit">Editeaza universitatea <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            @endif
        </div>

        <div class="text-muted mt-4 mb-5">
            <small>Actualizat pe {{ $university->updated_at }}</small>
        </div>

    </div>
@endsection