<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $movies = Movie::all();

    return view('home', [
        'movies' => $movies
    ]);
});

Route::get('/movie/{id}', function (int $id) {
    $movie = Movie::find($id);

    // FIX: $movie->plot_embedding breaks the query 🤷‍♂️
    $similar_movies = Movie::query()
        ->nearest('movies_plot_embedding_idx', $movie->plot_embedding, 3)
        ->get();

    return view('movie', [
        'movie' => $movie,
        'similar_movies' => $similar_movies
    ]);
});
