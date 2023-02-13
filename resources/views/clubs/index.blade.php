@extends('layouts.plantilla')

@section('title','Clubs')

@section('pretitle', 'CLUBS')

@section('content')
<div class="mt-5 flex space-x-20 font-rubik">
    <div><a href="{{route('clubs.create')}}" class="w-28 h-11 m-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-neon-orange px-4 py-2 text-white shadow-sm hover:bg-dark-orange">Crear club</a></div>
    <div class="container mx-auto">
    <div class="grid grid-cols-4 gap-4">
        @foreach ($clubs as $club)
        <div class="bg-neon-lime w-52 h-72 m-8 static rounded-lg ">
            <a href="{{route('clubs.show', $club->id)}}">
                <div class="bg-white w-52 h-72 hover:-m-2 absolute rounded-lg shadow-lg transition-all duration-150 ease-out hover:ease-in ">
                    <h1 class="m-4 text-2xl font-bold">{{$club->name}}</h1>
                    <hr class="m-4 rounded-2xl border-t-2">
                    <p class="m-4 text-3xl"><i class="fa-solid fa-shield-halved"></i></p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="flex justify-center">{{ $clubs->links() }}</div>
    </div>
</div>
@endsection