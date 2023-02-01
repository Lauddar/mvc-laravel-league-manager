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