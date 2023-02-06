@extends('layouts.plantilla')

@section('title','Equipos')

@section('content')
<h1>Ligas</h1>
<a href="{{route('leagues.create')}}">Crear liga</a>
<ul>
    @foreach ($leagues as $league)
    <li><a href="{{route('leagues.show', $league->id)}}">{{$league->name}}</a></li>
    @endforeach
</ul>
{{$leagues->links()}}
@endsection