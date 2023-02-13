<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;800&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a50a5de7f0.js" crossorigin="anonymous"></script>
  <!-- favicon -->
  <!-- estilos -->
</head>

<body>
    <!-- header -->
    <div class="relative">
      <div class="mx-32 px-6 border-b-2 border-neon-orange">
        <div class="flex items-center justify-between px-6 py-6 md:justify-start md:space-x-10">
          <nav class="hidden space-x-10 md:flex md:flex-1">
          <a href="{{route('leagues.index')}}" class="text-base font-rubik text-gray-700 hover:text-neon-orange">LIGAS</a>
            <a href="{{route('clubs.index')}}" class="text-base font-rubik text-gray-700 hover:text-neon-orange">CLUBS</a>
          </nav>
          <div class="flex justify-center lg:w-0 lg:flex-1">
            <a href="#">
              <span class="sr-only">Football handler</span>
              <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
            </a>
          </div>
          <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
            <a href="#" class="whitespace-nowrap text-base font-rubik text-gray-700 hover:text-dark-orange">Regístrate</a>
            <a href="#" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-neon-orange px-4 py-2 text-base font-rubik text-white shadow-sm hover:bg-dark-orange">Accede</a>
          </div>
        </div>
      </div>
    </div>

    <!-- nav -->
    <div class="relative">
      <div class="flex items-center justify-between mx-32 my-4 py-auto px-20 bg-teal h-12">
        <h2 class="whitespace-nowrap font-rubik text-xl font-medium text-white">@yield ('pretitle')</h2>
      </div>
    </div>
  <!-- content -->
    <div class="mx-44 my-4 px-6 font-rubik">
      @yield ('content')
    </div>

    <!-- footer -->

    <!-- script -->
</body>

</html>