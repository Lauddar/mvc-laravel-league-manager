@extends('layouts.content')

@section('title','Edita ' . $club->name)

@section('primary-text','EDITA EL CLUB ')

@section('secondary-text',$club->name)

@section('content')
<div class="flex items-center justify-center">
    <div class="w-1/2 bg-creme rounded-lg shadow-md p-8 h-max">
        <form action="{{route('clubs.update', $club)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Nombre</label>
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="name" value="{{old('name', $club->name)}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="mb-6">
                <label for="large-input" class="block mb-1 text-gray-800 font-medium text-sm dark:text-white">Localidad</label>
                @error('location')
                <x-alert>{{$message}}</x-alert>
                @enderror
                <input type="text" id="large-input" name="location" value="{{old('location', $club->location)}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-lime focus:border-lime">
            </div>
            <div class="flex space-x-4">
                <x-teal-button type="submit">
                    {{'Guardar'}}
                </x-teal-button>
                <a href="{{route('clubs.show', $club)}}"><x-gray-button>
                        {{'Cancelar'}}
                    </x-gray-button></a>
            </div>
        </form>
        <form action="{{route('clubs.destroy',$club)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este club?')" class="pt-4 pl-2 text-sm font-medium text-red-500">Eliminar</button>
        </form>
        </form>
    </div>
</div>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
@endsection