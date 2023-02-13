@extends('layouts.plantilla')

@section('title',$club->name)

@section('pretitle', 'CLUB '. $club->name)

@section('content')
<div class="mt-5 font-rubik">
    <div class="px-5 text-gray-600 hover:text-teal"><a href="{{route('clubs.index')}}">Volver a clubs</a></div>
    <div class="mt-5 flex space-x-4">
        <div class="flex-no-wrap space-y-3 w-1/6">
            <div><a href="{{route('clubs.edit', $club)}}" class="p-10 inline-flex whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 font-rubik text-white shadow-sm hover:bg-light-teal">Editar club</a></div>
        </div>
        <div class="flex-no-wrap w-5/6">
            <h1 class="mb-1 text-xl font-bold">{{$club->name}}</h1>
            <p class="mb-3 text-gray-400">{{$club->location}}</p>
        </div>
    </div>
    <div class="mt-5 flex space-x-4">
        <div class="flex-no-wrap space-y-3 w-1/6">
            <div><a href="{{route('clubs.teams.create', $club)}}" class="p-10 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-neon-orange px-4 py-2 font-rubik text-white shadow-sm hover:bg-dark-orange">Nuevo equipo</a></div>
        </div>
        <div class="flex-col w-5/6">
            <h2 class="mb-3 text-lg font-bold dark:text-white">TODOS LOS EQUIPOS</h2>
            <dl class="w-1/3 text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700 w-2/3">
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
</div>
@endsection