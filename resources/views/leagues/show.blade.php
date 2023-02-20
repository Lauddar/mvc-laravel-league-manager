@extends('layouts.content')

@section('title',$league->name)

@section('primary-text', $league->name)

@section('content')
<div class="text-gray-600 text-sm mb-5 hover:text-teal"><a href="{{route('leagues.index')}}">Volver a ligas</a></div>
<div class="flex space-x-16">
    <div class="w-2/3">
        <h2 class="mb-3 text-xl font-bold">CLASIFICACIÓN</h2>
        <div>@include('leagues.partials.shortClassification')</div>
        <div class="mt-3 py-2 px-5 text-gray-600 text-sm hover:text-teal"><a href="{{route('leagues.classification',$league)}}">Ver detalles de clasificación</a></div>
    </div>
    <div class="w-1/3">
        <div class="w-full bg-creme p-5 rounded-lg shadow-md flex-wrap space-y-3">
            <h1 class="text-xl font-bold dark:text-white">{{$league->name}}</h1>
            <p><span class="font-semibold">Empieza:</span> {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->start_date)->format('d-m-Y')}}</p>
            <p><span class="font-semibold">Acaba: </span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->end_date)->format('d-m-Y')}}</p>
            <div class="text-sm">@include('leagues.partials.leaguestate')</div>
            <div>@auth<a href="{{route('leagues.edit', $league)}}">
                    @else <a href="{{route('register')}}">
                        @endauth <x-teal-button>
                            {{'Editar liga'}}
                        </x-teal-button></a>
                </a></div>
        </div>

        <div class="mt-5 py-2 px-5 text-gray-600 hover:text-teal">
            @auth<a href="{{route('leagues.listTeams', $league)}}">
                @else <a href="{{route('register')}}">
                    @endauth AÑADIR EQUIPOS</a></div>
        <div class="py-2 px-5 text-gray-600 hover:text-teal"><a href="{{route('leagues.footballmatches.index', $league)}}">VER PARTIDOS</a></div>
    </div>
</div>
</div>
@endsection