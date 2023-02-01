@extends('layouts.plantilla')

@section('title','Nuevo equipo')

@section('content')
<h1>Edita el equipo</h1>

<form action="{{route('teams.update', $team)}}" method="POST">
    
    @csrf

    @method('put')

    <label>
        Nombre:
        <br>
        <input type="text" name="name" value="{{old('name',$team->name)}}">
    </label>
 
    @error('name')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <label>
        Localidad:
        <br>
        <input type="text" name="location" value="{{old('location',$team->location)}}">
    </label>

    @error('location')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <button type="submit">Guardar</button>
</form>
@endsection