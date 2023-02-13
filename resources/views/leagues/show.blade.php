@extends('layouts.plantilla')

@section('title',$league->name)

@section('pretitle', $league->name)

@section('content')
<div class="mt-5 flex space-x-20 font-rubik">
    <div class="w-2/3">
        <h2 class="mb-3 text-xl font-bold">CLASIFICACIÓN</h2>
        <div>@include('leagues.partials.shortClassification')</div>
        <div class="mt-3 py-2 px-5 text-gray-600 hover:text-teal"><a href="{{route('leagues.classification',$league)}}">Ver detalles de clasificación</a></div>
    </div>
    <div class="w-1/3">
        <div class="w-full bg-creme p-5 leading-loose flex-wrap space-y-3">
            <h1 class="text-xl font-bold dark:text-white">{{$league->name}}</h1>
            <p><span class="font-semibold">Empieza:</span> {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->start_date)->format('d-m-Y')}}</p>
            <p><span class="font-semibold">Acaba: </span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->end_date)->format('d-m-Y')}}</p>
            <div>@include('leagues.partials.leaguestate')</div>
            <a class="h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 text-base font-rubik text-white shadow-sm hover:bg-light-teal" href="{{route('leagues.edit', $league)}}">Modificar esta liga</a>
        </div>
        <div class="mt-5 py-2 px-5 text-gray-600 font-medium hover:text-teal"><a href="{{route('leagues.listTeams', $league)}}">AÑADIR EQUIPOS</a></div>
        <div class="py-2 px-5 text-gray-600 font-medium hover:text-teal"><a href="{{route('leagues.footballmatches.index', $league)}}">VER PARTIDOS</a></div>
    </div>
</div>
@endsection