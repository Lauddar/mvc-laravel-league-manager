<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;800&display=swap" rel="stylesheet">

  <!-- Scripts -->

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @livewireStyles

  <script src="https://kit.fontawesome.com/a50a5de7f0.js" crossorigin="anonymous"></script>
</head>

<body class="font-rubik antialiased">
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

    @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">
      <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
        <h1 class="pl-5 font-medium text-gray-800 dark:text-white">@yield('primary-text')<span class="font-medium text-gray-500 dark:text-white">@yield('secondary-text')</span></h1>
      </div>
    </header>

    <!-- Page Content layout -->
    <main>
      @yield ('main')
    </main>
  </div>

  @livewireScripts

  @stack('js')

</body>

</html>