@extends('layouts.plantilla')

@section('title','Nuevo partido - ' . $league->name)

@section('pretitle', 'PARTIDO NUEVO - LIGA ' . $league->name)

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme p-8 h-max">
        <form action="{{route('leagues.footballmatches.store', $league)}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Equipo local:</label>
                <select name="local_team" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
                    @foreach($league->teams as $team)
                    <option value="{{$team->id}}" {{ $team->id == 'old(local_team)' ? 'selected' : ''}}>{{$team->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Equipo visitante:</label>
                @error('visiting_team')
                <x-alert>El equipo local y el equipo visitante tienen que ser diferentes.</x-alert>
                @enderror
                <select name="visiting_team" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
                    @foreach($league->teams as $team)
                    <option value="{{$team->id}}" {{ $team->id == old('visiting_team') ? "selected" : "" }}>{{$team->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Fecha del partido:</label>
                @error('start_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="start_date" value="{{old('start_date')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4 py-2">
                <button class="w-28 h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 font-rubik text-white shadow-sm hover:bg-light-teal" type="submit">Crear</button>
                <a class="w-28 h-11 ml-4 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gray-500 px-4 py-2 font-rubik text-white shadow-sm hover:bg-gray-400" href="{{route('leagues.footballmatches.index', $league)}}">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection