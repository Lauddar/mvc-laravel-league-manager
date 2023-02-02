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
    <label>
        Categoria:
        <br>
        <input type="text" name="category" value="{{old('category')}}">
    </label>

    @error('category')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <button type="submit">Crear</button>
</form>
@endsection