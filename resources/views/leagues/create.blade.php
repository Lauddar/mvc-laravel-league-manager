@extends('layouts.content')

@section('title','Nueva liga')

@section('primary-text','LIGA NUEVA')

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme rounded-lg shadow-md p-8 h-max">
        <form action="{{route('leagues.store')}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Nombre</label>
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="name" value="{{old('name')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Fecha de inicio</label>
                @error('start_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="start_date" value="{{old('start_date')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Fecha de fin</label>
                @error('end_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="end_date" value="{{old('end_date')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4">
                <x-teal-button>
                    {{ __('Crear') }}
                </x-teal-button>
                <a href="{{route('leagues.index')}}"><x-gray-button>
                        {{'Cancelar'}}
                    </x-gray-button></a>
            </div>
        </form>
    </div>
</div>
@endsection