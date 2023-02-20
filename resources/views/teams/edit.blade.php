@extends('layouts.content')

@section('title','Edita equipo' . $team->name)

@section('primary-text','EDITA EL EQUIPO ')

@section('secondary-text',$team->name)

@section('content')
<div class="flex items-center justify-center">
<div class="w-1/2 bg-creme rounded-lg shadow-md p-8 h-max">
        <form action="{{route('teams.update', $team)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Nombre</label>
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="name" value="{{old('name', $team->name)}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Categoría</label>
                <select name="category" id="category" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
                    <option value="Benjamín" {{ $team->category == 'Benjamín' ? "selected" : ""}}>Benjamín</option>
                    <option value="Alevín" {{ $team->category == 'Alevín' ? "selected" : ""}}>Alevín</option>
                    <option value="Infantil" {{ $team->category == 'Infantil' ? "selected" : ""}}>Infantil</option>
                    <option value="Cadete" {{ $team->category == 'Cadete' ? "selected" : ""}}>Cadete</option>
                    <option value="Juvenil" {{ $team->category == 'Juvenil' ? "selected" : ""}}>Juvenil</option>
                </select>
            </div>
            <div class="flex space-x-4">
                <x-teal-button type="submit">
                    {{'Guardar'}}
                </x-teal-button>
                <a href="{{route('teams.show', $team->id)}}"><x-gray-button>
                        {{'Cancelar'}}
                    </x-gray-button></a>
            </div>
        </form>
        <div class="mt-4 ml-2">
            <form action="{{route('teams.destroy',$team->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este equipo?')" class="font-medium text-sm text-red-500">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection