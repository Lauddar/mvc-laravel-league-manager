@extends('layouts.plantilla')

@section('title','Nueva liga')

@section('content')
<h1>Crea una liga</h1>

<form action="{{route('leagues.store')}}" method="POST">

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
        Fecha de inicio:
        <br>
        <input type="date" name="start_date" value="{{old('start_date')}}">
    </label>

    @error('location')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <label>
        Fecha de fin:
        <br>
        <input type="date" name="end_date" value="{{old('end_date')}}">
    </label>

    @error('end_datev')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <button type="submit">Crear</button>
    <a href="{{route('leagues.index')}}">Cancelar</a> 
</form>
@endsection