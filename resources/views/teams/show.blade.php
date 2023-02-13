@extends('layouts.plantilla')

@section('title',$team->name)


@section('content')
<div class="mt-5 font-rubik">
    <div class="px-5 text-gray-600 hover:text-teal"><a href="{{route('clubs.show', $team->club->id)}}">Volver al club</a></div>
    <div class="mt-8 flex space-x-4">
        <div class="w-1/2 bg-creme p-8 h-max">
            <div class="mb-6">
                <label class="block mb-2 text-2xl font-semibold text-gray-900 dark:text-white">{{$team->name}}</label>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-lg font-regular text-gray-500 dark:text-white"><a href="{{route('clubs.show', $team->club->id)}}">Club {{$team->club->name}}</a></label>
            </div>
            <div class="mb-6">
                <label href="{{route('clubs.show', $team->club->id)}}" class="block mb-2 text-gray-900 dark:text-white"><span class="font-medium">Categoría:</span> {{$team->category}}</label>
            </div>
            <a href="{{route('teams.edit', $team->id)}}" class="w-28 h-11 px-4 py-2 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-teal text-white shadow-sm hover:bg-light-teal">Editar equipo</a>
        </div>
        <div class="w-1/2 p-8 h-max">
            <h2 class="mb-3 text-xl font-bold">LIGAS</h2>
            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700 w-2/3">
            @if(count($team->leagues) == 0) <p class="text-gray-400">No hay ligas.</p>
            @endif
            @foreach ($team->leagues as $league)
            <div class="flex flex-col pb-3">
                <dt class="font-rubik mt-2 text-lg font-semibold md:text-lg dark:text-gray-400"><a href="{{route('leagues.show', $league->id)}}">{{$league->name}}</a></dt>
                <dd class="font-rubik text-gray-500">
                    @include('leagues.partials.leaguestate')
                </dd>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection