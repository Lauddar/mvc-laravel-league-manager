@extends('layouts.content')

@section('title','Clubs')

@section('primary-text', 'CLUBS')

@section('content')
<div class="flex flex-col">
    @auth
    <a href="{{route('clubs.create')}}">
        @else <a href="{{route('register')}}">
            @endauth<x-orange-button>
                {{'Nuevo club'}}
            </x-orange-button></a>
        <h1 class="mt-5 p-4 text-xl font-bold">TODOS LOS CLUBS</h1>
        <div class="flex flex-col space-y-5">
            <div class="mx-4 grid grid-cols-5 gap-y-12 gap-x-6">
                @if(count($clubs) == 0) <p class="text-gray-400">No hay clubs.</p>
                @endif
                @foreach ($clubs as $club)
                <a href="{{route('clubs.show', $club->id)}}">
                    <div class="p-4 bg-white h-72 rounded-lg shadow-md hover:shadow-lg">
                        <div class="h-1/3">
                            <h1 class="pt-2 text-lg font-medium">{{$club->name}}</h1>
                            <hr class="m-1 border-t-2">
                        </div>
                        <div class="h-2/3 p-3 flex justify-center items-bottom">
                            <img class="h-full" src="{{asset('storage/insignia-de-escudo.png')}}">
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="mt-5 w-1/3">{{ $clubs->links() }}</div>
        </div>
</div>
@endsection