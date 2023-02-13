@extends('layouts.plantilla')

@section('title','Partidos ' . $league->name)

@section('pretitle', 'PARTIDOS ' . $league->name)

@section('content')
<div class="flex-wrap items-center justify-center space-y-4 mx-10">
    <div class="px-5 text-gray-600 hover:text-teal"><a href="{{route('leagues.show',$league)}}">Volver a la liga</a></div>
    <div class="space-x-5"><a class="h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 font-rubik text-white shadow-sm hover:bg-light-teal" href="{{route('leagues.footballmatches.create', $league)}}">Crear partido nuevo</a>
    <a class="h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-neon-orange px-4 py-2 font-rubik text-white shadow-sm hover:bg-dark-orange" href="{{route('footballMatches.generate', $league)}}">Asignar partidos automáticamente</a></div>
    <div class="mt-5">@include('footballMatches.partials.matchesTable', $league)</div>  
</div>
@endsection