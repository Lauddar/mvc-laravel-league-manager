@extends('layouts.plantilla')

@section('title','Nuevo equipo')

@section('content')
<h1>Añade un equipo nuevo</h1>

<form action="{{route('teams.store')}}" method="POST">

    @csrf

    <label>
        Nombre:
        <br>
        <input type="text" name="name" value="{{old('name')}}">
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
        <input type="text" name="location" value="{{old('location')}}">
    </label>

    @error('location')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <button type="submit">Crear</button>
</form>
@endsection