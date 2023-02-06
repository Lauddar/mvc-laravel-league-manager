@extends('layouts.plantilla')

@section('title','Añadir equipos')

@section('content')
<h3>LIGA</h3>
<h1>{{$league->name}}</h1>
<p>Equipos de la liga:</p>
<form action="{{route('leagues.removeTeams', $league) }}" method="POST">
    @csrf
    <ul>
        @foreach ($league->teams as $team)
        <li><label class="form-check-label" for="check1">
                <input type="checkbox" class="form-check-input" id="" name="teamsList[]" value="{{$team->id}}">
                <a href="{{route('teams.show', $team->id)}}">{{$team->name}}</a>
            </label>
        </li>
        @endforeach
    </ul>
    <br>
    <button type="submit">Quitar</button>
</form>

<p>Añadir equipos:</p>
<form action="{{route('leagues.listTeams', $league)}}" method="GET">
    <input type="text" class="form-control" name="search" value="{{old('search', $text)}}">
    <input type="submit" value="Buscar">
</form>
<a href="{{route('leagues.listTeams', $league)}}">Ver todos</a>
<form action="{{route('leagues.addTeams', $league) }}" method="POST">
    @csrf
    <ul>
        @foreach ($notAddedTeams as $team)
        <li><label class="form-check-label" for="check1">
                <input type="checkbox" class="form-check-input" id="" name="teamsList[]" value="{{$team->id}}">
                <a href="{{route('teams.show', $team->id)}}">{{$team->name}}</a>
            </label>
        </li>

        @endforeach
    </ul>
    <br>
    <button type="submit">Añadir</button>
</form>
<a href="{{route('leagues.show', $league)}}">Volver a la liga</a>

@endsection