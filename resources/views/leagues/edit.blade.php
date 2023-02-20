@extends('layouts.content')

@section('title','Edita ' . $league->name)

@section('primary-text','EDITA ')

@section('secondary-text',$league->name)

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme rounded-lg shadow-md p-8 h-max">
        <form action="{{route('leagues.update', $league)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Nombre</label>
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="name" value="{{old('name',$league->name)}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Fecha de inicio</label>
                @error('start_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="start_date" value="{{old('start_date', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->start_date)->toDateString())}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Fecha de fin</label>
                @error('end_date')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="date" id="large-input" name="end_date" value="{{old('end_date', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->end_date)->toDateString())}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4">
                <x-teal-button type="submit">
                    {{'Guardar'}}
                </x-teal-button>
                <a href="{{route('leagues.show',$league)}}"><x-gray-button>
                        {{'Cancelar'}}
                    </x-gray-button></a>
            </div>
        </form>
        <form action="{{route('leagues.destroy',$league)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar esta liga?')" class="pt-4 pl-2 font-medium text-red-500">Eliminar</button>
        </form>
    </div>
</div>
@endsection