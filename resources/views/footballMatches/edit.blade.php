@extends('layouts.plantilla')

@section('title','Edita el partido - ' . $footballmatch->league->name)

@section('pretitle', 'PARTIDO ' . $footballmatch->local->name . ' - ' . $footballmatch->visiting->name)

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme p-8 h-max">
        <form action="{{route('footballmatches.update', $footballmatch)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Equipo local:</label>
                <div class="block w-full p-2 text-gray-900 border border-gray-300 bg-gray-100 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">{{$footballmatch->local->name}}</div>
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Equipo visitante:</label>
                <div class="block w-full p-2 text-gray-900 border border-gray-300 bg-gray-100 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">{{$footballmatch->visiting->name}}</div>
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Fecha del partido:</label>
                @error('start_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="start_date" value="{{old('start_date', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $footballmatch->start_date)->toDateString())}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Goles equipo local:</label>
                @error('local_goals')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="number" name="local_goals" id="" value="{{$footballmatch->local_goals}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Goles equipo visitante:</label>
                @error('visiting_goals')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="number" type="number" name="visiting_goals" id="" value="{{$footballmatch->visiting_goals}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4 py-2">
                <button class="w-28 h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 font-rubik text-white shadow-sm hover:bg-light-teal" type="submit">Guardar</button>
                <a class="w-28 h-11 ml-4 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gray-500 px-4 py-2 font-rubik text-white shadow-sm hover:bg-gray-400" href="{{route('leagues.footballmatches.index', $footballmatch->league)}}">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection