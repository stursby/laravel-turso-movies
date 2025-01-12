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

        <div class="flex gap-16">
          <div class="flex-1 flex flex-col gap-6">
            <h2 class="text-xl">{{ $movie->title }}</h2>
            <dl>
              <dt class="text-sm text-gray-500">Relase year</dt>
              <dd class="text-lg">{{ $movie->release_year }}</dd>
            </dl>
            <img class="rounded" src="https://image.tmdb.org/t/p/original/{{ $movie->poster_path }}" alt="{{ $movie->title }} poster">
          </div>
          <div class="flex-[2.5] flex flex-col gap-6">
            {{-- <h2 class="text-xl leading-tight">Details</h2> --}}

            <dl>
              <dt class="text-sm text-gray-500">Overview</dt>
              <dd class="text-lg mt-1">{{ $movie->overview }}</dd>
            </dl>
            <div>
              <p class="text-sm text-gray-500">Similar movies</p>
              <div class="grid grid-cols-4 gap-10 mt-2">
                @foreach($similar_movies as $similar_movie)
                  <a href="/movie/{{ $similar_movie->id }}" class="col-span-1 rounded-md shadow-md overflow-hidden">
                    <img src="https://image.tmdb.org/t/p/original/{{ $similar_movie->poster_path }}" alt="{{ $similar_movie->title }} poster">
                    <div class="p-4">
                      <h2 class="text-lg leading-tight">{{ $similar_movie->title }}</h2>
                      <p class="text-sm mt-1">{{ $similar_movie->release_year }}</p>
                    </div>
                  </a>
                  {{-- <div>
                    <h3>{{ $similar_movie->title }}</h3>
                    <img src="https://image.tmdb.org/t/p/original/{{ $similar_movie->poster_path }}" alt="{{ $similar_movie->title }} poster">
                  </div> --}}
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
