@extends('layouts.content')

@section('title','Ligas')

@section('primary-text','LIGAS')

@section('content')
<div class="flex flex-col">
    @auth
    <a href="{{route('leagues.create')}}">
        @else <a href="{{route('register')}}">
            @endauth<x-orange-button>
                {{'Nueva liga'}}
            </x-orange-button></a>
        <h1 class="mt-5 p-4 text-xl font-bold">TODAS LAS LIGAS</h1>
        <div class="flex flex-col space-y-5">
            <div class="mx-4 grid grid-cols-3 gap-y-12 gap-x-6">
                @if(count($leagues) == 0) <p class="text-gray-400">No hay ligas.</p>
                @endif
                @foreach ($leagues as $league)
                <a href="{{route('leagues.show', $league->id)}}">
                    <div class="P-4 bg-white h-28 rounded-lg shadow-md hover:shadow-lg">
                        <h1 class="m-4 text-2xl truncate font-bold">{{$league->name}}</h1>
                        <hr class="mx-4 rounded-2xl border-t-2">
                        <div class="m-4 text-sm text-gray-500">@include('leagues.partials.leaguestate')</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
</div>
@endsection