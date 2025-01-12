<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://api.themoviedb.org/3/movie/popular';
        $response = Http::withToken(env('TMDB_API_KEY'))->get($url);

        $movies = $response->json(['results']);

        foreach ($movies as $movie) {
            Movie::create([
                'movie_id' => $movie['id'],
                'title' => $movie['title'],
                // TODO
                // 'genre' => $movie['genre_ids']
                'release_year' => Carbon::parse($movie['release_date'])->format('Y'),
                'poster_path' => $movie['poster_path'],
                'overview' => $movie['overview']
            ]);
        }
    }
}
