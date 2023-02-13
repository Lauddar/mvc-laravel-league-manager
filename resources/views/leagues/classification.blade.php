@extends('layouts.plantilla')

@section('title','Clasificación ' . $league->name)

@section('section', 'LIGA')

@section('pretitle', 'CLASIFICACIÓN ' . $league->name)

@section('content')
<div class="flex-wrap items-center justify-center space-y-4 mx-10">
    <div class="px-5 text-gray-600 hover:text-teal"><a href="{{route('leagues.show',$league)}}">Volver a la liga</a></div>
    <div>@include('leagues.partials.leaguestate')</div>
    <div>@include('leagues.partials.longClassification')</div>
</div>
@endsection