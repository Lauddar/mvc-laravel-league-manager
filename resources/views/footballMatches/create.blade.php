@extends('layouts.plantilla')

@section('title','Nuevo partido - ' . $league->name)

@section('section', 'PARTIDOS')

@section('content')
<h1>Crear un partido nuevo</h1>

<form action="{{route('leagues.footballmatches.store', $league)}}" method="POST">

    @csrf

    <label for="category">Equipo local:</label>
    <br>
    <select name="local_team" id="local_team">
        @foreach($league->teams as $team)
        <option value="{{$team->id}}" {{ $team->id == 'old($team->id)' ? 'selected' : ''}}>{{$team->name}}</option>
        @endforeach
    </select>
    <br>
    <label for="category">Equipo visitante:</label>
    <br>
    <select name="visiting_team" id="visiting_team">
         @foreach($league->teams as $team)
        <option value="{{$team->id}}" {{ $team->id == 'old($team->id)' ? 'selected' : ''}}>{{$team->name}}</option>
        @endforeach
    </select>
    @error('visiting_team')
    <br>
    <small>"This fields must be different."</small>
    <br>
    @enderror
    <br>
    <label>
        Fecha del partido:
        <br>
        <input type="date" name="start_date" value="{{old('start_date')}}">
    </label>
    <br>
    <button type="submit">Crear</button>
</form>
@endsection