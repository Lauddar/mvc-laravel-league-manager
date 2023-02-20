@extends('layouts.layout')

@section('title','Inicio')

@section('title','Inicio')

@section('title','Inicio')

@section('main')
<div class="py-12">
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col space-y-8 justify-center">
            <h1 class="font-pacifico text-5xl text-neon-orange">League Manager</h1>
            <div class="flex space-x-6">
            <div class="bg-neon-lime w-80 h-96 static rounded-lg">
                <a href="{{route('leagues.index')}}">
                    <div class="justify-between bg-white w-80 h-96 hover:-m-2 absolute rounded-lg shadow-lg transition-all duration-150 ease-out hover:ease-in ">
                        <hr class="m-4 rounded-2xl border-t-2">
                        <h1 class="m-4 text-3xl font-bold">LIGAS</h1>
                        <div class="mt-16 h-2/4 p-3 flex justify-center items-bottom">
                        <img class="h-full" src="{{asset('storage/trofeo.png')}}">
                        </div>
                    </div>
                </a>
            </div>
            <div class="bg-neon-lime w-80 h-96 static rounded-lg ">
                <a href="{{route('clubs.index')}}">
                    <div class="bg-white w-80 h-96 hover:-m-2 absolute rounded-lg shadow-lg transition-all duration-150 ease-out hover:ease-in ">
                        <hr class="m-4 rounded-2xl border-t-2">
                        <h1 class="m-4 text-3xl font-bold">CLUBS</h1>
                        <div class="mt-16 h-2/4 p-3 flex justify-center items-bottom">
                        <img class="h-full" src="{{asset('storage/bota-de-futbol.png')}}">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection