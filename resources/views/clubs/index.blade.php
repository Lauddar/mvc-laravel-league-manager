@extends('layouts.plantilla')

@section('title','Clubs')

@section('content')
<h1>Clubs</h1>
<a href="{{route('clubs.create')}}">Crear club</a>
<ul>
    @foreach ($clubs as $club)
    <li><a href="{{route('clubs.show', $club->id)}}">{{$club->name}}</a></li>
    @endforeach
</ul>
{{$clubs->links()}}
@endsection