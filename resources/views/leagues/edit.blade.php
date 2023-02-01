@extends('layouts.plantilla')

@section('title','Nueva liga')

@section('content')
<h1>Edita la liga</h1>

<form action="{{route('leagues.update', $league)}}" method="POST">
    
    @csrf

    @method('put')

    <label>
        Nombre:
        <br>
        <input type="text" name="name" value="{{old('name',$league->name)}}">
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
        <input type="text" name="location" value="{{old('location',$league->location)}}">
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