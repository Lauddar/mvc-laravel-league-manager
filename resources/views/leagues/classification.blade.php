@extends('layouts.plantilla')

@section('title',$league->name . '- Clasificación')

@section('section', 'LIGA')

@section('content')
<h1>CLASIFICACIÓN</h1>
<h2>{{$league->name}}</h2>
<p>Estado: {{$league->state}}</p>
<div>@include('leagues.partials.longClassification')</div>
<a href="{{route('leagues.show', $league->id)}}">Volver a ligas</a> 
@endsection