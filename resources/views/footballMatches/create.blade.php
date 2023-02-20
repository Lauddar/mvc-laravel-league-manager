@extends('layouts.content')

@section('title','Nuevo partido - ' . $league->name)

@section('primary-text','PARTIDO NUEVO - LIGA ')

@section('secondary-text',$league->name)

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme rounded-lg shadow-md p-8 h-max">
        <form action="{{route('leagues.footballmatches.store', $league)}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Equipo local</label>
                <select name="local_team" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
                    @foreach($league->teams as $team)
                    <option value="{{$team->id}}" {{ $team->id == old('local_team') ? "selected" : "" }}>{{$team->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Equipo visitante</label>
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
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Fecha del partido</label>
                @error('start_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="start_date" value="{{old('start_date')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4">
                <x-teal-button>
                    {{ __('Crear') }}
                </x-teal-button>
                <a href="{{route('leagues.footballmatches.index', $league)}}"><x-gray-button>
                        {{'Cancelar'}}
                    </x-gray-button></a>
            </div>
        </form>
    </div>
</div>
@endsection