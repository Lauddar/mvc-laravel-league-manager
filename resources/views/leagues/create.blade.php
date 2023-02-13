@extends('layouts.plantilla')

@section('title','Nueva liga')

@section('pretitle', 'LIGA NUEVA')

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme p-8 h-max">
        <form action="{{route('leagues.store')}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Nombre:</label>
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="name" value="{{old('name')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-2 font-medium text-gray-900 dark:text-white">Fecha de inicio:</label>
                @error('start_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="start_date" value="{{old('start_date')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="mb-2 font-medium text-gray-900">Fecha de fin:</label>
                @error('end_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="end_date" value="{{old('end_date')}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4 mb-6 py-2">
                <button class="w-28 h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal px-4 py-2 font-rubik text-white shadow-sm hover:bg-light-teal" type="submit">Crear</button>
                <a class="w-28 h-11 ml-4 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-gray-500 px-4 py-2 font-rubik text-white shadow-sm hover:bg-gray-400" href="{{route('leagues.index')}}">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection