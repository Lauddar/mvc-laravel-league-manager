@extends('layouts.content')

@section('title',$team->name)

@section('primary-text','PARTIDOS')

@section('content')
<h1>Club {{$team->name}}</h1>
<p>{{$team->location}}</p>
<a href="{{route('teams.edit', $team)}}">Editar este equipo</a> 
<br>
<form action="{{route('teams.destroy',$team)}}" method="POST">
@csrf
@method('delete')
<button type="submit">Eliminar</button>
</form>
<a href="{{route('teams.index')}}">Volver a equipos</a> 
@endsection