@extends('layouts.plantilla')

@section('title',$league->name)



@section('content')
<h1>{{$league->name}}</h1>
<p>Empieza: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->start_date)->format('d-m-Y')}}</p>
<p>Acaba: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->end_date)->format('d-m-Y')}}</p>
<p>Estado: {{$league->state}}</p>
<a href="{{route('leagues.listTeams', $league)}}">Añadir equipos</a> 
<a href="{{route('leagues.edit', $league)}}">Modificar esta liga</a> 
<br>
<a href="{{route('footballMatches.index', $league)}}">Ver partidos</a>
<form action="{{route('leagues.destroy',$league)}}" method="POST">
@csrf
@method('delete')
<button type="submit">Eliminar</button>
</form>
<h2>CLASIFICACIÓN</h2>
<div>@include('leagues.partials.shortClassification')</div>
<a href="{{route('leagues.classification',$league)}}">Ver detalles de clasificación</a> 
<br>
<a href="{{route('leagues.index')}}">Volver a ligas</a> 
@endsection