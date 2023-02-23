@extends('layouts.layout')

@section('main')
<!-- CONTENT -->
<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="px-6 py-12 ptext-gray-900 dark:text-gray-100">
        @yield ('content')
      </div>
    </div>
  </div>
</div>
@endsection