@extends('layouts.plantilla')

@section('title','Ligas')

@section('pretitle', 'LIGAS')

@section('content')
<div class="mt-5 flex space-x-20 font-rubik">
    <div><a href="{{route('leagues.create')}}" class="w-28 h-11 m-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-neon-orange px-4 py-2 text-white shadow-sm hover:bg-dark-orange">Crear liga</a></div>
    <div class="m-8 grid grid-cols-2 gap-16">
        @foreach ($leagues as $league)
        <div class="bg-neon-lime w-96 h-28 static rounded-lg ">
            <a href="{{route('leagues.show', $league->id)}}">
                <div class="bg-white w-96 h-28 hover:-m-2 absolute rounded-lg shadow-lg transition-all duration-150 ease-out hover:ease-in ">
                    <h1 class="m-4 text-2xl truncate font-bold">{{$league->name}}</h1>
                    <hr class="mx-4 rounded-2xl border-t-2">
                    <div class="m-4 text-sm text-gray-500">@include('leagues.partials.leaguestate')</div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection