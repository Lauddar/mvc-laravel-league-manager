@extends('layouts.plantilla')

@section('title',$team->name)

@section('content')
<h1>{{$team->name}}</h1>
<h3><a href="{{route('clubs.show', $team->club->id)}}">{{$team->club->name}}</a></h3>
<p>{{$team->category}}</p>
<a href="{{route('teams.edit', $team)}}">Editar este equipo</a> 
<br>
<form action="{{route('teams.destroy',$team)}}" method="POST">
@csrf
@method('delete')
<button type="submit">Eliminar</button>
</form>
<a href="{{route('clubs.show', $team->club->id)}}">Volver a equipos</a> 
@endsection