@extends('layouts.plantilla')

@section('title',$club->name)

@section('content')
<h1>Club {{$club->name}}</h1>
<p>{{$club->location}}</p>
<a href="{{route('clubs.edit', $club)}}">Editar este club</a> 
<br>
<form action="{{route('clubs.destroy',$club)}}" method="POST">
@csrf
@method('delete')
<button type="submit">Eliminar</button>
</form>
<a href="{{route('clubs.index')}}">Volver a Clubs</a> 
@endsection