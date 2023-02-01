@extends('layouts.plantilla')

@section('title','Nuevo club')

@section('content')
<h1>Edita el club</h1>

<form action="{{route('clubs.update', $club)}}" method="POST">
    
    @csrf

    @method('put')

    <label>
        Nombre:
        <br>
        <input type="text" name="name" value="{{old('name',$club->name)}}">
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
        <input type="text" name="location" value="{{old('location',$club->location)}}">
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