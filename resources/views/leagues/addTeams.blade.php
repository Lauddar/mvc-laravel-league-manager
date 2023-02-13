@extends('layouts.plantilla')

@section('title','Añadir equipos a ' . $league->name)

@section('pretitle', 'AÑADIR EQUIPOS A ' . $league->name )

@section('content')
<div class="flex-wrap items-center justify-center space-x-36">
    <div class="mt-3 py-2 px-5 text-gray-600 hover:text-teal"><a href="{{route('leagues.show',$league)}}">Volver a la liga</a></div>
    <div class="flex space-x-36">
        <div class="w-1/2 py-5">
            <h2 class="mb-3 text-large font-bold">Equipos añadidos a la liga:</h2>
            <form class="my-8" action="{{route('leagues.removeTeams', $league) }}" method="POST">
                @csrf
                @foreach ($league->teams as $team)
                <div class="flex items-center mb-4">
                    <input id="default-checkbox" type="checkbox" value="{{$team->id}}" name="teamsList[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <label for="default-checkbox" class="ml-2 text-gray-500"><a href="{{route('teams.show', $team->id)}}"><span class="font-medium text-gray-900">{{$team->name}}</span> ({{$team->club->name}})</a></label>
                </div>
                @endforeach
                <button class="mt-5 w-28 h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 text-base font-rubik text-white shadow-sm hover:bg-light-teal" type="submit">Quitar</button>
            </form>
        </div>
        <div class="w-1/2 py-5">
            <h2 class="mb-3 text-large font-bold">Añadir equipos a la liga:</h2>
            <div class="my-4">
                <form action="{{route('leagues.listTeams', $league)}}" method="GET">
                    <label for="default-search" class="mb-2 font-medium text-gray-900 sr-only">Buscar</label>
                    <div class="relative flex">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" name="search" value="{{old('search', $text)}}" id="default-search" class="block w-2/3 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Busca un equipo...">
                        <button type="submit" class="w-1/6 ml-4 text-white align-start right-2.5 bg-teal hover:bg-light-teal font-medium rounded-lg text-sm px-4 py-2">Buscar</button>
                    </div>
                </form>
            </div>
            <a href="{{route('leagues.listTeams', $league)}}">Ver todos</a>
            <form class="my-8" action="{{route('leagues.addTeams', $league) }}" method="POST">
                @csrf
                <div class="max-h-96 overflow-y-scroll">
                    @foreach ($notAddedTeams as $team)
                    <div class="flex items-center mb-4">
                        <input id="default-checkbox" type="checkbox" value="{{$team->id}}" name="teamsList[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="default-checkbox" class="ml-2 text-gray-900"><a href="{{route('teams.show', $team->id)}}">{{$team->name}} <span class="text-gray-400">({{$team->club->name}})</span></a></label>
                    </div>
                    @endforeach
                </div>
                <button class="mt-5 w-28 h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 text-base font-rubik text-white shadow-sm hover:bg-light-teal" type="submit">Añadir</button>
            </form>
        </div>
        @endsection