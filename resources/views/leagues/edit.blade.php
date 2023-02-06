@extends('layouts.plantilla')

@section('title','Modifica esta liga')

@section('content')
<h1>Edita la liga</h1>

<form action="{{route('leagues.update', $league)}}" method="POST">
    
    @csrf

    @method('put')

    <label>
        Nombre:
        <br>
        <input type="text" name="name" value="{{old('name',$league->name)}}">
    </label>
 
    @error('name')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <label>
        Fecha de inicio:
        <br>
        <input type="date" name="start_date" id="start_date" class="form-control" value="{{old('start_date', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->start_date)->toDateString())}}"> 
        </label>

    @error('start_date')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <label>
        Fecha de fin:
        <br>
        <input type="date" name="end_date" value="{{old('end_date', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $league->end_date)->toDateString())}}">
    </label>

    @error('end_date')
    <br>
    <small>"{{$message}}"</small>
    <br>
    @enderror

    <br>
    <button type="submit">Guardar</button>
    <a href="{{route('leagues.index')}}">Cancelar</a> 
</form>
@endsection