<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans pb-16">
      <header class="container mx-auto p-6">
        <h1 class="text-2xl">Laravel Turso Movies</h1>
      </header>
      <div class="container mx-auto p-6">
        <div class="grid grid-cols-4 gap-10">
          @foreach($movies as $movie)
            <a href="/movie/{{ $movie->id }}" class="col-span-1 rounded-md shadow-md overflow-hidden">
              <img src="https://image.tmdb.org/t/p/original/{{ $movie->poster_path }}" alt="{{ $movie->title }} poster">
              <div class="p-4">
                <h2 class="text-lg leading-tight">{{ $movie->title }}</h2>
                <p class="text-sm mt-1">{{ $movie->release_year }}</p>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </body>
</html>
