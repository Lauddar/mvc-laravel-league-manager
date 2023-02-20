@extends('layouts.content')

@section('title','Clasificación ' . $league->name)

@section('primary-text','CLASIFICACIÓN ')

@section('secondary-text',$league->name)

@section('content')
<div class="flex-wrap items-center justify-center space-y-4 mx-10">
    <div class="text-gray-600 text-sm mb-5 hover:text-teal"><a href="{{route('leagues.show',$league)}}">Volver a la liga</a></div>
    <div>@include('leagues.partials.leaguestate')</div>
    <div>@livewire('classification', ['league' => $league])</div>
</div>
@endsection