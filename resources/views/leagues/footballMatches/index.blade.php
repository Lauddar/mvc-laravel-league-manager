@extends('layouts.content')

@section('title','Partidos ' . $league->name)

@section('pretitle', 'PARTIDOS ' . $league->name)

@section('primary-text','PARTIDOS ')

@section('secondary-text',$league->name)

@section('content')
<div class="text-gray-600 text-sm mb-5 hover:text-teal"><a href="{{route('leagues.show',$league)}}">Volver a la liga</a></div>
<div class="flex space-x-5">
    <div>@auth<a href="{{route('leagues.footballmatches.create', $league)}}">
            @else <a href="{{route('register')}}">
                @endauth <x-teal-button>
                    {{'Crear partido nuevo'}}
                </x-teal-button></a>
        </a></div>
    <div>@auth<a href="{{route('footballMatches.generate', $league)}}">
            @else <a href="{{route('register')}}">
                @endauth <x-orange-button>
                    {{'Asignar partidos automáticamente'}}
                </x-orange-button></a>
        </a></div>
</div>
<div class="mt-5">@include('footballMatches.partials.matchesTable', $league)</div>
@endsection