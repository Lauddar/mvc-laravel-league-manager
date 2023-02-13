@extends('layouts.plantilla')

@section('title',$team->name)

@section('pretitle', 'EDITA ' . $team->name)

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme p-8 h-max">
        <form action="{{route('teams.update', $team)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6">

                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Nombre:</label>
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="name" value="{{old('name', $team->name)}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Categoría:</label>
                <select name="category" id="category" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
                    <option value="Benjamín" {{ $team->category == 'Benjamín' ? 'selected' : ''}}>Benjamín</option>
                    <option value="Alevín" {{ $team->category == 'Alevín' ? 'selected' : ''}}>Alevín</option>
                    <option value="Infantil" {{ $team->category == 'Infantil' ? 'selected' : ''}}>Infantil</option>
                    <option value="Cadete" {{ $team->category == 'Cadete' ? 'selected' : ''}}>Cadete</option>
                    <option value="Juvenil" {{ $team->category == 'Juvenil' ? 'selected' : ''}}>Juvenil</option>
                </select>
            </div>
            <div class="flex space-x-4 py-2">
                <button class="w-28 h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 font-rubik text-white shadow-sm hover:bg-light-teal" type="submit">Guardar</button>
                <a class="w-28 h-11 ml-4 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gray-500 px-4 py-2 font-rubik text-white shadow-sm hover:bg-gray-400" href="{{route('teams.show', $team->id)}}">Cancelar</a>
            </div>
        </form>
        <div class="mt-4 ml-2">
            <form action="{{route('teams.destroy',$team->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="mb-2 font-medium text-red-500">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection