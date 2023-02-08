@extends('layouts.plantilla')

@section('title','Partidos')

@section('section', 'PARTIDOS')

@section('content')
<h1>{{$league->name}}</h1>
<a href="{{route('footballMatches.generate', $league)}}">Asignar partidos</a>
<div>@include('footballMatches.partials.matchesTable', $league)</div>
<a href="{{route('leagues.footballmatches.create', $league)}}">Crear partido nuevo</a>
<a href="{{route('leagues.show', $league)}}">Volver a la liga</a>
@endsection