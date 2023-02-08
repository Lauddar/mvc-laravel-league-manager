@extends('layouts.plantilla')

@section('title',$team->name)

@section('content')
<h1>{{$team->name}}</h1>

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
    <label for="category">Selecciona una categoria:</label>
    <br>
    <select name="category" id="category">
        <option value="Benjamín" {{ $team->category == 'Benjamín' ? 'selected' : ''}}>Benjamín</option>
        <option value="Alevín" {{ $team->category == 'Alevín' ? 'selected' : ''}}>Alevín</option>
        <option value="Infantil" {{ $team->category == 'Infantil' ? 'selected' : ''}}>Infantil</option>
        <option value="Cadete" {{ $team->category == 'Cadete' ? 'selected' : ''}}>Cadete</option>
        <option value="Juvenil" {{ $team->category == 'Juvenil' ? 'selected' : ''}}>Juvenil</option>
    </select>

    @error('category')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <button type="submit">Guardar</button>
</form>
@endsection