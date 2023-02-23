@extends('layouts.content')

@section('title',$club->name)

@section('primary-text', 'CLUB ')

@section('secondary-text', $club->name)

@section('content')
<div class="text-gray-600 text-sm mb-5 hover:text-teal"><a href="{{route('clubs.index')}}">Volver a clubs</a></div>
<div class="flex space-x-4">
    <div class="w-1/6">
        @auth<a href="{{route('clubs.edit', $club)}}">
            @else <a href="{{route('register')}}">
                @endauth <x-teal-button>
                    {{'Editar club'}}
                </x-teal-button></a>
        </a>
    </div>
    <div class="flex flex-col w-2/3">
        <h1 class="mb-1 text-xl font-bold">{{$club->name}}</h1>
        <p class="mb-3 text-gray-400">{{$club->location}}</p>
    </div>
</div>
<div class="mt-5 flex space-x-4">
    <div class="w-1/6">
        @auth<a href="{{route('clubs.teams.create', $club)}}">
            @else <a href="{{route('register')}}">
                @endauth <x-orange-button>
                    {{'Nuevo equipo'}}
                </x-orange-button></a>
        </a>
    </div>
    <div class="flex-col w-3/6">
        <h2 class="mb-3 text-lg font-bold dark:text-white">TODOS LOS EQUIPOS</h2>
        <dl class="text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700 w-2/3">
            @if(count($club->teams) == 0) <p class="text-gray-400">No hay equipos.</p>
            @endif
            @foreach ($club->teams as $team)
            <div class="flex justify-between">
                <div class="flex-col pb-3">
                    <dt class="mt-3 font-medium md:text-lg"><a href="{{route('teams.show', $team->id)}}">{{$team->name}}</a></dt>
                    <dd class="mb-2 text-gray-500">{{$team->category}}</dd>
                </div>
                <a class="mt-4 pb-3 font-regular text-sm" href="{{route('teams.show', $team->id)}}">Ver equipo</a>
            </div>
            @endforeach
        </dl>
    </div>
</div>
@endsection