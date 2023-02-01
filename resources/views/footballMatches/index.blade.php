@extends('layouts.plantilla')

@section('title','Equipos')

@section('content')
<h1>Equipos</h1>
<a href="{{route('teams.create')}}">Crear equipo</a>
<ul>
    @foreach ($teams as $team)
    <li><a href="{{route('teams.show', $team->id)}}">{{$team->name}}</a></li>
    @endforeach
</ul>
{{$teams->links()}}
@endsection