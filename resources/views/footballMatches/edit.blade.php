@extends('layouts.content')

@section('title','Edita el partido - ' . $footballmatch->league->name)

@section('primary-text','PARTIDO ')

@section('secondary-text',$footballmatch->local->name . ' - ' . $footballmatch->visiting->name)

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme rounded-lg shadow p-8 h-max">
        <form action="{{route('footballmatches.update', $footballmatch)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Equipo local</label>
                <div class="block w-full p-2 text-gray-900 border border-gray-300 bg-gray-100 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">{{$footballmatch->local->name}}</div>
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Equipo visitante</label>
                <div class="block w-full p-2 text-gray-900 border border-gray-300 bg-gray-100 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">{{$footballmatch->visiting->name}}</div>
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Localidad</label>
                @error('location')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="location" value="{{old('location', $footballmatch->location)}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Fecha del partido</label>
                @error('start_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="start_date" value="{{old('start_date', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $footballmatch->start_date)->toDateString())}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Goles equipo local</label>
                @error('local_goals')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="number" name="local_goals" id="" value="{{old('local_goals',$footballmatch->local_goals)}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Goles equipo visitante</label>
                @error('visiting_goals')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="number" type="number" name="visiting_goals" id="" value="{{old('visiting_goals',$footballmatch->visiting_goals)}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4">
                <x-teal-button type="submit">
                    {{'Guardar'}}
                </x-teal-button>
                <a href="{{route('leagues.footballmatches.index', $footballmatch->league)}}"><x-gray-button>
                        {{'Cancelar'}}
                    </x-gray-button></a>
            </div>
        </form>
    </div>
</div>
@endsection