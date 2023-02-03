@extends('layouts.plantilla')

@section('title','Nuevo equipo')

@section('content')
<h1>Añade un equipo nuevo</h1>

<form action="{{route('clubs.teams.store', $club)}}" method="POST">

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
    <label for="category">Selecciona una categoria:</label>
    <br>
    <select name="category" id="category">
        <option value="Benjamín">Benjamín</option>
        <option value="Alevín">Alevín</option>
        <option value="Infantil">Infantil</option>
        <option value="Cadete">Cadete</option>
        <option value="Juvenil">Juvenil</option>
    </select>


    @error('category')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <button type="submit">Crear</button>
</form>
@endsection