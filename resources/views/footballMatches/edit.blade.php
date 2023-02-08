@extends('layouts.plantilla')

@section('title','Edita el partido - ' . $footballmatch->league)

@section('section', 'PARTIDO')
@section('content')
<h1>Edita el partido</h1>

<form action="{{route('footballmatches.update', $footballmatch)}}" method="POST">
    @csrf
    @method('put')

    <label for="">Equipo local:</label>
    <br>
    <div>{{$footballmatch->local->name}}</div>
    <br>
    <label for="">Goles del equipo local:</label>
    <br>
    <input type="number" name="local_goals" id="" value="{{$footballmatch->local_goals}}"></input>
    <br>
    <label for="">Equipo visitante:</label>
    <br>
    <div>{{$footballmatch->visiting->name}}</div>
    <br>
    <label for="">Goles del equipo visitante:</label>
    <br>
    <input type="number" name="visiting_goals" id="" value="{{$footballmatch->visiting_goals}}"></input>
    <br>
    <label>
        Fecha del partido:
        <br>
        <input type="date" name="start_date" value="{{old('start_date', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $footballmatch->start_date)->toDateString())}}">
    </label>
    <br>
    <button type="submit">Guardar</button>
</form>
@endsection