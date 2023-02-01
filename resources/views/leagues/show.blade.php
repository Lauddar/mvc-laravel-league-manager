@extends('layouts.plantilla')

@section('title',$league->name)

@section('content')
<h1>Club {{$league->name}}</h1>
<p>{{$league->location}}</p>
<a href="{{route('leagues.edit', $league)}}">Editar este equipo</a> 
<br>
<form action="{{route('leagues.destroy',$league)}}" method="POST">
@csrf
@method('delete')
<button type="submit">Eliminar</button>
</form>
<a href="{{route('leagues.index')}}">Volver a equipos</a> 
@endsection