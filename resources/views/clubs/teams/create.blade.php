@extends('layouts.plantilla')

@section('title','Nuevo equipo')

@section('pretitle', 'NUEVO EQUIPO')

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme p-8 h-max">
        <form action="{{route('clubs.teams.store', $club)}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Nombre:</label>
                <input type="text" id="large-input" name="name" value="{{old('name')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
                @error('name')
                <small>"{{$message}}"</small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Categoría:</label>
                <select name="category" id="category" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
                    <option value="Benjamín">Benjamín</option>
                    <option value="Alevín">Alevín</option>
                    <option value="Infantil">Infantil</option>
                    <option value="Cadete">Cadete</option>
                    <option value="Juvenil">Juvenil</option>
                </select>
                @error('category')
                <br>
                <small>"{{$message}}"</small>
                <br>
                @enderror
            </div>
            <div class="flex space-x-4 py-2">
                <button class="w-28 h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 font-rubik text-white shadow-sm hover:bg-light-teal" type="submit">Crear</button>
                <a class="w-28 h-11 ml-4 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gray-500 px-4 py-2 font-rubik text-white shadow-sm hover:bg-gray-400" href="{{route('clubs.show', $club->id)}}">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection