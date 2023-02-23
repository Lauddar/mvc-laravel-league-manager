@extends('layouts.content')

@section('title','Nuevo club')

@section('primary-text', 'NUEVO CLUB')

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme rounded-lg shadow-md p-8 h-max">
        <form action="{{route('clubs.store')}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Nombre</label>
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="name" value="{{old('name')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Localidad</label>
                @error('location')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="location" value="{{old('location')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4">
                <x-teal-button>
                    {{ __('Crear') }}
                </x-teal-button>
                <a href="{{route('clubs.index')}}"><x-gray-button>
                        {{'Cancelar'}}
                    </x-gray-button></a>
            </div>
        </form>
    </div>
</div>
@endsection