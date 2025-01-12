<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $movies = Movie::all();

    dd($movies);

    return view('welcome');
});
