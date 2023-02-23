@extends('layouts.content')

@section('title','Nuevo equipo')

@section('primary-text', 'NUEVO EQUIPO')

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme rounded-lg shadow-md p-8 h-max">
        <form action="{{route('clubs.teams.store', $club)}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Nombre</label>
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="name" value="{{old('name')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Categoría</label>
                <select name="category" id="category" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
                    <option value="Benjamín">Benjamín</option>
                    <option value="Alevín">Alevín</option>
                    <option value="Infantil">Infantil</option>
                    <option value="Cadete">Cadete</option>
                    <option value="Juvenil">Juvenil</option>
                </select>
            </div>
            <div class="flex space-x-4">
                <x-teal-button type="submit">
                    {{ __('Guardar') }}
                </x-teal-button>
                <a href="{{route('clubs.show', $club->id)}}"><x-gray-button>
                        {{ __('Cancelar') }}
                    </x-gray-button></a>
            </div>
    </div>
    </form>
</div>
</div>
@endsection