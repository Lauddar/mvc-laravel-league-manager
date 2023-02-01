@extends('layouts.plantilla')

@section('title','Inicio')

@section('content')
<h1>League Manager</h1>

<a href="{{route('leagues.index')}}">Ligas</a>
<br>
<a href="{{route('clubs.index')}}">Clubs</a>
@endsection